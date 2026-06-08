<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseFaqController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OutlineController;
use App\Http\Controllers\Admin\PaymentApiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentResultController;
use App\Http\Controllers\Admin\StudentTestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SmtpController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin'])->group(function () {

    // Admin Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('course', [CourseController::class, 'index'])->name('course.index');
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('course', [CourseController::class, 'store'])->name('course.store');
    Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
    Route::get('course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('course/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

    // ================= ORDER MANAGEMENT ROUTES =================
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::put('orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

    // ================= COURSE FAQ ROUTES =================
    Route::get('course-faq', [CourseFaqController::class, 'index'])->name('course-faq.index');
    Route::get('course-faq/create', [CourseFaqController::class, 'create'])->name('course-faq.create');
    Route::post('course-faq', [CourseFaqController::class, 'store'])->name('course-faq.store');
    Route::get('course-faq/{id}', [CourseFaqController::class, 'show'])->name('course-faq.show');
    Route::get('course-faq/{id}/edit', [CourseFaqController::class, 'edit'])->name('course-faq.edit');
    Route::put('course-faq/{id}', [CourseFaqController::class, 'update'])->name('course-faq.update');
    Route::delete('course-faq/{id}', [CourseFaqController::class, 'destroy'])->name('course-faq.destroy');

    // ================= PAYMENT API ROUTES =================
    Route::get('payment-api', [PaymentApiController::class, 'index'])->name('payment-api.index');
    Route::get('payment-api/create', [PaymentApiController::class, 'create'])->name('payment-api.create');
    Route::post('payment-api', [PaymentApiController::class, 'store'])->name('payment-api.store');
    Route::get('payment-api/{id}', [PaymentApiController::class, 'show'])->name('payment-api.show');
    Route::get('payment-api/{id}/edit', [PaymentApiController::class, 'edit'])->name('payment-api.edit');
    Route::put('payment-api/{id}', [PaymentApiController::class, 'update'])->name('payment-api.update');
    Route::delete('payment-api/{id}', [PaymentApiController::class, 'destroy'])->name('payment-api.destroy');

    // ================= STUDENT TESTIMONIAL ROUTES =================
    Route::get('student-testimonial', [StudentTestimonialController::class, 'index'])->name('student-testimonial.index');
    Route::get('student-testimonial/create', [StudentTestimonialController::class, 'create'])->name('student-testimonial.create');
    Route::post('student-testimonial', [StudentTestimonialController::class, 'store'])->name('student-testimonial.store');
    Route::get('student-testimonial/{id}', [StudentTestimonialController::class, 'show'])->name('student-testimonial.show');
    Route::get('student-testimonial/{id}/edit', [StudentTestimonialController::class, 'edit'])->name('student-testimonial.edit');
    Route::put('student-testimonial/{id}', [StudentTestimonialController::class, 'update'])->name('student-testimonial.update');
    Route::delete('student-testimonial/{id}', [StudentTestimonialController::class, 'destroy'])->name('student-testimonial.destroy');

    // ================= STUDENT RESULT ROUTES =================
    Route::get('student-result', [StudentResultController::class, 'index'])->name('student-result.index');
    Route::get('student-result/create', [StudentResultController::class, 'create'])->name('student-result.create');
    Route::post('student-result', [StudentResultController::class, 'store'])->name('student-result.store');
    Route::get('student-result/{id}', [StudentResultController::class, 'show'])->name('student-result.show');
    Route::get('student-result/{id}/edit', [StudentResultController::class, 'edit'])->name('student-result.edit');
    Route::put('student-result/{id}', [StudentResultController::class, 'update'])->name('student-result.update');
    Route::delete('student-result/{id}', [StudentResultController::class, 'destroy'])->name('student-result.destroy');

    // ================= COURSE OUTLINE ROUTES =================
    Route::get('outline', [OutlineController::class, 'index'])->name('outline.index');
    Route::get('outline/create', [OutlineController::class, 'create'])->name('outline.create');
    Route::post('outline', [OutlineController::class, 'store'])->name('outline.store');
    Route::get('outline/{id}', [OutlineController::class, 'show'])->name('outline.show');
    Route::get('outline/{id}/edit', [OutlineController::class, 'edit'])->name('outline.edit');
    Route::put('outline/{id}', [OutlineController::class, 'update'])->name('outline.update');
    Route::delete('outline/{id}', [OutlineController::class, 'destroy'])->name('outline.destroy');

    // ================= COURSE BENEFIT ROUTES =================
    Route::get('benefit', [BenefitController::class, 'index'])->name('benefit.index');
    Route::get('benefit/create', [BenefitController::class, 'create'])->name('benefit.create');
    Route::post('benefit', [BenefitController::class, 'store'])->name('benefit.store');
    Route::get('benefit/{id}', [BenefitController::class, 'show'])->name('benefit.show');
    Route::get('benefit/{id}/edit', [BenefitController::class, 'edit'])->name('benefit.edit');
    Route::put('benefit/{id}', [BenefitController::class, 'update'])->name('benefit.update');
    Route::delete('benefit/{id}', [BenefitController::class, 'destroy'])->name('benefit.destroy');

    // User Route
    Route::get('/add-user', [UserController::class, 'create'])->name('user.create');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user-destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/general-seting', [SettingController::class, 'general'])->name('general.setting');
    Route::post('/general-store', [SettingController::class, 'generalStore'])->name('general.store');
    Route::get('/website-seting', [SettingController::class, 'website'])->name('website.setting');
    Route::post('/website-store', [SettingController::class, 'websiteStore'])->name('website.store');

    // SMTP Route
    Route::get('/add-smtp', [SmtpController::class, 'create'])->name('smtp.create');
    Route::get('/smtp', [SmtpController::class, 'index'])->name('smtp.index');
    Route::get('/edit-smtp/{id}', [SmtpController::class, 'edit'])->name('smtp.edit');
    Route::post('/smtp/store', [SmtpController::class, 'store'])->name('smtp.store');
    Route::post('/smtp-update/{id}', [SmtpController::class, 'update'])->name('smtp.update');
    Route::post('/smtp-delete/{id}', [SmtpController::class, 'destroy'])->name('smtp.destroy');

    Route::get('/smtp-test', [SmtpController::class, 'test'])->name('smtp.test');
    Route::post('/smtp/test-default-mail', [SmtpController::class, 'testDefaultMail'])->name('smtp.default.mail');
    Route::post('/smtp/test-forget-mail', [SmtpController::class, 'testForgetMail'])->name('smtp.forget.mail');
    Route::post('/smtp/test-payment-mail', [SmtpController::class, 'testPaymentMail'])->name('smtp.payment.mail');

    Route::get('/profile', [ProfileController::class, 'profilePage'])->name('user.profile.page');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('user.profile.update');

    Route::get('/security', [SecurityController::class, 'securityPage'])->name('user.security.page');
    Route::post('/security-update', [SecurityController::class, 'securityUpdate'])->name('user.security.update');

});

