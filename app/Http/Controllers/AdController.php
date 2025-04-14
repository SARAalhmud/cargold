<?php
namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    // عرض الإعلانات في لوحة التحكم
    public function index()
    {
        $ads = Ad::where('approved', false)->get();
        return view('admin', compact('ads'));
    }


    public function create(Request $request)
    {
        $location = $request->location;
        return view('ad', compact('location'));
    }

    // حفظ الإعلان الجديد
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'ad_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|in:header,sidebar,footer',
       'phone_number' => 'nullable|string|max:15',
        ]);

        // حفظ الصورة
        $imagePath = $request->file('image')->store('ads', 'public');

        Ad::create([

            'full_name' => $request->full_name,
            'image' => $imagePath,
            'ad_url' => $request->ad_url,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
         'phone_number' => $request->phone_number,
            'approved' => false, // مبدئياً غير موافق عليه
        ]);

        return redirect()->back()->with('success', 'تم إرسال إعلانك للمراجعة.');
    }

    // موافقة المشرف على الإعلان
    public function approve(Ad $ad)
    {
        $ad->update(['approved' => true]);
        return redirect()->back()->with('success', 'تمت الموافقة على الإعلان.');
    }

    // حذف إعلان (فقط لصاحبه أو المشرف)
    public function destroy(Ad $ad)
    {
        if (Auth::id() !== $ad->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        // حذف الصورة من التخزين
        if ($ad->image) {
            Storage::disk('public')->delete($ad->image);
        }

        $ad->delete();
        return redirect()->back()->with('success', 'تم حذف الإعلان.');
    }
}
