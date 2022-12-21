<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Country extends BaseController
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
            $table = DB()->table('country');
            $data['country'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Country/list', $data);
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

            $data['action'] = base_url('Admin/Country/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Country/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['country_name'] = $this->request->getPost('country_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'country_name' => ['label' => 'country_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Country/create');
        }else{

            $table = DB()->table('country');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Country/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('country');
            $data['country'] = $table->where('country_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Country/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Country/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $country_id = $this->request->getPost('country_id');

        $data['country_name'] = $this->request->getPost('country_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'country_name' => ['label' => 'country_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Country/update/' . $country_id);
        } else {
            $table = DB()->table('country');
            $table->where('country_id', $country_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Country/update/' . $country_id);
        }
    }


    public function delete($id){

        $table = DB()->table('country');
        $table->where('country_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Country');
    }


}
