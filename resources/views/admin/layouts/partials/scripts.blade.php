<!-- Plugin for charts -->
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>

<!-- Plugin for scrollbar -->
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>

<!-- GitHub button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Main script file -->
<script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js') }}" async></script>
<script src="{{ asset('assets/js/sidenav-burger.js') }}" async></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('[data-modal-toggle]');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Ambil modal target
                const modalId = button.getAttribute('data-modal-target');
                const modal = document.querySelector(`#${modalId}`);

                if (!modal) {
                    console.error("Modal tidak ditemukan!");
                    return;
                }
                // Ambil form di dalam modal
                const modalForm = modal.querySelector('form');

                if (!modalForm) {
                    console.error("Form dalam modal tidak ditemukan!");
                    return;
                }



                // Ambil URL dasar dari tombol
                const baseActionUrl = button.getAttribute('data-action-url');
                const id = button.getAttribute('data-id');

                if (!baseActionUrl || !id) {
                    console.error("Base URL atau ID tidak ditemukan!");
                    return;
                }
                // Ganti placeholder ':id' dengan ID elemen yang akan dihapus
                const actionUrl = baseActionUrl.replace(':id', id);

                // Perbarui action pada form
                modalForm.setAttribute('action', actionUrl);

                // Tampilkan modal (opsional, jika modal menggunakan library Tailwind atau lainnya)
                modal.classList.remove('hidden');
            });
        });
    });
</script>
