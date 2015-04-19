<?php namespace App\Http\Middleware;

use Closure;

class close {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(\Schema::hasTable('settings')){
			$settings =\Settings::find(1);
			if($settings->site_close){
				return \View::make('host.contents.closed')->with('message',$settings->site_message);
			}
		}

		return $next($request);
	}

}
