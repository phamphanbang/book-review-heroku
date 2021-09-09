<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class TagExport implements FromCollection,WithHeadings,WithStrictNullComparison
{
    private $types;

    public function __construct($types)
    {
        $this->types = $types;
    }

    public function headings(): array
    {
        return [
            __('message.Tag'),
            __('message.Count')
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $statistic = new Statistic();
        $tags = $statistic->TagStatistic($this->types);
        $data = collect();
        for ($i=0; $i < $tags["labels"]->count(); $i++) { 
            $data->push([$tags["labels"][$i],
                    $tags["count"][$i]??0]);
        }
        return $data;
    }
}
