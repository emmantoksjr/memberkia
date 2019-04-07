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

Route::get('/privacy', function(){
    return view('privacy');
});
Route::get('/', 'Auth\LoginController@show2');
//Auth Admin
    #Authentication Routes...
    Route::get('/admin/login', 'CustomAuthController@showAdminLoginForm')->name('login');
    Route::post('/admin/login', 'CustomAuthController@login');
    Route::get('/auth/logout', 'Auth\LoginController@logout');
    #Registration Routes...
    Route::get('/auth/register', 'CustomAuthController@showRegistrationForm');
    Route::post('/auth/register', 'CustomAuthController@Register');
    
    Route::get('/login/admin', function(){
        return view('admin.admin');
    });

//Admin Pages

    Route::prefix('admin')->group(function(){

        /**
         *
         * All Admin Get Actions falls below
         *
         **/

        Route::get('/dashboard', 'CustomAuthController@showAdminDashboard')->name('admin.dashboard')->middleware('auth');

        #Student Get Actions
        Route::get('/students','AdminController@viewStudents')->name('admin.students')->middleware('auth');
        Route::get('/student/create', 'AdminController@createStudent')->name('admin.student.create')->middleware('auth');
        Route::get('/student/batch', 'AdminController@createStudentBatch')->name('admin.student.batch')->middleware('auth');
        Route::get('/student/edit/{id}','AdminController@editStudent')->middleware('auth');
        Route::get('/student/disable/{id}','AdminController@disableStudent')->middleware('auth');
        Route::get('/student/enable/{id}','AdminController@enableStudent')->middleware('auth');
        Route::get('/student/details/{id}','AdminController@studentDetails')->middleware('auth');

        #Alumni Get Actions
        Route::get('/alumni', 'AdminController@viewAlumni')->name('admin.alumni')->middleware('auth');
        Route::get('/alumni/create','AdminController@createAlumni')->name('admin.alumni.create')->middleware('auth');
        Route::get('/alumni/batch', 'AdminController@createAlumniBatch')->name('admin.alumni.batch')->middleware('auth');
        Route::get('/alumni/edit/{id}','AdminController@editAlumni')->middleware('auth');
        Route::get('/alumni/disable/{id}','AdminController@disableAlumni')->middleware('auth');

        #Announcement Get Actions
        Route::get('/announcements', 'AdminController@viewAnnouncements')->name('admin.announcements')->middleware('auth');
        Route::get('/announcement/create', 'AdminController@createAnnouncement')->name('admin.announcement.create')->middleware('auth');
        Route::get('/announcement/view/{id}', 'AdminController@viewAnnouncementDetails')->name('admin.announcement.view')->middleware('auth');
        Route::get('/announcement/edit/{id}', 'AdminController@editAnnouncementDetails')->name('admin.announcement.edit')->middleware('auth');

        #Dues Get Actions
        Route::get('/dues', 'AdminController@viewDues')->name('admin.dues')->middleware('auth');
        Route::get('/dues/create', 'AdminController@createDues')->name('admin.due.create')->middleware('auth');
        Route::get('/due/edit/{id}', 'AdminController@editDue')->name('admin.due.edit')->middleware('auth');
        Route::get('/dues/select/{session}/{year}','AdminController@selectDue')->middleware('auth');
        Route::get('/due/{id}','AdminController@singleDue')->middleware('auth');

        #Dues Payment Get Actions
        Route::get('/payments','AdminController@payments')->name('admin.payments')->middleware('auth');
        Route::get('/payments/online','AdminController@onlinePayment')->name('admin.payments.online')->middleware('auth');
        Route::get('/payments/create','AdminController@createPayment')->name('admin.payments.create')->middleware('auth');
        Route::get('/payments/verify','AdminController@verifyPayment')->name('admin.payments.verify')->middleware('auth');
        Route::get('/payment/details/{id}','AdminController@paymentDetails')->name('admin.payment.details')->middleware('auth');
        Route::get('/payments/office','AdminController@officePayment')->name('admin.payments.office')->middleware('auth');

        #Event Payment Get Actions
        Route::get('/event/payments','AdminController@eventPayments')->name('admin.event.payments')->middleware('auth');
        Route::get('/event/payments/online','AdminController@eventOnlinePayment')->name('admin.event.payments.online')->middleware('auth');
        Route::get('/event/payments/create','AdminController@eventCreatePayment')->name('admin.event.payments.create')->middleware('auth');
        Route::get('/event/payments/verify','AdminController@eventVerifyPayment')->name('admin.event.payments.verify')->middleware('auth');
        Route::get('/event/payment/details/{id}','AdminController@eventPaymentDetails')->name('admin.event.payment.details')->middleware('auth');
        Route::get('/event/payments/office','AdminController@eventOfficePayment')->name('admin.event.payments.office')->middleware('auth');

        #Profile
        Route::get('/profile/{id}','AdminController@profile')->name('admin.profile')->middleware('auth');
        Route::get('/profile/edit/{id}','AdminController@editProfile')->name('admin.profile.edit')->middleware('auth');

        #Reset Password
        Route::get('/showPasswordResetForm','CustomAuthController@showPasswordResetForm');
        Route::get('/showEnterPasswordForm', 'CustomAuthController@enterPassword');

        #Events
        Route::get('/events','AdminController@events')->middleware('auth');
        Route::get('/event/create','AdminController@createEvent')->name('event.add')->middleware('auth');
        Route::get('/event/edit/{id}','AdminController@editEvent')->middleware('auth');
        Route::get('/event/completed/{id}','AdminController@completeEvent')->middleware('auth');

        #Roles
        Route::get('/roles', 'Admin\RolesController@index')->name('admin.roles')->middleware('auth');
        Route::get('/role/create', 'Admin\RolesController@create')->name('role.create')->middleware('auth');
        Route::get('/role/edit/{id}','Admin\RolesController@edit')->name('role.edit')->middleware('auth');

        #Previlidge/permission
        Route::get('/priviledges','Admin\PermissionsController@index')->name('priviledges')->middleware('auth');
        Route::get('/priviledge/create','Admin\PermissionsController@create')->middleware('auth');

        #Users
        Route::get('/users', 'AdminController@users')->name('admin.users')->middleware('auth');
        Route::get('/user/create','AdminController@createUser')->name('user.create')->middleware('auth');  
        Route::get('/user/{id}/role','AdminController@editUser')->name('user.edit')->middleware('auth');
        Route::post('/user/{id}/role','AdminController@updateUser')->middleware('auth');
        Route::post('/user/create','AdminController@saveCreate')->middleware('auth'); 
        Route::get('/disable/user/{id}','AdminController@disableUser')->name('user.disable')->middleware('auth'); 
        Route::get('/enable/user/{id}','AdminController@enableUser')->name('user.enable')->middleware('auth');  

        #Tutorials
        Route::get('/tutorials','AdminController@tutorials')->name('admin.tutorials')->middleware('auth');
        Route::get('/tutorial/create','AdminController@createTutorial')->name('tutorial.create')->middleware('auth');
        Route::get('/tutorial/edit/{id}','AdminController@editTutorial')->name('tutorial.edit')->middleware('auth');
        Route::get('/tutorial/view/{id}','AdminController@viewTutorial')->name('tutorial.view')->middleware('auth');

        #Timechecks
        Route::post('/payments','AdminController@timecheckPayments')->middleware('auth');
        Route::post('/payments/online','AdminController@timecheckOnlinePayments')->middleware('auth');
        Route::post('/payments/office','AdminController@timecheckOfficePayments')->middleware('auth');
        Route::post('/event/payments','AdminController@timecheckEventPayments')->middleware('auth');
        Route::post('/event/payments/online','AdminController@timecheckEventOnlinePayments')->middleware('auth');
        Route::post('/event/payments/office','AdminController@timecheckEventOfficePayments')->middleware('auth');

        #Polls 
        Route::get('/polls','AdminController@polls')->name('admin.polls')->middleware('auth');
        Route::get('/polls/create','AdminController@createPoll')->name('admin.poll.create')->middleware('auth');
        Route::post('/polls/create','AdminController@savePoll')->middleware('auth');
        Route::get('/polls/edit/{id}','AdminController@editPoll')->name('admin.poll.edit')->middleware('auth');
        Route::post('/polls/edit/{id}','AdminController@saveEditPoll')->middleware('auth');
        Route::get('/polls/view/{id}','AdminController@viewPoll')->name('admin.poll.view')->middleware('auth');
        Route::get('/polls/start/{id}','AdminController@startPoll')->name('admin.poll.start')->middleware('auth');
        Route::get('/polls/stop/{id}','AdminController@stopPoll')->name('admin.poll.stop')->middleware('auth');



        /**
         *
         * All Admin Post Actions falls below
         *
         **/
        #Reset Password
        Route::post('/showPasswordResetForm','CustomAuthController@verifyEmailForReset')->name('verify.email');
        Route::post('/saveNewPassword','CustomAuthController@saveNewPassword')->name('admin.savePassword');
        #Students Post Actions
        Route::post('/student/edit/{id}','AdminController@saveEditStudent')->middleware('auth');
        Route::post('/student/create', 'AdminController@saveCreateStudent')->middleware('auth');
        Route::post('/student/batch','AdminController@saveStudentBatch')->middleware('auth');

        #Alumni Post Actions
        Route::post('/alumni/edit/{id}','AdminController@saveEditAlumni')->middleware('auth');
        Route::post('/alumni/create', 'AdminController@saveCreateAlumni')->middleware('auth');
        Route::post('/alumni/batch','AdminController@saveAlumniBatch')->middleware('auth');

        #Annoucements Post Actions
        Route::post('/announcement/create','AdminController@saveCreateAnnouncement')->middleware('auth');
        Route::post('/announcement/edit/{id}', 'AdminController@saveEditAnnouncement')->middleware('auth');

        #Dues Post Actions
        Route::post('/dues/create','AdminController@saveCreateDue')->middleware('auth');
        Route::post('/due/edit/{id}','AdminController@saveEditDue')->middleware('auth');

        #Profile Post Actions
        Route::post('/profile/edit/{id}', 'AdminController@saveEditProfile')->middleware('auth');

        #Events
        Route::post('/event/create','AdminController@saveEvent')->middleware('auth');
        Route::post('/event/edit/{id}','AdminController@saveEditEvent')->middleware('auth');
        Route::get('/event/view/{id}', 'AdminController@viewDetails')->middleware('auth');

        #Roles
        Route::post('/role/edit/{id}', 'Admin\RolesController@saveEdit')->middleware('auth');
        Route::post('/role/create', 'Admin\RolesController@store')->middleware('auth');

        #Permissions
        Route::post('/priviledge/create', 'Admin\PermissionsController@store')->middleware('auth');

        #Payments
        Route::post('/payments/create','AdminController@savePayment')->middleware('auth');
        Route::post('/event/payments/create','AdminController@eventSavePayment')->middleware('auth');

        #Tutorials
        Route::post('/tutorial/create','AdminController@saveCreateTutorial')->middleware('auth');
        Route::post('/tutorial/edit/{id}','AdminController@saveEditTutorial')->middleware('auth');
 });

