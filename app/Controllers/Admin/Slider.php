<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Slider extends BaseController
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
            $table = DB()->table('slider');
            $data['slider'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Slider/list', $data);
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

            $data['action'] = base_url('Admin/Slider/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Slider/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['name'] = $this->request->getPost('name');
        if (!empty($_FILES['image']['name'])) {
            $target_dir = FCPATH . '/uploads/slider_img/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic = $this->request->getFile('image');
            $namePic = 'slider_' . $pic->getRandomName();//$pic->getRandomName();
            $pic->move($target_dir, $namePic);
//            $news_img = 'news_'.$pic->getName();
//            $this->crop->withFile($target_dir.''.$namePic)->fit(1000, 1000, 'center')->save($target_dir.''.$news_img);
//            unlink($target_dir.''.$namePic);
            $data['image'] = $namePic;
        }

        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Slider/create');
        } else {
            $table = DB()->table('slider');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Slider/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('slider');
            $data['slider'] = $table->where('sl_id', $id)->get()->getRow();
            $data['action'] = base_url('Admin/Slider/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Slider/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $data['sl_id'] = $this->request->getPost('sl_id');

        $data['name'] = $this->request->getPost('name');
        $data['status'] = $this->request->getPost('status');

        if (!empty($_FILES['image']['name'])) {
            $target_dir = FCPATH . '/uploads/slider_img/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //old image unlink
            $old_img = get_data_by_id('image', 'slider', 'sl_id', $data['sl_id']);
            if (!empty($old_img)) {
                $imgPath = $target_dir.''.$old_img;
                if (file_exists($imgPath)) {
                    unlink($target_dir . '' . $old_img);
                }
            }

            //new image uplode
            $pic = $this->request->getFile('image');
            $namePic = 'news_' . $pic->getRandomName();//$pic->getRandomName();
            $pic->move($target_dir, $namePic);
//            $news_img = 'news_'.$pic->getName();
//            $this->crop->withFile($target_dir.''.$namePic)->fit(1000, 1000, 'center')->save($target_dir.''.$news_img);
//            unlink($target_dir.''.$namePic);
            $data['image'] = $namePic;
        }


        $this->validation->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
        ]);


        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Slider/update/' . $data['sl_id']);
        } else {
            $table = DB()->table('slider');
            $table->where('sl_id', $data['sl_id'])->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Slider/update/' . $data['sl_id']);
        }
    }

    public function delete($id)
    {

        //old image unlink
        $old_img = get_data_by_id('image', 'slider', 'sl_id', $id);
        $target_dir = FCPATH . '/uploads/slider_img/';
        if (!empty($old_img)) {
            $imgPath = $target_dir.''.$old_img;
            if (file_exists($imgPath)) {
                unlink($target_dir . '' . $old_img);
            }
        }

        $table = DB()->table('slider');
        $table->where('sl_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Slider/');
    }


}
