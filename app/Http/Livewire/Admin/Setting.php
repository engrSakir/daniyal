<?php

namespace App\Http\Livewire\Admin;

use App\Models\StaticOption;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Setting extends Component
{
    use LivewireAlert, WithFileUploads;

    public function render()
    {
        return view('livewire.admin.setting');
    }

    public function mount()
    {
        $this->bin_number = get_static_option('bin_number');
        $this->vat_percentage = get_static_option('vat_percentage');
        $this->vat_activation = get_static_option('vat_activation') ?? false;
        $this->membership_activation = get_static_option('membership_activation') ?? false;
        $this->delivery_charge_in_business = get_static_option('delivery_charge_in_business') ?? false;
        $this->online_delivery_charge = get_static_option('online_delivery_charge');

    }

    public function update_bin_number()
    {
        $this->validate([
            'bin_number' => 'required|string'
        ]);
        $this->set_or_update_static_option('bin_number', $this->bin_number);
    }

    public function update_vat_percentage()
    {
        $this->validate([
            'vat_percentage' => 'required|string'
        ]);
        $this->set_or_update_static_option('vat_percentage', $this->vat_percentage);
    }


    public function update_vat_activation()
    {
        $this->validate([
            'vat_activation' => 'required|boolean'
        ]);
        $this->set_or_update_static_option('vat_activation', !(get_static_option('vat_activation') ?? true));
    }

    public function update_membership_activation()
    {
        $this->validate([
            'membership_activation' => 'required|boolean'
        ]);
        $this->set_or_update_static_option('membership_activation', !(get_static_option('membership_activation') ?? true));
    }

    public function update_delivery_charge_in_business()
    {
        $this->validate([
            'delivery_charge_in_business' => 'required|boolean'
        ]);
        $this->set_or_update_static_option('delivery_charge_in_business', !(get_static_option('delivery_charge_in_business') ?? true));
    }

    public function update_online_delivery_charge()
    {
        $this->validate([
            'online_delivery_charge' => 'required|string'
        ]);
        $this->set_or_update_static_option('online_delivery_charge', $this->online_delivery_charge);
    }

    public function set_or_update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
        }
        $this->alert('success', 'Success');
    }
}
