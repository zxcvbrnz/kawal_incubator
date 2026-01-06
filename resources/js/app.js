import './bootstrap';
import Swal from 'sweetalert2';

window.Swal = Swal;

document.addEventListener('livewire:init', () => {
    Livewire.on('swal', (event) => {
        const data = event[0];
        showSwal(data.type, data.title, data.message);
    });

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

function showSwal(type, title, message) {
    Swal.fire({
        icon: type,
        title: title,
        text: message,
        confirmButtonColor: '#f59e0b',
        showClass: { popup: 'animate__animated animate__bounceIn animate__faster' }
    });
}

// Fungsi Baru: Konfirmasi Hapus dengan Input Password
window.confirmDeleteWithPassword = function (id, method = 'delete') {
    Swal.fire({
        title: 'VERIFIKASI KEAMANAN',
        text: "Masukkan password admin untuk menghapus data ini secara permanen:",
        icon: 'warning',
        input: 'password',
        inputPlaceholder: 'Password Admin',
        inputAttributes: {
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'YA, HAPUS DATA',
        cancelButtonText: 'BATAL',
        showClass: { popup: 'animate__animated animate__bounceIn animate__faster' },
        preConfirm: (password) => {
            if (!password) {
                Swal.showValidationMessage('Password wajib diisi!');
            }
            return password;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengirim ke Livewire dengan payload id dan password
            Livewire.dispatch(method, { data: { id: id, password: result.value } });
        }
    });
}