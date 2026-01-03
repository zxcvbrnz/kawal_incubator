<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
    public function render()
    {
        return view('livewire.admin.product.all', [
            'products' => Product::query()
                ->with('participant')
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhereHas('participant', function ($subQuery) {
                            $subQuery->where('owner_name', 'like', '%' . $this->search . '%')
                                ->orWhere('business_name', 'like', '%' . $this->search . '%');
                        });
                })
                ->latest()
                ->paginate(10)
        ]);
    }
}