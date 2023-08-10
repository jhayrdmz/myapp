<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    function getLargestElement($set, $position, $from = 'end') {

        $from === 'start' ? sort($set) : rsort($set);

        return $set[$position - 1] ?? false;
    }

    $test = [3, 2, 1, 5, 6, 4];

    dump(getLargestElement($test, 2));
    dump(getLargestElement($test, 3, 'start'));
    dump(getLargestElement($test, 1));
    dump(getLargestElement($test, 0));
    dump(getLargestElement($test, 7));
    dump(getLargestElement($test, -1));

    // function formNumber($set, $type = 'largest') {
    //     $length = count($set);

    //     for ($i = 0; $i < $length - 1; $i++) {
    //         for ($x = 0; $x < $length - $i - 1; $x++) {
    //             $option1 = $set[$x] . $set[$x + 1];
    //             $option2 = $set[$x + 1] . $set[$x];

    //             if (($type == 'largest' && $option1 < $option2) 
    //                 || ($type == 'smallest' && $option1 > $option2)
    //             ) {
    //                 $temp = $set[$x];
    //                 $set[$x] = $set[$x + 1];
    //                 $set[$x + 1] = $temp;
    //             }
    //         }
    //     }

    //     return implode('', $set);
    // }

    // $test = [2, 20, 24, 6, 8];

    // dump(formNumber($test));
    // dump(formNumber($test, 'smallest'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
