<?php

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', function () {
    return response()->json([
        'success' => true,
        'projects' => Project::with(['technologies', 'type'])->orderByDesc('id')->paginate(4),
    ]);
});
