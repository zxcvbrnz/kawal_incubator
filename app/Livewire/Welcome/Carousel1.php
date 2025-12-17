<?php

namespace App\Livewire\Welcome;

use Livewire\Component;

class Carousel1 extends Component
{
    public $images = [
        'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f',
        'https://images.unsplash.com/photo-1503602642458-232111445657',
        'https://images.unsplash.com/photo-1585386959984-a4155224a1ad',
        'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
        'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
    ];

    public function render()
    {
        return view('livewire.welcome.carousel1');
    }
}