<?php


namespace App\Builders;


use App\Models\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractFeedBuilder
{
    protected Builder $query;

    abstract public function addPrices(): AbstractFeedBuilder;

    abstract protected function addSalePrice(): AbstractFeedBuilder;

    public function __construct(Model $model)
    {
        $this->query = $model->newQuery();
    }

    public function build()
    {
        return $this->query;
    }

    public function addDataFields()
    {
        $this->query = $this->query->selectRaw('
            variants.product_id,
            variants.sku,
            products.name,
            products.brand,
            products.category,
            products.description,
            products.variant_type,
            variants.variation_value,
            variants.gtin,
            variants.quantity_in_stock',
        )->leftJoin('products', 'variants.product_id', '=', 'products.id')
            ->join('prices', 'prices.variant_id', '=', 'variants.id')
            ->join('price_lists', 'price_lists.id', 'prices.price_list_id');
        return $this;
    }

    public function available():AbstractFeedBuilder
    {
        $this->query = $this->query->where('variants.status',Variant::AVAILABLE_STATUS);
        return $this;
    }

    protected function addListPrice(): AbstractFeedBuilder
    {
        $this->query = $this->query->selectRaw('round(prices.list_price / 100,2)');
        return $this;
    }

    public function filterByCurrencyCode(string $currencyCode): AbstractFeedBuilder
    {
        $this->query = $this->query->where('price_lists.currency_code', $currencyCode);
        return $this;
    }

}
