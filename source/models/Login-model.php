<?php
loadModel('User');

class Login extends Model{

    public function checkLogin(){
        $user = User::getOne(['email' => $this->email] );
        if ($user){
            $this->checkPassword($user);
            $this->checkEndDate($user);
            return $user;
        }
        throw new AppException('Usuário/senha inválidos!');
    }

    private function checkPassword($user){
        if(password_verify($this->password, $user->password)){
            return $user;
        }
        throw new AppException('Usuário/senha inválidos!');

    }

    private function checkEndDate($user){
        if($user->end_date) {
            throw new AppException('Usuário desligado da empresa');
        }
    }

}