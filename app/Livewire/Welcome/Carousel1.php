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
                ->latest() // (Opsional) Menampilkan produk terbaru lebih dulu
                ->take(10) // Membatasi maksimal 10 item
                ->get()
                ->map(function ($product) {
                    return [
                        'name' => $product->name,
                        'image' => asset('storage/product/' . $product->image_url),
                        'participant' => $product->participant->business_name ?? 'Unknown'
                    ];
                })
        ]);
    }
}