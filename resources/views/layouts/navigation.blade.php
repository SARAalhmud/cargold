<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سيارتي الذهبية | My Golden Car</title>
  <!-- Bootstrap RTL CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('styles.css' )}}">
</head>
<body class="bg-dark">
    <style>
 .bg-golden {
    background-color: #d4af37 !important; /* لون ذهبي */
}

.text-golden {
    color: #d4af37 !important;
}

    </style>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="golden-text">سيارتي</span> <span class="text-white">الذهبية</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @foreach (config('navigation') as $link)
                <a href="{{ route($link['route']) }}"
                   style="text-decoration:none"
                   class="{{ request()->routeIs($link['route']) ? 'golden-text' : 'text-white' }} px-4 py-2 rounded"
                   data-translate="{{ $link['key'] }}">
                   {{ $link['name'] }}
                </a>
            @endforeach



            </li>

        </ul>

          <!-- Login/Register Button -->
          @if(auth()->check())
          <div>     <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="user-account d-flex align-items-center text-decoration-none bg-golden border-0 px-3 py-2 rounded">
                <div class="user-icon rounded-circle d-flex align-items-center justify-content-center me-2" style="background-color: white; width: 30px; height: 30px;">
                    <i class="bi bi-person-fill text-golden"></i>
                </div>
                <span class="d-none d-md-inline text-white">تسجيل خروج</span>
            </button>
        </form>
</div>

          {{-- رابط للملف الشخصي --}}
          <a href="{{ route('profile.index') }}" class="user-account d-flex align-items-center text-decoration-none mt-2">
              <div class="user-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-2">
                  <i class="bi bi-person-lines-fill text-dark"></i>
              </div>
              <span class="d-none d-md-inline text-white">صفحتي الشخصية</span>
          </a>
      @else
          <a href="{{ route('login') }}" class="user-account d-flex align-items-center text-decoration-none">
              <div class="user-icon golden-bg rounded-circle d-flex align-items-center justify-content-center me-2">
                  <i class="bi bi-person-fill text-white"></i>
              </div>
              <span class="d-none d-md-inline text-white">تسجيل/دخول</span>
          </a>
      @endif

        </div>
      </div>
    </div>
  </nav>
  @yield('nav')

  <!-- Footer -->
  <footer class="footer py-5 bg-black">
    <div class="container">
      <div class="row g-4">
        <!-- Company Info -->
        <div class="col-lg-6 col-md-6">
          <h3 class="text-white mb-4">سيارتي الذهبية</h3>
          <p class="text-muted">معرض سيارات متخصص ببيع السيارات الفاخرة والرياضية في سوريا. نقدم أفضل الخدمات وأعلى معايير الجودة.</p>
          <div class="social-icons mt-3">
            <a href="#" class="golden-text me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="golden-text me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="golden-text me-3"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="golden-text"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
        <!-- Contact Info -->
        <div class="col-lg-6 col-md-6">
          <h3 class="text-white mb-4">معلومات الاتصال</h3>
          <ul class="list-unstyled footer-contact">
            <li class="d-flex mb-3">
              <i class="bi bi-geo-alt-fill golden-text me-3"></i>
              <span class="text-muted">سوريا دمشق</span>
            </li>
            <li class="d-flex mb-3">
              <i class="bi bi-telephone-fill golden-text me-3"></i>
              <span class="text-muted">0991086642</span>
            </li>
            <li class="d-flex mb-3">
              <i class="bi bi-envelope-fill golden-text me-3"></i>
              <span class="text-muted">rawanalrashi@gmail.com</span>
            </li>
            <li class="d-flex">
              <i class="bi bi-clock-fill golden-text me-3"></i>
              <span class="text-muted">السبت - الخميس: 9:00 - 18:00</span>
            </li>
          </ul>
        </div>
      </div>
      <!-- Copyright -->
      <div class="border-top border-dark mt-4 pt-4 text-center text-muted">
        <p>جميع الحقوق محفوظة &copy; 2024 سيارتي الذهبية</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="{{asset('script.js' )}}"></script>

  <script>
function changeLanguage(lang) {
  fetch(`/translations/${lang}`)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(translations => {
      console.log("Received translations:", translations);


      translations.forEach(translation => {
        try {

          const translatedText = JSON.parse(translation.translation)?.text || translation.translation;

          const elements = document.querySelectorAll(`[data-translate="${translation.key}"]`);
          elements.forEach(element => {
            element.innerText = translatedText;
          });
        } catch (error) {
          console.error('Error parsing translation for key:', translation.key, error);
        }
      });
    })
    .catch(error => {
      console.error('Error fetching translations:', error);
    });
}

  </script>




</body>
</html>
