<?php

namespace App\Http\Controllers;

use App\Models\Student;
// use Illuminate\Http\Request;
use App\Http\Requests\StudentCreateRequest;
use App\Services\StudentService;


class StudentController extends Controller
{
    /**
     * Service for the controller.
     *
     * @var StudentService
     */
    protected $service;

    /**
     * UserController constructor.
     *
     * @param StudentService $service
     */
    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('subjects')->get();
        return view('students.index')->with([ 'students' => $students ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StudentCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        $validated = $request->validated();
        $studentName = $validated['name'];
        $student = $this->service->create($validated);
        $subject = $this->service->subjectCreate($request->all(), $student->id);
        $message = sprintf('The Student "%s" has been created successfully', $studentName);
        return redirect(route('student.index'))->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student, 'subjects' => $student->subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentCreateRequest $request, Student $student)
    {
        $validated = $request->validated();
        $student_id = $student->id;
        $studentName = $validated['name'];
        $student = $this->service->update($student, $validated);
        $subject = $this->service->subjectEdit($request->all(), $student_id);
        $message = sprintf('The Student "%s" has been updated successfully', $studentName);
        return redirect(route('student.index'))->with('success', $message);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        $message = sprintf('The Student "%s" has been deleted successfully', $student->name);
        return redirect(route('student.index'))->with('success', $message);
    }
}
