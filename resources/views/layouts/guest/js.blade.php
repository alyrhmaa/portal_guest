<script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('assets-guest/js/main.js') }}"></script>

@stack('scripts')

<script>
  // === MOBILE SIDEBAR TOGGLE (PERBAIKAN HP TIDAK BISA KELUAR MENU) ===
  document.addEventListener("DOMContentLoaded", function () {
      const toggleBtn = document.querySelector(".mobile-nav-toggle");
      const sidebar = document.querySelector("#sidebar");

      if (toggleBtn && sidebar) {
          toggleBtn.addEventListener("click", function () {
              sidebar.classList.toggle("active");
          });
      }
  });
</script>
