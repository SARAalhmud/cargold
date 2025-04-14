<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>التسجيل | سيارتي الذهبية</title>
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('styles.css') }}">
  <!-- Auth Page Specific Styles -->
  <style>
    .nav-tabs .nav-link.active {
    border-bottom: 3px solid #FFD700; /* الخط تحت التبويب النشط */
    color: #FFD700; /* تغيير لون النص إلى اللون الذهبي */
}

    .auth-container {
      min-height: 100vh;
      display: flex;
      align-items: stretch;
    }
    .auth-form {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .auth-hero {
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1494976388531-d1058494cdd8?q=80&w=2070&auto=format&fit=crop');
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      padding: 2rem;
      color: #fff;
    }
    .auth-tabs .nav-link {
      color: #ffffff;
      border: none;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .auth-tabs .nav-link.active {
      color: var(--golden-color);
      background-color: transparent;
      border-bottom: 3px solid var(--golden-color);
    }
    footer {
  margin-top: auto; /* هذا سيضمن أن التذييل يبقى في الأسفل */
  background-color: #000;
  color: white;
  text-align: center;
  padding: 1rem;
}
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="text-white">سيارتي</span> <span class="golden-text">الذهبية</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
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
</div>

          <a href="{{route('login')}}" class="btn golden-btn rounded-pill ms-2">
            <i class="bi bi-person-circle me-1"></i> تسجيل/دخول

        </a>


        </div>
      </div>
    </div>
  </nav>

      <div class="auth-container">



        <div class="col-md-6 auth-form">
            <div class="container">
              <h1 class="mb-4"><span class="golden-text">البائعين</span> المحترفين</h1>
              <p class="text-muted mb-4">انضم إلى منصة سيارتي الذهبية واعرض سياراتك أمام آلاف العملاء المحتملين</p>

        <form method="POST" action="{{ route('login') }}"id="login-form">
          @csrf

          <div class="mb-3">
                   <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input   class="form-control bg-dark text-white border-secondary" id="loginEmail"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">

            <x-input-label for="password" :value="__('Password')" class="form-label" />

            <x-text-input class="form-control bg-dark text-white border-secondary" id="loginPassword"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

     </div>
        <div class="mb-3 form-check">
          <div class="block mt-4">
            <label for="remember_me" class="form-check-label" for="rememberMe">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>    </div>

        <div class="text-center">
          <div  class="golden-text">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

          </div>
<div>
    <a href="{{ route('register') }}" class="btn golden  " style="color: #ffffff">
        <i class="bi bi-person-circle me-1"></i> تسجيل/دخول
      </a>
</div>
          <button type="submit" class="btn golden-btn">تسجيل الدخول</button>
        </form>
        </div>
    </div>
</div>
<div class="col-md-6 auth-hero">
    <div class="container">
      <div class="mb-5">
        <h1 class="display-4 mb-4">انضم إلى <span class="golden-text">سيارتي الذهبية</span></h1>
        <p class="lead">المنصة الرائدة لبيع وشراء السيارات الفاخرة في سوريا</p>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-gem fs-1"></i>
            </div>
            <div>
              <h4>جودة مضمونة</h4>
              <p class="m-0 text-muted">نقدم أفضل السيارات بضمان الجودة</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-shield-check fs-1"></i>
            </div>
            <div>
              <h4>منصة آمنة</h4>
              <p class="m-0 text-muted">معاملات آمنة وموثوقة بنسبة 100%</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-graph-up-arrow fs-1"></i>
            </div>
            <div>
              <h4>زيادة المبيعات</h4>
              <p class="m-0 text-muted">ضاعف مبيعاتك مع منصتنا المتميزة</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-headset fs-1"></i>
            </div>
            <div>
              <h4>دعم متميز</h4>
              <p class="m-0 text-muted">فريق دعم متخصص على مدار الساعة</p>
            </div>
          </div>
        </div>



</div>
</div>
</div></div>
</div>


 <!-- Footer -->
 <footer class="footer bg-black text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
          <h3>سيارتي الذهبية</h3>
          <p class="mt-3">المنصة الرائدة لبيع وشراء السيارات الفاخرة في سوريا، نقدم أفضل الخدمات بأسعار منافسة.</p>
          <div class="social-icons mt-3">
            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
          <h3>معلومات الاتصال</h3>
          <ul class="list-unstyled footer-contact">
            <li><i class="bi bi-geo-alt-fill golden-text me-2"></i> <span>سوريا دمشق</span></li>
            <li><i class="bi bi-telephone-fill golden-text me-2"></i> <span>0991086642</span></li>
            <li><i class="bi bi-envelope-fill golden-text me-2"></i> <span>rawanalrashi@gmail.com</span></li>
            <li><i class="bi bi-clock-fill golden-text me-2"></i> <span>السبت - الخميس: 9:00 - 18:00</span></li>
          </ul>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-12">
          <hr class="bg-secondary">
          <p class="text-center copyright">جميع الحقوق محفوظة &copy; 2024 سيارتي الذهبية</p>
        </div>
      </div>
    </div>
  </footer>

