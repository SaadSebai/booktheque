<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Image;

use App\User;

use App\Msg_req;

class UserController extends Controller
{
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request, $id){

        $user = User::find($id);
        if($request->hasFile('user_avatar')) {
            $user->user_avatar = $request->user_avatar->store('uploads/avatars');
        }
    	$user->save();

        return redirect('profile');
    }
    public function show_user(){

        $listusers = User::all();

        return view('userslist', ['users' => $listusers]);
    }

    public function activation(Request $request, $id) {

        $user = User::find($id);

        if( $user->actv == 0 ){

            $user->actv = 1;

            session()->flash('del','تم توقيف المستخدم');

            $user->save();
        }
        else{
            $user->actv = 0;

            session()->flash('success','تم اعادة المستخدم');

            $user->save();
        }
        

        return redirect('allusers');

    }

    public function update_info(Request $request, $id) {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->ville = $request->input('ville');
        $user->sexe = $request->input('sexe');

        session()->flash('mod','تم تعديل المعلومات');

        $user->save();

        return redirect('profile');

    }

    public function store_msg(Request $request){
        $mg = new Msg_req();
        $mg->msg = $request->input('msg');
        $mg->user_id = Auth:: user()->id;
        

        session()->flash('success','تم ارسال الطلب');

        $mg->save();

        return redirect('home');
    }

    public function show_msg(){

        $msgs = Msg_req::all();

        return view('messages', ['msg_reqs' => $msgs]);
    }

}
