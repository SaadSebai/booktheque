<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Document;

use Auth;

use DB;

use App\Http\Requests\docRequest;

class DocumentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index() {

    	$listdoc = Auth::user()->documents;

        return view('document.index', ['documents' => $listdoc]);

    }

    public function create() {
    	return view('document.create');
    }

	public function store(docRequest $request) {
        
        $doc = new Document();
        $doc->fnom = $request->input('fnom');
        $doc->fileplc = $request->input('fileplc');
        $doc->nivo = $request->input('nivo');
        if ($doc->nivo == 'ابتدائي السنة الاولى' || $doc->nivo == 'ابتدائي السنة الثانية' || $doc->nivo == 'ابتدائي السنة الثالثة' || $doc->nivo == 'ابتدائي السنة الرابعة' || $doc->nivo == 'ابتدائي السنة الخامسة' || $doc->nivo == 'ابتدائي السنة السادسة') {
            $doc->nivo_id = 1;
        }
        if ($doc->nivo == 'اعدادي السنة الاولى' || $doc->nivo == 'اعدادي السنة الثانية' || $doc->nivo == 'اعدادي السنة الثالثة') {
            $doc->nivo_id = 2;   
        }
        if ($doc->nivo == 'I الجذع المشترك العلمي' || $doc->nivo == 'I الجذع المشترك للاداب والعلوم الانسانية' || $doc->nivo == 'I الاداب والعلوم الانسانية' || $doc->nivo == 'I اللغة العربية' || $doc->nivo == 'I الاقتصاد والتدبير' || $doc->nivo == 'I العلوم التجريبية' || $doc->nivo == 'I العلوم الرياضية' || $doc->nivo == 'II الاداب' || $doc->nivo == 'II العلوم الانسانية' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == '' || $doc->nivo == 'II الاقتصاد' || $doc->nivo == 'II العلوم الرياضية  ا' || $doc->nivo == 'II العلوم الرياضية ب' || $doc->nivo == 'II العلوم الفيزيائية' || $doc->nivo == 'I علوم الحياة والارض' ) {
            $doc->nivo_id = 3;   
        }
        if ($doc->nivo == 'السنة الخامسة' || $doc->nivo == 'لا شيئ مما سبق') {
            $doc->nivo_id = 4;   
        }
        $dmt = $request->input('matiere');
         if($dmt == 'الرياضيات'){
            $doc->matiere_id = 1;
         }elseif ($dmt == 'اللغة الفرنسية') {
            $doc->matiere_id = 2;
         }elseif ($dmt == 'اللغة العربية') {
            $doc->matiere_id = 3;
         }elseif ($dmt == 'النشاط العلمي') {
            $doc->matiere_id = 4;
         }elseif ($dmt == 'الاجتماعيات') {
            $doc->matiere_id = 5;
         }elseif ($dmt == 'التربة اسلامية') {
            $doc->matiere_id = 6;
         }elseif ($dmt == 'علوم الحياة والارض') {
            $doc->matiere_id = 7;
         }elseif ($dmt == 'الفيزياء') {
            $doc->matiere_id = 8;
         }elseif ($dmt == 'المعلوميات') {
            $doc->matiere_id = 9;
         }elseif ($dmt == 'الترجمة') {
            $doc->matiere_id = 10;
         }elseif ($dmt == 'علوم المهندس') {
            $doc->matiere_id = 11;
         }elseif ($dmt == 'لاشيئ مما سبق') {
            $doc->matiere_id = 12;
         }
        $doc->doc_type = $request->input('doc_type');
        $doc->description = $request->input('description');
        $doc->user_id = Auth:: user()->id;
        if($request->hasFile('fileplc')) {
            $this->validate($request, [
            'fileplc'       =>  '
                required|file|mimes:pdf,doc,docx,jpeg,jpg,png|max:3072'
        ]);
            $doc->fileplc = $request->fileplc->store('file');
        }

        session()->flash('success','تم تسجيل الكتاب');

        $doc->save();

        return redirect('documents');
    }

    public function edit($id) {
        $document = document::find($id);

        $this->authorize('update', $document);

        return view('document.edit', ['document' => $document]);
    }

    public function update(docRequest $request, $id) {
        $document = document::find($id);

        $document->fnom = $request->input('fnom');
        $document->fileplc = $request->input('fileplc');
        $document->nivo = $request->input('nivo');

        if ($document->nivo == 'ابتدائي السنة الاولى' || $document->nivo == 'ابتدائي السنة الثانية' || $document->nivo == 'ابتدائي السنة الثالثة' || $document->nivo == 'ابتدائي السنة الرابعة' || $document->nivo == 'ابتدائي السنة الخامسة' || $document->nivo == 'ابتدائي السنة السادسة') {
            $document->nivo_id = '1';
        }
        if ($document->nivo == 'اعدادي السنة الاولى' || $document->nivo == 'اعدادي السنة الثانية' || $document->nivo == 'اعدادي السنة الثالثة') {
            $document->nivo_id = '2';
        }
        if ($document->nivo == 'I الجذع المشترك العلمي' || $document->nivo == 'I الجذع المشترك للاداب والعلوم الانسانية' || $document->nivo == 'I الاداب والعلوم الانسانية' || $document->nivo == 'I اللغة العربية' || $document->nivo == 'I الاقتصاد والتدبير' || $document->nivo == 'I العلوم التجريبية' || $document->nivo == 'I العلوم الرياضية' || $document->nivo == 'II الاداب' || $document->nivo == 'II العلوم الانسانية' || $document->nivo == '' || $document->nivo == '' || $document->nivo == '' || $document->nivo == '' || $document->nivo == '' || $document->nivo == '' || $document->nivo == '' || $document->nivo == 'II الاقتصاد' || $document->nivo == 'II العلوم الرياضية  ا' || $document->nivo == 'II العلوم الرياضية ب' || $document->nivo == 'II العلوم الفيزيائية' || $document->nivo == 'I علوم الحياة والارض' ) {
            $document->nivo_id = '3';
        }
        if ($document->nivo == 'السنة الخامسة' || $document->nivo == 'لا شيئ مما سبق') {
            $document->nivo_id = '4';
        }
        $dmt = $request->input('matiere');
         if($dmt == 'الرياضيات'){
            $document->matiere_id = 1;
         }elseif ($dmt == 'اللغة الفرنسية') {
            $document->matiere_id = 2;
         }elseif ($dmt == 'اللغة العربية') {
            $document->matiere_id = 3;
         }elseif ($dmt == 'النشاط العلمي') {
            $document->matiere_id = 4;
         }elseif ($dmt == 'الاجتماعيات') {
            $document->matiere_id = 5;
         }elseif ($dmt == 'التربة اسلامية') {
            $document->matiere_id = 6;
         }elseif ($dmt == 'علوم الحياة والارض') {
            $document->matiere_id = 7;
         }elseif ($dmt == 'الفيزياء') {
            $document->matiere_id = 8;
         }elseif ($dmt == 'المعلوميات') {
            $document->matiere_id = 9;
         }elseif ($dmt == 'الترجمة') {
            $document->matiere_id = 10;
         }elseif ($dmt == 'علوم المهندس') {
            $document->matiere_id = 11;
         }elseif ($dmt == 'لاشيئ مما سبق') {
            $document->matiere_id = 12;
         }

        $document->doc_type = $request->input('doc_type');
        $document->description = $request->input('description');
        $document->user_id = Auth:: user()->id;
        if($request->hasFile('fileplc')) {
            $document->fileplc = $request->fileplc->store('file');
        }

        session()->flash('mod','تم تغيير معلومات الكتاب');

        $document->save();

        return redirect('documents');

    }

    public function destroy(Request $request, $id) {

        $document = document::find($id);

        $document->delete();

        session()->flash('del','تم مسح الكتاب');

        return redirect('documents');

    }

    public function all_doc() {

        $docs = Document::orderBy('id','desc')->paginate(10);

        return view('document.all_doc', ['documents' => $docs]);

    }

    public function ib() {

        $document = Document::orderBy('id','desc')->paginate(10);

        return view('document.cours1', ['documents' => $document]);
    }

    public function ib2($nivo) {

        $document = Document::find($nivo);

        return redirect('cours1');
    }

    public function i3() {

        $document = Document::orderBy('id','desc')->paginate(10);

        return view('document.cours2', ['documents' => $document]);
    }

    public function i32($nivo) {

        $document = Document::find($nivo);

        return redirect('cours2');
    }

    public function tha() {

        $document = Document::orderBy('id','desc')->paginate(10);

        return view('document.cours3', ['documents' => $document]);
    }

    public function tha2($nivo) {

        $document = Document::find($nivo);

        return redirect('cours3');
    }

    public function t3() {

        $document = Document::orderBy('id','desc')->paginate(10);

        return view('document.cours4', ['documents' => $document]);
    }

    public function t32($nivo) {

        $document = Document::find($nivo);

        return redirect('cours4');
    }

}
