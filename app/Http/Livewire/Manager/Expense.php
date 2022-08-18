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

    public $expense_fields = [], $expense_date;

    public function mount(){
        $this->expense_date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.manager.expense',[
            'expense_categories' => ExpenseCategory::all(),
            'expenses' => ModelsExpense::whereDate('created_at', $this->expense_date)->get()
        ]);
    }

    public function add_expense($expense_category_id){
        $this->validate([
            "expense_fields.$expense_category_id.amount" => 'required|numeric|min:0'
        ]);
        ModelsExpense::insert([
            'category_id' => $expense_category_id,
            'creator_id' => auth()->user()->id,
            'amount' => $this->expense_fields[$expense_category_id]['amount'],
            'title' => $this->expense_fields[$expense_category_id]['title'] ?? null,
            'description' => null,
            'image' => null,
            'date' => Carbon::now(),
            'created_at' => Carbon::parse($this->expense_date. date(' h:i:s')),
        ]);
        $this->expense_fields[$expense_category_id]['amount'] = $this->expense_fields[$expense_category_id]['title'] = null;
        $this->alert('success', 'Success');
    }

    public function select_for_delete($id)
    {
        $this->select_for_delete = ModelsExpense::find($id);
    }

    public function delete()
    {
        $this->select_for_delete->delete();
        $this->select_for_delete = null;
        $this->alert('success', 'Success');
    }
}
