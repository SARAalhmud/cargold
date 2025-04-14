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

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"  class="form-control bg-dark text-white border-secondary" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
          <!-- Email Address -->
          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"  />
            <x-text-input id="email" class="form-control bg-dark text-white border-secondary" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">رقم الموبايل</label>
            <input type="tel" class="form-control bg-dark text-white border-secondary" id="phone" name="mobileno" required value="{{ old('mobileno') }}">
        </div>





            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"  class="form-control bg-dark text-white border-secondary"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation"  class="form-control bg-dark text-white border-secondary"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
<!-- اختيار نوع الحساب -->
<div class="mt-4">
    <x-input-label for="role" :value="__('اختيار نوع الحساب')" />
    <div class="d-flex">
        <!-- بائع -->
        <div class="form-check me-4">
            <input class="form-check-input" type="radio" name="role" id="role_seller" value="seller" checked>
            <label class="form-check-label" for="role_seller">
                بائع
            </label>
        </div>
        <!-- مستخدم عادي -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="role_user" value="user">
            <label class="form-check-label" for="role_user">
                مستخدم عادي
            </label>
        </div>
    </div>
</div>




    <div class="mb-3 form-check mt-3">
    <input type="checkbox" class="form-check-input border-secondary" id="agreeTerms" required>
    <label class="form-check-label" for="agreeTerms">أوافق على <a href="#" class="golden-text">الشروط والأحكام</a></label>
    </div>

    <x-primary-button class="btn golden-btn">
        {{ __('Register') }}
    </x-primary-button>
</div>
</form>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('script.js')}}"></script>

 <script>
    // وظائف معالجة نموذج التسجيل

    // تأثير بطاقات خطط الاشتراك
    document.addEventListener('DOMContentLoaded', function() {
      const planCards = document.querySelectorAll('.plan-card');

      planCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.classList.add('shadow-lg');
        });

        card.addEventListener('mouseleave', function() {
          this.classList.remove('shadow-lg');
        });
      });

      // إضافة تأثير مرئي لاختيار الخطة
      const planSelectors = document.querySelectorAll('.plan-selector');
      planSelectors.forEach(selector => {
        selector.addEventListener('change', function() {
          // تحديث أزرار "اختر الخطة"
          document.querySelectorAll('.plan-card .btn').forEach(btn => {
            btn.textContent = 'اختر الخطة';
            if (document.documentElement.lang === 'en') {
              btn.textContent = 'Select Plan';
            }
            btn.classList.remove('golden-btn');
            btn.classList.add('btn-outline-golden');
          });

          // تحديث الزر المختار
          const selectedBtn = this.nextElementSibling.querySelector('.plan-card .btn');
          selectedBtn.textContent = 'تم الاختيار';
          if (document.documentElement.lang === 'en') {
            selectedBtn.textContent = 'Selected';
          }
          selectedBtn.classList.remove('btn-outline-golden');
          selectedBtn.classList.add('golden-btn');
        });
      });






    });
  </script>
</body>
</html>

