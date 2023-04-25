<?php

use App\Models\Employee;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware("auth.mid")->get('/home', function () {
    $employees = Employee::all();
    $timesheet = Timesheet::join("employees", "timesheets.employee_id", "=", "employees.id")->get(["employees.name", "timesheets.enter", "timesheets.exit"]);
    return view('home', compact("employees", "timesheet"));
});

Route::get('/login', function () {
    if (Auth::check())
        return redirect("home");
    return view('login');
});

Route::post("/login", function (Request $request) {
    if (Auth::attempt($request->only('username', 'password')))
        return redirect('home');
    return redirect("login");
});

Route::get("/logout", function () {
    Session::flush();
    Auth::logout();
    return Redirect('home');
});

// Route::view("/register", "register");
// Route::post("/register", function (Request $request) {
//     $request["password"] = Hash::make($request['password']);
//     User::create($request->all());
//     return redirect("login");
// });

Route::middleware("auth.mid")->post("/add-employee", function (Request $request) {
    Employee::create($request->all());
    return redirect("home");
});

Route::middleware("auth.mid")->post("/add-time-record", function (Request $request) {
    Timesheet::create($request->all());
    return redirect("home");
});
