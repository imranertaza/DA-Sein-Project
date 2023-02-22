<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Subscribe extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
    }

    public function index()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('subscribe');
            $data['subscribe'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Subscribe/list', $data);
            echo view('Admin/footer');
        }
    }




}
