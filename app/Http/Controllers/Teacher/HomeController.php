<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController, this class contains
 * all the methods for teacher tasks like
 * semester registration, profile update
 * and all others that are left
 *
 * @package App\Http\Controllers\Teacher
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
        $this->middleware('firstLogin:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the teacher info
        $teacher = Auth::guard('teacher')->user();
        $department = $teacher->department->dName;

        return view('teacher.home', ['teacher' => $teacher, 'department' => $department]);
    }
}
