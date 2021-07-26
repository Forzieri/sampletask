<?php


namespace App\Builders;

class PartnerAFeedBuilder extends AbstractFeedBuilder
{

    public function addPrices():AbstractFeedBuilder
    {
       $this->addListPrice();
       $this->addSalePrice();
       $this->addCostPrice();
        return $this;
    }

    protected function addSalePrice(): AbstractFeedBuilder
    {
        $this->query = $this->query->selectRaw('round(prices.sale_price/100,2)');
        return $this;
    }

    private function addCostPrice():AbstractFeedBuilder{
       $this->query =  $this->query->selectRaw('( (prices.sale_price * 0.85 ) / 100) as cost_price');
       return $this;
    }
}
