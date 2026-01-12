<?php

namespace App\Livewire\Admin\Participant;

use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Silvanix\Wablas\Message;

class Request extends Component
{
    use WithPagination;

    public $search = '';

    public function approve($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update(['status' => true]);

        $send = new Message();

        $wa_data = [
            [
                'phone' => $participant->contact,
                'message' => "Halo *{$participant->owner_name}*, pendaftaran Anda telah *DISETUJUI* oleh Admin.\n" .
                    "Sekarang data *{$participant->business_name}* sudah tayang di sistem kami.\n\n" .
                    "Terima kasih,\nwww.kawalincubator.com",
            ],
            [
                'phone' => $participant->wa,
                'message' => "Halo *{$participant->business_name}*, pendaftaran Anda telah *DISETUJUI* oleh Admin.\n" .
                    "Sekarang data *{$participant->business_name}* sudah tayang di sistem kami.\n\n" .
                    "Terima kasih,\nwww.kawalincubator.com",
            ],
        ];

        foreach ($wa_data as $singleWa) {
            $send->multiple_text([$singleWa]);

            sleep(rand(10, 20));
        }

        $this->dispatch('swal', [
            'type' => 'success',
            'title' => 'Disetujui!',
            'message' => "Bisnis {$participant->business_name} sekarang aktif."
        ]);
    }

    public function render()
    {
        return view('livewire.admin.participant.request', [
            'requests' => Participant::where('status', false)->get(),
            // Pastikan search tidak menjadi null atau error saat event dipicu
            'participants' => Participant::query()
                ->where('status', true)
                ->where(function ($query) {
                    $query->where('business_name', 'like', '%' . $this->search . '%')
                        ->orWhere('owner_name', 'like', '%' . $this->search . '%')
                        ->orWhere('business_field', 'like', '%' . $this->search . '%')
                        ->orWhere('city', 'like', '%' . $this->search . '%');
                })
                ->paginate(10)
        ]);
    }
}