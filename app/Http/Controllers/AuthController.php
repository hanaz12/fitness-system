<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;  // إضافة هذه السطر لاستيراد Controller

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // استلام المدخلات من النموذج
        $username = $request->input('username');
        $password = $request->input('password');
        $userRole = $request->input('user'); // الحصول على الدور المحدد من المستخدم

        // التحقق من المدخلات
        if (empty($username) || empty($password) || empty($userRole)) {
            return back()->with('error', 'Username, password, and user type are required.');
        }

        // التحقق من قاعدة البيانات بناءً على الدور
        if ($userRole == 'trainee') {
            $user = DB::table('trainees')->where('username', $username)->first();
        } elseif ($userRole == 'Admin') {
            $user = DB::table('admins')->where('username', $username)->first();
        } elseif ($userRole == 'Admin-moderator') {
            $user = DB::table('admin_moderators')->where('username', $username)->first();
        } elseif ($userRole == 'Coach') {
            $user = DB::table('coaches')->where('username', $username)->first();
        } else {
            return back()->with('error', 'Invalid user type.');
        }

        // التحقق من كلمة المرور بعد استرجاع المستخدم من قاعدة البيانات
        if ($user && $user->password === $password) {
            // إذا كانت كلمة السر صحيحة
            if ($userRole == 'trainee') {
                return redirect('/traineeHomePage');
            } elseif ($userRole == 'Admin') {
                return redirect('/adminHomePage');
            } elseif ($userRole == 'Admin-moderator') {
                return redirect('/adminModeratorHomePage');
            } elseif ($userRole == 'Coach') {
                return redirect('/coachHomePage');
            }
        } else {
            // إذا كانت كلمة السر أو اسم المستخدم غير صحيحة
            return redirect('/fail')->with('error', 'Invalid credentials.'); // إعادة توجيه إلى صفحة الفشل
        }
    }
}
