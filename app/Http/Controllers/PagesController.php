<?php
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function aboutus()
	{
		return View::make('host.contents.aboutus');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pages/create
	 *
	 * @return Response
	 */
	public function hosting()
	{
		return View::make('host.contents.hosting');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pages
	 *
	 * @return Response
	 */
	public function contactus()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$inputs = Input::all();
			$validator = Validator::make(array('subject'=>$inputs['subject'],'email'=>$inputs['email'],'reasons'=>$inputs['reasons'],'content'=>$inputs['content'],'g-recaptcha-response'=>$inputs['g-recaptcha-response']),array('subject'=>'required|min:3','email'=>'required|email','reasons'=>'required','content'=>'required|min:5','g-recaptcha-response'=>'required|recaptcha'));
				if($validator->fails()){
					return Redirect::back()->withInput()->withErrors($validator);
				}else{
					Mail::send('host.email', array('t_message' => $inputs['subject'],'messages'=>$inputs['content'],'reasons'=>$inputs['reasons']), function($message) use($inputs)
					{
						$settings = Settings::first();
						$message->to($settings['site_email'], $settings['site_name']);
					    $message->from($inputs['email'])->subject($inputs['subject']);
					});
					return View::make('host.contents.message')->with(array('message'=>'تم إرسال رسالة إلى مدير الموقع, سيتم الرد عليك في اقرب فرصة','url'=> url()));
				}
			}else{
				return View::make('host.contents.contactus');
			}
		}
}