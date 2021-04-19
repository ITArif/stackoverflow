<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/show/my/page', function () {
    return view('my_page');
});
Route::get('/home','User\HomeController@homePage')->name('user.home');
//jeno login na kre edit ba dashboard ba user list a access korte parbe na er metho group meddleawrw
Route::group(['middleware'=>'auth'],function(){
Route::get('/dashboard','User\HomeController@index')->middleware('language');/*->middleware('auth')*/
//porer 3 ta kintu kichu na just practice r Admin a na
Route::get('/user/list','Admin\UserController@index')/*->middleware('auth')*/;
Route::get('/user/create','Admin\UserController@create')/*->middleware('auth')*/;
Route::get('/user/edit','Admin\UserController@edit')/*->middleware('auth')*/;
});
/*---Login route----*/
Route::get('/user/login','Auth\LoginController@showLoginForm');
Route::post('/user/login','Auth\LoginController@login')->name('user.login');
Route::post('/user/logout','Auth\LoginController@logout')->name('user.logout');

/*-----user registration route-----*/
Route::get('/user/registration','Auth\RegisterController@showRegistrationForm');
Route::post('/user/register','Auth\RegisterController@userRegister')->name('user.register');
Route::get('/user/profile','Auth\LoginController@profile');
//User profile update route
Route::post('/update/user/profile','Auth\LoginController@updateProfile')
->name('update.profile');
//user password change route
Route::post('/update/user/password','Auth\LoginController@updatePassword')
    ->name('update.password');

