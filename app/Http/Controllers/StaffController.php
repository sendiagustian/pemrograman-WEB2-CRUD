<?php

namespace App\Http\Controllers;

use App\Models\DetailStaff;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $staffs = DB::table('staffs')
                ->join('detail_staffs', 'staffs.id', '=', 'detail_staffs.id_staff')
                ->select('staffs.nik', 'staffs.name', 'detail_staffs.jabatan', 'detail_staffs.gaji_pokok')
                ->get();
            return view('staff.index', compact('staffs'))->with('i', ($request->input('page', 1) - 1) * 5);
        } else {
            return abort(404);
        }
    }


    public function create()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('staff.create');
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
            $staff = new Staff();
            $detailStaff = new DetailStaff();

            $dataStaff = $request->validate([
                'nik' => ['required', 'string'],
                'name' => ['required', 'string'],
            ]);

            $dataDetailStaff = $request->validate([
                'jabatan' => ['required', 'string'],
                'gaji_pokok' => ['required', 'integer'],
            ]);

            $staffCreated = $staff::create($dataStaff);

            $dataDetailStaff['id_staff'] = $staffCreated->id;

            $detailStaff::create($dataDetailStaff);

            return redirect('staff');
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
    public function edit($nik)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $staff = Staff::where('nik', $nik)->first();
            $detailStaff = DetailStaff::where('id_staff', $staff->id)->first();

            $joinStaff = [
                'nik' => $staff->nik,
                'name' => $staff->name,
                'jabatan' => $detailStaff->jabatan,
                'gaji_pokok' => $detailStaff->gaji_pokok,
            ];

            return view('staff.edit', compact('joinStaff'));
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
    public function update(Request $request, $nik)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $staff = new Staff();
            $detailStaff = new DetailStaff();

            $dataStaff = $request->validate([
                'nik' => ['required', 'string'],
                'name' => ['required', 'string'],
            ]);

            $dataDetailStaff = $request->validate([
                'jabatan' => ['required', 'string'],
                'gaji_pokok' => ['required', 'integer'],
            ]);

            $staffGeted = $staff::where('nik', $nik)->first();
            $staffGeted->update($dataStaff);

            $detailStaffGeted = $detailStaff::where('id_staff', $staffGeted->id)->first();
            $detailStaffGeted->update($dataDetailStaff);

            return redirect('staff');
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
    public function destroy($nik)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $dosen = Staff::where('nik', $nik)->first();
            $dosen->delete();

            return redirect('staff');
        } else {
            return abort(404);
        }
    }
}
