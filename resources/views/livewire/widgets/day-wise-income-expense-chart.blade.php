<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>Income & Expense of {{ $month }} month</div>
            <div>
                <input type="month" wire:model="month" wire:change="chart_update">
                <select wire:model="chart_type" wire:change="chart_update">
                    <option value="column">Column</option>
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="area">Area</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <figure class="highcharts-figure" wire:ignore>
                <div id="chart_id_{{ $chart_id }}"> </div>
            </figure>
        </div>
    </div>
 <script>
     $(document).ready(function () {
         //First loaded data
         Highcharts.chart("chart_id_{{ $chart_id }}", {!! collect($chart_data_set) !!});
 
         //chart update and re-render
         window.addEventListener("chart_update_{{ $chart_id }}", event => {
             Highcharts.chart("chart_id_{{ $chart_id }}", event.detail.data);
         });
     });
 </script>
 </div>
