<?php 
namespace Framework\Middleware;
use Framework\Session;



class Authorize {

    public function isAuthenticated(){
        return Session::has("token");
    }
    // public function isOrg(){
    //     return (Session::get("account") == 'organization';)
    // }
    // public function handle($account){
    //     if ($account != 'organization' && $this->isAuthenticated()){
    //         header('Location:/');
    //     } elseif ($account  && $this->isAuthenticated()) {

    //     }
    // }
}