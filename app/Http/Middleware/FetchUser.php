<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\CourseUser;
use App\Models\Course;

class FetchUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $slug = explode('/',$request->path());
        $course = Course::where('slug',$slug[1])->first();
        $result = CourseUser::where('user_email', Auth::user()->email)->get();
        for ($i=0; $i < count($result); $i++) { 
            if($course->id == $result[$i]['course_id']){
                return $next($request);
            }
        }
        return redirect('/dashboard');
    }
}
