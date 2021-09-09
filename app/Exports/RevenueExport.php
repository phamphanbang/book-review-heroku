<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use App\Models\Statistic;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class RevenueExport implements FromCollection,WithHeadings,WithColumnFormatting,WithStrictNullComparison
{
    private $types;

    public function __construct($types)
    {
        $this->types = $types;
    }

    public function columnFormats(): array
    {
        return [
            'day' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return [
            __('excel.day'),
            __('excel.revenue')
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $statistic = new Statistic();
        $revenue = $statistic->RevenueDay($this->types);
        $data = collect();
        for ($i=0; $i < $revenue["labels"]->count(); $i++) { 
            $data->push([$revenue["labels"][$i],
                    $revenue["revenue"][$i]??0]);
        }
        return $data;
    }
}
