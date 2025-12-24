<?php

namespace App\Livewire\Welcome;

use App\Models\Product;
use Livewire\Component;

class Carousel1 extends Component
{
    public function render()
    {
        return view('livewire.welcome.carousel1', [
            'products' => Product::with('participant')
                ->where('display', true)
                ->get()
                ->map(function ($product) {
                    return [
                        'name' => $product->name,
                        'image' => asset('storage/product/' . $product->image_url), // Sesuaikan path gambar
                        'participant' => $product->participant->business_name ?? 'Unknown'
                    ];
                })
        ]);
    }
}