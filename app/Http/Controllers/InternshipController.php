<?php

namespace App\Http\Controllers;

use App\internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("internship.create_edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sirket' => 'required',
            'aciklama' => 'required',
            'baslik' => 'required',
        ]);
        internship::create($request->all()+["user_id"=>auth()->id()]);
        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(internship $internship)
    {
        abort_unless($internship->aktif || (Auth::check() && auth()->user()->admin),404);
        return view("internship.show",compact('internship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function edit(internship $internship)
    {
        abort_unless($internship->user_id==auth()->id() || auth()->user()->admin,401);
        return view("internship.create_edit",compact('internship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, internship $internship)
    {
        abort_unless($internship->user_id==auth()->id() || auth()->user()->admin,401);
        $validatedData = $request->validate([
            'sirket' => 'required',
            'aciklama' => 'required',
            'baslik' => 'required',
        ]);
        $success=$internship->update(
            auth()->user()->admin?$request->all():$request->except("aktif")+["aktif"=>0]
        );
        return redirect()->back()->with($success?["success"=>true]:["error"=>true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(internship $internship)
    {
        abort_unless($internship->user_id==auth()->id() || auth()->user()->admin,401);
        $internship->delete();
        return redirect()->back();
    }
}
