<?php
class ServicesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /services
	 *
	 * @return Response
	 */
	public function index($section = null)
	{
		$Ssections = Ssections::all();
		if(!$section){
			return View::make('host.contents.services')->with('sections',$Ssections);	
		}else{
			$Services = Services::where('section',$section)->get();
			return View::make('host.contents.services_service')->with(array('sections'=>$Ssections,'services'=>$Services));	
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /services/create
	 *
	 * @return Response
	 */
	public function order($servicename)
	{	
		$service = Services::where('name',$servicename)->firstOrFail();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$bills = new Bills;
			$bills->username = Auth::user()->username;
			$bills->service = $servicename;
			$bills->statue = false;
			$bills->ends_at = false;
			$bills->save();
			return View::make('host.contents.message')->with(array('message' =>'تم إضافة الخدمة بنجاح','url'=>url('members/bills')));
		}else{
			return View::make('host.contents.services_sure')->with('service',$service);
		}
	}
}