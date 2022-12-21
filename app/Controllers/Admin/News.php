<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class News extends BaseController
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
            $table = DB()->table('news');
            $data['news'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/News/list',$data);
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

            $data['action'] = base_url('Admin/News/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/News/create',$data);
            echo view('Admin/footer');
        }
    }

    public function create_action(){

        $data['news_title'] = $this->request->getPost('news_title');
        $data['news_type'] = $this->request->getPost('news_type');
        $data['short_des'] = $this->request->getPost('short_des');
        $data['news_description'] = $this->request->getPost('news_description');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['years'] = $this->request->getPost('years');


        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['news_title'])));
        $data['slug'] = $slug;

        if (!empty($_FILES['image']['name'])){
            $target_dir = FCPATH . '/uploads/news_img/'.$slug.'/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //new image uplode
            $pic = $this->request->getFile('image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'news_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            $this->crop->withFile($target_dir.''.$namePic)->fit(402, 245, 'center')->save($target_dir.''.'thum_'.$news_img);
            unlink($target_dir.''.$namePic);
            $data['image'] = $news_img;
        }




        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'news_title' => ['label' => 'news_title', 'rules' => 'required'],
            'news_type' => ['label' => 'news_type', 'rules' => 'required'],
            'news_description' => ['label' => 'news_description', 'rules' => 'required'],
            'years' => ['label' => 'Years', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/News/create');
        }else{
            $table = DB()->table('news');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/News/create');
        }
    }


    public function update($id){
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {
            $table = DB()->table('news');
            $data['news'] = $table->where('news_id',$id)->get()->getRow();
            $data['action'] = base_url('Admin/News/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/News/update',$data);
            echo view('Admin/footer');
        }
    }

    public function update_action(){

        $data['news_id'] = $this->request->getPost('news_id');

        $data['news_title'] = $this->request->getPost('news_title');
        $data['news_type'] = $this->request->getPost('news_type');
        $data['short_des'] = $this->request->getPost('short_des');
        $data['news_description'] = $this->request->getPost('news_description');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['status'] = $this->request->getPost('status');
        $data['years'] = $this->request->getPost('years');
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['news_title'])));
        $data['slug'] = $slug;

        if (!empty($_FILES['image']['name'])){
            $target_dir = FCPATH . '/uploads/news_img/'.$slug.'/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_slug = get_data_by_id('slug','news','news_id',$data['news_id']);
            $old_img = get_data_by_id('image','news','news_id',$data['news_id']);
            $target_dir2 = FCPATH . '/uploads/news_img/'.$old_slug.'/';
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
                unlink($target_dir.''.'thum_'.$old_img);
            }

            //new image uplode
            $pic = $this->request->getFile('image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'news_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            $this->crop->withFile($target_dir.''.$namePic)->fit(402, 245, 'center')->save($target_dir.''.'thum_'.$news_img);
            unlink($target_dir.''.$namePic);
            $data['image'] = $news_img;
        }




        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'news_title' => ['label' => 'news_title', 'rules' => 'required'],
            'news_type' => ['label' => 'news_type', 'rules' => 'required'],
            'news_description' => ['label' => 'news_description', 'rules' => 'required'],
            'years' => ['label' => 'Years', 'rules' => 'required'],
        ]);


        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/News/update/'.$data['news_id']);
        }else{
            $table = DB()->table('news');
            $table->where('news_id',$data['news_id'])->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/News/update/'.$data['news_id']);
        }
    }

    public function delete($id){

        //old image unlink
        $old_slug = get_data_by_id('slug','news','news_id',$id);
        $old_img = get_data_by_id('image','news','news_id',$id);
        $target_dir = FCPATH . '/uploads/news_img/'.$old_slug.'/';
        if (!empty($old_img)){
            unlink($target_dir.''.$old_img);
            unlink($target_dir.''.'thum_'.$old_img);
        }

        $table = DB()->table('news');
        $table->where('news_id',$id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/News/');
    }





}
