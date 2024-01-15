<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
class BrandIndex extends Component
{
    public $brand_name;
    public $editMode = false;
    public $selectedBrandId;

    protected $rules = [
        'brand_name' => 'required',
    ];
    public function render()
    {
        $brands = Brand::all();
        return view('livewire.brand-index', [
            'brands' => $brands,
        ]);
    }

    public function formSubmit()
    {
        $this->validate();

        if ($this->editMode) {
            Brand::findOrFail($this->selectedBrandId)->update([
                'brand_name' => $this->brand_name,
            ]);

            flash()->addSuccess('Brand Updated Successfully');
        } else {
            Brand::create([
                'brand_name' => $this->brand_name,
            ]);

            flash()->addSuccess('Brand Created Successfully');
        }

        $this->resetForm();

        return redirect()->route('brand.index');
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);

        $this->editMode = true;
        $this->selectedBrandId = $brand->id;
        $this->brand_name = $brand->brand_name;
    }


    public function resetForm()
    {
        $this->editMode = false;
        $this->selectedBrandId = null;
        $this->brand_name = null;
    }

    public function deleteBrand($id)
    {
        Brand::findOrFail($id)->delete();

        flash()->addSuccess('Brand Deleted Successfully');
        return redirect()->route('brand.index');
    }

    
}
