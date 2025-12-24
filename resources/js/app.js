import './bootstrap';
import Swal from 'sweetalert2';

// Pastikan Swal bisa diakses secara global jika dipanggil via onclick di blade
window.Swal = Swal;

document.addEventListener('livewire:init', () => {
    // 1. Menangani Event dari Livewire 3 (PENTING!)
    Livewire.on('swal', (event) => {
        const data = event[0]; // Livewire 3 mengirim data dalam array
        showSwal(data.type, data.title, data.message);
    });
});

// 2. Menangani Session Flash otomatis saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    const flash = document.body.dataset;

    if (flash.success) {
        showSwal('success', 'Berhasil', flash.success);
    } else if (flash.error) {
        showSwal('error', 'Oops...', flash.error);
    }
});

// Fungsi Helper
function showSwal(type, title, message) {
    Swal.fire({
        icon: type,
        title: title,
        text: message,
        confirmButtonColor: '#f59e0b', // Amber-500
    });
}