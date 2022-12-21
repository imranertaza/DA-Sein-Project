<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Work extends BaseController
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
            $table = DB()->table('works');
            $data['works'] = $table->get()->getResult();



            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Work/list', $data);
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

            $data['action'] = base_url('Admin/Work/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Work/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['project_name'] = $this->request->getPost('project_name');
        $data['typology'] = $this->request->getPost('typology');
        $data['location'] = $this->request->getPost('location');
        $data['year'] = $this->request->getPost('year');
        $data['client'] = $this->request->getPost('client');
        $data['design_team'] = $this->request->getPost('design_team');
        $data['news_description'] = $this->request->getPost('news_description');
        $data['project_status'] = $this->request->getPost('project_status');
        $data['size'] = $this->request->getPost('size');
        $data['collaborators'] = $this->request->getPost('collaborators');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['cat_id'] = $this->request->getPost('cat_id');
//        $data['img_unlock_code'] = rand(100000,999999);
        $data['createdBy'] = $this->session->userId;

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['project_name'])));
        $data['slug'] = $slug;

        $this->validation->setRules([
            'project_name' => ['label' => 'project_name', 'rules' => 'required'],
            'cat_id' => ['label' => 'cat_id', 'rules' => 'required'],
            'news_description' => ['label' => 'news_description', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Work/create');
        }else{
            $table = DB()->table('works');
            $table->insert($data);
            $datawork['work_id'] = DB()->insertID();

            if ($this->request->getFileMultiple('multiImage')) {
                $target_dir = FCPATH . '/uploads/work_img/'.$slug.'/';
                if(!file_exists($target_dir)){
                    mkdir($target_dir,0777);
                }

                foreach ($this->request->getFileMultiple('multiImage') as $file) {
                    if (!empty($file->getName())) {
                        $namePic = $file->getRandomName();

                        $file->move($target_dir, $namePic);
                        $news_img = 'work_' . $file->getName();
                        $this->crop->withFile($target_dir . '' . $namePic)->fit(1500, 840, 'center')->save($target_dir . '' . $news_img);
                        $this->crop->withFile($target_dir . '' . $namePic)->fit(615, 346, 'center')->save($target_dir . '' . 'thum_' . $news_img);
                        unlink($target_dir . '' . $namePic);

                        $datawork['image'] = $news_img;

                        $tablework = DB()->table('work_gallary');
                        $tablework->insert($datawork);
                    }

                }
            }

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Work/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('works');
            $data['work'] = $table->where('work_id', $id)->get()->getRow();

            $tablegal = DB()->table('work_gallary');
            $data['work_image'] = $tablegal->where('work_id', $id)->get()->getResult();
            $data['action'] = base_url('Admin/Work/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Work/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $data['work_id'] = $this->request->getPost('work_id');

        $data['project_name'] = $this->request->getPost('project_name');
        $data['typology'] = $this->request->getPost('typology');
        $data['location'] = $this->request->getPost('location');
        $data['year'] = $this->request->getPost('year');
        $data['client'] = $this->request->getPost('client');
        $data['design_team'] = $this->request->getPost('design_team');
        $data['news_description'] = $this->request->getPost('news_description');
        $data['project_status'] = $this->request->getPost('project_status');
        $data['size'] = $this->request->getPost('size');
        $data['collaborators'] = $this->request->getPost('collaborators');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['cat_id'] = $this->request->getPost('cat_id');
        $data['status'] = $this->request->getPost('status');

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['project_name'])));
        $data['slug'] = $slug;

        $this->validation->setRules([
            'project_name' => ['label' => 'project_name', 'rules' => 'required'],
            'cat_id' => ['label' => 'cat_id', 'rules' => 'required'],
            'news_description' => ['label' => 'news_description', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;


        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Work/update/' . $data['work_id']);
        } else {
            $table = DB()->table('works');
            $table->where('work_id', $data['work_id'])->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Work/update/' . $data['work_id']);
        }
    }

    public function add_image(){
        $data['work_id'] = $this->request->getPost('work_id');
        $slug = get_data_by_id('slug','works','work_id',$data['work_id']);

        if ($this->request->getFileMultiple('multiImage')) {
            $target_dir = FCPATH . '/uploads/work_img/'.$slug.'/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            foreach ($this->request->getFileMultiple('multiImage') as $file) {
                if (!empty($file->getName())) {
                    $namePic = $file->getRandomName();

                    $file->move($target_dir, $namePic);
                    $news_img = 'work_' . $file->getName();
                    $this->crop->withFile($target_dir . '' . $namePic)->fit(1500, 840, 'center')->save($target_dir . '' . $news_img);
                    $this->crop->withFile($target_dir . '' . $namePic)->fit(615, 346, 'center')->save($target_dir . '' . 'thum_' . $news_img);
                    unlink($target_dir . '' . $namePic);

                    $data['image'] = $news_img;

                    $tablework = DB()->table('work_gallary');
                    $tablework->insert($data);
                }

            }

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Add New Image Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Work/update/'.$data['work_id']);
        }
//        else{
//            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> Image required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//            return redirect()->to('/Admin/Work/update/'.$data['work_id']);
//        }

    }

    public function update_image(){
        $data['work_gallary_id'] = $this->request->getPost('work_gallary_id');
        $work_id = $this->request->getPost('work_id');
        $permissions_image = $this->request->getPost('permissions_image');
        $slug = get_data_by_id('slug','works','work_id',$work_id);
        if (!empty($permissions_image)){
            $datawork['protected'] = '1';
        }else{
            $datawork['protected'] = '0';
        }

        if (!empty($_FILES['image']['name'])) {
            $target_dir = FCPATH . '/uploads/work_img/'.$slug.'/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('image','work_gallary','work_gallary_id',$data['work_gallary_id']);
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
                unlink($target_dir.''.'thum_'.$old_img);
            }


            $file = $this->request->getFile('image');
            $namePic = $file->getRandomName();

            $file->move($target_dir, $namePic);
            $news_img = 'work_' . $file->getName();
            $this->crop->withFile($target_dir . '' . $namePic)->fit(1500, 840, 'center')->save($target_dir . '' . $news_img);
            $this->crop->withFile($target_dir . '' . $namePic)->fit(615, 346, 'center')->save($target_dir . '' . 'thum_' . $news_img);
            unlink($target_dir . '' . $namePic);

            $datawork['image'] = $news_img;


        }

        $tablework = DB()->table('work_gallary');
        $tablework->where('work_gallary_id',$data['work_gallary_id'])->update($datawork);

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Work/update/'.$work_id);

//        else{
//            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image filed required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//            return redirect()->to('/Admin/Work/update/'.$work_id);
//        }
    }

    public function view($id){
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('works');
            $data['work'] = $table->where('work_id', $id)->get()->getRow();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Work/view', $data);
            echo view('Admin/footer');
        }
    }

    public function delete($id)
    {
        helper('filesystem');
        $slug = get_data_by_id('slug','works','work_id',$id);
        $target_dir = FCPATH . '/uploads/work_img/'.$slug;
        delete_files($target_dir );

        $table = DB()->table('work_gallary');
        $table->where('work_id', $id)->delete();

        $table = DB()->table('works');
        $table->where('work_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Work');
    }

    public function delete_image($id){
        $work_id = get_data_by_id('work_id','work_gallary','work_gallary_id',$id);
        $slug = get_data_by_id('slug','works','work_id',$work_id);
        $old_img = get_data_by_id('image','work_gallary','work_gallary_id',$id);

        $target_dir = FCPATH . '/uploads/work_img/'.$slug.'/';
        if (!empty($old_img)){
            unlink($target_dir.''.$old_img);
            unlink($target_dir.''.'thum_'.$old_img);
        }

        $table = DB()->table('work_gallary');
        $table->where('work_gallary_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Work/update/'.$work_id);
    }


}
