<?php

namespace App\Livewire;

use App\Models\Trader;
use Livewire\Component;

class TraderIndex extends Component
{
    
    public $editMode = false;
    public $selectedTraderId;
    public $group_name;
    public $customer_name;
    public $address;
    public $mobile;
    public $email;
    public $contact_person;
    public $owner;
    public $opening_balance;

    protected $rules = [
        'group_name' => 'required',
        'customer_name' => 'required',
        'address' => 'required',
        'mobile' => 'required',
        'email' => 'nullable|email',
        'contact_person' => 'nullable',
        'owner' => 'nullable',
        'opening_balance' => 'nullable|numeric',
    ];

    public function mount() {
        $this->opening_balance = 0;
    }

    
    public function render()
    {
        $traders = Trader::all();
        return view('livewire.trader-index', [
            'traders' => $traders,
        ]);
    }

    

    public function formSubmit()
    {
        $this->validate();

        if ($this->editMode) {
            $trader = Trader::findOrFail($this->selectedTraderId);
            $trader->update([
                'group_name' => $this->group_name,
                'customer_name' => strtoupper($this->customer_name),
                'address' => $this->address,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'contact_person' => $this->contact_person,
                'owner' => $this->owner,
                'opening_balance' => $this->opening_balance,
            ]);

            flash()->addSuccess('Trader Updated Successfully');
        } else {
            Trader::create([
                'group_name' => $this->group_name,
                'customer_name' => strtoupper($this->customer_name),
                'address' => $this->address,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'contact_person' => $this->contact_person,
                'owner' => $this->owner,
                'opening_balance' => $this->opening_balance,
            ]);

            flash()->addSuccess('Trader Created Successfully');
        }

        // Reset the form fields and exit edit mode
        $this->resetForm();

        return redirect()->route('trader.index');
    }
    public function editTrader($id)
    {
        $trader = Trader::findOrFail($id);
        $this->editMode = true;
        $this->selectedTraderId = $trader->id;
        $this->group_name = $trader->group_name;
        $this->customer_name = $trader->customer_name;
        $this->address = $trader->address;
        $this->mobile = $trader->mobile;
        $this->email = $trader->email;
        $this->contact_person = $trader->contact_person;
        $this->owner = $trader->owner;
        $this->opening_balance = $trader->opening_balance;
    }
    public function resetForm()
    {
        $this->editMode = false;
        $this->selectedTraderId = null;
        $this->group_name = null;
        $this->customer_name = null;
        $this->address = null;
        $this->mobile = null;
        $this->email = null;
        $this->contact_person = null;
        $this->owner = null;
        $this->opening_balance = null;
    }
    public function traderDelete($id)
    {
        $trader = Trader::findOrFail($id);
        $trader->delete();

        flash()->addSuccess('Trader Deleted Successfully');
        return redirect()->route('trader.index');
    }

    
}
