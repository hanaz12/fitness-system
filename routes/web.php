<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\traineeController;

// الصفحة الرئيسية (login)
Route::get('/', function() {
    return view('login'); // عرض صفحة تسجيل الدخول
});

// تسجيل الدخول باستخدام POST
Route::post('/loginn', [AuthController::class, 'login']);

// المسار لصفحة النجاح (المستخدمين الذين سجلوا الدخول بنجاح)
Route::get('/traineeHomePage', function () {
    return view('traineeHomePage'); // عرض صفحة traineeHomePage
});

Route::get('/adminHomePage', function () {
    return view('adminHomePage'); // عرض صفحة adminHomePage
});

Route::get('/adminModeratorHomePage', function () {
    return view('adminModeratorHomePage'); // عرض صفحة adminModeratorHomePage
});

Route::get('/coachHomePage', function () {
    return view('coachHomePage'); // عرض صفحة coachHomePage
});

// المسار لصفحة الفشل (إذا كانت هناك مشكلة في التحقق من البيانات)
Route::get('/fail', function () {
    return view('fail'); // عرض صفحة الفشل
});

Route::get('/success', function () {
    return view('success');
});

// المسار لصفحة التسجيل (signup)
Route::get('/signup', [traineeController::class, 'create'])->name('signup.create');

// المسار لتخزين البيانات المدخلة في نموذج التسجيل
Route::post('/trainee', [traineeController::class, 'store'])->name('trainee.store');



Route::post('/adminModerator/store', [AdminController::class, 'store'])->name('adminModerator.store');
Route::get('/adminModeratorHomePage', [AdminController::class, 'index'])->name('adminModeratorHomePage');


Route::get('/adminModerator/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');











// // Display the adminModeratorHomePage (table + form for creating/editing)
// Route::get('/adminModeratorHomePage', [AdminModeratorController::class, 'home'])->name('adminModeratorHomePage');

// // Handle storing a new Admin Moderator (Create)
// Route::post('/adminModerator/store', [AdminModeratorController::class, 'store'])->name('adminModerator.store');


// // Handle editing an Admin Moderator (populate form with existing data)
// Route::get('/adminModerator/edit/{id}', [AdminModeratorController::class, 'edit'])->name('adminModerator.edit');

// // Handle updating an Admin Moderator (Update)
// Route::post('/adminModerator/update/{id}', [AdminModeratorController::class, 'update'])->name('adminModerator.update');

// // Handle deleting an Admin Moderator (Delete)
// Route::get('/adminModerator/delete/{id}', [AdminModeratorController::class, 'delete'])->name('adminModerator.delete');
