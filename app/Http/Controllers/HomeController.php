<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\Complaint;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{public function index()
    {
        $availableModel = Car::select('model')->distinct()->pluck('model');
        $ratings = Rating::where('rating', '>=', 4)->latest()->take(6)->get(); // خذ فقط آخر 6 تقييمات مثلاً

        $ads = Ad::where('approved', 1)->get();

        return view('welcome', compact('availableModel', 'ads' , 'ratings'));
    }


    public function show($model)
{
    // البحث عن السيارات التي لها نفس الموديل
    $cars = Car::where('model', $model)->get();

    // عرض السيارات
    return view('cars', compact('cars', 'model'));
}
public function carshow($id){
    $car=Car::findOrFail($id);
    return view('shiw',compact('car'));
}

public function store(Request $request)
{
    if (!Auth::check()) {
        // إذا لم يكن المستخدم مسجلًا، قم بإعادة التوجيه إلى صفحة تسجيل الدخول مع رسالة
        return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول قبل إرسال الشكوى.');
    }

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone_email' => 'required|string|max:255',
        'type' => 'required|string',
        'content' => 'required|string',
        'car_id' => 'required|exists:cars,id',
    ]);

    // العثور على السيارة
    $car = Car::findOrFail($request->car_id);

    // إنشاء الشكوى
    $complaint = new Complaint();
    $complaint->customer_name = $request->customer_name;
    $complaint->phone_email = $request->phone_email;
    $complaint->content = $request->content;
    $complaint->type = $request->type;
    $complaint->user_id = Auth::id(); // المستخدم الذي أرسل الشكوى
    $complaint->car_id = $request->car_id;
    $complaint->approvd = false; // يمكنك تعديل هذا إذا كنت تحتاج إلى الموافقة التلقائية أو لا
    $complaint->save();

    // إعادة التوجيه مع رسالة النجاح
    return redirect()->back()->with('success', 'تم إرسال الشكوى بنجاح');
}



}
