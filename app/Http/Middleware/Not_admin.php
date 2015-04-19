<?php namespace App\Http\Middleware;

use Closure;

class not_admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!\Session::has('admin_username') or !\Session::has('admin_password')){
				return \Redirect::to('admin/login');
		}
		return $next($request);
	}

}
