@extends('layouts.navigation')
@section('nav')


  <!-- Page Header -->
  <div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white">معرض <span class="golden-text">السيارات</span></h1>
          <p class="text-muted">اكتشف مجموعتنا الواسعة من السيارات الفاخرة والرياضية والعائلية</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white">الرئيسية</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">السيارات</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="search-section py-4 bg-black">
    <div class="container">
      <h3 class="text-white mb-3">تصفية <span class="golden-text">البحث</span></h3>

      <form action="{{ URL::current() }}" method="GET">
        <div class="row g-3">

          <!-- حقل الماركة -->
          <div class="col-md-3">
            <input name="brand" type="text" value="{{ request('brand') }}"
                class="form-control @error('brand') is-invalid @enderror" placeholder="Brand">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- حقل الموديل -->
          <div class="col-md-2">
            <input name="model" type="text" value="{{ request('model') }}"
                class="form-control @error('model') is-invalid @enderror" placeholder="Model">
            @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- حقل السنة -->
          <div class="col-md-2">
            <input name="year" type="text" value="{{ request('year') }}"
                class="form-control @error('year') is-invalid @enderror" placeholder="Year">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- حقل السعر -->
          <div class="col-md-2">
            <input name="price" type="text" value="{{ request('price') }}"
                class="form-control @error('price') is-invalid @enderror" placeholder="Price">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- زر البحث -->
          <div class="col-md-3">
            <button type="submit" class="btn btn-outline-success w-100">بحث</button>
          </div>

        </div>
      </form>
    </div>
  </div>

  <!-- All Cars Section -->
  <section class="all-cars py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">جميع <span class="golden-text">السيارات</span></h2>
        <p class="text-muted">اكتشف مجموعتنا المتنوعة من السيارات الفاخرة والرياضية</p>
      </div>

      <div class="row g-4">
        @if($cars->isEmpty())
        <p class="alert alert-warning">لا توجد سيارات تطابق الفلاتر التي قمت بتحديدها.</p>
    @else
        @foreach($cars as $car)
        <div class="col-lg-4 col-md-6">
          <div class="card car-card bg-black h-100">
            <div class="position-relative">
                @if(!empty($car->car_images) && is_array($car->car_images) && count($car->car_images) > 0)
                <img src="{{ asset('storage/' . $car->car_images[0]) }}" alt="{{ $car->name }}" class="card-img-top">
            @else
                <img src="/default-car.jpg" alt="صورة غير متوفرة" class="card-img-top">
            @endif

                    </div>
            <div class="card-body">
              <div class="d-flex justify-content-between mb-2">
                <h5 class="card-title text-white">{{ $car->brand }}</h5>
                <span class="golden-text fw-bold">{{ $car->price }}</span>
              </div>
              <div class="car-details text-muted small mb-3">
                <span class="me-3"><i class="bi bi-calendar me-1"></i> {{ $car->year }}</span>
                <span class="me-3"><i class="bi bi-speedometer2 me-1"></i>{{ $car->speed }}كم</span>
                <span><i class="bi bi-fuel-pump me-1"></i> {{ $car->fuel_type }}</span>
              </div>
              @if($car->sold)
        <span class="badge bg-danger position-absolute top-0 end-0 m-2">مباعة</span>
    @endif
    <a href="{{ route('cars.carshow', $car->id) }}" class="btn btn-outline-golden w-100">تفاصيل</a>
    </div>
          </div>
        </div>

            @endforeach
        </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <!-- هنا يتم استخدام links() لتوليد الروابط تلقائيًا -->
                {{ $cars->links('vendor.pagination.bootstrap-4') }}

            </ul>
            @endif

        </nav>
    </div>
    </div>
  </section>
  @endsection
