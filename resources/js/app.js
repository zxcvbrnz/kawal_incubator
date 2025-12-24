import './bootstrap';

import Swal from 'sweetalert2';

// 1. Menangani Event dari Livewire
window.addEventListener('swal', (event) => {
    const data = event.detail[0];
    showSwal(data.type, data.title, data.message);
});

// 2. Menangani Session Flash otomatis saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    // Cari data session yang kita selipkan di body atau meta (lihat poin 2)
    const flash = document.body.dataset;

    if (flash.success) {
        showSwal('success', 'Berhasil', flash.success);
    } else if (flash.error) {
        showSwal('error', 'Oops...', flash.error);
    }
});

// Fungsi Helper agar kode tidak berulang
function showSwal(type, title, message) {
    Swal.fire({
        icon: type,
        title: title,
        text: message,
        confirmButtonColor: '#f59e0b', // Amber-500
    });
}
