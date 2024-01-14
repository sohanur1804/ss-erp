<?php

namespace App\Livewire;
use App\Models\Category;

use Livewire\Component;

class CategoryIndex extends Component
{
    public $classification;
    public $category_name;
    public $editMode = false;
    public $selectedCategoryId;

    protected $rules = [
        'classification' => 'required',
        'category_name' => 'required',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-index', [
            'categories' => $categories,
        ]);
    }

    public function formSubmit()
    {
        $this->validate();

        if ($this->editMode) {
            $category = Category::findOrFail($this->selectedCategoryId);
            $category->update([
                'classification' => $this->classification,
                'category_name' => $this->category_name,
            ]);

            flash()->addSuccess('Category Updated Successfully');
        } else {
            Category::create([
                'classification' => $this->classification,
                'category_name' => $this->category_name,
            ]);

            flash()->addSuccess('Category Created Successfully');
        }

        // Reset the form fields and exit edit mode
        $this->resetForm();

        return redirect()->route('category.index');
    }

    public function editCategory($id)
    {

        $category = Category::findOrFail($id);

        // Enter edit mode and populate the form fields for editing
        $this->editMode = true;
        $this->selectedCategoryId = $category->id;
        $this->classification = $category->classification;
        $this->category_name = $category->category_name;
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->selectedCategoryId = null;
        $this->classification = null;
        $this->category_name = null;
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        flash()->addSuccess('Category Deleted Successfully');
        return redirect()->route('category.index');
    }
}
