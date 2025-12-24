<?php

namespace App\Livewire\Participant;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Silvanix\Wablas\Message;


class Form extends Component
{
    use WithFileUploads;

    // Data List dari API
    public $provinceList = [], $cityList = [], $districtList = [], $villageList = [];

    // Properti Model (String Nama untuk Database)
    public $business_name, $owner_name, $contact, $business_field;
    public $province, $city, $district, $village, $address_detail, $postal_code;
    public $omset, $market_reach;
    public $ig, $tiktok, $fb, $website, $wa;
    public $legalitas, $legalitas_other, $certification, $certification_other;
    public $has_incubated = false;
    public $incubation_institution, $incubation_start, $incubation_end;
    public $description, $profile_photo, $business_profile_file;

    // Properti Tracking ID (Untuk API & Sinkronisasi Blade)
    public $province_id, $city_id, $district_id, $village_id;

    public $captcha_image;
    public $captcha_code;

    public function generateCaptcha()
    {
        // 1. Buat kode
        $code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 5);
        Session::put('custom_captcha', $code);
        Session::save();

        // 2. Buat Gambar
        $width = 150;
        $height = 50;
        $image = imagecreate($width, $height);

        // Warna
        $white = imagecolorallocate($image, 255, 255, 255);
        $amber = imagecolorallocate($image, 245, 158, 11);

        // Tambahkan teks
        imagestring($image, 5, 50, 18, $code, $amber);

        // 3. Konversi ke Base64 (Buffer)
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();

        // Perhatikan: imagedestroy dihapus karena PHP 8 otomatis membersihkan objek GdImage

        $this->captcha_image = 'data:image/png;base64,' . base64_encode($imageData);
    }

    public function mount()
    {
        $this->generateCaptcha();
        $this->provinceList = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')->json() ?? [];
    }

    public function updatedProvinceId($id)
    {
        $selected = collect($this->provinceList)->firstWhere('id', $id);
        $this->province = $selected['name'] ?? null;

        $this->cityList = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$id}.json")->json() ?? [];
        // Reset tingkat di bawahnya
        $this->reset(['city', 'district', 'village', 'city_id', 'district_id', 'village_id', 'districtList', 'villageList']);
    }

    public function updatedCityId($id)
    {
        $selected = collect($this->cityList)->firstWhere('id', $id);
        $this->city = $selected['name'] ?? null;

        $this->districtList = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$id}.json")->json() ?? [];
        $this->reset(['district', 'village', 'district_id', 'village_id', 'villageList']);
    }

    public function updatedDistrictId($id)
    {
        $selected = collect($this->districtList)->firstWhere('id', $id);
        $this->district = $selected['name'] ?? null;

        $this->villageList = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$id}.json")->json() ?? [];
        $this->reset(['village', 'village_id']);
    }

    public function updatedVillageId($id)
    {
        $selected = collect($this->villageList)->firstWhere('id', $id);
        $this->village = $selected['name'] ?? null;
    }

    public function save()
    {
        // Daftarkan SEMUA field agar masuk ke dalam validatedData
        $validatedData = $this->validate([
            'business_name' => 'required|string|max:255',
            'owner_name'    => 'required|string|max:255',
            'contact' => 'required|numeric|digits_between:10,13',
            'province'      => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'district'      => 'required|string|max:255',
            'village'       => 'required|string|max:255',
            'address_detail' => 'required|string|max:255',
            'omset'         => 'required|string|max:255',
            'description'   => 'required|string|max:255',
            'business_field' => 'required|string|max:255',
            'postal_code' => 'required|numeric|digits:5',
            'market_reach'  => 'required|string|max:255',
            'ig'            => 'nullable|string|max:255',
            'tiktok'        => 'nullable|string|max:255',
            'fb'            => 'nullable|string|max:255',
            'website'       => 'nullable|string|max:255',
            'wa'            => 'nullable|string|max:255',

            'has_incubated'          => 'boolean',
            'incubation_institution' => 'required_if:has_incubated,true|nullable|string|max:255',
            'incubation_start'       => 'required_if:has_incubated,true|nullable|date',
            'incubation_end'         => 'required_if:has_incubated,true|nullable|date|after_or_equal:incubation_start',

            'profile_photo' => 'nullable|image|max:2048',
            'business_profile_file' => 'nullable|mimes:pdf|max:5120',

            'captcha_code' => 'required',
        ]);

        if (strtoupper($this->captcha_code) !== session('custom_captcha')) {
            $this->addError('captcha_code', 'Kode verifikasi salah.');
            $this->generateCaptcha(); // Refresh captcha jika salah
            return;
        }

        // Handle Uploads
        $photoPath = $this->profile_photo ? $this->profile_photo->store('participant/image', 'public') : null;
        $filePath = $this->business_profile_file ? $this->business_profile_file->store('participant', 'public') : null;

        // Simpan ke Database menggunakan data dari properti langsung atau merge
        Participant::create([
            'business_name' => $this->business_name,
            'owner_name'    => $this->owner_name,
            'contact'       => $this->contact,
            'business_field' => $this->business_field,
            'province'      => $this->province,
            'city'          => $this->city,
            'district'      => $this->district,
            'village'       => $this->village,
            'address_detail' => $this->address_detail,
            'postal_code'   => $this->postal_code,
            'omset'         => $this->omset,
            'market_reach'  => $this->market_reach,
            'ig'            => $this->ig,
            'tiktok'        => $this->tiktok,
            'fb'            => $this->fb,
            'website'       => $this->website,
            'wa'            => $this->wa,
            // Logika custom tetap ditangani di sini
            'legalitas'     => $this->legalitas === 'Lainnya' ? $this->legalitas_other : $this->legalitas,
            'certification' => $this->certification === 'Lainnya' ? $this->certification_other : $this->certification,
            'has_incubated' => $this->has_incubated,
            'incubation_institution' => $this->incubation_institution,
            'incubation_start'       => $this->incubation_start,
            'incubation_end'         => $this->incubation_end,
            'description'   => $this->description,
            'profile_photo' => $photoPath,
            'business_profile_file' => $filePath,
        ]);
        $send = new Message();

        $wa = [
            [
                'phone' => '089691884833',
                'message' => 'Halo *Admin*' . '<br><br>' .
                    'Terdapat pendaftaran Participant untuk Kawal Incubator <br><br>' .
                    'Nama Bisnis : ' . $this->business_name . '<br>' .
                    'Nama Pemilik : ' . $this->owner_name .  '<br>' .
                    '<br>' . 'www.kawalincubator.com',
            ],
            [
                'phone' => $this->contact,
                'message' => 'Halo *' . $this->owner_name . '*' . '<br>' .
                    'Pendaftaranmu sedang diproses, <br>' .
                    'harap tunggu informasi selanjutnya. <br>' .
                    '<br>' . 'www.kawalincubator.com',
            ],
            [
                'phone' => $this->wa,
                'message' => 'Halo *' . $this->business_name . '*' . '<br>' .
                    'Pendaftaranmu sedang diproses, <br>' .
                    'harap tunggu informasi selanjutnya. <br>' .
                    '<br>' . 'www.kawalincubator.com',
            ],
        ];
        $send->multiple_text($wa);

        session()->forget('custom_captcha');

        session()->flash('success', 'Pendaftaran berhasil disimpan!');
        return redirect()->to('/participants');
    }

    public function render()
    {
        return view('livewire.participant.form');
    }
}