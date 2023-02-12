<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Podcasts extends BaseController
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
            $table = DB()->table('podcasts');
            $data['podcasts'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','podcasts_banner')->get()->getRow();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Podcasts/list', $data);
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

            $data['action'] = base_url('Admin/Podcasts/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Podcasts/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action(){

        $data['podcasts_name'] = $this->request->getPost('podcasts_name');
        $data['youtube_url'] = $this->request->getPost('youtube_url');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'podcasts_name' => ['label' => 'podcasts_name', 'rules' => 'required'],
            'youtube_url' => ['label' => 'youtube_url', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/create');
        }else{

            $table = DB()->table('podcasts');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('podcasts');
            $data['podcasts'] = $table->where('podcasts_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Podcasts/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Podcasts/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $podcasts_id = $this->request->getPost('podcasts_id');

        $data['podcasts_name'] = $this->request->getPost('podcasts_name');
        $data['youtube_url'] = $this->request->getPost('youtube_url');

        $this->validation->setRules([
            'podcasts_name' => ['label' => 'podcasts_name', 'rules' => 'required'],
            'youtube_url' => ['label' => 'youtube_url', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/update/' . $podcasts_id);
        } else {
            $table = DB()->table('podcasts');
            $table->where('podcasts_id', $podcasts_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/update/' . $podcasts_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');

        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/podcasts/';
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
            $news_img = 'podcasts_slide_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['value'] = $news_img;

            $table = DB()->table('global_settings');
            $table->where('id', $id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Podcasts/');
        }
    }

    public function delete($id){

        $table = DB()->table('podcasts');
        $table->where('podcasts_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Podcasts');
    }


}
