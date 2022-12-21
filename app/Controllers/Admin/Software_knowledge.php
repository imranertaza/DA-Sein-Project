<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Software_knowledge extends BaseController
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
            $table = DB()->table('software_knowledge');
            $data['software_knowledge'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Software_knowledge/list', $data);
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

            $data['action'] = base_url('Admin/Software_knowledge/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Software_knowledge/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['software_name'] = $this->request->getPost('software_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'software_name' => ['label' => 'software_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Software_knowledge/create');
        }else{

            $table = DB()->table('software_knowledge');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Software_knowledge/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('software_knowledge');
            $data['software_knowledge'] = $table->where('software_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Software_knowledge/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Software_knowledge/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $software_id = $this->request->getPost('software_id');

        $data['software_name'] = $this->request->getPost('software_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'software_name' => ['label' => 'software_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Software_knowledge/update/' . $software_id);
        } else {
            $table = DB()->table('software_knowledge');
            $table->where('software_id', $software_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Software_knowledge/update/' . $software_id);
        }
    }


    public function delete($id){

        $table = DB()->table('software_knowledge');
        $table->where('software_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Software_knowledge');
    }


}
