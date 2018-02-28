<?php
namespace App\Http\Middleware;

use Closure;
use App\Role;

class Permission
{
    /**
     * Handle an incoming request based on the type of permission
     * and permission level specified.
     * @param $request
     * @param Closure $next
     * @param $type
     * @param $value
     */
    public function handle($request, Closure $next, $type, $value)
    {
        // based on the variable assigned to the middleware, evaluate if the user has permission to use the resource
        // type is permission or role
        if ($type == 'atLeast') {
            if (!Role::atLeast($request->user(), $value)) {
                return redirect()->route('401')->with('error', 'You do not have permission to access this resource');
            }
        } elseif ($type == 'hasRole') {
            if (!Role::hasRole($request->user(), $value)) {
                return redirect('/home')->with('error', 'You do not have permission to access that resource');
            }
        } else {
            return redirect()->route('401')->withErrors('Permission middleware is not configured correctly in the routes file');
        }

        return $next($request);
    }
}