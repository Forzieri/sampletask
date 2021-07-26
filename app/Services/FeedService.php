<?php


namespace App\Services;


use App\Exports\PartnerAExport;
use App\Exports\PartnerBExport;
use Maatwebsite\Excel\Concerns\FromQuery;

class FeedService
{
    protected const PATH = '/exports';

    public function exportAPartnerInfo():void{
       $this->export(new PartnerAExport(),"partnerA.csv");
    }

    protected function export(FromQuery $exporter,string $filename,string $disk = 'local'):void{
        $path = self::PATH;
        $exporter->queue("$path/$filename",$disk);
    }

    public function exportBPartnerInfo():void{
        $this->export(new PartnerBExport(),"partnerB.tsv");
    }

}
