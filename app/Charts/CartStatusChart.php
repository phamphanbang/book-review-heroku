<?php

namespace App\Charts;

use App\Models\Cart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class CartStatusChart extends Chart
{
    private $status;
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($status)
    {
        parent::__construct();
        $this->status = $status;
        $this->initData();
    }

    private function initData() {
        $data = Cart::cartStatisticWeek($this->status);
        $this->displayLegend(true);
        $this->title('Chart plss');
        $this->labels($data["labels"]);
        $this->dataset('Carts', 'line', $data["trafic"]);
    }
}
