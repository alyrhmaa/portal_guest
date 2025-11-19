<script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('assets-guest/js/main.js') }}"></script>

@stack('scripts')

<!-- === FIX MOBILE NAVBAR (SESUIAIKAN DENGAN NAVBAR KAMU) === -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    const toggleBtn = document.querySelector('.mobile-nav-toggle');
    const navbar = document.querySelector('#navbar');

    // tombol mobile harus ada
    if (toggleBtn && navbar) {

        toggleBtn.addEventListener('click', function() {
            navbar.classList.toggle('navbar-mobile');  // tampilkan menu mobile

            // ubah icon bi-list ke bi-x
            this.classList.toggle('bi-list');
            this.classList.toggle('bi-x');
        });
    }

    // dropdown agar bisa dibuka di mode mobile
    document.querySelectorAll('.navbar .dropdown > a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (navbar.classList.contains('navbar-mobile')) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle('dropdown-active');
            }
        });
    });

});
</script>
