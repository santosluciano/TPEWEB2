<?php
require_once('Api.php');

class ApiSecuredController extends Api
{
    private $active;
    private $admin;    
    public function __construct()
    {
        parent::__construct();
        session_start(); 
        if(isset($_SESSION['USER'])){
            if (time() - $_SESSION['LAST_ACTIVITY'] > 1000) {
                $this->active = false;
                $this->admin = false;
            }
            $_SESSION['LAST_ACTIVITY'] = time();
            $this->active = true;
            if ($_SESSION['ADMIN'] == 1)
                $this->admin = true;
            else
                $this->admin = false;
        }else{
            $this->active = false;
            $this->admin = false;
        }
    }
    function isActive(){
        return $this->active;
    }
    function isAdmin(){
        return $this->admin;
    }
    function Unauthorized_response(){
        return $this->json_response(false, 401);
    }
    function Forbidden_response(){
        return $this->json_response(false, 403);
    }
}

?>