/*----Forgot password route-----*/
Route::get('/forgot/password','Auth\ForgotPasswordController@showLinkRequestForm');
//sendResetLinkEmail ai method ta ase trait a ForgotPasswordController er mordhee
Route::post('/send/reset/link','Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('send.reset.link');
Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')
->name('password.reset');
//override korbo na ata trait er mordhee ase----reset method a kintu post method ase Request
Route::post('/password/reset','Auth\ResetPasswordController@reset')
->name('password.request');

/*----Question route--*/
//group middleware kra ase that's why kaw login chara access pabe na
Route::group(['middleware'=>'auth'],function (){
Route::get('/new/question','User\QuestionController@create');
});
Route::post('/store/question','User\QuestionController@store')->name('store.question');
//Ata server side theke data anr jonno ajax use kora=2 tai lagbe
Route::get('/question/list/datatable','User\QuestionController@index');
Route::get('/question/datatable','User\QuestionController@questionData');//url ta list-datatable.blade.php te ajax er url a ase
//ata php deye kora so jeta issa seta use kora jabe
Route::get('/question/list','User\QuestionController@rawTable');
//top question
Route::get('/top/question','User\QuestionController@topQuestion')->name('top.questions');
Route::get('/show/question/{id}','User\QuestionController@show');
Route::get('/view/question/{id}','User\QuestionController@view');
//delete question from list-datatable route
Route::get('/delete/question/{id}','User\QuestionController@deleteQuestion');
//edit question from list-datatable route
Route::get('/edit/question/{id}','User\QuestionController@edit');
//update question route
Route::post('/update/question/{id}','User\QuestionController@update');
//Question search er route---any taow post ba get er motoi hoy--ataw from er data ney Request a
Route::any('/search/question','User\QuestionController@search')->name('search.question');
//oi search deye specific ber kora er route
//Route::post('/search/question/submit','User\QuestionController@');
//total question count route
Route::get('/total/question','User\QuestionController@totalQuestion');
//total vote count route
Route::get('/total/vote','User\QuestionController@totalvote');

/*----Answer route----*/
//for store the answer
Route::post('/store/answer/{id}','User\AnswerController@store')->name('store.answer');
//for update the answer
Route::post('/update/answer/{id}','User\AnswerController@update')->name('update.answer');
Route::get('/answered/list','User\AnswerController@answeredList');
//Answerd datatable for route
Route::get('/answered/datatable','User\AnswerController@answeredDataTable');
//Delete answer route
Route::get('/delete/answer/{id}','User\AnswerController@deleteAnswer');
//total question count route
Route::get('/total/answer','User\AnswerController@totalAnswer');



//Comment route...r id ta kintu answer er id
Route::post('/store/comment/{id}','User\AnswerController@storeComment')->name('store.comment');
//edit comment
Route::post('/update/comment/{id}/{answer}','User\AnswerController@updateComment');
//delete comment route
Route::get('/delete/comment/{id}','User\AnswerController@deleteComment');

/*Vote Routes*/
Route::get('/vote/{id}','User\QuestionController@vote')->name('vote');
Route::get('/cancel/vote/{id}','User\QuestionController@cancelVote')->name('cancel.vote');


//Admin side route
//Route::group(['middleware'=>'auth'],function(){//ai middleware ta HomeController a constructor a desi
//Route::prefix('admin')->group(function () {
    Route::get('/admin/dashboard', 'admin\HomeController@index');
    Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
//admin je login krbe form er mardhome tar route
    Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    /* Forgot Password */
//    Route::get('/password/reset/form', 'Auth\AdminForgotPasswordController@showLinkRequestForm');
//    Route::post('/send/reset/link', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.reset.link');
//    /* Reset Password*/
//    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')
//        ->name('admin.password.reset');
//    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')
//        ->name('admin.password.request');
//});
//});
Route::get('/admin/profile','Admin\AdminProfileController@profile');
//Admin profile update route
Route::post('/update/admin/profile','Admin\AdminProfileController@updateProfile')
    ->name('update.profile');
//Admin password change route
Route::post('/update/admin/password','Admin\AdminProfileController@updatePassword')
    ->name('update.password');


Route::group(['middleware'=>['role:editor|master-admin']],function(){

    Route::get('/new/system/user','Admin\SystemUserController@create');
    //->middleware('permission:add');
    Route::post('/store/new/system/user','Admin\SystemUserController@store')
    ->name('store.system.user');
    //->middleware('permission:add');

    Route::get('/system/user/list','Admin\SystemUserController@index');//role middleware a kichu ase

    Route::get('/edit/system/user/{id}','Admin\SystemUserController@edit')
    ->name('edit.system.user');
    //->middleware('permission:view');

    Route::post('/update/system/user/{id}','Admin\SystemUserController@update')
    ->name('update.system.user')
    ->middleware('permission:update');

    //system user route---destroy method a
    Route::get('/delete/system/user/{id}','Admin\SystemUserController@destroy')
    ->middleware('permission:delete');
});

Route::group(['middleware'=>['role:sub-admin']],function () {

    Route::get('/assign/permission','Admin\PermissionController@assign');
    Route::post('/assign/permission','Admin\PermissionController@assignPermission')
    ->name('assign.permission');
    Route::post('/update/permission','Admin\PermissionController@updatePermission')
    ->name('update.permission');
    Route::get('/delete/permission/{admin_id}','Admin\PermissionController@deletePermission');

});

Route::get('render/question/user/datatable','Admin\DataController@renderUserDataTable');
Route::get('/all/front/users','Admin\DataController@users');
Route::get('/view/user/{id}','Admin\DataController@view');
Route::get('/delete/user/{id}','Admin\DataController@delete');

Route::post('/delete/all/users','Admin\DataController@deleteAll');
Route::post('/activate/all/users','Admin\DataController@activateAll');
Route::post('/deactivate/all/users','Admin\DataController@deactivateAll');

//Multiple Language switch
Route::get('language/{lang}',function($lang){
    \Session::put('locale',$lang);
    return redirect()->back();
})->middleware('language');

//Approved question
Route::post('/delete/all/questions','Admin\QuestionController@deleteAll');
Route::post('/activate/all/questions','Admin\QuestionController@activateAll');
Route::post('/deactivate/all/questions','Admin\QuestionController@deactivateAll');

Route::get('/pending/question','Admin\QuestionController@pending');
Route::get('/view/pending/question/{id}','Admin\QuestionController@viewPending')
    ->name('view.pending');
Route::get('/approve/question/{id}','Admin\QuestionController@approveQuestion');
Route::get('all/approved/questions','Admin\QuestionController@allApprovedQuestions');
Route::get('/render/approved/quest/datatable','Admin\QuestionController@renderApprovedDataTable');
Route::get('/view/approved/question/{id}','Admin\QuestionController@viewApproved')
    ->name('view.approved.question');
Route::get('/delete/quest/{id}','Admin\QuestionController@delete')
    ->name('delete.quest');

//Approved Answer
Route::post('/delete/all/answers','Admin\AnswerController@deleteAll');
Route::post('/activate/all/answers','Admin\AnswerController@activateAll');
Route::post('/deactivate/all/answers','Admin\AnswerController@deactivateAll');

Route::get('/pending/answer','Admin\AnswerController@pending');
Route::get('/view/pending/answer/{id}','Admin\AnswerController@viewPending')
    ->name('view.pending');
Route::get('/approve/answer/{id}','Admin\AnswerController@approveAnswer');
Route::get('/all/approved/answers','Admin\AnswerController@allApprovedAnswers');
Route::get('/render/approved/ans/datatable','Admin\AnswerController@renderApprovedDataTable');
Route::get('/view/approved/answer/{id}','Admin\AnswerController@viewApproved')
    ->name('view.approved.answer');
Route::get('/delete/ans/{id}','Admin\AnswerController@delete')
    ->name('delete.ans');
//help center route
Route::get('/user/help/center','User\HelpController@userHelp');
Route::get('/user/about/us','User\HelpController@aboutUs');
//activity route
Route::get('/user/activity','User\ActivityController@activity');

//Developer jobs route
Route::get('/new/job','User\JobController@create');
Route::post('/store/job','User\JobController@store')
    ->name('store.job');
//job datatable list route
Route::get('/user/job/list/datatable','User\JobController@index');
Route::get('/user/job/datatable','User\JobController@jobData');
//Route::get('/question/list','User\JobController@rawTable');
Route::get('/view/job/{id}','User\JobController@view');
Route::get('/delete/job/{id}','User\JobController@deleteJob');
Route::get('/edit/job/{id}','User\JobController@edit');
Route::post('/update/job/{id}','User\JobController@update');
Route::get('/top/job/offer','User\JobController@topJob');

Route::get('/job/offers/{id}','User\JobController@jobOffers')->name('show.job');

//like
// Route::get('/like','User\JobController@like');
// Route::post('/like','User\JobController@jobLikeJob');
Route::post('/like',[
    'uses'=>'JobController@jobLikeJob',
    'as'=>'like'
]);

Route::get('/apply/job/offers/{job}','User\JobController@applyJob')->name('job.apply');
Route::post('/store/job/application','User\JobController@applicationStore')
    ->name('store.job.apply');

Route::any('/search/job','User\JobController@search')
    ->name('search.jobs');

//help center route
Route::get('/user/help/center','User\HelpController@userHelp');
Route::get('/user/about/us','User\HelpController@aboutUs');

//rating api
Route::get('/acceptRating','User\AnswerController@acceptRating')
    ->middleware('auth');

//Approved Job route
Route::post('/delete/all/jobs','Admin\JobController@deleteAll');
Route::post('/activate/all/jobs','Admin\JobController@activateAll');
Route::post('/deactivate/all/jobs','Admin\JobController@deactivateAll');

Route::get('/pending/job','Admin\JobController@pending');
Route::get('/view/pending/job/{id}','Admin\JobController@viewPending')
    ->name('view.pending');
Route::get('/approve/job/{id}','Admin\JobController@approveJob');
Route::get('all/approved/jobs','Admin\JobController@allApprovedJobs');
Route::get('/render/approved/job/datatable','Admin\JobController@renderApprovedDataTable');
Route::get('/view/approved/job/{id}','Admin\JobController@viewApproved')
    ->name('view.approved.job');
Route::get('/delete/job/{id}','Admin\JobController@delete')
    ->name('delete.job');

//Best answer rate
Route::get('rate/as/best/{id}','User\AnswerController@rateAsBest');

/* Trash Items */
Route::get('/admin/trash-board','Admin\TrashController@trashBoard');
Route::get('/all/trashed/questions','Admin\TrashController@allTrashedQuestions');
Route::get('/restore/trashed/questions/{id}','Admin\TrashController@restoreTrashedQuestions');
Route::post('/permanently/delete/questions','Admin\TrashController@permanentlyDelete');
//Chart
Route::post('/feed/questions','Admin/QuestionController@getData');
