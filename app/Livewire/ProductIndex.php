<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use livewire\WithPagination;

class ProductIndex extends Component
{
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.product-index', [
            'products' => $products
        ]);
    }
}
