<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Client extends BaseController
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
            $table = DB()->table('client');
            $data['client'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','client_banner')->get()->getRow();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Client/list', $data);
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

            $data['action'] = base_url('Admin/Client/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Client/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['url'] = $this->request->getPost('url');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'url' => ['label' => 'url', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Client/create');
        }else{

            if (!empty($_FILES['logo']['name'])){
                $target_dir = FCPATH . '/uploads/client/';
                if(!file_exists($target_dir)){
                    mkdir($target_dir,0777);
                }

                //new image uplode
                $pic = $this->request->getFile('logo');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir,$namePic);
                $news_img = 'client_'.$pic->getName();
                $this->crop->withFile($target_dir.''.$namePic)->fit(232, 155, 'center')->save($target_dir.''.$news_img);
                unlink($target_dir.''.$namePic);
                $data['logo'] = $news_img;
            }



            $table = DB()->table('client');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Client/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('client');
            $data['client'] = $table->where('client_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Client/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Client/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $client_id = $this->request->getPost('client_id');

        $data['url'] = $this->request->getPost('url');
        $data['status'] = $this->request->getPost('status');

        $this->validation->setRules([
            'url' => ['label' => 'url', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if (!empty($_FILES['logo']['name'])){
            $target_dir = FCPATH . '/uploads/client/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('logo','client','client_id',$client_id);
            if (!empty($old_img)){
                unlink($target_dir.''.$old_img);
            }

            //new image uplode
            $pic = $this->request->getFile('logo');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $news_img = 'people_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(232, 155, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['logo'] = $news_img;
        }

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Client/update/' . $client_id);
        } else {
            $table = DB()->table('client');
            $table->where('client_id', $client_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Client/update/' . $client_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');
        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/client/banner/';
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
            return redirect()->to('/Admin/Client/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Client/');
        }
    }


    public function delete($id){

        //old image unlink
        $target_dir = FCPATH . '/uploads/client/';
        $old_img = get_data_by_id('logo','client','client_id',$id);
        if (!empty($old_img)){
            unlink($target_dir.''.$old_img);
        }

        $table = DB()->table('client');
        $table->where('client_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Client');
    }


}
