<?php

use App\Notifications\NewUser;
use App\User;
use Illuminate\Support\Facades\Mail;
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

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});

Route::get('/send', function () {
    $user = User::find(2);
    $user->notify(new NewUser($user->id));
    return "done";
});


Route::get('/migrate', function () {
    // \Artisan::call('migrate:fresh');
    \Artisan::call('db:seed');
    dd('migrated!');
});


Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/home', function () {
    return redirect()->route('login');
})->name('home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        Route::get('/index', function () {
            return redirect()->route('login');
        });
        Route::get('lesson/request-class/', 'HomeController@requestClass')->name('lesson.request');
        Route::post('lesson/request-class/', 'HomeController@requestClassPost')->name('lesson.requestPost');

        Route::get('tutors/', 'HomeController@tutors')->name('tutors');
        Route::post('tutors/', 'HomeController@tutorsSearch')->name('tutors.search');
        Route::get('tutor/{id}', 'HomeController@tutorShow')->name('tutors.show');

        Auth::routes();
        Route::get('/tc_reg', 'Auth\RegisterController@tc_reg')->name('tc_reg');
        Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('socialLogin.redirect');
        Route::get('login/{provider}/callback', 'LoginSocialiteController@handleProviderCallback')->name('socialLogin.callback');



        Route::group(['middleware' => ['auth']], function () {


            // -------------------------


            Route::resource('invoices', 'InovicesController');

            Route::get('/section/{id}', 'InovicesController@getproducts');
            Route::get('/markAsRead', 'InovicesController@markAsRead')->name('mark');

            Route::get('customers_report', 'Customers_Report@index')->name("customers_report");
            Route::post('Search_customers', 'Customers_Report@Search_customers');

            Route::get('/{page}', 'AdminController@index');


            Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {

                Route::get('/home', 'HomeController@index')->name('dashboard.home')->middleware('AdminApprove');
                Route::get('/status/update', 'HomeController@updateStatus')->name('author.update.status');


                Route::get('import-user', 'ImportController@import');


                Route::resource('roles', 'RoleController');
                Route::resource('users', 'UserController');
                Route::resource('students', 'StudentController')->middleware('AdminApprove');
                Route::resource('teachers', 'TeacherController')->middleware('AdminApprove');
                Route::resource('available-times', 'AvailableTimeController')->middleware('AdminApprove');
                Route::delete('delete-multiple-category', 'AvailableTimeController@deleteMultiple')->name('delete-multiple-category')->middleware('AdminApprove');

                Route::get('calendar-t', 'AvailableTimeController@calendar')->name('teacher.calendar')->middleware('AdminApprove');
                Route::post('calender/action', 'AvailableTimeController@action')->name('calendart')->middleware('AdminApprove');

                Route::get('admin-booking-calendar', 'BookingCalendarController@admin_calender')->name('admin_booking_calendar')->middleware('AdminApprove');
                Route::get('admin-side-slots', 'BookingCalendarController@admin_side_get_slots')->name('admin_side_get_slots')->middleware('AdminApprove');
                Route::post('all-students-details', 'BookingCalendarController@all_students_details')->name('admin_all_students_details')->middleware('AdminApprove');
                Route::post('save-admin-student-slot', 'BookingCalendarController@save_admin_student_slot')->name('admin_student_slot')->middleware('AdminApprove');
                Route::get('booking-calendar', 'BookingCalendarController@index')->name('booking_calendar')->middleware('AdminApprove');
                Route::get('teacher-slots', 'BookingCalendarController@teachers_side_getSlots')->name('teacher.get_slots')->middleware('AdminApprove');
                Route::get('student-slots', 'BookingCalendarController@student_side_getSlots')->name('student.get_slots')->middleware('AdminApprove');
                Route::post('save-slots', 'BookingCalendarController@store')->name('teacher.save_slots')->middleware('AdminApprove');
                Route::post('accept-student-slot', 'BookingCalendarController@accept_student_slot')->name('student.accept_student_slot')->middleware('AdminApprove');
                Route::post('reject-student-slot', 'BookingCalendarController@reject_student_slot')->name('student.reject_student_slot')->middleware('AdminApprove');
                Route::post('cancel-slots', 'BookingCalendarController@cancel_slots')->name('teacher.cancel_slots')->middleware('AdminApprove');
                Route::post('save-student-slots', 'BookingCalendarController@save_student_slots')->name('student.save_student_slots')->middleware('AdminApprove');
                Route::post('get-teachers-details', 'BookingCalendarController@get_teachers_details')->name('student.get_teachers_details')->middleware('AdminApprove');
                Route::post('get-students-details', 'BookingCalendarController@get_students_details')->name('student.get_students_details')->middleware('AdminApprove');
                Route::post('get-slot-details', 'BookingCalendarController@get_slot_detail')->name('student.get_slot_detail')->middleware('AdminApprove');
                Route::post('get-booked-teacher-detail', 'BookingCalendarController@get_booked_teacher_detail')->name('student.get_booked_teacher_detail')->middleware('AdminApprove');
                Route::post('cancel-slot-by-student', 'BookingCalendarController@cancel_slot_by_student')->name('student.cancel_slot_by_student')->middleware('AdminApprove');
                Route::post('get-teachers-reschedule', 'BookingCalendarController@get_teachers_reschedule')->name('student.get_teachers_reschedule')->middleware('AdminApprove');
                Route::post('get-teachers-reschedule-time', 'BookingCalendarController@get_teachers_reschedule_time')->name('student.get_teachers_reschedule_time')->middleware('AdminApprove');
                Route::post('reschedule', 'BookingCalendarController@reschedule')->name('student.reschedule')->middleware('AdminApprove');
                Route::post('day-clone', 'BookingCalendarController@slotClone')->middleware('AdminApprove');

                Route::resource('lessons', 'LessonController')->middleware('AdminApprove');
                Route::get('calendar', 'CalendarController@calendar')->middleware('AdminApprove');
                Route::post('full-calender/action', 'CalendarController@action')->middleware('AdminApprove');
                Route::post('add-points', 'LessonController@addPoints')->name('addPoints')->middleware('AdminApprove');

                Route::resource('sections', 'SectionsController');
                Route::resource('subscriptions', 'SubscriptionController');
                Route::get('paid-log', 'SubscriptionController@paidLog')->name('paid');

                Route::resource('products', 'ProductsController');
                Route::resource('notifications', 'NotificationController')->middleware('AdminApprove');

                Route::group(['prefix' => 'profile'], function () {
                    Route::get('/', 'ProfileController@Profile')->name('profile.show');
                    Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
                    Route::put('update', 'ProfileController@updateProfile')->name('update.profile');
                });

                Route::group(['prefix' => 'setting'], function () {
                    Route::get('/general', 'SettingController@general')->name('setting.general');
                    Route::get('/', 'SettingController@setting')->name('setting.get');
                    Route::post('/', 'SettingController@settingPost')->name('setting.post');
                });
            });
            // -----------------------

        });
    }
);
