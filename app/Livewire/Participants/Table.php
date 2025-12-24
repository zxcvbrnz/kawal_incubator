<?php

namespace App\Livewire\Participants;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Table extends Component
{
    use WithPagination;

    public $isDatabase = true;
    public $search = '';

    // Default sorting diubah ke business_name karena kolom 'name' sudah tidak ada
    public $sortField = 'business_name';
    public $sortDirection = 'asc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        if ($this->isDatabase) {
            // Pencarian mencakup Nama Bisnis, Owner, dan Bidang Usaha
            $participants = Participant::query()
                ->where('status', true)
                ->where(function ($query) {
                    $query->where('business_name', 'like', '%' . $this->search . '%')
                        ->orWhere('owner_name', 'like', '%' . $this->search . '%')
                        ->orWhere('business_field', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        } else {
            $participants = $this->getDummyData();
        }

        return view('livewire.participants.table', [
            'participants' => $participants
        ]);
    }

    private function getDummyData()
    {
        $data = collect([
            ['id' => 1, 'business_name' => 'Aroma Kopi', 'owner_name' => 'Aditya Pratama', 'business_field' => 'F&B'],
            ['id' => 2, 'business_name' => 'Gaya Craft', 'owner_name' => 'Budi Santoso', 'business_field' => 'Kriya'],
            ['id' => 3, 'business_name' => 'Amelia Fashion', 'owner_name' => 'Citra Lestari', 'business_field' => 'Fashion'],
            // ... tambahkan data dummy lainnya dengan struktur yang sama
        ]);

        if ($this->search) {
            $data = $data->filter(
                fn($i) =>
                str_contains(strtolower($i['business_name']), strtolower($this->search)) ||
                    str_contains(strtolower($i['owner_name']), strtolower($this->search)) ||
                    str_contains(strtolower($i['business_field']), strtolower($this->search))
            );
        }

        $data = $this->sortDirection === 'asc' ? $data->sortBy($this->sortField) : $data->sortByDesc($this->sortField);
        $data = $data->map(fn($item) => (object) $item);

        $currentPage = $this->getPage();
        $perPage = 10;
        return new LengthAwarePaginator(
            $data->slice(($currentPage - 1) * $perPage, $perPage)->all(),
            $data->count(),
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );
    }
}