<?php
class AdminController extends Controller {

	public function __construct() {
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.contents.index');
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function settings()
	{		
		$inf = Settings::firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$validator = Validator::make($i = Input::all(),array('site_name'=>'required','site_email'=>'required|email','site_message'=>($inf->site_close)?'required':''));
			if($validator->fails()){
				return Redirect::to('admin/settings')->withErrors($validator);
			}else{
				//update fields
				$inf->site_name = $i['site_name'];$inf->site_email = $i['site_email'];$inf->site_desc = $i['site_desc'];$inf->site_tags = $i['site_tags'];(!isset($i['site_close']))?$inf->site_close=0:$inf->site_close=1;(isset($i['site_message']))?$inf->site_message=$i['site_message']:'';
				$inf->save();
				return Redirect::to('admin/settings')->with('i_sccess','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإرسال بنجاح</div>');
			}
		}
		return View::make('admin.contents.settings')->with('settings',$inf);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function members()
	{		
		$inf = User::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.members')->with('members',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function members_show($id)
	{
		$inf = User::where('id',$id)->firstOrFail();
		return View::make('admin.contents.members_show')->with('user',$inf);		
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function members_edit($id)
	{			
		$inf = User::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			if($inf['username'] != $inputs['username'] or $inf['email'] != $inputs['email']){
				if($inf['username'] != $inputs['username']){
					$validator = Validator::make($inputs,array('username' =>'required|unique:users,username','email'=>'required|email'));
				}else{
					$validator = Validator::make($inputs,array('username' =>'required','email'=>'required|email|unique:users,email'));
				}
			}else{
				$validator = Validator::make($inputs,array('username' =>'required','email'=>'required|email'));
			}
			if($validator->fails()){
				return Redirect::to('admin/members/edit/'.$id)->withErrors($validator);
			}else{
				$inf->username = $inputs['username'];
				$inf->email = $inputs['email'];
				!empty($inputs['password'])?$inf->password = Hash::make($inputs['password']):'';
				isset($inputs['active'])?$inf->active = 1:$inf->active = 0;
				isset($inputs['admin'])?$inf->admin = 1:$inf->admin = 0;
				$inf->save();
				return Redirect::to('admin/members/edit/'.$id)->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية التعديل بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.members_edit')->with('user',$inf);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function members_add()
	{			
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('username' =>'required|unique:users,username','email'=>'required|email|unique:users,email','password'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/members/add/')->withErrors($validator);
			}else{
				$inf = new User;
				$inf->username = $inputs['username'];
				$inf->email = $inputs['email'];
				!empty($inputs['password'])?$inf->password = Hash::make($inputs['password']):'';
				isset($inputs['active'])?$inf->active = 1:$inf->active = 0;
				isset($inputs['admin'])?$inf->admin = 1:$inf->admin = 0;
				$inf->save();
				return Redirect::to('admin/members/add/')->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإضافة بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.members_add');		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function members_delete($id)
	{			
		$inf = User::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = User::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف {$inf['username']} بنجاح",'h' =>"حذف {$inf['username']}"));
		}else{
			return View::make('admin.contents.members_delete')->with('user',$inf);		
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Ssections()
	{		
		$inf = Ssections::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.Ssections')->with('Ssections',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Ssections_add()
	{		
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('name' =>'required|alpha_dash|unique:ssections,name','desc'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/services/sections/add/')->withErrors($validator);
			}else{
				$inf = new Ssections;
				$inf->name = $inputs['name'];
				$inf->desc = $inputs['desc'];
				$inf->save();
				return Redirect::to('admin/services/sections/add/')->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإضافة بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.Ssections_add');		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Ssections_edit($id)
	{			
		$inf = Ssections::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('name' =>'required|alpha_dash|unique:ssections,name','email'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/services/sections/edit/'.$id)->withErrors($validator);
			}else{
				$inf->name = $inputs['name'];
				$inf->desc = $inputs['desc'];
				$inf->save();
				return Redirect::to('admin/services/sections/edit/'.$id)->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية التعديل بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.Ssections_edit')->with('Ssections',$inf);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Ssections_delete($id)
	{			
		$inf = Ssections::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = Ssections::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف {$inf['name']} بنجاح",'h' =>"حذف {$inf['name']}"));
		}else{
			return View::make('admin.contents.Ssections_delete')->with('Ssections',$inf);		
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function services()
	{		
		$inf = Services::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.services')->with('services',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function services_show($id)
	{
		$inf = Services::where('id',$id)->firstOrFail();
		return View::make('admin.contents.services_show')->with('services',$inf);		
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function services_edit($id)
	{			
		$inf = Services::where('id',$id)->firstOrFail();
		$sec = Ssections::all();
		$secNames = array();
		foreach ($sec as $pic)$secNames[e($pic['name'])] = e($pic['name']);
		$secInf = Ssections::where('name',$inf['section']);
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('name' =>'required|alpha_dash|unique:services,name','desc'=>'required','price'=>'required|numeric','period'=>'required|numeric','create_period'=>'required|numeric','section'=>'required|exists:ssections,name'));
			if($validator->fails()){
				return Redirect::to('admin/services/edit/'.$id)->withErrors($validator);
			}else{
				$inf->name = $inputs['name'];
				$inf->section = $inputs['section'];
				$inf->desc = $inputs['desc'];
				$inf->price = $inputs['price'];
				$inf->period = $inputs['period'];
				$inf->create_period = $inputs['create_period'];
				$inf->save();
				return Redirect::to('admin/services/edit/'.$id)->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية التعديل بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.services_edit')->with(array('services'=>$inf,'secNames'=>$secNames));		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function services_add()
	{			
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('name' =>'required|alpha_dash|unique:services,name','desc'=>'required','price'=>'required|numeric','period'=>'required|numeric','create_period'=>'required|numeric','section'=>'required|exists:ssections,name'));
			if($validator->fails()){
				return Redirect::to('admin/services/add/')->withErrors($validator)->withInput();
			}else{
				$inf = new Services;
				$inf->name = $inputs['name'];
				$inf->section = $inputs['section'];
				$inf->desc = $inputs['desc'];
				$inf->price = $inputs['price'];
				$inf->period = $inputs['period'];
				$inf->create_period = $inputs['create_period'];
				$inf->save();
				return Redirect::to('admin/services/add/')->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإضافة بنجاح</div>');
			}
		}else{
			$sec = Ssections::all();
			$secNames = array();
			foreach ($sec as $pic)$secNames[e($pic['name'])] = e($pic['name']);
			return View::make('admin.contents.services_add')->with('secNames',$secNames);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function services_delete($id)
	{			
		$inf = Services::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = services::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف {$inf['name']} بنجاح",'h' =>"حذف {$inf['name']}"));
		}else{
			return View::make('admin.contents.services_delete')->with('services',$inf);		
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function bills()
	{		
		$inf = Bills::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.bills')->with('bills',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function bills_show($id)
	{
		$inf = Bills::where('id',$id)->firstOrFail();
		$servInf = Services::where('name',$inf['service'])->firstOrFail();
		$user = User::where('username',$inf['username'])->firstOrFail();
		return View::make('admin.contents.bills_show')->with(array('bills'=>$inf,'servInf'=>$servInf,'user'=>$user));		
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function bills_edit($id)
	{			
		$inf = Bills::where('id',$id)->firstOrFail();
		$services = Services::all();
		$period = Services::where('name',$inf['service'])->firstOrFail();
		$servNames = array();
		foreach ($services as $pic)$servNames[e($pic['name'])] = e($pic['name']);
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('username' =>'required|exists:users,username','service'=>'required|exists:services,name','statue'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/bills/edit/'.$id)->withErrors($validator);
			}else{
				$inf->username = $inputs['username'];				
				if(!$inf['statue'] && $inputs['statue'] =='payed' && $inf['service'] == $inputs['service']){$inf->ends_at = (strtotime($inf['updated_at']."+ {$period['period']} days"));}elseif($inputs['statue'] =='payed' && $inf['service'] != $inputs['service']){$inf->ends_at = (strtotime($inf['updated_at']."+ {$period['period']} days"));};
				$inf->service = $inputs['service'];				
				$i = $inf->statue;
				$inf->statue = ($inputs['statue'] == 'payed')?1:0;	
				$inf->save();				
				if($inputs['statue'] == 'payed' && !$i){
				Mail::send('host.email', array('t_message' => 'تغيير حالة فاتورتك','messages'=>'تم تغيير حالة فاتورتك إلى مدفوعة<br>','url'=> url("members/bills/{$inf->id}")), function($message) use($inputs)
				{
					$settings = Settings::first();
					$user = User::where('username',$inputs['username'])->firstOrFail();
					$message->to($user['email'], $settings['site_name']);
				    $message->from($settings['site_email'])->subject('تغيير حالة فاتورة');
				});
				}
				return Redirect::to('admin/bills/edit/'.$id)->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية التعديل بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.bills_edit')->with(array('bills'=>$inf,'servNames'=>$servNames));		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function bills_add()
	{			
		$services = Services::all();
		$servNames = array();
		foreach ($services as $pic)$servNames[e($pic['name'])] = e($pic['name']);
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('username' =>'required|exists:users,username','service'=>'required|exists:services,name','statue'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/bills/add/')->withErrors($validator)->withInput();
			}else{
				$period = Services::where('name',$inputs['service'])->firstOrFail();
				$inf = new Bills;
				$inf->username = $inputs['username'];				
				$inf->ends_at = ($inputs['statue'] == 'payed')?(strtotime($inf['updated_at']."+ {$period['period']} days")):'';
				$inf->service = $inputs['service'];				
				$inf->statue = ($inputs['statue'] == 'payed')?1:0;				
				$inf->save();
				Mail::send('host.email', array('t_message' => 'إضافة فاتورة جديدة','messages'=>'تم إضافة فاتورة جديدة لمشاهدتها <br>','url'=> url("members/bills/{$inf->id}")), function($message) use($inputs)
				{
					$settings = Settings::first();
					$user = User::where('username',$inputs['username'])->firstOrFail();
					$message->to($user['email'], $settings['site_name']);
				    $message->from($settings['site_email'])->subject('إضافة فاتورة');
				});
				return Redirect::to('admin/bills/add/')->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإضافة بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.bills_add')->with('servNames',$servNames);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function bills_delete($id)
	{			
		$inf = Bills::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = Bills::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف الفاتورة الخاصة بـ {$inf['username']} بنجاح",'h' =>"حذف الفاتورة الخاصة بـ {$inf['username']}"));
		}else{
			return View::make('admin.contents.bills_delete')->with('bills',$inf);		
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Tsections()
	{		
		$inf = Tsections::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.Tsections')->with('Tsections',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Tsections_add()
	{		
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('name' =>'required|unique:Tsections,name','desc'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/tickets/sections/add/')->withErrors($validator);
			}else{
				$inf = new Tsections;
				$inf->name = $inputs['name'];
				$inf->desc = $inputs['desc'];
				$inf->save();
				return Redirect::to('admin/tickets/sections/add/')->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية الإضافة بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.Tsections_add');		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Tsections_delete($id)
	{			
		$inf = Tsections::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = Tsections::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف {$inf['name']} بنجاح",'h' =>"حذف {$inf['name']}"));
		}else{
			return View::make('admin.contents.Tsections_delete')->with('Tsections',$inf);		
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function tickets()
	{		
		$inf = Tickets::orderBy('id','desc')->paginate(10);
		return View::make('admin.contents.tickets')->with('tickets',$inf);
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function tickets_show($id)
	{
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			if(strlen($i = Input::get('ticket')) > 0){
				$comment = new Tcomments;
				$comment->username = Session::get('admin_username');
				$comment->comment = $i;
				$comment->staff = 1;
				$comment->sub_id = $id;
				$comment->save();
				$ticket = Tickets::where('id',$id)->firstOrFail(); 
				$ticket->last_comment = 'staff';
				$ticket->save(); 
				Mail::send('host.email', array('t_message' => 'تم اضافة رد إلى تذكرتك','messages'=>'لمشاهدة التذكرة الرجاء <br>','url'=> url("members/tickets/$id")), function($message) use($ticket,$id)
				{
					$settings = Settings::first();
					$user = User::where('username',$ticket['username'])->firstOrFail();
					$message->to($user['email'], $settings['site_name']);
				    $message->from($settings['site_email'])->subject('رد على التذكرة المضافة');
				});

				return Redirect::to('admin/tickets/show/'.$id);
			}else{
				return Redirect::to('admin/tickets/show/'.$id);
			}
		}else{
			$inf = Tickets::where('id',$id)->firstOrFail();
			$tcomments = Tcomments::where('sub_id',$id)->get();
			return View::make('admin.contents.tickets_show')->with(array('tickets'=>$inf,'tcomments'=>$tcomments));		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function tickets_open($id)
	{			
		$inf = Tickets::whereRaw("id = '$id' and statue ='close'")->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$inf->statue = 'open';
			$inf->save();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم فتح {$inf['subject']} بنجاح",'h' =>"فتح {$inf['subject']}"));
		}else{
			return View::make('admin.contents.tickets_open')->with('tickets',$inf);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function tickets_close($id)
	{			
		$inf = Tickets::whereRaw("id = '$id' and statue !='close'")->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$inf->statue = 'close';
			$inf->save();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم إغلاق {$inf['subject']} بنجاح",'h' =>"إغلاق {$inf['subject']}"));
		}else{
			return View::make('admin.contents.tickets_close')->with('tickets',$inf);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function tickets_delete($id)
	{			
		$inf = Tickets::where('id',$id)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = Tickets::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف {$inf['subject']} بنجاح",'h' =>"حذف {$inf['subject']}"));
		}else{
			return View::make('admin.contents.tickets_delete')->with('tickets',$inf);		
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Tcomments_edit($id)
	{			
		$inf = Tcomments::whereRaw("id = '$id' and staff = 1")->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){				
			$inputs = Input::all();
			$validator = Validator::make($inputs,array('comment'=>'required'));
			if($validator->fails()){
				return Redirect::to('admin/tickets/comments/edit/'.$id)->withErrors($validator);
			}else{
				$inf->comment = $inputs['comment'];
				$inf->save();
				return Redirect::to('admin/tickets/comments/edit/'.$id)->with('success','<div class="alert alert-success"> <strong>تم بنجاح!</strong> لقد تمت عملية التعديل بنجاح</div>');
			}
		}else{
			return View::make('admin.contents.Tcomments_edit')->with('Tcomments',$inf);		
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function Tcomments_delete($id)
	{			
		$inf = Tcomments::whereRaw("id = '$id' and staff = 1")->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			$user = Tcomments::where('id',$id)->delete();
			return View::make('admin.message')->with(array($inf,'h2'=>"تم حذف الرد بنجاح",'h' =>"حذف رد"));
		}else{
			return View::make('admin.contents.Tcomments_delete')->with('Tcomments',$inf);		
		}
	}



	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Show the form for creating a new resource.
	 * GET,POST /admin/login
	 *
	 * @return Response
	 */
	public function login()
	{		
		if($_SERVER['REQUEST_METHOD'] != 'GET'){
			// init validator to validate username and password inputs		
			$validator = Validator::make(array('username'=>Input::get('username'),'password'=>Input::get('password')),array('username' =>'required|min:5','password'=>'required'));
			// check if validator fails.
			if($validator->fails()){
				return Redirect::to('admin/login')->withErrors($validator)->withInput();
			}
			// grab user and pass inputs.
			$user = Input::get('username');
			$pass = Input::get('password');
			// grab data from  username table to check it.
			$userInformation = User::whereRaw("username='$user' and admin='1'")->first();
			// check if there any data to test it. if not redirect with an error message.
			if(count($userInformation) > 0){
				// if the password was given is right store it and redirect the admin to the main panel.
				if(Hash::check($pass,$userInformation->password)){
					Session::put('admin_username',$userInformation->username);
				 	Session::put('admin_password',$userInformation->password);
				 	return Redirect::to('admin');
				}else{
					return Redirect::to('admin/login')->with('i_error','<span class="msgError">إسم المستخدم أو كلمة المرور غير صحيحة</span>')->withInput();
				}
			}else{
				return Redirect::to('admin/login')->with('i_error','<span class="msgError">إسم المستخدم أو كلمة المرور غير صحيحة</span>')->withInput();
			}
		}
		return View::make('admin.login');
	}
	/**
	 * logout admin.
	 * GET /admin/logout
	 *
	 * @return Response
	 */
	public function logout(){ 
		Session::forget(array('admin_username','admin_password'));
		return View::make('admin.logout');
	}
}