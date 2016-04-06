<?php

namespace App\Http\Controllers\Student;

use App\StudentImage;
use App\StudentQuery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

/**
 * Class HomeController, this class contains
 * all the methods for student tasks like
 * semester registration, profile update
 * and all others that are left
 *
 * @package App\Http\Controllers\Student
 */
class HomeController extends Controller
{
    // Student views
    protected $performanceView = 'student.performance';
    protected $attendanceView = 'student.attendance';
    protected $queryView = 'student.query';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('verify:student');
        $this->middleware('noImage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the student info
        $student = Auth::guard('student')->user();
        $department = $student->department->dName;

        return view('student.home', ['student' => $student, 'department' => $department]);
    }

    /**
     * Show student performance
     *
     * @return mixed
     */
    public function showStudentPerformance()
    {
        // Get the academic records of student
        $academicRecords = Auth::guard('student')->user()->academicRecords;

        return view($this->performanceView, ['academicRecords' => $academicRecords]);
    }

    /**
     * Show student attendance
     *
     * @return mixed
     */
    public function showStudentAttendance ()
    {
        // Get the academic records of student
        $academicRecords = Auth::guard('student')->user()->academicRecords;

        return view($this->attendanceView, ['academicRecords' => $academicRecords]);
    }

    /**
     * Show student queries
     *
     * @return mixed
     */
    public function showStudentQueries ()
    {
        // Get the student queries
        $queries = StudentQuery::where(['rollNo' => Auth::guard('student')->user()->rollNo])->get();

        // Get the courses in which student is enrolled
        $academicRecords = Auth::guard('student')->user()->academicRecords;

        return view($this->queryView, ['queries' => $queries, 'academicRecords' => $academicRecords, 'count' => 0]);
    }

    /**
     * Add a student query
     *
     * @param Request $request
     * @return mixed
     */
    public function addStudentQuery (Request $request)
    {
        $this->validate($request, [
            'courseCode' => 'unique:studentQueries',
            'description' => 'required|max:1000',
        ], [
            'unique' => 'You can only ask one doubt per course at a time',
        ]);
        
        $query = [
            'rollNo' => Auth::guard('student')->user()->rollNo,
            'courseCode' => $request['courseCode'],
            'description' => $request['description'],
        ];

        // Add the query to database
        StudentQuery::create($query);

        return redirect()->back();
    }
    /**
     * Return the image of the student.
     *
     * @return mixed
     */
    public function getImage ()
    {
        $rollNo = Auth::guard('student')->user()->rollNo;

        // Get the student image and return
        // it as http response
        $imageEntry = StudentImage::find($rollNo);
        
        if($imageEntry != null)
        {
            $imagePath = $imageEntry->imagePath;
        }
        else
        {
            $imagePath = env('IMAGE_DIR') . 'circle.png';
        }

        $image = Image::make($imagePath);

        return $image->response();
    } 
}
