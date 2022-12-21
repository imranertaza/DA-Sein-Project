<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Employment extends BaseController
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
            $data['employment'] = $table->where('page_type','3')->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','employment_banner')->get()->getRow();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Employment/list', $data);
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

            $data['action'] = base_url('Admin/Employment/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Employment/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['title'] = $this->request->getPost('title');
        $data['page_type'] = '3';
        $data['description'] = $this->request->getPost('description');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'title' => ['label' => 'title', 'rules' => 'required'],
            'description' => ['label' => 'description', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/create');
        }else{

            $table = DB()->table('blocks');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/create');
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

            $data['action'] = base_url('Admin/Employment/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Employment/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $block_id = $this->request->getPost('block_id');

        $data['title'] = $this->request->getPost('title');
        $data['description'] = $this->request->getPost('description');

        $this->validation->setRules([
            'title' => ['label' => 'title', 'rules' => 'required'],
            'description' => ['label' => 'description', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/update/' . $block_id);
        } else {
            $table = DB()->table('blocks');
            $table->where('block_id', $block_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/update/' . $block_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');

        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/employment/';
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
            $news_img = 'employment_slide_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['value'] = $news_img;

            $table = DB()->table('global_settings');
            $table->where('id', $id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Employment/');
        }
    }

    public function delete($id){

        $table = DB()->table('blocks');
        $table->where('block_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Employment');
    }


}
