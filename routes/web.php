<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::view('/register', 'register');


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\VerificationMail;

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $code = rand(100000, 999999);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'verification_code' => $code,
    ]);

    Mail::to($user->email)->send(new VerificationMail($user, $code));

    return redirect()->route('verify.form')->with('email', $user->email);
});


Route::view('/verify', 'verify')->name('verify.form');
Route::post('/verify', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'code' => 'required'
    ]);

    $user = User::where('email', $request->email)
                ->where('verification_code', (string)$request->code)
                ->first();

    if ($user) {
        $user->is_verified = true;
        $user->verification_code = null;
        $user->save();

        return "✅ Compte vérifié avec succès.";
    }

    return back()->with('error', 'Code invalide ou email incorrect.');
});
