<?php

namespace App\Http\Controllers;

use App\Models\Classes; // Model của bảng classes
use App\Models\Student;   // Model của bảng students
use Illuminate\Http\Request;

class ClassStudentController extends Controller
{
    public function index()
    {
        // Lấy tất cả các lớp học và sinh viên
        $classes = Classes::all();
        $students = Student::all();

        // Trả về view và truyền dữ liệu vào
        return view('class_student.index', compact('classes', 'students'));
    }
}
