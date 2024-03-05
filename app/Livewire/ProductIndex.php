<?php

// ProductIndex.php

namespace App\Livewire;

use App\Models\Warranty;
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
    public $warranties;
    public $brand;
    public $editMode = false;
    public $selectedProductId;

    protected $rules = [
        'name' => 'required',
        'category' => 'required|exists:categories,category_name',
        'description' => 'required',
        'warranty' => 'required|exists:brands,brand_name',
        'brand' => 'required|exists:warranties,warranty_duration',
    ];

    public function mount()
    {
        // Fetch categories from the database
        $this->categories = Category::pluck('category_name');
        $this->brands = Brand::pluck('brand_name');
        $this->warranties = Warranty::pluck('warranty_duration');
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
    // Check if the product name already exists
    $existingProduct = Product::where('name', strtoupper($this->name))->first();
    if ($existingProduct) {
        flash()->addError('Product name already exists.');
        return;
    }

    // Validate the input fields
    $validator = Validator::make([
        'category' => $this->category, 
        'brand' => $this->brand,
        'warranty' => $this->warranty,
    ], [
        'category' => 'required|exists:categories,category_name',
        'brand' => 'required|exists:brands,brand_name',
        'warranty' => 'required|exists:warranties,warranty_duration',
    ]);

    if ($validator->fails()) {
        flash()->addError('Invalid category name or brand. Please choose from the existing suggestions.');
        return;
    }

    // If edit mode is enabled, update the existing product
    if ($this->editMode) {
        $product = Product::findOrFail($this->selectedProductId);
        $product->update([
            'name' => strtoupper($this->name),
            'category' => $this->category,
            'description' => $this->description,
            'warranty' => $this->warranty,
            'brand' => $this->brand,
        ]);

        flash()->addSuccess('Product updated successfully.');
    } else {
        // If adding a new product, create a new record
        Product::create([
            'name' => strtoupper($this->name),
            'category' => $this->category,
            'description' => $this->description,
            'warranty' => $this->warranty,
            'brand' => $this->brand,
        ]);

        flash()->addSuccess('Product created successfully.');
    }

    // Reset the form fields
    $this->resetForm();

    // Redirect to the product index page
    return redirect()->route('product.index');
}


    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->editMode = true;
        $this->selectedProductId = $product->id;
        $this->name = strtoupper($product->name);
        $this->category = $product->category;
        $this->description = $product->description;
        $this->warranty = strtoupper($product->warranty);
        $this->brand = strtoupper($product->brand);
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

        flash()->addSuccess('Product deleted successfully');
    }
}
