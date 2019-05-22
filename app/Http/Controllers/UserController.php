<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user){
        abort_unless(auth()->id()==$user->id || auth()->user()->admin,401);
        return view("user.edit",compact("user"));
    }

    public function update(User $user,Request $request){
        abort_unless(auth()->id()==$user->id || auth()->user()->admin,401);
        $validatedData = $request->validate([
            'isim' => 'required',
            'email' => 'required|email',
            'cinsiyet' => 'required',
            'mezuniyet_yili' => 'required',
        ]);

        $success=$user->update($request->all());
        return redirect()->back()->with($success?["success"=>true]:["error"=>true]);
    }

    public function destroy(User $user){
        abort_unless(auth()->user()->admin && !$user->admin,401);
        $user->internships()->delete();
        $user->delete();
        return redirect()->route("user.index");
    }

    public function index(){
        abort_unless(auth()->user()->admin,401);
        $users=User::orderBy("id","desc")->paginate(10);
        return view('user.list',compact('users'));
    }

    public function show(User $user){
        $internships=$user->internships()->where(\Auth::check() &&(auth()->user()->admin || auth()->user()->id==$user->id)?[]:["aktif"=>1])->orderByDesc("id")->paginate(10);
        return view('user.show',compact('user','internships'));
    }
}
