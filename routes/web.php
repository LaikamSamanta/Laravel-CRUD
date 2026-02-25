<?php

// use Illuminate\Support\Facades\Facade;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/welcome', function () {
    return '<html><body>Welcome!</body></html>';
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/', [TaskController::class, 'index']); // optional home route
    Route::delete('logout', [SessionController::class, 'destroy'])->name('logout');      // optional logout route
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');// optional register route
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // optional register route
    Route::get('login', [SessionController::class, 'create'])->name('login'); // optional login route
    Route::post('login', [SessionController::class, 'store'])->name('login.store'); // optional login route
});

Route::get('/admin', function () {
    Gate::authorize('admin'); // This will check if the user has the 'admin' ability defined in the AppServiceProvider
    return 'Only admins can see this!';
});
// the same as:
/* Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');
Route::get('/form/{form}', [FormController::class, 'show'])->name('form.show');
Route::get('/form/{form}/edit', [FormController::class, 'edit'])->name('form.edit');
Route::patch('/form/{form}', [FormController::class, 'update'])->name('form.update');
Route::delete('/form/{form}', [FormController::class, 'destroy'])->name('form.destroy');
*/


/*
// Delete records where name is 'Tesla'
Route::get('/izdzest', function () {
    Form::where('name', 'Tesla')->delete(); // Delete records from the 'form' table where the name is 'Tesla'
    return redirect('/');
});

or 

// Delete all records from the 'form' table
Route::get('/izdzest-visus', function () {
    Form::truncate(); // Delete all records from the 'form' table
    return redirect('/');
});
*/

/*
Route::post('/form', function () {
    $submittedData = request()->all();  // $submittedData = \Illuminate\Support\Facades\Request::input($submittedData);
});
*/

/*
Route::post('/form', function (Request $request) {
    $request->submittedData;
});
*/

/*
Route::get('/', function () { // when the user visits the root URL, this function will be executed
  $form = Form::find(1); // the record with the id of 1 from the 'form' table will be retrieved and stored in the $form variable
 // $form = Form::all(); // all records from the 'form' table will be retrieved and stored in the $form variable 
// $form = DB::table('form')-> get(); // all records from the 'form' table will be retrieved and stored in the $form variable
    // return $form[0] ->name;        //@dd($form); //debugging tool, it will dump the contents of the $form variable and stop the execution of the script
    return $form;
    return view('form', [
        'form' => $form, // pass the submitted data to the view
    ]); 
});
*/