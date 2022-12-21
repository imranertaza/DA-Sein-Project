<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Awards extends BaseController
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
            $table = DB()->table('awards');
            $data['awards'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','awards_banner')->get()->getRow();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Awards/list', $data);
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

            $data['action'] = base_url('Admin/Awards/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Awards/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['award_title'] = $this->request->getPost('award_title');
        $data['award_title_url'] = $this->request->getPost('award_title_url');
        $data['short_title'] = $this->request->getPost('short_title');
        $data['short_title_url'] = $this->request->getPost('short_title_url');
        $data['year'] = $this->request->getPost('year');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'award_title' => ['label' => 'award_title', 'rules' => 'required'],
            'award_title_url' => ['label' => 'award_title_url', 'rules' => 'required'],
            'short_title' => ['label' => 'short_title', 'rules' => 'required'],
            'short_title_url' => ['label' => 'short_title_url', 'rules' => 'required'],
            'year' => ['label' => 'year', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/create');
        }else{

            $table = DB()->table('awards');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('awards');
            $data['awards'] = $table->where('award_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Awards/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Awards/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $award_id = $this->request->getPost('award_id');

        $data['award_title'] = $this->request->getPost('award_title');
        $data['award_title_url'] = $this->request->getPost('award_title_url');
        $data['short_title'] = $this->request->getPost('short_title');
        $data['short_title_url'] = $this->request->getPost('short_title_url');
        $data['year'] = $this->request->getPost('year');
        $data['status'] = $this->request->getPost('status');

        $this->validation->setRules([
            'award_title' => ['label' => 'award_title', 'rules' => 'required'],
            'award_title_url' => ['label' => 'award_title_url', 'rules' => 'required'],
            'short_title' => ['label' => 'short_title', 'rules' => 'required'],
            'short_title_url' => ['label' => 'short_title_url', 'rules' => 'required'],
            'year' => ['label' => 'year', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/update/' . $award_id);
        } else {
            $table = DB()->table('awards');
            $table->where('award_id', $award_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/update/' . $award_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');
        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/awards/banner/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('value','global_settings','id',$id);
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
            }

            //new image uplode
            $pic = $this->request->getFile('photo');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'people_slide_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['value'] = $news_img;

            $table = DB()->table('global_settings');
            $table->where('id', $id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Awards/');
        }
    }


    public function delete($id){

        $table = DB()->table('awards');
        $table->where('award_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Awards');
    }


}
