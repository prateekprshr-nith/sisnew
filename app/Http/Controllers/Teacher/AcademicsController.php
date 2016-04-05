<?php

namespace App\Http\Controllers\Teacher;

use App\TeachingDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AcademicsController, this class handles
 * all the functions related to the teaching
 * work of the teacher, like updation and
 * viewing of a course being taught and
 * updation/viewing of student record
 *
 * @package App\Http\Controllers\Teacher
 */
class AcademicsController extends Controller
{
    // Course view
    protected $courseView = 'teacher.courses';

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
     * Show courses currently taught by teacher
     *
     * @return mixed
     */
    public function showTeacherCourses ()
    {
        // Get the courses teacher is teaching
        $courses = Auth::guard('teacher')->user()->teachingDetails;

        return view($this->courseView, ['courses' => $courses]);
    }

    /**
     * Update the lectures
     *
     * @param Request $request
     * @return mixed
     */
    public function updateLectures(Request $request)
    {
        $this->validate($request, [
            'lecturesHeld' => 'numeric|min:0|required'
        ]);

        $courseCode = $request['courseCode'];
        $lecturesHeld = $request['lecturesHeld'];

        // Update the lectures
        TeachingDetail::where('courseCode', $courseCode)
            ->update(['lecturesHeld' => $lecturesHeld]);

        return redirect()->back();
    }

    /**
     * Remove a course that teacher is teaching
     *
     * @param Request $request
     * @return mixed
     */
    public function removeTeacherCourse (Request $request)
    {
        $courseCode = $request['courseCode'];

        // Remove the course
        TeachingDetail::destroy($courseCode);

        return redirect()->back();
    }
}
