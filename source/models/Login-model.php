<?php
loadModel('User');

class Login extends Model{

    public function checkLogin(){
        $user = User::getOne(['email' => $this->email] );
        if ($user){
            $this->checkPassword();
        }
        throw new Exception();
    }

    private function checkPassword($user){
        if(password_verify($this->password, $user->password)){
            return $user;
        }
    }

}