<?php

namespace App\Http\Controllers\Teacher;

use Validator;
use App\Course;
use App\Assignment;
use App\StudentQuery;
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
    protected $studentQueryView = 'teacher.studentQueries';
    protected $assignmentListView = 'teacher.assignmentList';
    protected $assignmentAddView = 'teacher.assignmentAdd';
    protected $assignmentView = 'teacher.assignment';

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
        $teacherCourseCodes = [];
        foreach ($teacherCourses as $teacherCourse)
        {
            array_push($teacherCourseCodes, $teacherCourse->courseCode);
        }

        // Get a list of all courses
        $courses = Course::where('dCode', Auth::guard('teacher')->user()->dCode)
            ->whereNotIn('courseCode', $teacherCourseCodes)
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
            'rollNo' => 'required|exists:students|regex:/[0-9]{2}M?[0-9]{3}/|
                        unique:academicRecords,rollNo,NULL,id,courseCode,' . $courseCode,
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

    /**
     * Update a student record
     *
     * @param Request $request
     * @return mixed
     */
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

    /**
     * Show student queries
     *
     * @param $courseCode
     * @return mixed
     */
    public function showStudentQueries ($courseCode)
    {
        // Get a list of student queries for
        // courses taught by teacher
        $queries = StudentQuery::where('courseCode', $courseCode)->get();

        return view($this->studentQueryView, ['queries' => $queries, 'count' => 0, 'courseCode' => $courseCode]);
    }

    /**
     * Resolve a student query
     *
     * @param Request $request
     * @return mixed
     */
    public function resolveStudentQuery (Request $request)
    {
        $rollNo = $request['rollNo'];
        $courseCode = $request['courseCode'];
        $created_at = $request['created_at'];
        $response = $request['response'];

        // Resolve the query
        StudentQuery::where(['rollNo' => $rollNo, 'courseCode' => $courseCode, 'created_at' => $created_at])
            ->update(['response' => $response]);

        return redirect()->back();
    }

    //------------------------------------------------------------------------------------------------------------------
    // Assignment management functions

    /**
     * Show assignment list
     *
     * @return mixed
     */
    public function showAssignmentList ()
    {
        // Get the teaching details
        $courses = Auth::guard('teacher')->user()->teachingDetails;

        return view($this->assignmentListView, ['courses' => $courses]);
    }

    /**
     * Show an assignment
     *
     * @param $courseCode
     * @param $number
     * @return mixed
     */
    public function showAssignment ($courseCode, $number)
    {
        // Get the assignmets
        $assignments = Assignment::where(['courseCode' => $courseCode, 'number' => $number])->get();

        return view($this->assignmentView, ['assignments' => $assignments]);
    }

    /**
     * Show assignment addition view
     *
     * @return mixed
     */
    public function showAddAssignment ()
    {
        // Get the teaching details
        $courses = Auth::guard('teacher')->user()->teachingDetails;

        return view($this->assignmentAddView, ['courses' => $courses]);
    }

    /**
     * Add an assignment
     *
     * @param Request $request
     * @return mixed
     */
    public function addAssignment (Request $request)
    {
        // Validate the data
        $validator = Validator::make($request->all(), [
            'number' => 'numeric|required|min:0|unique:assignments,number,NULL,id,courseCode,' . $request['courseCode'],
            'title' => 'required|max:255',
            'description' => 'required',
        ], [
            'unique' => 'This assignment number already exists. Please choose a different number'
        ]);

        if ($validator->fails())
        {
            return redirect('/teachers/assignments/add')
                ->withErrors($validator)
                ->withInput();
        }
        
        $assignment = [
            'courseCode' => $request['courseCode'],
            'number' => $request['number'],
            'title' => $request['title'] ,
            'description' => $request['description'],
            'dueDate' => $request['dueDate'],
        ];

        // Save the assignment into db
        Assignment::create($assignment);

        return redirect('/teachers/assignments');
    }
}
