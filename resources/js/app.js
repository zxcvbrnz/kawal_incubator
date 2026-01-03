import './bootstrap';
import Swal from 'sweetalert2';

window.Swal = Swal;

document.addEventListener('livewire:init', () => {
    Livewire.on('swal', (event) => {
        const data = event[0];
        showSwal(data.type, data.title, data.message);
    });

    // Listener Global untuk Konfirmasi Hapus
    Livewire.on('confirm-delete', (event) => {
        const data = event[0];
        confirmDelete(data.id, data.method || 'delete');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const flash = document.body.dataset;
    if (flash.success) showSwal('success', 'Berhasil', flash.success);
    if (flash.error) showSwal('error', 'Oops...', flash.error);
});

// 1. Fungsi Helper Alert Biasa
function showSwal(type, title, message) {
    Swal.fire({
        icon: type,
        title: title,
        text: message,
        confirmButtonColor: '#f59e0b',
        showClass: { popup: 'animate__animated animate__bounceIn animate__faster' }
    });
}

// 2. Fungsi Helper Konfirmasi (Tambahkan Ini)
window.confirmDelete = function (id, method = 'delete') {
    Swal.fire({
        title: 'APAKAH ANDA YAKIN?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#ef4444',
        confirmButtonText: 'YA, HAPUS!',
        cancelButtonText: 'BATAL',
        showClass: { popup: 'animate__animated animate__bounceIn animate__faster' },
    }).then((result) => {
        if (result.isConfirmed) {
            // Memanggil fungsi di Livewire secara dinamis
            Livewire.dispatch(method, { id: id });
        }
    });
}