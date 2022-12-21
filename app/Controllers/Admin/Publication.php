<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Publication extends BaseController
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
            $table = DB()->table('publication');
            $data['publication'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','publication_banner')->get()->getRow();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Publication/list', $data);
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

            $data['action'] = base_url('Admin/Publication/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Publication/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['name'] = $this->request->getPost('name');
        $data['title'] = $this->request->getPost('title');
        $data['author'] = $this->request->getPost('author');
        $data['publisher'] = $this->request->getPost('publisher');
        $data['published'] = $this->request->getPost('published');
        $data['language'] = $this->request->getPost('language');
        $data['format'] = $this->request->getPost('format');
        $data['binding'] = $this->request->getPost('binding');
        $data['page_count'] = $this->request->getPost('page_count');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'title' => ['label' => 'title', 'rules' => 'required'],
            'author' => ['label' => 'author', 'rules' => 'required'],
            'publisher' => ['label' => 'publisher', 'rules' => 'required'],
            'published' => ['label' => 'published', 'rules' => 'required'],
            'language' => ['label' => 'language', 'rules' => 'required'],
            'format' => ['label' => 'format', 'rules' => 'required'],
            'binding' => ['label' => 'binding', 'rules' => 'required'],
            'page_count' => ['label' => 'page_count', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/create');
        }else{

            if (!empty($_FILES['photo']['name'])){
                $target_dir = FCPATH . '/uploads/publication/';
                if(!file_exists($target_dir)){
                    mkdir($target_dir,0777);
                }

                //new image uplode
                $pic = $this->request->getFile('photo');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir,$namePic);
                $news_img = 'publication_'.$pic->getName();
                $this->crop->withFile($target_dir.''.$namePic)->fit(563, 563, 'center')->save($target_dir.''.$news_img);
                unlink($target_dir.''.$namePic);
                $data['image'] = $news_img;
            }



            $table = DB()->table('publication');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('publication');
            $data['publication'] = $table->where('publication_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Publication/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Publication/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $publication_id = $this->request->getPost('publication_id');

        $data['name'] = $this->request->getPost('name');
        $data['title'] = $this->request->getPost('title');
        $data['author'] = $this->request->getPost('author');
        $data['publisher'] = $this->request->getPost('publisher');
        $data['published'] = $this->request->getPost('published');
        $data['language'] = $this->request->getPost('language');
        $data['format'] = $this->request->getPost('format');
        $data['binding'] = $this->request->getPost('binding');
        $data['page_count'] = $this->request->getPost('page_count');

        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'title' => ['label' => 'title', 'rules' => 'required'],
            'author' => ['label' => 'author', 'rules' => 'required'],
            'publisher' => ['label' => 'publisher', 'rules' => 'required'],
            'published' => ['label' => 'published', 'rules' => 'required'],
            'language' => ['label' => 'language', 'rules' => 'required'],
            'format' => ['label' => 'format', 'rules' => 'required'],
            'binding' => ['label' => 'binding', 'rules' => 'required'],
            'page_count' => ['label' => 'page_count', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/publication/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('image','publication','publication_id',$publication_id);
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
            }

            //new image uplode
            $pic = $this->request->getFile('photo');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'publication_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(364, 243, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['image'] = $news_img;
        }

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/update/' . $publication_id);
        } else {
            $table = DB()->table('publication');
            $table->where('publication_id', $publication_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/update/' . $publication_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');
        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/publication/banner/';
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
            $news_img = 'publication_slide_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['value'] = $news_img;

            $table = DB()->table('global_settings');
            $table->where('id', $id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Publication/');
        }
    }


    public function delete($id){

        //old image unlink
        $target_dir = FCPATH . '/uploads/publication/';
        $old_img = get_data_by_id('image','publication','publication_id',$id);
        if (!empty($old_img)){
            unlink($target_dir.''.$old_img);
        }

        $table = DB()->table('publication');
        $table->where('publication_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Publication');
    }


}
