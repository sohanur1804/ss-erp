<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    public $classification;
    public $category_name;

    

    public function render()
    {
        $category = Category::paginate(10);
        return view('livewire.category-index', [
            'çategories' => $category
        ]);
    }

    protected $rules = [
        'classification' => 'required',
        'category_name' => 'required'
    ];

    public function formSubmit() {
        $this->validate();
        $category = Category::create([
            'classification' => $this->classification,
            'category_name' => $this->category_name
        ]);
          
        flash()->addSuccess('Category Created Successfully');
        return redirect()->route('category.index');
    }

   
}
