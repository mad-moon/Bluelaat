<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Session;

class RouteServiceProvider extends ServiceProvider {
	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = '';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		Route::filter('redirect_if_admin_isnot_on', function($r)
		{
			if(!Session::has('admin_username') or !Session::has('admin_password')){
				return \Redirect::to('admin/login');
			}
		});

		Route::filter('redirect_if_admin_is_on', function()
		{
			if(Session::has('admin_username') or !Session::has('admin_password')){
				return \Redirect::to('admin/logifn');
			}
		});
		
		Route::filter('active', function()
		{
			$user = User::where('username',Auth::user()->username)->firstOrFail();
			if(!$user->active){
				return View::make('host.contents.members_active');
			}
		});
		Route::filter('close', function()
		{
			$settings = \Settings::find(1);
			if($settings->site_close){
				return View::make('host.contents.closed')->with('message',$settings->site_message);
			}
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
