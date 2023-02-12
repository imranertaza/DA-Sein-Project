<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class People extends BaseController
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
            $table = DB()->table('people');
            $data['people'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','people_banner')->get()->getRow();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/People/list', $data);
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

            $data['action'] = base_url('Admin/People/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/People/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        $data['post'] = $this->request->getPost('post');        
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'post' => ['label' => 'post', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/People/create');
        }else{

            if (!empty($_FILES['photo']['name'])){
                $target_dir = FCPATH . '/uploads/people/';
                if(!file_exists($target_dir)){
                    mkdir($target_dir,0777);
                }

                //new image uplode
                $pic = $this->request->getFile('photo');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir,$namePic);
                $news_img = 'people_'.$pic->getName();
                $this->crop->withFile($target_dir.''.$namePic)->fit(364, 243, 'center')->save($target_dir.''.$news_img);
                unlink($target_dir.''.$namePic);
                $data['photo'] = $news_img;
            }



            $table = DB()->table('people');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/People/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('people');
            $data['people'] = $table->where('people_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/People/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/People/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $people_id = $this->request->getPost('people_id');

        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        $data['post'] = $this->request->getPost('post');
        $data['status'] = $this->request->getPost('status');

        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'post' => ['label' => 'post', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/people/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('photo','people','people_id',$people_id);
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
            }

            //new image uplode
            $pic = $this->request->getFile('photo');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'people_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(364, 243, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['photo'] = $news_img;
        }

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/People/update/' . $people_id);
        } else {
            $table = DB()->table('people');
            $table->where('people_id', $people_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/People/update/' . $people_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');
        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/people/banner/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('value','global_settings','id',$id);
            if (!empty($old_img)){
                $imgPath = $target_dir.''.$old_img;
                if (file_exists($imgPath)) {
                    unlink($target_dir . '' . $old_img);
                }
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
            return redirect()->to('/Admin/People/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/People/');
        }
    }


    public function delete($id){

        //old image unlink
        $target_dir = FCPATH . '/uploads/people/';
        $old_img = get_data_by_id('photo','people','people_id',$id);
        if (!empty($old_img)){
            unlink($target_dir.''.$old_img);
        }

        $table = DB()->table('people');
        $table->where('people_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/People');
    }


}