//Auth Student
Route::prefix('student')->group(function() {
    /**
     *
     * All student Get Actions falls below
     *
     **/
    #Authentication
    Route::get('/login', 'StudentAuthController@showLoginForm')->name('student.login');
    Route::get('/register','StudentAuthController@showRegistrationForm')->name('student.register');
    Route::get('logout/', 'StudentDetailController@logout')->name('student.logout');
    #Dashboard
    Route::get('/home', 'StudentDetailController@home')->name('student.dashboard')->middleware('auth');
    #Announcements
    Route::get('/announcement','StudentDetailController@announcements')->name('student.announcements')->middleware('auth');
    #profile
    Route::get('/profile','StudentDetailController@profile')->middleware('auth');
    Route::get('/profile/edit', 'StudentDetailController@edit')->middleware('auth');
    #dues
    Route::get('/dues','StudentDetailController@dues')->middleware('auth');
    Route::get('/dues/paid','StudentDetailController@duesPaid')->middleware('auth');
    #Payment
    Route::get('/due/pay/{id}','StudentDetailController@payDue')->name('student.due.pay')->middleware('auth');
    Route::get('/event/pay/{id}','StudentDetailController@payEvent')->name('student.event.pay')->middleware('auth');
    #Events
    Route::get('/event', 'StudentDetailController@events')->name('student.events')->middleware('auth');
    Route::get('/event/free/{id}','StudentDetailController@attendFreeEvent')->middleware('auth');
    Route::get('/event/free/remove/{id}','StudentDetailController@removeFreeEvent')->middleware('auth');
    Route::get('/event/generate','StudentDetailController@qrcode')->name('student.generate')->middleware('auth');
    #Payments
    Route::get('/payments', 'StudentDetailController@payments')->name('student.payments')->middleware('auth');
    #tutorials
    Route::get('/tutorials','StudentDetailController@tutorials')->name('student.tutorials')->middleware('auth');
        
  

    /**
     *
     * All student Post Actions falls below
     *
     **/
    #Authentication
    Route::post('/login', 'StudentAuthController@login')->name('student.login.submit');
    Route::post('/register', 'StudentAuthController@Register')->middleware('auth');
    #Announcements
    Route::post('/announcement','StudentDetailController@announcementsTimeCheck')->middleware('auth');
    #profile
    Route::post('/profile/edit', 'StudentDetailController@profileUpdateDetails')->middleware('auth');
    #Payment
    Route::post('/due/payment','StudentDetailController@saveDueFeedback')->middleware('auth');
    Route::post('/event/payment', 'StudentDetailController@saveEventFeedback')->middleware('auth');
});

//Auth Alumni
Route::prefix('alumni')->group(function() {
    Route::get('/login', 'AlumniDetailController@showLoginForm')->name('alumni.login');
    Route::post('/login', 'AlumniDetailController@login')->name('alumni.login.submit');
    Route::get('logout/', 'AlumniDetailController@logout')->name('alumni.logout');
    Route::get('/', 'PagesController@home')->name('alumni.dashboard');
});

Route::get('/student/profile/password', function(){
    return view('students.password');
});

Route::get('/student/payment/part', function () {
   return view('students.part');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');