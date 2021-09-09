<?php

namespace App\Charts;

use App\Enums\CartStatus;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Cart;
use App\Models\Statistic;

class CartAllChart extends Chart
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
        $data = $statistic->CartStatisticDay("week");
        $this->displayLegend(true);
        $this->title(__('message.Request of this week'));
        $this->labels($data["labels"]);
        $this->dataset(__('message.'.CartStatus::DONE), 'line', $data["done"])->color('green');
        $this->dataset(__('message.'.CartStatus::PENDING), 'line', $data["pending"])->color('blue');
        $this->dataset(__('message.'.CartStatus::CANCEL), 'line', $data["cancel"])->color('red');
    }
}
