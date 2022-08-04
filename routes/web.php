<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::get('/users', function () {
    return Inertia::render('Users/Index', [
        // 'users' => User::all()->map(fn ($user) => [
        //     'id' => $user->id,
        //     'name' => $user->name
        // ])
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]),
        'filters' => Request::only(['search'])
    ]);
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('/users', function () {
    //validate the request.
    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:2']
    ]);
    //create the user
    User::create($attributes);
    //redirect
    return redirect('/users');
});


Route::get('/settings', function () {
    return Inertia::render('Settings');
});



Route::post('/posttest', function () {
    dd(request('name'));

    //return Inertia::render('Settings');
});









Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
