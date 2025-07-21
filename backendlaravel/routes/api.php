<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/contact', function (Request $request) {
    \Illuminate\Support\Facades\Mail::raw("Message from: {$request->name}\nEmail: {$request->email}\n\n{$request->message}", function ($mail) use ($request) {
        $mail->to('your-email@example.com')
             ->subject('New Contact Message');
    });

    return response()->json(['message' => 'Sent successfully']);
});