Route::middleware(['guest'])->group(function () {

    // ================= ADMIN AUTH ALL ROUTES =====================
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPage'])->name('forget.password.page');
    Route::post('/forget-password', [ForgetPasswordController::class, 'sendOtp'])->name('send.otp');
    Route::get('/otp-verify', [ForgetPasswordController::class, 'OtpVerifyPage'])->name('otp.verify.page');
    Route::post('/otp-verify', [ForgetPasswordController::class, 'verifyOtp'])->name('verify.otp');
    Route::get('/change-password', [ForgetPasswordController::class, 'changePasswordPage'])->name('change.password.page');
    Route::post('/change-password', [ForgetPasswordController::class, 'changePassword'])->name('change.password');

    // ===== CHECKOUT PAGE =====
    Route::get('/checkout/{slug}', [PageController::class, 'checkoutPage'])->name('checkout.page');

    // ===== CHECKOUT PAGE =====
    Route::get('/', [PageController::class, 'home'])->name('home.page');

    // ================= UDDOKTAPAY STUDENT PAYMENT ROUTES =================
    Route::post('course/pay/{course_id}', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
    Route::match(['get', 'post'], 'payment/success', [PaymentController::class, 'successPayment'])->name('payment.success');
    Route::get('payment/cancel', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
    Route::match(['get', 'post'], 'payment/webhook', [PaymentController::class, 'webhookPayment'])->name('payment.webhook');

});