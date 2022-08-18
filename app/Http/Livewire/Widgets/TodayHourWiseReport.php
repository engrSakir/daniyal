<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;


class TodayHourWiseReport extends Component
{
    public $chart_type, $chart_data_set, $chart_id;

    public function render()
    {
        $this->chart_id = 'TodayHourWiseReport';

        return view('livewire.widgets.today-hour-wise-report');
    }

    public function mount()
    {
        $this->chart_type = 'column';
        $this->chart_data_set = $this->get_data();
    }


    public function get_data()
    {
        $invoices = DB::table('orders')->whereRaw('Date(created_at) = CURDATE()')->select(DB::raw('hour(created_at) as hour'), DB::raw('COUNT(id) as inv_count'))
            ->groupBy(DB::raw('hour(created_at)'))
            ->orderBy('hour')
            ->get();


        $series_data = [];
        foreach ($invoices as $invoice) {
            array_push($series_data, [
                date("g A", strtotime("$invoice->hour:00:00")), $invoice->inv_count
            ]);
        }

        return [
            'chart' => [
                'type' => $this->chart_type,
                'zoomType'=> 'xy'
            ],
            'title' => [
                'text' => ''
            ],
            'subtitle' => [
                'text' => ''
            ],
            'xAxis' => [
                'type' => 'category',
            ],
            'yAxis' => [
                'min' => 0,
                'title' => [
                    'text' => 'Invoice amount'
                ]
            ],
            'legend' => [
                'enabled' => false
            ],
            'tooltip'=> [
                'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                'pointFormat'=> '<tr><td style="color:black;padding:0">{series.name}: </td>'.
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                'footerFormat'=> '</table>',
                'shared'=> true,
                'useHTML'=> true
            ],
            'colors' => ['#981711'],
            'series' => [[
                'name' => 'Invoices',
                'data' => $series_data,
                'dataLabels' => [
                    'enabled' => true,
                    'rotation' => -90,
                    'color' => '#FFFFFF',
                    'align' => 'right',
                    'format' => '{point.y}', // one decimal
                    'y' => 10, // 10 pixels down from the top
                    'style' => [
                        'fontSize' => '13px',
                        'fontFamily' => 'Verdana, sans-serif'
                    ]
                ]
            ]]
        ];
    }

    public function chart_update()
    {
        $this->dispatchBrowserEvent("chart_update_$this->chart_id", ['data' => $this->get_data()]);
    }
}
