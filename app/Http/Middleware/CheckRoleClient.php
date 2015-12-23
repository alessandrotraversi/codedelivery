<?php
 
 namespace CodeDelivery\Http\Middleware;
 
 use Closure;
 use Auth;
 
 class CheckRoleClient
 {
     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @return mixed
      */
     public function handle($request, Closure $next, $role)//aqui adicionamos um parametro para o middleware
     {
         
         if(!Auth::check())
         {
             return redirect('/auth/login');
         }
 
         if(Auth::user()->role <> $role)//aqui adicionamos um parametro para o middleware
         {
             return redirect('/auth/login');
         }
 
         return $next($request);
     }
 }