<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Content extends Component
{
    public function render()
    {
        return view('livewire.product.content', [
            'products' => Product::with('participant')
                ->where('display', true)
                // Menambahkan filter berdasarkan status di tabel participant
                ->whereHas('participant', function ($query) {
                    $query->where('status', true);
                })
                ->latest()
                ->paginate(24)
        ]);
    }
}