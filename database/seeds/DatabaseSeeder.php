<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder, this class is
 * used to seed the database with the
 * data for testing purposes.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the departments table
        $deptArr = [
            'CSED' => 'Department of Computer Science & Engineering',
            'ECED' => 'Department of Electronics & Communication Engineering',
            'CED' => 'Department of Civil Engineering',
            'EED' => 'Department of Electrical & Electronics Engineering',
            'MED' => 'Department of Mechanical Engineering',
            'CHED' => 'Department of Chemical Engineering',
            'ARD' => 'Department of Architecture',
        ];

        foreach($deptArr as $dCode => $dName)
        {
            if(DB::table('departments')->where('dCode', $dCode)->value('dCode') == null)
            {
                DB::table('departments')->insert([
                    'dCode' => $dCode,
                    'dName' => $dName,
                ]);
            }
        }

        // Seed the semester table
        for($semNo = 1; $semNo <= 10; $semNo++)
        {
            if(DB::table('semesters')->where('semNo', $semNo)->value('semNo') == null)
            {
                DB::table('semesters')->insert(['semNo' => $semNo]);
            }
        }

        // Seed the sections table
        // #TODO add more sections
        $sectArr = [
            'E1' => 'CSED',
            'E2' => 'CSED',
        ];

        foreach($sectArr as $sectionId => $dCode)
        {
            if(DB::table('sections')->where('sectionId', $sectionId)->value('sectionId') == null)
            {
                DB::table('sections')->insert([
                    'sectionId' => $sectionId,
                    'dCode' => $dCode,
                ]);
            }
        }

        // Seed the admins table
        $adminId = 'admin';
        $password = bcrypt('password');

        if(DB::table('admins')->where('adminId', $adminId)->value('adminId') == null)
        {
            DB::table('admins')->insert([
                'adminId' => $adminId,
                'password' => $password,
            ]);
        }

        // Seed the teachers table
        $facultyId = 't1';
        $dCode = 'CSED';
        $name = 'Teacher 1';
        $email = 't1@ex.com';
        $office = 'CSED';
        $phoneNo = '1234567890';
        $password = bcrypt('password');

        if(DB::table('teachers')->where('facultyId', $facultyId)->value('facultyId') == null)
        {
            DB::table('teachers')->insert([
                'facultyId' => $facultyId,
                'dCode' => $dCode,
                'name' => $name,
                'email' => $email,
                'office' => $office,
                'phoneNo' => $phoneNo,
                'password' => $password,
                'firstLogin' => true,
            ]);
        }

        // Seed the days table
        $dayArr = [
            'SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY',
            'THURSDAY', 'FRIDAY', 'SATURDAY',
        ];

        foreach($dayArr as $day)
        {
            if(DB::table('days')->where('day', $day)->value('day') == null)
            {
                DB::table('days')->insert([
                    'day' => $day,
                ]);
            }
        }
        
        // Seed the courses table
        $courseArr = [
            'CS-100' => ['dCode' => 'CSED', 'courseName' => 'C programming'],
        ];

        foreach($courseArr as $courseCode => $detail)
        {
            if(DB::table('courses')->where('courseCode', $courseCode)->value('courseCode') == null)
            {
                DB::table('courses')->insert([
                    'courseCode' => $courseCode,
                    'dCode' => $detail['dCode'],
                    'courseName' => $detail['courseName'],
                ]);
            }
        }

        // Seed the teaching details table
        $teachingDetails = [
            'CS-100' => 't1',
        ];

        foreach($teachingDetails as $courseCode => $facultyId)
        {
            if(DB::table('teachingDetails')->where('courseCode', $courseCode)->value('courseCode') == null)
            {
                DB::table('teachingDetails')->insert([
                    'courseCode' => $courseCode,
                    'facultyId' => $facultyId,
                ]);
            }
        }

    }
}
