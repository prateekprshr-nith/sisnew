<?php

/*
 * This file contains all the routes for the application.
 */

Route::group(['middleware' => 'web'], function ()
{
    // Landing page
    Route::get('/', function ()
    {
        return view('welcome');
    })->middleware('home');


    // Student route group
    Route::group(['prefix' => '/students'], function ()
    {
        // Student auth routes
        Route::get('login', 'Student\Auth\AuthController@showLoginForm')->middleware('home');
        Route::post('login', 'Student\Auth\AuthController@login');
        Route::get('logout', 'Student\Auth\AuthController@logout');
        Route::post('password/email', 'Student\Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Student\Auth\PasswordController@reset');
        Route::get('password/reset/{token?}', 'Student\Auth\PasswordController@showResetForm')->middleware('home');
        Route::post('register', 'Student\Auth\AuthController@register');
        Route::get('register', 'Student\Auth\AuthController@showRegistrationForm')->middleware('home');
        Route::get('verify', 'Student\Auth\VerificationController@showVerificationForm')->middleware('verified:student');
        Route::post('verify', 'Student\Auth\VerificationController@verifyUserAccount');
        Route::get('verify/sendVerificationMail', 'Student\Auth\VerificationController@sendVerifiactionMail')->middleware('verified:student');

        // Student info update routes
        Route::get('/updateInfo', 'Student\InformationUpdateController@showUpdateInfoForm');
        Route::patch('/updateInfo/info', 'Student\InformationUpdateController@updateInfo');
        Route::patch('/updateInfo/password', 'Student\InformationUpdateController@updatePassword');
        Route::get('updateInfo/image', 'Student\InformationUpdateController@showImageUploadForm')->middleware('hasImage');
        Route::patch('/updateInfo/image', 'Student\InformationUpdateController@updateImage');
        Route::get('updateInfo/image/skip', 'Student\InformationUpdateController@setImageUploadSkipSession')->middleware('hasImage');

        // Student view routes
        Route::get('home', 'Student\HomeController@index');
        Route::get('performance', 'Student\HomeController@showStudentPerformance');
        Route::get('attendance', 'Student\HomeController@showStudentAttendance');

        // Student image route, fetches the image of student
        Route::get('image', 'Student\HomeController@getImage');

    });


    // Teacher route group
    Route::group(['prefix' => '/teachers'], function ()
    {
        // Teacher auth routes
        Route::get('login', 'Teacher\Auth\AuthController@showLoginForm')->middleware('home');
        Route::post('login', 'Teacher\Auth\AuthController@login');
        Route::get('logout', 'Teacher\Auth\AuthController@logout');
        Route::post('password/email', 'Teacher\Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Teacher\Auth\PasswordController@reset');
        Route::get('password/reset/{token?}', 'Teacher\Auth\PasswordController@showResetForm')->middleware('home');
        Route::post('register', 'Teacher\Auth\AuthController@register');
        Route::get('firstLogin', 'Teacher\Auth\FirstLoginController@showPasswordUpdateForm')->middleware('normalLogin:teacher');
        Route::put('firstLogin', 'Teacher\Auth\FirstLoginController@updatePassword');

        // Teacher info update routes
        Route::get('/updateInfo', 'Teacher\InformationUpdateController@showUpdateInfoForm');
        Route::patch('/updateInfo/info', 'Teacher\InformationUpdateController@updateInfo');
        Route::patch('/updateInfo/password', 'Teacher\InformationUpdateController@updatePassword');

        // Teacher course management routes
        Route::get('courses', 'Teacher\AcademicsController@showCourseManagementView');
        Route::put('/courses/addCourse', 'Teacher\AcademicsController@addTeacherCourse');
        Route::patch('/courses/updateLectures', 'Teacher\AcademicsController@updateLectures');
        Route::delete('/courses/removeCourse', 'Teacher\AcademicsController@removeTeacherCourse');

        // Teacher student record management routes
        Route::get('studentRecords', 'Teacher\AcademicsController@showTeacherCourses');
        Route::get('studentRecords/{courseCode}', 'Teacher\AcademicsController@showStudentRecords');
        Route::put('/studentRecords/{courseCode}/addStudentRecord', 'Teacher\AcademicsController@addStudentRecord');
        Route::patch('/studentRecords/{courseCode}/updateStudentRecord', 'Teacher\AcademicsController@updateStudentRecord');

        // Manual registration is disabled
        // Route::get('register', 'Teacher\Auth\AuthController@showRegistrationForm');

        // Teacher view routes
        Route::get('home', 'Teacher\HomeController@index');

    });

    // Admin route group
    Route::group(['prefix' => '/admins'], function ()
    {
        // Admin auth routes
        Route::get('login', 'Admin\Auth\AuthController@showLoginForm')->middleware(['home', 'adminIp']);
        Route::post('login', 'Admin\Auth\AuthController@login');
        Route::get('logout', 'Admin\Auth\AuthController@logout');

        // Admin info update routes
        Route::get('/updateInfo', 'Admin\InformationUpdateController@showUpdateInfoForm');
        Route::patch('/updateInfo', 'Admin\InformationUpdateController@updateInfo');

        /*
         * Registration and password reset routes have not been
         * added for the admin.Password of admin should be
         * manually resetted from the database itself.
         */

        // Admin view routes
        Route::get('home', 'Admin\HomeController@index');
        Route::group(['prefix' => 'manage'], function ()
        {
            // User account creation and deletion routes
            Route::get('teachers', 'Admin\HomeController@manageTeachers');
            Route::delete('teachers/{id?}', 'Admin\HomeController@removeTeacher');
            Route::get('students', 'Admin\HomeController@manageStudents');
            Route::put('students/{rollNo?}', 'Admin\HomeController@verifyStudent');
            Route::delete('students/{rollNo?}', 'Admin\HomeController@removeStudent');

            // Department management routes
            Route::get('departments', 'Admin\HomeController@manageDepartments');
            Route::put('departments', 'Admin\HomeController@addDepartment');
            Route::delete('departments/{dCode?}', 'Admin\HomeController@removeDepartment');

            // Section management routes
            Route::get('sections', 'Admin\HomeController@manageSections');
            Route::put('sections', 'Admin\HomeController@addSection');
            Route::delete('sections/{sectionId?}', 'Admin\HomeController@removeSection');
        });
    });
});
