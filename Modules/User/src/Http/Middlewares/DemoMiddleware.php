<?php
namespace Modules\User\src\Http\Middlewares;
use Closure;
use Illuminate\Http\Request;
class DemoMiddleware{
    function handle(Request $request, Closure $next){
        echo('have a good day');
    
        return $next($request);
    }
}