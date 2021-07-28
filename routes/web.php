<?php

use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/password.request', function () {
    return view('forgot');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $email = $request->email;
    $checkEmail = User::where('email', $email)->first();
    if(!$checkEmail){
        return back()->with('invalid', "This email address is not Registered on this Platform");
    } 
    else{
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    $checkEmail = User::where('email', $request->email)->first();
    if(!$checkEmail){
        return back()->with('invalid', "Invalid Email Address");
    }
    else{
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
})->middleware('guest')->name('password.update');


Route::middleware('guest')->group(function() {
    Route::get('/landing', [MainController::class, 'landing'])->name('landing');
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::post('/login', [MainController::class, 'doLogin'])->name('loginPost');
    Route::post('/register', [MainController::class, 'doRegister'])->name('register');
    Route::get('/welcome', [MainController::class, 'welcome'])->name('welcome');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    // Route::get('/blog', [MainController::class, 'blog'])->name('blog');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::post('/doContact', [MainController::class, 'doContact'])->name('doContact');
    Route::get('/register', [MainController::class, 'register'])->name('register');
});


Route::group(['middleware'=>['auth']], function(){
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/account', [MainController::class, 'account'])->name('account');
    Route::post('/updateAccount', [MainController::class, 'updateAccount'])->name('updateAccount');
    Route::post('/updatePicture', [MainController::class, 'updatePicture'])->name('updatePicture');
    Route::post('/bankUpdate', [MainController::class, 'bankUpdate'])->name('bankUpdate');
    Route::get('/ph', [MainController::class, 'provideHelp'])->name('ph');
    Route::get('/gh', [MainController::class, 'getHelp'])->name('gh');
    Route::get('/referral', [MainController::class, 'referral'])->name('referral');
    Route::post('/processAmount', [MainController::class, 'processAmount'])->name('processAmount');
    Route::post('/doProvide', [MainController::class, 'doProvide'])->name('doProvide');
    Route::post('/uploadProof', [MainController::class, 'uploadProof'])->name('uploadProof');
    Route::post('/doGet', [MainController::class, 'doGet'])->name('doGet');
    Route::post('/withdraw', [MainController::class, 'withdraw'])->name('withdraw');
    Route::post('/doReferral', [MainController::class, 'doReferral'])->name('doReferral');
    Route::get('/track', [MainController::class, 'track'])->name('track');
    Route::get('/pay/{id}', [MainController::class, 'pay'])->name('pay/{id}');
    // Route::get('/removeHelp/{id}', [MainController::class, 'removeHelp'])->name('removeHelp/{id}');
    Route::get('/receive/{id}', [MainController::class, 'receive'])->name('receive/{id}');
    Route::post('/doPay', [MainController::class, 'doPay'])->name('doPay');
    Route::get('/support', [MainController::class, 'support'])->name('support');
    Route::post('/chatSupport', [MainController::class, 'chatSupport'])->name('chatSupport');
    Route::post('/confirmPay', [MainController::class, 'confirmPay'])->name('confirmPay');
    Route::get('/chat/{id}', [MainController::class, 'chat'])->name('chat/{id}');
    Route::post('/newMessage', [MainController::class, 'newMessage'])->name('newMessage');
});


//Admin Routing

// Route::get('/admin', [MainController::class, 'adminLogin'])->name('admin');
// Route::post('admin/doLogin', [MainController::class, 'adminDoLogin'])->name('admin/doLogin');


Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/admin/dashboard', [MainController::class, 'adminDashboard'])->name('admin/dashboard');
    Route::get('/admin/create_user', [MainController::class, 'CreateUser'])->name('admin/create_user');
    Route::get('/admin/manage_users', [MainController::class, 'ManageUsers'])->name('admin/manage_users');
    Route::get('/admin/all_helps', [MainController::class, 'AllHelps'])->name('admin/all_helps');
    Route::post('/admin/createUser', [MainController::class, 'doCreateUser'])->name('admin/createUser');
    Route::get('/delete/{id}', [MainController::class, 'deleteUser'])->name('/delete/{id}');
    Route::get('/deleteHelp/{id}', [MainController::class, 'deleteHelp'])->name('/deleteHelp/{id}');
    Route::get('/admin/all_gets_table', [MainController::class, 'AllGetsTable'])->name('admin/all_gets_table');
    Route::get('/admin/merge_help/{id}', [MainController::class, 'MergeHelp'])->name('admin/merge_help/{id}');
    Route::get('/delete_req/{id}', [MainController::class, 'deleteGet'])->name('/delete_req/{id}');
    Route::post('/admin/doMerge', [MainController::class, 'doMerge'])->name('admin/doMerge');
    Route::get('/admin/create_help', [MainController::class, 'createHelp'])->name('admin/create_help');
    Route::get('/admin/create_get', [MainController::class, 'createGet'])->name('admin/create_get');
    Route::get('/admin/view_provided', [MainController::class, 'view_provided'])->name('admin/view_provided');
    Route::post('/admin/doCreateHelp', [MainController::class, 'doCreateHelp'])->name('admin/doCreateHelp');
    Route::post('/admin/doCreateGet', [MainController::class, 'doCreateGet'])->name('admin/doCreateGet');
    Route::get('/admin/reply/{unique_id}', [MainController::class, 'reply'])->name('admin/reply/{unique_id}');
    Route::post('/admin/replyMessage', [MainController::class, 'replyMessage'])->name('admin/replyMessage');
    Route::get('/admin/settings', [MainController::class, 'settings'])->name('admin/settings');
    Route::get('/admin/referral_manage', [MainController::class, 'referral_manage'])->name('admin/referral_manage');
    Route::post('/admin/changeRate', [MainController::class, 'changeRate'])->name('admin/changeRate');
    Route::post('/admin/addAmount', [MainController::class, 'addAmount'])->name('admin/addAmount');
    Route::post('/admin/deleteAmount', [MainController::class, 'deleteAmount'])->name('admin/deleteAmount');
    Route::post('/admin/beforeGet', [MainController::class, 'beforeGet'])->name('admin/beforeGet');
    Route::get('/deleteRef/{id}', [MainController::class, 'deleteRef'])->name('/deleteRef/{id}');
    Route::get('/admin/testimonial', [MainController::class, 'testimonial'])->name('admin/testimonial');
    Route::post('/admin/createComment', [MainController::class, 'createComment'])->name('admin/createComment');
});
