<?php

namespace App\Livewire\Product;

use Livewire\Component;

class Content extends Component
{
    public function render()
    {
        return view('livewire.product.content', [
            'products' => \App\Models\Product::with('participant')
                ->where('display', true)
                ->latest()
                ->paginate(24)
        ]);
    }
}
