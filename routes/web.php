<?php

use Illuminate\Support\Facades\Input;
use App\User;
use App\Livre;
use App\Document;
use App\Matiere;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('my-captcha','HomeController@myCaptcha')->name('myCaptcha');
Route::post('my-captcha','HomeController@myCaptchaPost')->name('myCaptchaPost');
Route::get('refresh_captcha','HomeController@refreshCaptcha')->name('refresh_captcha');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function(){
Route::get('livres', 'LivreController@livroffr');
//Route::get('livres', 'LivreController@index');
Route::get('livres/create', 'LivreController@create');
Route::post('livres', 'LivreController@store');
Route::get('livres/{id}/edit', 'LivreController@edit');
Route::put('livres/{id}', 'LivreController@update');
Route::delete('livres/{id}', 'LivreController@destroy');
Route::delete('livres/aa/{id}', 'LivreController@destroyed_by_admin');
Route::get('livres/search', 'LivreController@search');
Route::get('livres/{id}/see_info', 'LivreController@see');
Route::get('livres/{id}', 'LivreController@accepte');
Route::get('livres/{id}/info', 'LivreController@info');

Route::post('livres/search', function(){
	$lname = Input::get('lname');
	$lnivo = Input::get('lnivo');
	$lville = Input::get('lville');
    $mat = Input::get('matiere_nom');
    if($mat == 'الرياضيات'){
            $idd = 1;
         }elseif ($mat == 'اللغة الفرنسية') {
            $idd = 2;
         }elseif ($mat == 'اللغة العربية') {
            $idd = 3;
         }elseif ($mat == 'النشاط العلمي') {
            $idd = 4;
         }elseif ($mat == 'الاجتماعيات') {
            $idd = 5;
         }elseif ($mat == 'التربة اسلامية') {
            $idd = 6;
         }elseif ($mat == 'علوم الحياة والارض') {
            $idd = 7;
         }elseif ($mat == 'الفيزياء') {
            $idd = 8;
         }elseif ($mat == 'المعلوميات') {
            $idd = 9;
         }elseif ($mat == 'الترجمة') {
            $idd = 10;
         }elseif ($mat == 'علوم المهندس') {
            $idd = 11;
        }elseif ($mat == 'التربة تشكيلية') {
            $idd = 12;
        }elseif ($mat == 'التربة اسرية') {
            $idd = 13;
         }elseif ($mat == 'لاشيئ مما سبق') {
            $idd = 14;
         }
	if($lname != ' ' && $lnivo != ' ' && $lville != ' ' && $idd !=' '){
		$lvr = Livre::where('livr_nom', 'LIKE', '%' . $lname . '%')->where('lvr_matiere_id', 'LIKE', '%' . $idd . '%')->where('livr_nivo', 'LIKE', '%' . $lnivo . '%')->where('ville_prnd', 'LIKE', '%' . $lville . '%')->get();
		if(count($lvr) > 0)
			return view ('livre/lvrSearch')->withDetails($lvr)->withQuery($lname);
	}
	return view('livre/lvrSearch')->withMessage("لا نتائج في الوقت الحالي");

});
});

Route::get('documents', 'DocumentController@index');
Route::get('documents/create', 'DocumentController@create');
Route::post('documents', 'DocumentController@store');
Route::get('documents/{id}/edit', 'DocumentController@edit');
Route::put('documents/{id}', 'DocumentController@update');
Route::delete('documents/{id}', 'DocumentController@destroy');
Route::get('documents/all', 'DocumentController@all_doc');
Route::get('documents/all/ib', 'DocumentController@ib');
Route::get('documents/all/ib/{nivo}', 'DocumentController@ib2');
Route::get('documents/all/i3', 'DocumentController@i3');
Route::get('documents/all/i3/{nivo}', 'DocumentController@i32');
Route::get('documents/all/tha', 'DocumentController@tha');
Route::get('documents/all/tha/{nivo}', 'DocumentController@tha2');
Route::get('documents/all/t3', 'DocumentController@t3');
Route::get('documents/all/t3/{nivo}', 'DocumentController@t32');

Route::post('documents/filter', function(){
	$nvo = Input::get('nivo');
	$mat = Input::get('matiere');
	if($mat == 'الرياضيات'){
            $doc = 1;
         }elseif ($mat == 'اللغة الفرنسية') {
            $doc = 2;
         }elseif ($mat == 'اللغة العربية') {
            $doc = 3;
         }elseif ($mat == 'النشاط العلمي') {
            $doc = 4;
         }elseif ($mat == 'الاجتماعيات') {
            $doc = 5;
         }elseif ($mat == 'التربة اسلامية') {
            $doc = 6;
         }elseif ($mat == 'علوم الحياة والارض') {
            $doc = 7;
         }elseif ($mat == 'الفيزياء') {
            $doc = 8;
         }elseif ($mat == 'المعلوميات') {
            $doc = 9;
         }elseif ($mat == 'الترجمة') {
            $doc = 10;
         }elseif ($mat == 'علوم المهندس') {
            $doc = 11;
        }elseif ($mat == 'التربة تشكيلية') {
            $doc = 12;
        }elseif ($mat == 'التربة اسرية') {
            $doc = 13;
         }elseif ($mat == 'لاشيئ مما سبق') {
            $doc = 14;
         }
        $type = Input::get('type');
	if($nvo != ' ' && $doc != ' ' && $type != ' '){
		$dd = Document::where('nivo', 'LIKE', '%' . $nvo . '%')->where('matiere_id', 'LIKE', '%' . $doc . '%')->where('doc_type', 'LIKE', '%' . $type . '%')->get();
		if(count($dd) > 0)
			return view ('document/cours_filter')->withDetails($dd)->withQuery($nvo);
	}
	return view('document/cours_filter')->withMessage("غير موجود");

});

Route::get('/homePage',function() {
	return view('homePage');
});

Route::get('documents/{id}/telecharger', function($id){
	$doc = document::find($id);
    $file = public_path()."/storage/".$doc->fileplc;
    $headers = array(
            'content-type:application/pdf' ,

    );
    $ext = pathinfo($doc->fileplc, PATHINFO_EXTENSION);
    return Response::download($file, $doc->fnom.".".$ext ,$headers);
});

Route::get('profile', 'UserController@profile');
Route::post('profile/{id}', 'UserController@update_avatar');
Route::put('profile/{id}',  'UserController@update_info');
Route::get('allusers', 'UserController@show_user');
Route::get('allusers/{id}', 'UserController@activation');
Route::post('allusers/search', function(){
    $un = Input::get('usr_nm');
    $um = Input::get('usr_mail');
    if($un != ' ' && $um != ' '){
        $uu = User::where('name', 'LIKE', '%' . $un . '%')->where('email', 'LIKE', '%' . $um . '%')->get();
        if(count($uu) > 0)
            return view ('userslist')->withDetails($uu)->withQuery($um);
    }
    return view('userslist')->withMessage("لا نتائج في الوقت الحالي");

});
Route::post('message', 'UserController@store_msg');
Route::get('message_show', 'UserController@show_msg');