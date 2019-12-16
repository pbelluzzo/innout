<?php
loadModel('User');

class Login extends Model{

    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = 'Informe o e-mail';
        }
        if(!$this->password){
            $errors['password'] = 'Informe a senha';
        }
        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }

    public function checkLogin(){
        $this->validate();
        $user = User::getOne(['email' => $this->email] );
        if($this->checkEndDate($user)){
            throw new AppException("Colaborador inativo");
        }
        if($this->checkPassword($user)){
            return $user;
        }
        throw new AppException('Usuário/senha inválidos!');
    }

    private function checkPassword($user){
        if(password_verify($this->password, $user->password)){
            return true;
        }
    }

    private function checkEndDate($user){
        if($user->end_date) {
            return true;
        }
    }

}