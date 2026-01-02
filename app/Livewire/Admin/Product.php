<?php

namespace App\Livewire\Admin;

use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.product', [
            'products' => ModelsProduct::paginate(10)
        ]);
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}