<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;

class StudentService
{ 
    public function create($data)
    {
        return Student::create($data);
    }

    public function update($student, $data)
    {
        return $student->update($data);
    }

    public function subjectCreate($data, $student_id)
    {
        foreach ($data['subject'] as $key => $value) {
            $subject = new Subject();
            $subject->name = $value['name'];
            $subject->marks = $value['mark'];
            $subject->grade = $value['grade'];
            $subject->student_id = $student_id;
            $subject->save();
        }
    }

    public function subjectEdit($data, $student_id)
    {
        foreach ($data['subject'] as $key => $value) { 
            $subject = Subject::where('name', $key)->where('student_id', $student_id)->first();
            $subject->update([
                'name' => $value['name'],
                'marks' => $value['mark'],
                'grade' => $value['grade'],
            ]);
        }
    }
}