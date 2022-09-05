<?php

namespace App\Http\Livewire\Widgets;

use App\Models\CategoryWiseItem;
use App\Models\Product;
use Livewire\Component;

class ItemDetailsModal extends Component
{
    public CategoryWiseItem $category_wise_item;

    public function render()
    {
        return view('livewire.widgets.item-details-modal');
    }

    protected $listeners = ['showItemDetailsModal'];
 
    public function showItemDetailsModal(CategoryWiseItem $category_wise_item)
    {
        $this->category_wise_item = $category_wise_item;
        $this->dispatchBrowserEvent('showItemDetailsModalJsFunction');
        $this->render();
    }
}
