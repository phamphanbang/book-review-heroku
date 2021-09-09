<?php

namespace App\Charts;

use App\Enums\CartStatus;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Cart;
use App\Models\Statistic;

class RevenueChart extends Chart
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
        $data = $statistic->RevenueDay("week");
        $this->displayLegend(true);
        $this->title(__('message.Revenue of this week'));
        $this->labels($data["labels"]);
        $this->dataset(__('message.Revenue'), 'line', $data["revenue"])->color('blue');
    }
}
