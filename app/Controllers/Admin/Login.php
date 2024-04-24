<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {

        $isLoggedIn = $this->session->isLoggedIn;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            print view('Admin/login');
        }else{
            return redirect()->to(site_url('Admin/Dashboard'));
        }
    }

    public function action(){
        $this->validation->setRule('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');

        if($this->validation->withRequest($this->request)->run() == FALSE){

            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">All field is required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url());
        }else{

            $email = strtolower($this->request->getPost('email'));
            $password = $this->request->getPost('password');

            $result = $this->loginMe($email, $password);

            if(!empty($result)){

                // Remember me (Remembering the user email and password) Start
                if (!empty($this->request->getPost("remember"))) {
                    setcookie('login_email',$email,time()+ (86400 * 30), "/");
                    setcookie('login_password',$password,time() + (86400 * 30), "/");
                }else{
                    if (isset($_COOKIE['login_email'])) {
                        setcookie('login_email','', 0, "/");
                    }
                    if (isset($_COOKIE['login_password'])) {
                        setcookie('login_password','', 0, "/");
                    }
                }
                // Remember me (Remembering the user email and password) End



                $sessionArray = array('userId'=>$result->user_id,
                    'name'=>$result->name,
                    'user'=>$result,
                    'isLoggedIn' => TRUE
                );
                $this->session->set($sessionArray);

                return redirect()->to(site_url('Admin/dashboard'));


            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Your login detail not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to(site_url());
            }

        }
    }

    private function loginMe($email,$password){
        $table = DB()->table('admin');
        $user = $table->where('email',$email)->where('status','1')->get()->getRow();

        if(!empty($user)){
            if(SHA1($password) == $user->password){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    private function licenseCheck($shopId){
        $query = $this->licenseModel->where('sch_id',$shopId)->first();

        $today = date('Y-m-d');
        if ($query->end_date > $today) {
            $data = true;
        }else{
            $data = false;
        }
        return $data;
    }

    public function logout()
    {

        unset($_SESSION['userId']);
        unset($_SESSION['shopId']);
        unset($_SESSION['role']);
        unset($_SESSION['name']);
        unset($_SESSION['isLoggedIn']);

//        $this->session->destroy();
        return redirect()->to('/');
    }

    public function forgot_password(){
        $isLoggedIn = $this->session->isLoggedIn;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            print view('Admin/ForgotPassword/forgot_password');
        }else{
            return redirect()->to(site_url('Admin/Dashboard'));
        }
    }
    public function otp_submit(){
        if (!empty($this->session->password_otp)) {
//            print $this->session->password_otp;
            print view('Admin/ForgotPassword/otp_submit');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please enter valid email address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/forgot_password'));
        }

    }

    public function otp_action(){
        $otp = $this->request->getPost('otp');
        if ($otp == $this->session->password_otp){
            $sessionData['password_reset'] = '1';
            $this->session->set($sessionData);
            return redirect()->to(site_url('Admin/Login/reset_password'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please enter valid otp <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/otp_submit'));
        }
    }

    public function reset_password(){
        if (!empty($this->session->password_reset)) {
            print view('Admin/ForgotPassword/reset_password');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please enter valid email address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/forgot_password'));
        }

    }

    public function forgot_password_action(){
        $password = $this->request->getPost('password');
        $con_password = $this->request->getPost('con_password');
        if ($password == $con_password){
            $email = $this->session->password_email;
            $data['password'] = SHA1($password);
            $table = DB()->table('admin');
            $table->where('email',$email)->update($data);

            unset($_SESSION['password_email']);
            unset($_SESSION['password_otp']);
            unset($_SESSION['password_reset']);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Password update successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Password and confirm password do not match<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/reset_password'));
        }
    }

    public function resend_otp(){
        $email = $this->session->password_email;
        if (!empty($email)){
            $otp = rand(1000,9999);
            $message = 'Your reset password otp is '.$otp;
            $this->email_send($email, 'Password reset otp', $message);

            $sessionData['password_email'] = $email;
            $sessionData['password_otp'] = $otp;
            $this->session->set($sessionData);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> Otp send successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/otp_submit'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please enter valid email address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/forgot_password'));
        }
    }
    public function forgot_otp_send(){
        $email = $this->request->getPost('email');
        $table = DB()->table('admin');
        $data = $table->where('email',$email)->where('status','1')->countAllResults();
        if (!empty($data)){
            $otp = rand(1000,9999);
            $message = 'Your reset password otp is '.$otp;
            $this->email_send($email, 'Password reset otp', $message);

            $sessionData['password_email'] = $email;
            $sessionData['password_otp'] = $otp;
            $this->session->set($sessionData);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> Otp send successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/otp_submit'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please enter valid email address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url('Admin/Login/forgot_password'));
        }


    }

    private function email_send($to, $subject, $message){

        $email = \Config\Services::email();

        $config['protocol'] = 'SMTP';
        $config['SMTPHost'] = 'da-sein.com';
        $config['SMTPUser'] = 'contact@da-sein.com';
        $config['SMTPPass'] = '2^W{ruI0%}-3';
        $config['SMTPPort'] = '465';
        $config['SMTPCrypto'] = 'ssl';
        $config['mailType'] = 'html';
        $config['charset'] = 'utf-8';

        $email->initialize($config);

        $titleStore = 'DA-SEIN';
        $form = 'contact@da-sein.com';

        $email->setFrom($form, $titleStore);
        $email->setTo($to);

        $email->setSubject($subject);
        $email->setMessage($message);

        //    $email->send();
        if ($email->send()) {
            return true;
        } else {
            $data = $email->printDebugger(['headers']);
            return  false;
        }
    }

}
