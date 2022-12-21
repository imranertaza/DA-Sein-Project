<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Block extends BaseController
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
            $table = DB()->table('blocks');
            $data['blocks'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Block/list', $data);
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

            $data['action'] = base_url('Admin/Block/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Block/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['title'] = $this->request->getPost('title');
        $data['page_type'] = $this->request->getPost('page_type');
        $data['description'] = $this->request->getPost('description');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'title' => ['label' => 'title', 'rules' => 'required'],
            'page_type' => ['label' => 'page_type', 'rules' => 'required'],
            'description' => ['label' => 'description', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Block/create');
        }else{

            $table = DB()->table('blocks');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Block/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('blocks');
            $data['block'] = $table->where('block_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Block/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Block/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $block_id = $this->request->getPost('block_id');

        $data['title'] = $this->request->getPost('title');
        $data['page_type'] = $this->request->getPost('page_type');
        $data['description'] = $this->request->getPost('description');

        $this->validation->setRules([
            'title' => ['label' => 'title', 'rules' => 'required'],
            'page_type' => ['label' => 'page_type', 'rules' => 'required'],
            'description' => ['label' => 'description', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Block/update/' . $block_id);
        } else {
            $table = DB()->table('blocks');
            $table->where('block_id', $block_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Block/update/' . $block_id);
        }
    }


    public function delete($id){

        $table = DB()->table('blocks');
        $table->where('block_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Block');
    }


}
