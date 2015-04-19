<?php namespace App\Http\Middleware;

use Closure;

class General {

	public function handle($request, Closure $next)
	{
		if(\Schema::hasTable('settings') and \Settings::where('id',1)->count()){
 			$settings_site_name = \Settings::first();
 			\View::share('title',$settings_site_name['site_name']);
 			\View::share('desc',$settings_site_name['site_desc']);
 			\View::share('keywords',$settings_site_name['site_tags']);
 		}
		if ( ! function_exists('dayleft'))
		{
			/**
			 * Return the given object. Useful for chaining.
			 *
			 * @param  mixed  $object
			 * @return mixed
			 */
			function daysleft($endtime)
			{	
				$time = ($endtime - time());
				return round($time / 86400);
			}
		}
		if( ! function_exists('daystoseconds'))
		{
			/**
			 * Return the given object. Useful for chaining.
			 *
			 * @param  mixed  $object
			 * @return mixed
			 */
			function daystoseconds($days)
			{	
				return $days * 86400;
			}
		}
		return $next($request);
	}

}
