<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\TeachingDetail;
use App\AcademicRecord;
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

    // Student record management views
    protected $courseSelectionView = 'teacher.courseSelection';
    protected $studentRecordsView = 'teacher.studentRecords';

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

    //------------------------------------------------------------------------------------------------------------------
    // Course management functions

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

    //------------------------------------------------------------------------------------------------------------------
    // Student record management functions

    /**
     * Show course list that a teacher is teaching
     *
     * @return mixed
     */
    public function showTeacherCourses()
    {
        // Get the courses teacher is teaching
        $teacherCourses = Auth::guard('teacher')->user()->teachingDetails;

        return view($this->courseSelectionView, ['teacherCourses' => $teacherCourses]);
    }

    /**
     * Show student records
     *
     * @param $courseCode
     * @return mixed
     */
    public function showStudentRecords ($courseCode)
    {
        // Get the student record
        $students = AcademicRecord::where('courseCode', $courseCode)->get();

        return view($this->studentRecordsView, ['students' => $students, 'courseCode' => $courseCode, 'count' => 0]);
    }

    /**
     * Add a new student record
     *
     * @param Request $request
     * @return mixed
     */
    public function addStudentRecord (Request $request)
    {
        $rollNo = $request['rollNo'];
        $courseCode = $request['courseCode'];

        $this->validate($request, [
            'rollNo' => 'required|exists:students|regex:/[0-9]{2}M?[0-9]{3}/|unique:academicRecords,rollNo',
        ], [
            'exists' => 'This student has not registered or the roll no is invalid'
        ]);

        // Save the student record
        AcademicRecord::create([
            'rollNo' => $rollNo,
            'courseCode' => $courseCode,
        ]);

        return redirect()->back();
    }

    public function updateStudentRecord (Request $request)
    {
        $this->validate($request, [
            'attendance' => 'numeric|min:0',
            'periodicalMarks' => 'numeric|min:0',
            'asnMarks' => 'numeric|min:0',
            'finalMarks' => 'numeric|min:0',
        ]);

        $studentRecord = [
            'attendance' => $request['attendance']  == null ? null : $request['attendance'],
            'periodicalMarks' => $request['periodicalMarks'] == null ? null : $request['periodicalMarks'],
            'asnMarks' => $request['asnMarks'] == null ? null : $request['asnMarks'],
            'finalMarks' => $request['finalMarks']  == null ? null : $request['finalMarks'],
        ];

        // Update the record
        AcademicRecord::where(['rollNo' => $request['rollNo'], 'courseCode' => $request['courseCode']])
            ->update($studentRecord);

        return redirect()->back();
    }
}
