<?php

namespace App\Livewire;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Trader;
use App\Models\Category;
use App\Models\Product;

class PurchaseIndex extends Component
{
    

    public function render()
    {
        
        $products = Product::all();
        return view('livewire.purchase-index', [
            'products' => $products,
        ]);
    }

    

    
}
