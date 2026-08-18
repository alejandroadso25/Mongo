<?php

namespace App\Http\Controllers;

use App\Models\CourseTeacher;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = CourseTeacher::with(['course', 'teacher']);
        
        if (!empty($search)) {
            $query->whereHas('course', function ($q) use ($search) {
                $q->where('course_number', 'like', "%{$search}%");
            })
            ->orWhereHas('teacher', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $courseTeachers = $query->get();
        
        return view('CourseTeacher.index', compact('courseTeachers', 'search'));
    }

    public function show(CourseTeacher $courseTeacher)
    {
        $courseTeacher->load(['course', 'teacher']);
        return view('CourseTeacher.show', compact('courseTeacher'));
    }

    public function create()
    {
        $courses = Course::with('area')->get();
        $teachers = Teacher::with('area')->get();
        return view('CourseTeacher.create', compact('courses', 'teachers'));
    }

    public function store(Request $request)
    {
        CourseTeacher::create($request->all());
        return redirect()->route('course-teachers.index')->with('success', 'Asignación creada correctamente');
    }

    public function edit(CourseTeacher $courseTeacher)
    {
        $courses = Course::with('area')->get();
        $teachers = Teacher::with('area')->get();
        return view('CourseTeacher.edit', compact('courseTeacher', 'courses', 'teachers'));
    }

    public function update(Request $request, CourseTeacher $courseTeacher)
    {
        $courseTeacher->update($request->all());
        return redirect()->route('course-teachers.show', $courseTeacher->id)->with('success', 'Asignación actualizada correctamente');
    }

    public function destroy(CourseTeacher $courseTeacher)
    {
        $courseTeacher->delete();
        return redirect()->route('course-teachers.index')->with('success', 'Asignación eliminada correctamente');
    }
}