<?php

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/', function (Request $req) {
    $myArray = $req->entry;
    $myString = implode(', ', $myArray);
    Entry::create([
        'name' => $req->name,
        'amount' => $req->amount,
        'entry' => $myString,
    ]);
    return redirect('entries');
});

Route::get('/entries', function () {
    $data = Entry::latest()->get();
    return view('entries', [
        'data' => $data,
    ]);
});