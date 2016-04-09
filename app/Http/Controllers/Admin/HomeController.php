<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Teacher;
use App\Student;
use App\Section;
use App\Department;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class HomeController, this class contains all the methods
 * for admin tasks like creating a new {teacher, library
 * staff, hostel staff, admin staff} account, adding
 * new {department, section} and other tasks.
 *
 * @package App\Http\Controllers\Admin
 */
class HomeController extends Controller
{
    // Admin views
    // #TODO make list other views here
    protected $courseManagementView = 'admin.manage.courses';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the teacher registration form
     * and currently registered teachers
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageTeachers()
    {
        $teacherArr = Teacher::all();
        $departmentArr = Department::all();
        return view('teacher.auth.register',
            ['teachers' => $teacherArr, 'count' => 0, 'departments' => $departmentArr]);
    }

    /**
     * Remove a teacher
     *
     * @param $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function removeTeacher($id)
    {
        if ($id != null)
        {
            Teacher::destroy($id);
        }

        return redirect('admins/manage/teachers');
    }

    /**
     * Show the currently registered students
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageStudents()
    {
        $studentArr = Student::all();
        return view('admin.manage.students', ['students' => $studentArr, 'count' => 0]);
    }

    /**
     * Manually verify a student
     *
     * @param $rollNo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyStudent ($rollNo)
    {
        if($rollNo != null)
        {
            $student = Student::find($rollNo);
            $student->verified = true;
            $student->save();
        }

        return redirect('admins/manage/students');
    }

    /**
     * Remove a student
     *
     * @param $rollNo
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function removeStudent($rollNo)
    {
        if ($rollNo != null)
        {
            Student::destroy($rollNo);
        }

        return redirect('admins/manage/students');
    }

    /**
     * Show the departments currently present in the database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageDepartments()
    {
        $departmentArr = Department::all();
        return view('admin.manage.departments', ['departments' => $departmentArr, 'count' => 0]);
    }

    /**
     * Add a department
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addDepartment (Request $request)
    {
        $dCode = $request['dCode'];
        $dName = $request['dName'];

        Department::create(['dCode' => $dCode, 'dName' => $dName]);

        return redirect()->back()
            ->with('status', 'Success');
    }

    /**
     * Remove a deparement
     *
     * @param $dCode
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeDepartment ($dCode)
    {
        if($dCode != null)
        {
            Department::destroy($dCode);
        }

        return redirect()->back();
    }

    /**
     * Show the sections currently present in the database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageSections()
    {
        $sectionArr = Section::all();
        $departmentArr = Department::all();

        return view('admin.manage.sections',
            ['sections' => $sectionArr, 'count' => 0, 'departments' => $departmentArr]);
    }

    /**
     * Add a section
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addSection (Request $request)
    {
        $sectionId = $request['sectionId'];
        $dCode = $request['dCode'];

        Section::create(['sectionId' => $sectionId, 'dCode' => $dCode]);

        return redirect()->back()
            ->with('status', 'Success');
    }

    /**
     * Remove a section
     *
     * @param $sectionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeSection ($sectionId)
    {
        if($sectionId != null)
        {
            Section::destroy($sectionId);
        }

        return redirect()->back();
    }

    /**
     * Show courses currently present in database
     *
     * @return mixed
     */
    public function manageCourses ()
    {
        // Get the list of courses
        $courses = Course::all();
        
        // Get the list of departments
        $departments = Department::all();

        return view($this->courseManagementView, ['courses' => $courses,'departments' => $departments, 'count' => 0]);
    }

    /**
     * Add a new course
     *
     * @param Request $request
     * @return mixed
     */
    public function addCourse (Request $request)
    {
        $this->validate($request, [
            'courseCode' => 'required|unique:courses',
            'courseName' => 'required',
        ]);

        $course = [
            'courseCode' => $request['courseCode'],
            'dCode' => $request['dCode'],
            'courseName' => $request['courseName'],
        ];

        // Save the course
        Course::create($course);

        return redirect()->back()
            ->with('status', 'success');
    }

    public function removeCourse (Request $request)
    {
        $courseCode = $request['courseCode'];

        // Remove the course
        Course::destroy($courseCode);

        return redirect()->back();
    }
}

