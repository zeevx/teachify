<?php

use App\Imports\UsersImport;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


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


Route::get('/test', function () {
        return view('test');
});

Auth::routes();


//Public
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/verify', [App\Http\Controllers\HomeController::class, 'verify'])->name('verify');
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('can:superadmin');
Route::post('/profile/submit', [App\Http\Controllers\HomeController::class, 'submit_profile'])->name('submit.profile')->middleware('can:superadmin');
Route::post('/users/import', function (Request $request) {
    $agent_id = $request->agent_id;
    $fieldagent_id = $request->fieldagent_id;
    $school_id = $request->school_id;
    $state = $request->state;
    $district = $request->district;
    $lga = $request->lga;
    $id = $request->id;
    $all = $agent_id . "," . $fieldagent_id . "," . $id;
    $import = new UsersImport($all, $state, $district, $lga, $school_id);
    Excel::import($import,$request->file('file'));
    session()->flash('success','Users Imported Successfully');
    return back();
});
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'App\Http\Controllers\MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'App\Http\Controllers\MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'App\Http\Controllers\MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'App\Http\Controllers\MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'App\Http\Controllers\MessagesController@update']);
});



//SuperAdmin
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('home','HomeController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('users','UsersController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('superadmins','SuperadminController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('admins','AdminController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('fieldagents','FieldagentController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('agents','AgentController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('teachers','TeacherController');
});
Route::namespace('App\Http\Controllers\SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin')->group(function (){
    Route::resource('schools','SchoolController');
});




//Admin
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('home','HomeController');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('users','UsersController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('admins','AdminController');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('fieldagents','FieldagentController');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('agents','AgentController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('teachers','TeacherController');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('schools','SchoolController');
});
Route::get('admin/profile/{id}', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('admin.profile')->middleware('can:admin');
Route::post('admin/profile/submit', [App\Http\Controllers\Admin\HomeController::class, 'submit_profile'])->name('admin.profile.submit')->middleware('can:admin');



//FieldAgent
Route::namespace('App\Http\Controllers\FieldAgent')->prefix('fieldagent')->name('fieldagent.')->middleware('can:fieldagent')->group(function (){
    Route::resource('home','HomeController');
});

Route::namespace('App\Http\Controllers\FieldAgent')->prefix('fieldagent')->name('fieldagent.')->middleware('can:fieldagent')->group(function (){
    Route::resource('teachers','TeachersController');
});
Route::namespace('App\Http\Controllers\FieldAgent')->prefix('fieldagent')->name('fieldagent.')->middleware('can:fieldagent')->group(function (){
    Route::resource('schools','SchoolsController');
});
Route::get('/faprofile/{id}', [App\Http\Controllers\FieldAgent\HomeController::class, 'profile'])->name('faprofile')->middleware('can:fieldagent');
Route::post('/faprofile/submit', [App\Http\Controllers\FieldAgent\HomeController::class, 'submit_profile_info'])->name('submit.faprofile')->middleware('can:fieldagent');



//Agent
Route::namespace('App\Http\Controllers\Agent')->prefix('agent')->name('agent.')->middleware('can:agent')->group(function (){
    Route::resource('home','HomeController');
});

Route::namespace('App\Http\Controllers\Agent')->prefix('agent')->name('agent.')->middleware('can:agent')->group(function (){
    Route::resource('teachers','TeachersController');
});
Route::namespace('App\Http\Controllers\Agent')->prefix('agent')->name('agent.')->middleware('can:agent')->group(function (){
    Route::resource('schools','SchoolsController');
});
Route::get('/aprofile/{id}', [App\Http\Controllers\Agent\HomeController::class, 'profile'])->name('aprofile')->middleware('can:agent');
Route::post('/aprofile/submit', [App\Http\Controllers\Agent\HomeController::class, 'submit_profile_info'])->name('submit.aprofile')->middleware('can:agent');

Route::namespace('App\Http\Controllers\Agent')->prefix('agent')->name('agent.')->middleware('can:agent')->group(function (){
    Route::resource('fieldagents','FieldagentController');
});

Route::namespace('App\Http\Controllers\Agent')->prefix('agent')->name('agent.')->middleware('can:agent')->group(function (){
    Route::resource('users','UsersController');
});
Route::get('/upload/teachers', [App\Http\Controllers\Agent\HomeController::class, 'upload_teachers'])->name('upload_teachers')->middleware('can:agent');
Route::post('/upload/teachers/submit', [App\Http\Controllers\Agent\HomeController::class, 'submit_upload_teachers'])->name('submit.upload.teachers')->middleware('can:agent');


//Teacher
Route::namespace('App\Http\Controllers\Teacher')->prefix('teacher')->name('teacher.')->middleware('can:teacher')->group(function (){
    Route::resource('home','HomeController');
});
Route::get('/tprofile/{id}', [App\Http\Controllers\Teacher\HomeController::class, 'profile'])->name('tprofile')->middleware('can:teacher');
Route::post('/tprofile/submit', [App\Http\Controllers\Teacher\HomeController::class, 'submit_profile_info'])->name('submit.tprofile')->middleware('can:teacher');


//School
Route::namespace('App\Http\Controllers\School')->prefix('school')->name('school.')->middleware('can:school')->group(function (){
    Route::resource('home','HomeController');
});
Route::namespace('App\Http\Controllers\School')->prefix('school')->name('school.')->middleware('can:school')->group(function (){
    Route::resource('teachers','TeacherController');
});
Route::get('/sprofile/{id}', [App\Http\Controllers\School\HomeController::class, 'profile'])->name('sprofile')->middleware('can:school');
Route::post('/sprofile/submit', [App\Http\Controllers\School\HomeController::class, 'submit_profile_info'])->name('submit.sprofile')->middleware('can:school');



