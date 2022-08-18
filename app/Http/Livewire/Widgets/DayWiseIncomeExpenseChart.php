<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Expense;
use App\Models\Order;
use App\Models\Purchase;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class DayWiseIncomeExpenseChart extends Component
{
    public $chart_type, $chart_data_set, $chart_id, $month;

    public function render()
    {
        $this->chart_id = 'DayWiseIncomeExpenseChart';
        return view('livewire.widgets.day-wise-income-expense-chart');
    }

    public function mount()
    {
        $this->month = date('Y-m');
        $this->chart_type = 'column';
        $this->chart_data_set = $this->get_data();
    }


    public function get_data()
    {
        $begin = new DateTime(date("$this->month-01"));
        $end = new DateTime(date("$this->month-t"));

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end->modify('+1 day'));

        $data_set = [];
        foreach ($period as $date) {
            array_push($data_set,[
                'date' => $date->format("d-M"),
                'income' => Order::whereDate('created_at',  $date->format("Y-m-d"))->sum('paid_amount'),
                'purchase' => Purchase::whereDate('created_at',  $date->format("Y-m-d"))->sum('amount'),
                'expense' => Expense::whereDate('created_at',  $date->format("Y-m-d"))->sum('amount'),
            ]);
        }

        return [
            'credits'=> [
                'enabled' => false,
            ],
            'chart' => [
                'type' => $this->chart_type,
                'zoomType'=> 'xy'
            ],
            'title' => [
                'text' => ""
            ],
            'subtitle' => [
                'text' => "Income & Expense of $this->month month"
            ],
            'xAxis' => [
                'categories' => collect($data_set)->pluck('date')
            ],
            'yAxis' => [
                'min' => 0,
                'title' => [
                    'text' => 'Amount in BDT'
                ]
            ],
            'legend' => [
                'enabled' => false
            ],
            'tooltip'=> [
                'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                'pointFormat'=> '<tr><td style="color:black;padding:0">{series.name}: </td>'.
                    '<td style="padding:0"><b>{point.y:.1f} TK</b></td></tr>',
                'footerFormat'=> '</table>',
                'shared'=> true,
                'useHTML'=> true
            ],
            'series' => [[
                'name' => 'Income',
                'colorByPoint' => true,
                'data' => collect($data_set)->pluck('income'),
                'showInLegend' => true,
                'dataLabels' => [
                    'enabled' => true,
                    'rotation' => -90,
                    'align' => 'right',
                    'format' => '{point.y} TK', // one decimal
                    'y' => 10, // 10 pixels down from the top
                ]
            ],[
                'name' => 'Purchase',
                'colorByPoint' => true,
                'data' => collect($data_set)->pluck('purchase'),
                'showInLegend' => true,
                'dataLabels' => [
                    'enabled' => true,
                    'rotation' => -90,
                    'align' => 'right',
                    'format' => '{point.y} TK', // one decimal
                    'y' => 10, // 10 pixels down from the top
                ]
                ],[
                    'name' => 'Expense',
                    'colorByPoint' => true,
                    'data' => collect($data_set)->pluck('expense'),
                    'showInLegend' => true,
                    'dataLabels' => [
                        'enabled' => true,
                        'rotation' => -90,
                        'align' => 'right',
                        'format' => '{point.y} TK', // one decimal
                        'y' => 10, // 10 pixels down from the top
                    ]
                ]]
        ];
    }

    public function chart_update()
    {
        $this->dispatchBrowserEvent("chart_update_$this->chart_id", ['data' => $this->get_data()]);
    }
}
