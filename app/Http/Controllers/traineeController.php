<?php
namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;

class traineeController extends Controller
{
    public function create()
    {
        return view('signup'); // عرض صفحة sign up
    }

    // حفظ بيانات المستخدم الجديد
    public function store(Request $request)
    {
        // التحقق من البيانات
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:trainees,username',
            'email' => 'required|email|unique:trainees,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'medical-info' => 'nullable|string',
        ], [
            // تخصيص رسائل الخطأ
            'username.unique' => 'The username is already taken. Please choose another one.',
            'email.unique' => 'The email is already registered. Please use a different email address.',
        ]);

        // تخزين البيانات في الجدول
        $trainee = new Trainee($validated);
        $trainee->save();

        // إعادة التوجيه إلى صفحة أخرى بعد النجاح
        return redirect('/success')->with('success', 'Registration successful!');
    }
}
