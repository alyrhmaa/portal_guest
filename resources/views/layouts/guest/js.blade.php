<script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- JS bawaan template -->
<script src="{{ asset('assets-guest/js/main.js') }}"></script>

@stack('scripts')

<!-- =====================================================
     FINAL FIX DROPDOWN – CLICK ONLY (NO FLICKER)
     ===================================================== -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    // ============================
    //   MOBILE NAV TOGGLE
    // ============================
    const mobileNavToggle = document.querySelector(".mobile-nav-toggle");
    const navbar = document.querySelector("#navbar");

    mobileNavToggle.addEventListener("click", function () {
        navbar.classList.toggle("navbar-mobile");
        this.classList.toggle("bi-list");
        this.classList.toggle("bi-x");
    });

    // ============================
    //   DROPDOWN CLICK (DESKTOP)
    // ============================
    document.querySelectorAll(".navbar .dropdown > a").forEach(function (dropdownLink) {
        dropdownLink.addEventListener("click", function (e) {
            // biar tidak lompat ke atas
            e.preventDefault();

            let dropdownMenu = this.nextElementSibling;

            // toggle class show
            dropdownMenu.classList.toggle("show");

            // tutup dropdown lain
            document.querySelectorAll(".navbar .dropdown ul").forEach(function (otherMenu) {
                if (otherMenu !== dropdownMenu) {
                    otherMenu.classList.remove("show");
                }
            });
        });
    });

    // ============================
    //   DROPDOWN MOBILE
    // ============================
    document.querySelectorAll(".navbar-mobile .dropdown > a").forEach(function (el) {
        el.addEventListener("click", function (e) {
            if (document.querySelector("#navbar").classList.contains("navbar-mobile")) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle("dropdown-active");
            }
        });
    });

});

</script>
