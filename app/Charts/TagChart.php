<?php

namespace App\Charts;

use App\Enums\CartStatus;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Statistic;

class TagChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->initData();
    }

    private function initData() {
        $statistic = new Statistic();
        $data = $statistic->TagStatistic("week");
        $this->displayLegend(true);
        $this->title('Tag of all time');
        $this->labels($data["labels"]);
        $this->dataset(__('message.Count'), 'bar', $data["count"])->color('green');
    }
}