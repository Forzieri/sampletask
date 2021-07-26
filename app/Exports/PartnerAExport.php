<?php

namespace App\Exports;

use App\Builders\PartnerAFeedBuilder;
use App\Models\PriceList;
use App\Models\Variant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartnerAExport implements WithHeadings, FromQuery
{
    use Exportable;

    public function query()
    {
        $data = new PartnerAFeedBuilder(new Variant());
        return $data->addDataFields()->available()->addPrices()->filterByCurrencyCode(PriceList::INTERNATIONAL_CURRENCY_CODE)->build();
    }

    public function headings(): array
    {
        return [
            "product code",
            "variant sku",
            "name",
            "brand",
            "category",
            "description",
            "variant type",
            "variant value",
            "GTIN code",
            "quantity in stock",
            "list price",
            "sale price",
            "cost price"
        ];
    }
}
