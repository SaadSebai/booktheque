<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Livre;

use Auth;

use App\Http\Requests\livreRequest;

use Illuminate\Support\Facades\Input;

use App\User;

use App\Prnd;

use App\Matiere;


class LivreController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function livroffr() {
        
        $listlivre = Auth::user()->livres;

        return view('livre.livroffr', ['livres' => $listlivre]);

    }

    public function search() {

        return view('livre.lvrSearch');
    }

    public function result(livreRequest $request) {

        $search = $request->get('q');
        return Livre::where('name', 'like', '%'.search.'%')->get();
    }

    public function index() {

    }

    public function create() {
    	return view('livre.create');
    }

	public function store(livreRequest $request) {
        
        $lvr = new Livre();
        $lvr->livr_nom = $request->input('livr_nom');
        $mat = $request->input('lvr_matiere_id');
    if($mat == 'الرياضيات'){
            $lvr->lvr_matiere_id = 1;
         }elseif ($mat == 'اللغة الفرنسية') {
            $lvr->lvr_matiere_id = 2;
         }elseif ($mat == 'اللغة العربية') {
            $lvr->lvr_matiere_id = 3;
         }elseif ($mat == 'النشاط العلمي') {
            $lvr->lvr_matiere_id = 4;
         }elseif ($mat == 'الاجتماعيات') {
            $lvr->lvr_matiere_id = 5;
         }elseif ($mat == 'التربة اسلامية') {
            $lvr->lvr_matiere_id = 6;
         }elseif ($mat == 'علوم الحياة والارض') {
            $lvr->lvr_matiere_id = 7;
         }elseif ($mat == 'الفيزياء') {
            $lvr->lvr_matiere_id = 8;
         }elseif ($mat == 'المعلوميات') {
            $lvr->lvr_matiere_id = 9;
         }elseif ($mat == 'الترجمة') {
            $lvr->lvr_matiere_id = 10;
         }elseif ($mat == 'علوم المهندس') {
            $lvr->lvr_matiere_id = 11;
        }elseif ($mat == 'التربة تشكيلية') {
            $lvr->lvr_matiere_id = 12;
        }elseif ($mat == 'التربة اسرية') {
            $lvr->lvr_matiere_id = 13;
         }elseif ($mat == 'لاشيئ مما سبق') {
            $lvr->lvr_matiere_id = 14;
         }
        $lvr->livr_nivo = $request->input('livr_nivo');
        $lvr->ville_prnd = $request->input('ville_prnd');
        $lvr->lvr_dscp = $request->input('lvr_dscp');
        $lvr->user_id = Auth:: user()->id;
        if($request->hasFile('photo')) {
            $lvr->photo = $request->photo->store('image');
        }

        session()->flash('success','تم تسجيل الكتاب');

        $lvr->save();

        return redirect('livres');
    }

    public function edit($id) {
        $livre = Livre::find($id);

        $this->authorize('update', $livre);

        return view('livre.edit', ['livre' => $livre]);
    }

    public function update(livreRequest $request, $id) {
        $livre = Livre::find($id);

        $livre->livr_nom = $request->input('livr_nom');
        $mat = $request->input('lvr_matiere_id');
    if($mat == 'الرياضيات'){
            $livre->lvr_matiere_id = 1;
         }elseif ($mat == 'اللغة الفرنسية') {
            $livre->lvr_matiere_id = 2;
         }elseif ($mat == 'اللغة العربية') {
            $livre->lvr_matiere_id = 3;
         }elseif ($mat == 'النشاط العلمي') {
            $livre->lvr_matiere_id = 4;
         }elseif ($mat == 'الاجتماعيات') {
            $livre->lvr_matiere_id = 5;
         }elseif ($mat == 'التربة اسلامية') {
            $livre->lvr_matiere_id = 6;
         }elseif ($mat == 'علوم الحياة والارض') {
            $livre->lvr_matiere_id = 7;
         }elseif ($mat == 'الفيزياء') {
            $livre->lvr_matiere_id = 8;
         }elseif ($mat == 'المعلوميات') {
            $livre->lvr_matiere_id = 9;
         }elseif ($mat == 'الترجمة') {
            $livre->lvr_matiere_id = 10;
         }elseif ($mat == 'علوم المهندس') {
            $livre->lvr_matiere_id = 11;
        }elseif ($mat == 'التربة تشكيلية') {
            $lvr->lvr_matiere_id = 12;
        }elseif ($mat == 'التربة اسرية') {
            $lvr->lvr_matiere_id = 13;
         }elseif ($mat == 'لاشيئ مما سبق') {
            $lvr->lvr_matiere_id = 14;
         }        
        $livre->livr_nivo = $request->input('livr_nivo');
        $livre->ville_prnd = $request->input('ville_prnd');
        $livre->lvr_dscp = $request->input('lvr_dscp');
        if($request->hasFile('photo')) {
            $this->validate($request, [
            'photo'       =>  '
                required|file|mimes:jpeg,jpg,png|max:5000'
        ]);
            $livre->photo = $request->photo->store('image');
        }

        session()->flash('mod','تم تغيير معلومات الكتاب');

        $livre->save();

        return redirect('livres');

    }

    public function destroy(Request $request, $id) {

        $livre = Livre::find($id);

        $livre->delete();

        session()->flash('del','تم مسح الكتاب');

        return redirect('livres');

    }

    public function destroyed_by_admin(Request $request, $id) {

        $livre = Livre::find($id);

        $livre->delete();

        session()->flash('del','تم توقيف المستخدم');

    }
    public function see($id) {
        $livre = Livre::find($id);

        return view('livre.see_info', ['livre' => $livre]);
    }
    public function accepte(Request $request, $id){
    $livre = Livre::find($id);
    if($livre->user_id == Auth::user()->id){

        session()->flash('del','لم يتم قبول الطلب.. هذا الكتاب خاص بك');

        return redirect('livres/search');
    }
    else{
        $livre->acc = 1;

        $livre->save();

        $prnd = new Prnd();

        $prnd->user_id = Auth:: user()->id;
        $prnd->livre_id = $livre->id;

        $prnd->save();
    }

        return view('user_info', ['livre' => $livre]);
    }

    public function info($id){
        $livre = Livre::find($id);

        return view('livre.prndr_info', ['livre' => $livre]);
    }

    public function done(Request $request, $id){
        $livre = Livre::find($id);

        $livre->offred = 1;

        $livre->save();

        session()->flash('info','تم ابعاد الكتاب المتفق عليه');

        return redirect('livres');
    }
}
