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



}
