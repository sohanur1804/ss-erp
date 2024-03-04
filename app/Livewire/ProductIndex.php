<?php

// ProductIndex.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class ProductIndex extends Component
{
    public $name;
    public $category;
    public $categories;
    public $brands;
    public $description;
    public $warranty;
    public $brand;
    public $editMode = false;
    public $selectedProductId;

    protected $rules = [
        'name' => 'required',
        'category' => 'required|exists:categories,category_name',
        'description' => 'required',
        'warranty' => 'required',
        'brand' => 'required|exists:brands,brand_name',
    ];

    public function mount()
    {
        // Fetch categories from the database
        $this->categories = Category::pluck('category_name');
        $this->brands = Brand::pluck('brand_name');
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-index', [
            'products' => $products,
        ]);
    }

    public function formSubmit()
    {
        $validator = Validator::make(['category' => $this->category, 'brand' => $this->brand], [
            'category' => 'required|exists:categories,category_name',
            'brand' => 'required|exists:brands,brand_name',
        ]);

        if ($validator->fails()) {
            flash()->addError('Invalid category name. Please choose from the existing suggestions.');
            return;
        }

        $this->validate();

        if ($this->editMode) {
            $product = Product::findOrFail($this->selectedProductId);
            $product->update([
                'name' => $this->name,
                'category' => $this->category,
                'description' => $this->description,
                'warranty' => $this->warranty,
                'brand' => $this->brand,
            ]);

            session()->flash('success', 'Product updated successfully.');
        } else {
            Product::create([
                'name' => $this->name,
                'category' => $this->category,
                'description' => $this->description,
                'warranty' => $this->warranty,
                'brand' => $this->brand,
            ]);

            flash()->addSuccess("Product Created Sucessfully");
        }

        // $this->resetForm();
        return redirect()->route('product.index');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->editMode = true;
        $this->selectedProductId = $product->id;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->description = $product->description;
        $this->warranty = $product->warranty;
        $this->brand = $product->brand;
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->selectedProductId = null;
        $this->name = null;
        $this->category = null;
        $this->description = null;
        $this->warranty = null;
        $this->brand = null;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('success', 'Product deleted successfully.');
    }
}
