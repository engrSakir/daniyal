<?php

namespace App\Http\Livewire\Manager;

use App\Models\Purchase as ModelsPurchase;
use App\Models\PurchaseCategory;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Purchase extends Component
{
    use LivewireAlert, WithFileUploads;

    public $purchase_fields = [];
    public function render()
    {
        return view('livewire.manager.purchase',[
            'purchase_categories' => PurchaseCategory::all(),
            'purchases' => ModelsPurchase::whereDate('created_at', Carbon::today())->get()
        ]);
    }

    public function add_purchase($purchase_category_id){
        $this->validate([
            "purchase_fields.$purchase_category_id.amount" => 'required|numeric|min:0'
        ]);
        ModelsPurchase::create([
            'category_id' => $purchase_category_id,
            'creator_id' => auth()->user()->id,
            'amount' => $this->purchase_fields[$purchase_category_id]['amount'],
            'title' => $this->purchase_fields[$purchase_category_id]['title'] ?? null,
            'description' => null,
            'image' => null,
            'date' => Carbon::now(),
        ]);
        $this->purchase_fields[$purchase_category_id]['amount'] = $this->purchase_fields[$purchase_category_id]['title'] = null;
        $this->alert('success', 'Success');

    }
}
