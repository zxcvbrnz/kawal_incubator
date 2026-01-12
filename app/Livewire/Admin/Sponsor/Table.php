<?php

namespace App\Livewire\Admin\Sponsor;

use App\Models\Sponsor;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    // Reset halaman ke nomor 1 setiap kali user mengetik di kolom pencarian
    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('delete')]
    public function delete($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        if ($sponsor->proposal_file) {
            Storage::disk('public')->delete('proposals/' . $sponsor->proposal_file);
        }

        $sponsor->delete();
        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Permintaan Sponsorship telah dihapus.'
        ]);
    }

    public function render()
    {
        // Logika Pencarian & Pagination
        $sponsors = Sponsor::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.sponsor.table', [
            'sponsors' => $sponsors
        ]);
    }
}