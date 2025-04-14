@extends('layouts.navigation')
@section('nav')
<style>
 .carousel-item {
    position: relative;
    height: 100vh; /* يجعل العنصر يغطي كامل الشاشة */
}

.carousel-caption {
    position: absolute;
    top: 50%; /* يحرك العنصر النصي للمنتصف */
    left: 50%; /* يحرك العنصر النصي للمنتصف أفقيًا */
    transform: translate(-50%, -50%); /* لتحريك العنصر لتصحيح الوضع */
    z-index: 2; /* للتأكد من أن النص يظهر فوق الصورة */
}

.carousel-item img {
    object-fit: cover; /* للتأكد من أن الصورة تغطي المساحة كاملة */
    width: 100%;
    height: 100%;
}


</style>
  <!-- Hero Carousel -->
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة فاخرة">
        <div class="carousel-caption">
          <h2>استكشف عالم السيارات الفاخرة</h2>
          <p>أفضل المركبات بأسعار تنافسية وخدمة متميزة</p>
           </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة سبورت">
        <div class="carousel-caption">
          <h2>سيارات رياضية بأداء استثنائي</h2>
          <p>اختبر متعة القيادة مع أحدث موديلات السيارات الرياضية</p>
           </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة عائلية">
        <div class="carousel-caption">
          <h2>سيارات عائلية مريحة وآمنة</h2>
          <p>راحة وأمان لكل أفراد العائلة مع خيارات متنوعة</p>
             </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>





  <!-- Browse Cars -->
  <section class="browse-cars py-5 bg-gradient-to-b from-black to-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">تصفح <span class="golden-text">السيارات</span></h2>
        <p class="text-muted">اختر الفئة المناسبة لاحتياجاتك واكتشف مجموعتنا المتميزة</p>
      </div>
      <div class="row g-4">
        <!-- Luxury Category -->
        @foreach(    $availableModel as $model)
        <div class="col-md-3 col-sm-6">

          <div class="category-card text-center">

            <div class="category-icon golden-bg mb-3">

                <i class="bi bi-star-fill"></i>
            </div>
            <h4 class="text-white">     {{ $model }}
            </h4>
            <p class="text-light">استمتع بتجربة القيادة الفاخرة مع مرسيدس، بي إم دبليو وغيرها</p>
            <a href="{{ route('cars.byModel', $model) }}" class="btn btn-outline-golden mt-2">استعراض</a>
        </div>

        </div>
        @endforeach
        <!-- Sports Category -->

        <!-- SUV Category -->

        <!-- Electric Category -->

      </div>
    </div>
  </section>
  <div id="adCarousel" data-bs-ride="carousel" class="carousel slide">
    <div class="carousel-inner" style="height: 210px;">

        <!-- عرض الإعلانات -->
        @foreach($ads as $ad)
            <div class="carousel-item @if($loop->first) active @endif position-relative" style="height: 150px;">
                <img src="{{ asset('storage/' . $ad->image) }}" class="d-block w-100 h-100 object-fit-cover" alt="إعلان" style="object-fit: cover;">

                <!-- المحتوى النصي -->
                <div class="position-absolute top-50 start-50 translate-middle text-center w-100" style="z-index: 2;">
                    <h2 class="text-light fs-6 mb-1">{{ $ad->full_name }}</h2>
                    <p class="text-light fs-6 mb-1">{{ $ad->ad_url }}</p>
                    <a href="{{ $ad->ad_url }}" class="btn btn-warning btn-sm fw-bold">اكتشف المزيد</a>
                </div>
            </div>
        @endforeach

        <!-- إعلان افتراضي -->
        <div class="carousel-item @if($ads->isEmpty()) active @endif position-relative" style="height: 200px;">
            <!-- خلفية ذهبية -->
            <div class="w-100 h-100 position-absolute top-0 start-0" style="background-color: #FFD700; z-index: 1;"></div>

            <!-- المحتوى النصي -->
            <div class="position-absolute top-50 start-50 translate-middle text-center w-100" style="z-index: 2;">
                <h2 class="text-dark fs-6 fw-bold mb-2">✨ أعلن عن منتجك أو خدمتك هنا! ✨</h2>
                <a href="{{ route('ads.create', ['location' => 'header']) }}" class="btn btn-dark btn-sm fw-bold">أضف إعلانك الآن</a>
            </div>
        </div>
    </div>

    <!-- أزرار التحكم -->
    <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#adCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

  <!-- Testimonials -->
  <section class="testimonials py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">ماذا يقول <span class="golden-text">عملاؤنا</span></h2>
        <p class="text-muted">تجارب حقيقية من عملائنا الكرام</p>
      </div>
      <div class="row g-4">
        @foreach($ratings as $rating)
          @if($rating->rating >= 4)
            <div class="col-md-4">
              <div class="card testimonial-card bg-black h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div class="testimonial-avatar golden-bg">
                      {{ mb_substr($rating->user->name, 0, 1) }}
                    </div>
                    <div class="ms-3">
                      <h5 class="text-white mb-1">{{ $rating->user->name }}</h5>
                      <div class="golden-stars">
                        @for($i = 1; $i <= 5; $i++)
                          @if($i <= $rating->rating)
                            <i class="bi bi-star-fill text-warning"></i>
                          @else
                            <i class="bi bi-star text-secondary"></i>
                          @endif
                        @endfor
                      </div>
                    </div>
                  </div>
                  <p class="text-light">{{ $rating->comment }}</p>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

@endsection
