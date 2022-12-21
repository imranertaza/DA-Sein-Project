<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Applied_position extends BaseController
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
            $table = DB()->table('applied_position');
            $data['applied_position'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Applied_position/list', $data);
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

            $data['action'] = base_url('Admin/Applied_position/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Applied_position/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['applied_position_name'] = $this->request->getPost('applied_position_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'applied_position_name' => ['label' => 'applied_position_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Applied_position/create');
        }else{

            $table = DB()->table('applied_position');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Applied_position/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('applied_position');
            $data['applied_position'] = $table->where('applied_position_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Applied_position/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Applied_position/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $applied_position_id = $this->request->getPost('applied_position_id');

        $data['applied_position_name'] = $this->request->getPost('applied_position_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'applied_position_name' => ['label' => 'applied_position_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Applied_position/update/' . $applied_position_id);
        } else {
            $table = DB()->table('applied_position');
            $table->where('applied_position_id', $applied_position_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Applied_position/update/' . $applied_position_id);
        }
    }


    public function delete($id){

        $table = DB()->table('applied_position');
        $table->where('applied_position_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Applied_position');
    }


}
