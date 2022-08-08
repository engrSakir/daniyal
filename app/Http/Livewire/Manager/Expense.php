<?php

namespace App\Http\Livewire\Manager;

use App\Models\Expense as ModelsExpense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Expense extends Component
{
    use LivewireAlert, WithFileUploads;

    public $expense_fields = [];
    public function render()
    {
        return view('livewire.manager.expense',[
            'expense_categories' => ExpenseCategory::all(),
            'expenses' => ModelsExpense::whereDate('created_at', Carbon::today())->get()
        ]);
    }

    public function add_expense($expense_category_id){
        $this->validate([
            "expense_fields.$expense_category_id.amount" => 'required|numeric|min:0'
        ]);
        ModelsExpense::create([
            'category_id' => $expense_category_id,
            'creator_id' => auth()->user()->id,
            'amount' => $this->expense_fields[$expense_category_id]['amount'],
            'title' => $this->expense_fields[$expense_category_id]['title'] ?? null,
            'description' => null,
            'image' => null,
            'date' => Carbon::now(),
        ]);
        $this->expense_fields[$expense_category_id]['amount'] = $this->expense_fields[$expense_category_id]['title'] = null;
        $this->alert('success', 'Success');

    }
}
