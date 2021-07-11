<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $dosens = Dosen::all();
            return view('dosen.index', compact('dosens'))->with('i', ($request->input('page', 1) - 1) * 5);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('dosen.create');
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
            $dosen = new Dosen();

            $validatedData = $request->validate([
                'nidin' => ['required', 'string'],
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'mata_kuliah' => ['required', 'string'],
            ]);
            $inputs = $validatedData;

            $dosen::create($inputs);

            return redirect('dosen');
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
    public function edit($id)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $dosen = Dosen::find($id);
            return view('dosen.edit', compact('dosen'));
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
    public function update(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $dosen = new Dosen();

            $validatedData = $request->validate([
                'nidin' => ['required', 'string'],
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'mata_kuliah' => ['required', 'string'],
            ]);
            $inputs = $validatedData;

            $dosen::find($id)->update($inputs);

            return redirect('dosen');
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
    public function destroy($id)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $dosen = Dosen::find($id);
            $dosen->delete();

            return redirect('dosen');
        } else {
            return abort(404);
        }
    }
}
