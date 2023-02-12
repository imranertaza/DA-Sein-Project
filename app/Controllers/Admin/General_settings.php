<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class General_settings extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
    }
    public function index()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {
            $table = DB()->table('global_settings');
            $data['settings'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/General_settings/settings_list',$data);
            echo view('Admin/footer');
        }
    }

    public function create()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {

            $data['action'] = base_url('Admin/General_settings/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/General_settings/create',$data);
            echo view('Admin/footer');
        }
    }

    public function create_action(){

        $data['title'] = $this->request->getPost('title');
        $data['value'] = $this->request->getPost('value');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'title' => ['title' => 'label', 'rules' => 'required'],
            'value' => ['label' => 'value', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/General_settings/create');
        }else{
            $table = DB()->table('global_settings');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/General_settings/create');
        }
    }


    public function update($id){
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {
            $table = DB()->table('global_settings');
            $data['settings'] = $table->where('id',$id)->get()->getRow();
            $data['action'] = base_url('Admin/General_settings/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/General_settings/update',$data);
            echo view('Admin/footer');
        }
    }

    public function update_action(){
        $data['id'] = $this->request->getPost('id');
        $data['value'] = $this->request->getPost('value');

        $this->validation->setRules([
            'value' => ['label' => 'value', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/General_settings/update/'.$data['id']);
        }else{
            $table = DB()->table('global_settings');
            $table->where('id',$data['id'])->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/General_settings/update/'.$data['id']);
        }
    }







}
