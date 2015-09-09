<?php namespace App\Http\Middleware;
      use Closure;
      use Illuminate\Contracts\Auth\Guard;
      use Illuminate\Contracts\Routing\Middleware;
      use Illuminate\Contracts\Routing\ResponseFactory;
      use App\AssignedRoles;
 
     class UserMiddleware implements Middleware {
           protected $auth;
           protected $response;
 
           public function __construct(Guard $auth, ResponseFactory $response){
                $this->auth = $auth;
                $this->response = $response;
           }
 
           public function handle($request, Closure $next){
                if ($this->auth->check()){
                     return $next($request);
               }
               return $this->response->redirectTo('auth/login');
           }
     }
