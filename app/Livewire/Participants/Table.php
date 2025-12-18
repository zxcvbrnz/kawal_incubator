<?php

namespace App\Livewire\Participants;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Table extends Component
{
    use WithPagination;

    // --- CUKUP UBAH INI ---
    public $isDatabase = false;
    // ----------------------

    public $search = '';
    public $sortField = 'name';
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
            // JIKA DATABASE AKTIF
            $participants = Participant::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        } else {
            // JIKA DATA DUMMY AKTIF
            $participants = $this->getDummyData();
        }
        return view('livewire.participants.table', [
            'participants' => $participants
        ]);
    }

    private function getDummyData()
    {
        // Data Array
        $data = collect([
            ['id' => 1, 'name' => 'Aditya Pratama'],
            ['id' => 2, 'name' => 'Budi Santoso'],
            ['id' => 3, 'name' => 'Citra Lestari'],
            ['id' => 4, 'name' => 'Dedi Wijaya'],
            ['id' => 5, 'name' => 'Eka Putri'],
            ['id' => 6, 'name' => 'Fajar Ramadhan'],
            ['id' => 7, 'name' => 'Gita Permata'],
            ['id' => 8, 'name' => 'Hadi Sucipto'],
            ['id' => 9, 'name' => 'Indah Sari'],
            ['id' => 10, 'name' => 'Joko Widodo'],
            ['id' => 11, 'name' => 'Kurnia Bakti'],
            ['id' => 12, 'name' => 'Lani Cahyani'],
            ['id' => 13, 'name' => 'Maman Abdurrahman'],
            ['id' => 14, 'name' => 'Nina Zatulini'],
            ['id' => 15, 'name' => 'Oki Setiana'],
            ['id' => 16, 'name' => 'Putra Bangsa'],
        ]);

        // Filter Search
        if ($this->search) {
            $data = $data->filter(fn($i) => str_contains(strtolower($i['name']), strtolower($this->search)));
        }

        // Sort
        $data = $this->sortDirection === 'asc' ? $data->sortBy($this->sortField) : $data->sortByDesc($this->sortField);

        // Ubah Array menjadi Object agar konsisten dengan Eloquent Database
        $data = $data->map(fn($item) => (object) $item);

        // Manual Pagination
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
