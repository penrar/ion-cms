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
        //Admins can go anywhere
        if(Role::hasRole($request->user()->role->code, 'admin')) {
            return $next($request);
        }

        if ($type == 'atLeast') { // at least any role level
            if (!Role::atLeast($request->user(), $value)) {
                return redirect()->route('401')->with('error', 'You do not have permission to access this resource');
            }
        } elseif ($type == 'hasRole') { // has any role code
            if (!Role::hasRole($request->user(), $value)) {
                return redirect('/home')->with('error', 'You do not have permission to access that resource');
            }
        } else {
            return redirect()->route('401')->withErrors('Permission middleware is not configured correctly in the routes file');
        }

        return $next($request);
    }
}