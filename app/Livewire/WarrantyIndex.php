<?php

namespace App\Livewire;

use App\Models\Warranty;
use Livewire\Component;

class WarrantyIndex extends Component
{

    public $warranty_duration;
    public $editMode = false;
    public $selectedWarrantyId;
    protected $rules = [
        'warranty_duration' => 'required',
        // 'warranty_duration' => 'required|unique:warranties,warranty_duration',
    ];
    public function render()
    {
        $warranties = Warranty::paginate(10);
        return view('livewire.warranty-index', [
            'warranties' => $warranties,
        ]);
    }

    public function formSubmit() {
        $this->validate();

        $existingWarranty = Warranty::where('warranty_duration', $this->warranty_duration)->first();

        if ($existingWarranty) {
        flash()->addError('Warranty with this duration already exists.');
        $this->resetForm(); 
        return redirect()->route('warranty.index');
        }

        if ($this->editMode) {
            Warranty::findOrFail($this->selectedWarrantyId)->update([
                'warranty_duration' => $this->warranty_duration,
            ]);

            flash()->addSuccess('Warranty Updated Successfully');
        } else {
            Warranty::create([
                'warranty_duration' => $this->warranty_duration,
            ]);

            flash()->addSuccess('Warranty Created Successfully');
        }
        $this->resetForm();
        return redirect()->route('warranty.index');
    }

    public function editWarranty($id) {

        $warranty = Warranty::findOrFail($id);

        $this->editMode = true;
        $this->selectedWarrantyId = $warranty->id;
        $this->warranty_duration = $warranty->warranty_duration;

    }

    public function resetForm() {
        $this->editMode = false;
        $this->selectedWarrantyId = null;
        $this->warranty_duration = null;
    }

    public function deleteWarranty($id) {
        Warranty::findOrFail($id)->delete();

        flash()->addSuccess('Warranty Deleted Successfully.');
        return redirect()->route('warranty.index');
    }
}
