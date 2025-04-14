@extends('layouts.navigation')
@section('nav')
@if (session('success'))
    <div class="alert alert-success" style="background-color: white; border: 1px solid #28a745; color: #28a745;">
        {{ session('success') }}
    </div>
@endif
@foreach($ads as $ad)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $ad->full_name }}</h5>
            <p>الموقع: {{ $ad->location }}</p>
            <p>من: {{ $ad->start_date }} إلى: {{ $ad->end_date }}</p>
            <p>رقم الهاتف: {{ $ad->phone_number }}</p>
            <p>الحالة:
                <span class="{{ $ad->approved ? 'text-success' : 'text-warning' }}">
                    {{ $ad->approved ? 'موافق عليه' : 'قيد الانتظار' }}
                </span>
            </p>
            <img src="{{ asset('storage/' . $ad->image) }}" class="img-thumbnail" style="max-width: 150px;">

            <div class="mt-3">
                @if(!$ad->approved)
                    <form action="{{ route('ads.approve', $ad->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">موافقة</button>
                    </form>
                @endif

                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف الإعلان؟');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">حذف</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection
