<?php
class MembersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function index(){
		return View::make('host.contents.members');
	}
	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function info(){
		$user = User::where('username',Auth::user()->username)->first();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			if(!empty($inputs['password']) and !empty($inputs['password_confirmation']) and $inputs['email'] != Auth::user()->email){
				$validator = Validator::make(array('email'=>$inputs['email'],'password'=>$inputs['password'],'password_confirmation'=>$inputs['password_confirmation']),array('email'=>'unique:users,email|email','password'=>'confirmed|min:6'));
				if($validator->fails()){
					return Redirect::back()->withErrors($validator);
				}else{
					$user->email = $inputs['email'];
					$user->password = Hash::make($inputs['password']);
					$user->save();
					return View::make('host.contents.message')->with(array('message'=>'تم تعديل بياناتك بنجاح','url'=>url('members/info')));
				}
			}else if(!empty($inputs['password']) and !empty($inputs['password_confirmation']) and $inputs['email'] == Auth::user()->email){
				$validator = Validator::make(array('password'=>$inputs['password'],'password_confirmation'=>$inputs['password_confirmation']),array('password'=>'confirmed|min:6'));
				if($validator->fails()){
					return Redirect::back()->withErrors($validator);
				}else{
					$user->password = Hash::make($inputs['password']);
					$user->save();
					return View::make('host.contents.message')->with(array('message'=>'تم تعديل بياناتك بنجاح','url'=>url('members/info')));
				}
			}else if($inputs['email'] != Auth::user()->email){
				$validator = Validator::make(array('email'=>$inputs['email']),array('email'=>'unique:users,email|email'));
				if($validator->fails()){
					return Redirect::back()->withErrors($validator);
				}else{
					$user->email = $inputs['email'];
					$user->save();
					return View::make('host.contents.message')->with(array('message'=>'تم تعديل بياناتك بنجاح','url'=>url('members/info')));
				}

			}
		}

		return View::make('host.contents.members_editinfo')->with('user',$user);
	}
	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function bills($id=null){
		if(isset($id)){
			$bill = Bills::where('id',$id)->firstOrFail();
			if($bill['username'] == Auth::user()->username){
				$service = Services::where('name',$bill['service'])->first();
				return View::make('host.contents.members_showbill')->with(array('bill'=>$bill,'service'=>$service));
			}else{
				return Redirect::to('members/bills');
			}
		}else{
			$bills = Bills::where('username',Auth::user()->username)->orderBy('id','desc')->paginate(10);
			return View::make('host.contents.members_bills')->with('bills',$bills);
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function tickets($id=null){
		if(isset($id)){
			$ticket = Tickets::where('id',$id)->firstOrFail();
			if($ticket['username'] == Auth::user()->username){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$inputs = Input::all();
					if(strlen($inputs['content']) > 0){
						$comment = new Tcomments;
						$comment->username = Auth::user()->username;
						$comment->comment = $inputs['content'];
						$comment->staff = false;
						$comment->sub_id = $id;
						$comment->save();
					}
				}
				$comments = Tcomments::where('sub_id',$id)->get();
				return View::make('host.contents.members_showticket')->with(array('ticket'=>$ticket,'comments'=>$comments));
			}else{
				Redirect::to('members/tickets');
			}
		}else{
			$tickets = Tickets::where('username',Auth::user()->username)->orderBy('id','desc')->paginate(10);
			return View::make('host.contents.members_tickets')->with('tickets',$tickets);
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function addticket(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			$validator = Validator::make(array('subject'=>$inputs['subject'],'sections'=>$inputs['sections'],'content'=>$inputs['content']),array('subject' =>'required|min:3','sections'=>'required|exists:tsections,name','content'=>'required:min:3'));
			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
			}else{
				$ticket = new Tickets;
				$ticket->username = Auth::user()->username;
				$ticket->subject = $inputs['subject'];				
				$ticket->section = $inputs['sections'];
				$ticket->desc = $inputs['content'];
				$ticket->statue = 'open';
				$ticket->last_comment = 'customer';
				$ticket->save();
				return View::make('host.contents.message')->with(array('message'=>'تم إضافة التذكرة بنجاح','url'=>url('members/tickets')));
			}
		}
		$sections = Tsections::get();
		$sectionsArray = array();
		foreach ($sections as $value) {$sectionsArray[$value['name']] = $value['name'];}	
		return View::make('host.contents.members_addticket')->with('sections',$sectionsArray);
		
	}
	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function login()
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){			
			$inputs = Input::all();
			$validator = Validator::make(array('username'=>$inputs['username'],'password'=>$inputs['password']),array('username' =>'required','password'=>'required'));
			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}elseif(isset($inputs['remember_me'])){
				$attempt = Auth::attempt([
					'username' => $inputs['username'],
					'password' => $inputs['password'],
					'admin' => 0
				],true);
				if($attempt){
					return Redirect::intended('/');
				}else{
					return Redirect::back()->withInput()->with('error_message','message');
				}
			}else{
				$attempt = Auth::attempt([
					'username' => $inputs['username'],
					'password' => $inputs['password'],
					'admin' => 0
				]);
				if($attempt){
					return Redirect::intended('/');
				}else{
					return Redirect::back()->withInput()->with('error_message','message');
				}
			}
		}
		return View::make('host.contents.members_login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /members/create
	 *
	 * @return Response
	 */
	public function register()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			$validator = Validator::make(array('username'=>$inputs['username'],'email'=>$inputs['email'],'password'=>$inputs['password'],'password_confirmation'=>$inputs['password_confirmation'],'g-recaptcha-response'=>$inputs['g-recaptcha-response']),array('username' =>'required|unique:users,username|min:3','email'=>'required|unique:users,email|email','password'=>'required|confirmed|min:6','password_confirmation'=>'required','g-recaptcha-response'=>'required|recaptcha'));
			if($validator->fails()){
				return Redirect::back()->withInput()->withErrors($validator);
			}else{
				$query = new User; 
				$query->username = $username = $inputs['username']; 
				$query->email = $inputs['email']; 
				$query->password = Hash::make($inputs['password']);
				$query->active = false;
				$query->active_c = $ac = md5(Hash::make(rand(0,100000).time()));
				$query->admin = false;
				$query->save();
				Mail::send('host.email', array('t_message' => 'شكرًا على التسجيل','messages'=>'لخطوة التالية هي تفعيل العضوية عن طريق الرابط <br>','url'=> url("active/$ac?username={$inputs['username']}")), function($message) use($inputs,$ac)
				{
					$settings = Settings::first();
					$message->to($inputs['email'], $settings['site_name']);
				    $message->from($settings['site_email'])->subject('مرحبًا!');
				});
				return View::make('host.contents.message')->with(array('message'=>'تم تسجيل العضوية بنجاح الرجاء التأكد من البريد الإلكتروني لتفعيل العضوية','url'=> url()));
			}
		}else{
			return View::make('host.contents.members_register');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /members
	 *
	 * @return Response
	 */
	public function restore($restore=null)
	{
		if($restore and isset($_GET['username'])){
			$username = $_GET['username'];
			$q = User::where('username',$username)->firstOrFail();
			if($q['restore'] == $restore){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$inputs = Input::all();
					$validator = Validator::make(array('password'=>$inputs['password'],'password_confirmation'=>$inputs['password_confirmation']),array('password'=>'required|confirmed|min:6','password_confirmation'=>'required'));
					if($validator->fails()){
						return Redirect::back()->withInput()->withErrors($validator);
					}else{
					$q->restore = false;
					$q->password = Hash::make($inputs['password']);
					$q->save();
					return View::make('host.contents.message')->with(array('message'=>'تم تعديل كلمة المرور بنجاح','url'=>url('login')));
					}
				}else{
					return View::make('host.contents.members_restore_form');
				}
			}else{
				return Redirect::to('');
			}
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$inputs = Input::all();
				$validator = Validator::make(array('email'=>$inputs['email'],'g-recaptcha-response'=>$inputs['g-recaptcha-response']),array('email'=>'required|exists:users,email|email','g-recaptcha-response'=>'required|recaptcha'));
				if($validator->fails()){
					return Redirect::back()->withInput()->withErrors($validator);
				}else{
					$q = User::where('email',$inputs['email'])->first();
					$q->restore = $ac = md5(Hash::make(rand(0,1000000).time()));
					$q->save();
					Mail::send('host.email', array('t_message' => 'إستعادة كلمة المرور','messages'=>'لاستعادة كلمة المرور <br>','url'=> url("restore/$ac?username={$q['username']}")), function($message) use($inputs,$ac)
					{
						$settings = Settings::first();
						$message->to($inputs['email'], $settings['site_name']);
					    $message->from($settings['site_email'])->subject('إستعادة كلمة المرور');
					});
					return View::make('host.contents.message')->with(array('message'=>'تم إرسال رسالة تحتوي على إرشادات لاستعادة الرقم السري','url'=> url()));
				}
			}else{
				return View::make('host.contents.members_restore');
			}
		}
	}
	public function active($activec=null)
	{
		if($activec && isset($_GET['username'])){
			$username = $_GET['username'];
				$q = User::where('username',$username)->firstOrFail();
				if($q['active']){
					return View::make('host.contents.message')->with(array('message'=>'العضوية في الاصل مفعلة','url'=>url()));
				}else{
					if($q['active_c'] == $activec){
						$q->active = true;
						$q->save();
						return View::make('host.contents.message')->with(array('message'=>'تم تفعيل العضوية بنجاح','url'=>url()));
					}
				}
		}else{
				return Redirect::to('');
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /members/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
			return View::make('host.contents.message')->with(array('message'=>'تم تسجيل خروجك بنجاح','url'=>url()));
		}else{
			return Redirect::to('/');
		}
	}

}