<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $roles = explode("|", $roles);
       
        // if(Auth::guard()->check()) 
        // {
        //     $getRole =  Role::where('id', Auth::guard()->user()->role)->first();

        //     if($getRole)
        //     {
        //         if(in_array($getRole->role_name, $roles))
        //         {   
        //             return $next($request);
        //         }
        //         else if($getRole->role_name == "Admin")
        //         {
        //            return redirect('admin/dashboard'); 
        //         }
        //         else if($getRole->role_name == "Delivery Boy")
        //         {
        //            return redirect('employee/dashboard'); 
        //            // return redirect('dashboard'); 
        //         }
        //         else if($getRole->role_name == "Vendor" || $getRole->role_name == "User")
        //         {
        //             return redirect('home'); 
        //         }
        //         else
        //         {
        //            return redirect('/'); 
        //         }
        //     }
        // }
        // else 
        // {   
        //     if(in_array('Admin', $roles)) 
        //     { 
        //         return redirect('login');
        //     }
        //     else if(in_array('Distributor', $roles)) 
        //     { 
        //         return redirect('login');
        //     }
        //     else if(in_array('Delivery Boy', $roles)) 
        //     { 
        //         return redirect('login');
        //     }
        //     else if(in_array('Restaurant', $roles)) 
        //     { 
        //         return redirect('login');
        //     }
        //     else 
        //     { 
        //         return redirect('/');
        //     }
        // }   

        // return abort(500);
        return $next($request);
    }
}
