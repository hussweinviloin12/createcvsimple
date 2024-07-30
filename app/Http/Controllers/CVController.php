<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CV;
use Barryvdh\DomPDF\PDF;

class CVController extends Controller
{
    //

    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $cv = new CV();
        $cv->name = $request->name;
        $cv->email = $request->email;
        $cv->phone = $request->phone;
        $cv->address = $request->address;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->save();

        return redirect()->route('cv.show', $cv->id);
    }

    public function show($id)
    {
        $cv = CV::find($id);
        return view('cv.show', compact('cv'));
    }
}
