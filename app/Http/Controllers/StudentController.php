<?php

namespace App\Http\Controllers;

use App\Models\DetailStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $students = DB::table('students')
                ->join('detail_students', 'students.id', '=', 'detail_students.id_student')
                ->select('students.npm', 'students.name', 'students.kelas', 'detail_students.jurusan', 'detail_students.asal_sekolah')
                ->get();
            return view('student.index', compact('students'))->with('i', ($request->input('page', 1) - 1) * 5);;
        } else {
            return abort(404);
        }
    }

    public function create()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('student.create');
        } else {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $student = new Student();
            $detailStudent = new DetailStudent();

            $dataStudent = $request->validate([
                'npm' => ['required', 'string'],
                'name' => ['required', 'string'],
                'kelas' => ['required', 'string'],
            ]);

            $studentCreated = $student::create($dataStudent);

            $dataDetailStudent = $request->validate([
                'jurusan' => ['required', 'string'],
                'asal_sekolah' => ['required', 'string'],
            ]);

            $dataDetailStudent['id_student'] = $studentCreated->id;

            $detailStudent::create($dataDetailStudent);

            return redirect('student');
        } else {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($npm)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $student = Student::where('npm', $npm)->first();

            $detailStudent = DetailStudent::where('id_student', $student->id)->first();

            $joinStudent = [
                'npm' => $student->npm,
                'name' => $student->name,
                'kelas' => $student->kelas,
                'jurusan' => $detailStudent->jurusan,
                'asal_sekolah' => $detailStudent->asal_sekolah,
            ];

            return view('student.edit', compact('joinStudent'));
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $npm)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $student = new Student();
            $detailStudent = new DetailStudent();

            $dataStudent = $request->validate([
                'npm' => ['required', 'string'],
                'name' => ['required', 'string'],
                'kelas' => ['required', 'string'],
            ]);

            $dataDetailStaff = $request->validate([
                'jurusan' => ['required', 'string'],
                'asal_sekolah' => ['required', 'string'],
            ]);

            $studentGeted = $student::where('npm', $npm)->first();
            $studentGeted->update($dataStudent);

            $detailStudentGeted = $detailStudent::where('id_student', $studentGeted->id)->first();
            $detailStudentGeted->update($dataDetailStaff);

            return redirect('student');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($npm)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $student = Student::where('npm', $npm)->first();
            $student->delete();

            return redirect('student');
        } else {
            return abort(404);
        }
    }
}
