<?php


class Session {
    private $signedIn = false;
    public $userId;
    function __construct(){
        session_start();
        self::checkTheLogin(); 
    }
    
    public function isSignedIn(){
        return $this->signedIn;
    }
    
    public function login($user){
        if($user){
            $this->userId = $_SESSION['userId'] = $user->id;
            $this->signedIn = true;
            //return "successfull login";
            
        }
    }
    public function logout(){
        unset($_SESSION['userId']);
        unset($this->userId);
        $this->signedIngned = false;
        

    }
    private function checkTheLogin(){
        if(isset($_SESSION['userId'])){
            $this->userId = $_SESSION['userId'];
            $this->signedIn = true;
        }else{
            unset($this->userId);
            $this->signedIngned = false;
        }
    }
}

$session = new Session();




?>