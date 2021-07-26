<?php


namespace App\Builders;


class PartnerBFeedBuilder extends AbstractFeedBuilder
{
    public function addPrices():AbstractFeedBuilder
    {
        $this->addListPrice();
        $this->addSalePrice();
        $this->addDiscount();

        return $this;
    }

    protected function addSalePrice():AbstractFeedBuilder{
        $this->query = $this->query->selectRaw("(IF( 100 - (prices.sale_price/prices.list_price)*100  <=30 ,prices.sale_price / 100,(prices.list_price / 100) * 0.7)) as sale_price ");
        return $this;
    }


    private function addDiscount():AbstractFeedBuilder{
        $this->query->selectRaw("(IF( 100 - ( (prices.sale_price/prices.list_price)*100 ) <=30 ,100 - ( (prices.sale_price/prices.list_price)*100 ),30)) as discount ");
        return $this;
    }

}
