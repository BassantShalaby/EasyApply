<?php
namespace Framework\Middleware;

use Framework\Session;



class Authorize
{

    public function isAuthenticated()
    {
        return Session::has("token");
    }

    public function handle($role)
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            return redirect('/');
        } elseif ($role === 'auth' && !$this->isAuthenticated()) {
            return redirect('/login');
        }

    }
}