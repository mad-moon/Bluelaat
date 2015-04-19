<?php
class InstallController extends Controller {
	public function index(){
			if(!Schema::hasTable('settings') or !Settings::where('id',1)->count()){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					return Redirect::to('install/check');
				}
				return View::make('host.contents.install_index');
			}else{
				return Redirect::to('/');
			}
		
	}
	public function check(){
		$errors = array();
		if(!extension_loaded('mcrypt')){
			$errors['no_mcrypt'] = 'يجب إضافة mcrypt إلى السيرفر';
		}
		if(!version_compare(phpversion(), '5.4','>=')){
			return 	$errors['version'] = 'يجب ان تكون نسخة البي اتش بي ٥.٤ او اعلى';
		}
		if(substr(decoct(fileperms(storage_path()) ), 2) != '777'){
			$errors['perms'] = 'الملف /storage لايملك صلاحية ٧٧٧';
		}
		if(count($errors) > 0){
			return View::make('host.contents.install_create')->with('errors',$errors);
		}else{
			$file = file_get_contents(base_path('sql.sql'));
			DB::unprepared($file);
			return View::make('host.contents.install_create');
		}
	}
	public function info(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('subject' =>'required','email'=>'required|email','desc'=>'required'));
			if($validator->fails()){
				return Redirect::to('install/info')->withErrors($validator)->withInput();
			}else{
				$settings = new Settings;
				$settings->id = 1;
				$settings->site_name = e($inputs['subject']);
				$settings->site_email = e($inputs['email']);
				$settings->site_desc = e($inputs['desc']);
				$settings->save();
				return Redirect::to('install/admin');
			}
		}else{
			return View::make('host.contents.install_info');
		}
	}
	public function admin(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('username' =>'required','email'=>'required|email','password'=>'confirmed|min:6'));
			if($validator->fails()){
				return Redirect::to('install/admin')->withErrors($validator)->withInput();
			}else{
				$user = new User;
				$user->username = e($inputs['username']);
				$user->email = e($inputs['email']);
				$user->password = Hash::make($inputs['password']);
				$user->active = true;
				$user->admin = true;
				$user->save();
				return Redirect::to('install/done');
			}
		}else{
			return View::make('host.contents.install_admin');
		}

	}
	public function done(){
        File::delete('sql.sql');
        File::delete('views/host/install.blade.php');
        File::delete('views/host/contents/install_index.blade.php');
        File::delete('views/host/contents/install_create.blade.php');
        File::delete('views/host/contents/install_admin.blade.php');
        File::delete('views/host/contents/install_info.blade.php');
		return View::make('host.contents.message')->with(array('message'=>'تم تنصيب الموقع بنجاح','url'=>url('admin')));

	}	
}