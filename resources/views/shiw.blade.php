@extends('layouts.navigation')

@section('nav')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<style>

    body {
        background-color: #1e1e1e;
        font-family: 'Cairo', sans-serif;
        color: #ffffff;
    }

    .text-golden {
        color: #d4af37;
    }

    .border-golden {
        border: 2px solid #d4af37 !important;
    }

    .btn {
        background-color: #2c2c2c;
        color: #d4af37;
        padding: 8px 16px;
        border: 1px solid #d4af37;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-weight: 500;
    }

    .btn:hover {
        background-color: #d4af37;
        color: #1e1e1e;
    }

    .card {
        background-color: #2f2f2f;
        border-radius: 16px;
    }

    .card-img-top {
        height: 240px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .list-group-item {
        background-color: transparent;
        border: none;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 1.1rem;
        color: #ffffff;
    }

    .list-group-item strong {
        color: #d4af37;
        margin-left: 5px;
    }

    .badge {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .btn-outline-golden {
        color: #d4af37;
        border: 1px solid #d4af37;
        background-color: transparent;
    }

    .btn-outline-golden:hover {
        background-color: #d4af37;
        color: #1e1e1e;
    }

    h2 {
        color: #ffffff;
    }

    p.text-muted {
        color: #bbbbbb !important;
    }
</style>

<div class="container py-5">

    {{-- عنوان السيارة --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5 text-golden">{{ $car->brand }} {{ $car->model }} <span class="text-muted">({{ $car->year }})</span></h2>
        <p class="text-muted">استعراض تفاصيل السيارة</p>
    </div>

    {{-- صور السيارة --}}
    @if(!empty($car->car_images) && is_array($car->car_images))
        <div class="row mb-5">
            @foreach($car->car_images as $image)
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0">
                        <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="صورة السيارة">
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- معلومات السيارة --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-golden">
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>السعر:</strong> <span class="text-golden">{{ number_format($car->price) }} ريال</span></li>
                        <li class="list-group-item"><strong>اللون:</strong> {{ $car->color ?? 'غير محدد' }}</li>
                        <li class="list-group-item"><strong>الدولة:</strong> {{ $car->country ?? 'غير محددة' }}</li>
                        <li class="list-group-item"><strong>المدينة:</strong> {{ $car->city ?? 'غير محددة' }}</li>
                        <li class="list-group-item"><strong>السرعة:</strong> {{ $car->speed ?? 'غير محددة' }} كم/س</li>
                        <li class="list-group-item"><strong>نوع الوقود:</strong> {{ $car->fuel_type ?? 'غير معروف' }}</li>
                        <li class="list-group-item"><strong>الوصف:</strong> {{ $car->description ?? 'لا يوجد وصف' }}</li>
                        <li class="list-group-item">   <strong>رقم صاحب السيارة:</strong> {{ $car->user->mobileno ?? 'غير متوفر' }}</li>
                        <li class="list-group-item">
                            <strong>الحالة:</strong>
                            {!! $car->sold
                                ? '<span class="badge bg-danger rounded-pill">🚫 مباعة</span>'
                                : '<span class="badge bg-success rounded-pill">✅ متاحة</span>'
                            !!}
                        </li>
                    </ul>
                    @if(auth()->check() && auth()->id() === $car->user_id)
                    <form action="{{ route('dashboard.destroy', $car->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-golden">حذف</button>
                    </form>
                  @endif

                  @auth
    @if(auth()->id() === $car->user_id)
        <a href="{{ route('dashboard.edit', $car->id) }}" class="btn btn-primary">
            ✏️ تعديل
        </a>
    @endif
@endauth
                </div>
                </div>
            </div>

            {{-- زر الرجوع --}}
            <div class="text-center mt-4">
                <a href="{{ route('cars.byModel', $car->model) }}" class="btn btn-outline-golden">⬅ رجوع للموديلات</a>
            </div>
        </div>
    </div>
</div>
  {{-- إضافة الشكوى --}}
  <div class="mt-5">
    <h5 class="text-white">أضف شكوى</h5>
    {{-- إذا كانت السيارة تسمح بإظهار الشكوى --}}
    @if(Auth::check())

        <form action="{{ route('complaints.store') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            {{-- اسم العميل --}}
            <div class="form-group mb-3">
                <label for="customer_name" class="text-white">اسم العميل</label>
                <input type="text" name="customer_name" class="form-control" placeholder="أدخل اسمك" required>
            </div>

            {{-- الهاتف أو البريد الإلكتروني --}}
            <div class="form-group mb-3">
                <label for="phone_email" class="text-white">الهاتف أو البريد الإلكتروني</label>
                <input type="text" name="phone_email" class="form-control" placeholder="أدخل رقم الهاتف أو البريد الإلكتروني" required>
            </div>

            {{-- نوع الشكوى --}}
            <div class="form-group mb-3">
                <label for="type" class="text-white">نوع الشكوى</label>
                <select name="type" class="form-control" required>
                    <option value="مشكلة تقنية">مشكلة تقنية</option>
                    <option value="خدمة العملاء">خدمة العملاء</option>
                    <option value="سوء المعاملة">سوء المعاملة</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>

            {{-- محتوى الشكوى --}}
            <div class="form-group mb-3">
                <label for="content" class="text-white">محتوى الشكوى</label>
                <textarea name="content" class="form-control" rows="4" placeholder="اكتب شكواك هنا..." required></textarea>
            </div>

            <button type="submit" class="btn btn-submit-complaint">إرسال الشكوى</button>
        </form>
        @else
    <div class="alert alert-warning">
        يجب عليك تسجيل الدخول أولاً لإرسال الشكوى.
    </div>
@endif

        @if($car->show_complaints)
        @if(Auth::check())
        @foreach($car->complaints as $complaint)
            @if(Auth::user()->id === $complaint->user_id)  {{-- عرض الشكوى فقط لصاحبها --}}
                <div class="alert alert-warning mt-4">
                    <strong>شكوىك:</strong> {{ $complaint->content }}
                </div>
            @endif
        @endforeach
    @endif
    @endif
</div>
</div>
</div>
    </div>
@endsection
