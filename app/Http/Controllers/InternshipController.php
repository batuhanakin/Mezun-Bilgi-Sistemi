<?php

namespace App\Http\Controllers;

use App\internship;
use App\Mail\internshipSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InternshipController extends Controller
{
    public function send_mail(internship $internship):void {
        Mail::to(\auth()->user()->admin?$internship->user->email:config("mail.username"), config("app.name"))
                ->send(new internshipSaved($internship, \auth()->user()));

    }

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
        $internship=internship::create($request->all()+["user_id"=>auth()->id()]);
        $this->send_mail($internship);
        return redirect()->route("user.show",\auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(internship $internship)
    {
        abort_unless($internship->aktif || (Auth::check() && (auth()->user()->admin || $internship->user_id==auth()->user()->id)),404);
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
        abort_unless(($internship->user_id==auth()->id() && $internship->aktif) || auth()->user()->admin,401);
        $validatedData = $request->validate([
            'sirket' => 'required',
            'aciklama' => 'required',
            'baslik' => 'required',
        ]);
        $aktif_miydi=$internship->aktif;
        $success=$internship->update(
            auth()->user()->admin?$request->all():$request->except("aktif")+["aktif"=>0]
        );
        if($success && (\auth()->user()->admin==0 || ($internship->aktif && $aktif_miydi==0))) $this->send_mail($internship);
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
        abort_unless(($internship->user_id==auth()->id() && $internship->aktif) || auth()->user()->admin,401);
        $internship->delete();
        return redirect()->back();
    }
}
