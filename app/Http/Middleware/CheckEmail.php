<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect(route('autenticacao.login')); 
        }
        $email = auth()->user()->email;
        $data = explode('@',$email);
        $servidor_email=$data[1];
        if($servidor_email!='gmail.com'){
            return redirect(route('autenticacao.login'));
        }
        return $next($request);
    }
}
