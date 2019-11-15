<?php

include_once('User.php');
class Session {
    public $signedIn = false;
    private $admin = false;
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
            $this->check_admin($user);

        }
    }
    public function isadmin(){
      return $this->admin;
    }
    private function check_admin($user){
      if($user->isadmin == true){
        $this->admin = true;
      }
    }
    public function logout(){
        unset($_SESSION['userId']);
        unset($this->userId);
        $this->$signedIn = false;
        $this->admin = false;


    }
    private function checkTheLogin(){
        if(isset($_SESSION['userId'])){
            $this->userId = $_SESSION['userId'];
            $user = User::find_by_id($this->userId);
            if($user->isadmin == true){
              $this->admin = true;
            }
            $this->signedIn = true;
        }else{
            unset($this->userId);
            $this->signedIngned = false;
        }
    }
}

$session = new Session();




?>
