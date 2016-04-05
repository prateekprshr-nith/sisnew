<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
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
    public function showCourseManagementView ()
    {
        // Get the courses teacher is teaching
        $teacherCourses = Auth::guard('teacher')->user()->teachingDetails;

        // Get a list of all courses
        $courses = Course::where('dCode', Auth::guard('teacher')->user()->dCode)
            ->whereNotIn('courseCode', $teacherCourses)
            ->get();

        return view($this->courseView, ['teacherCourses' => $teacherCourses, 'courses' => $courses]);
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
     * Add a course that teacher is teaching
     *
     * @param Request $request
     * @return mixed
     */
    public function addTeacherCourse (Request $request)
    {
        $facultyId = Auth::guard('teacher')->user()->facultyId;
        $courseCode = $request['courseCode'];
        $lecturesHeld = 0;

        // Add the course
        TeachingDetail::create([
            'facultyId' => $facultyId,
            'courseCode' => $courseCode,
            'lecturesHeld' => $lecturesHeld,
        ]);

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
