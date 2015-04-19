<?php namespace App\Http\Middleware;

use Closure;

class active {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = \User::where('username',\Auth::user()->username)->firstOrFail();
		if(!$user->active){
			return View::make('host.contents.members_active');
		}
		return $next($request);
	}

}
