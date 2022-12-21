<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class How_you_hear extends BaseController
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
            $table = DB()->table('how_you_hear');
            $data['how_you_hear'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/How_you_hear/list', $data);
            echo view('Admin/footer');
        }
    }

    public function create()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {

            $data['action'] = base_url('Admin/How_you_hear/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/How_you_hear/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['how_you_hear_name'] = $this->request->getPost('how_you_hear_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'how_you_hear_name' => ['label' => 'how_you_hear_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/How_you_hear/create');
        }else{

            $table = DB()->table('how_you_hear');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/How_you_hear/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('how_you_hear');
            $data['how_you_hear'] = $table->where('how_you_hear_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/How_you_hear/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/How_you_hear/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $how_you_hear_id = $this->request->getPost('how_you_hear_id');

        $data['how_you_hear_name'] = $this->request->getPost('how_you_hear_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'how_you_hear_name' => ['label' => 'how_you_hear_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/How_you_hear/update/' . $how_you_hear_id);
        } else {
            $table = DB()->table('how_you_hear');
            $table->where('how_you_hear_id', $how_you_hear_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/How_you_hear/update/' . $how_you_hear_id);
        }
    }


    public function delete($id){

        $table = DB()->table('how_you_hear');
        $table->where('how_you_hear_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/How_you_hear');
    }


}
