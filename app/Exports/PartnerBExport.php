<?php

namespace App\Exports;

use App\Builders\PartnerBFeedBuilder;
use App\Models\PriceList;
use App\Models\Variant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartnerBExport implements FromQuery,WithHeadings
{
    use Exportable;

    public function query()
    {
        $data = new PartnerBFeedBuilder(new Variant());
        return $data->addDataFields()->available()->addPrices()->filterByCurrencyCode(PriceList::EUROPE_CURRENCY_CODE)->build();
    }

    public function headings():array
    {
        return ["CodiceProdotto","Sku","Nome","Marca","Categoria","Descrizione","Tipo","Valore","GTIN","Quantita","PrezzoListino","PrezzoSaldo","Sconto"];
    }

}
