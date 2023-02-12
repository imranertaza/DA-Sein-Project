<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Event extends BaseController
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
            $table = DB()->table('event');
            $data['event'] = $table->get()->getResult();

            $glob_table = DB()->table('global_settings');
            $data['slider'] = $glob_table->where('title','event_banner')->get()->getRow();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Event/list', $data);
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

            $data['action'] = base_url('Admin/Event/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Event/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['event_name'] = $this->request->getPost('event_name');
        $data['short_details'] = $this->request->getPost('short_details');
        $data['location'] = $this->request->getPost('location');
        $data['event_date'] = $this->request->getPost('event_date');
        $data['url'] = $this->request->getPost('url');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'event_name' => ['label' => 'event_name', 'rules' => 'required'],
            'short_details' => ['label' => 'short_details', 'rules' => 'required'],
            'location' => ['label' => 'location', 'rules' => 'required'],
            'event_date' => ['label' => 'event_date', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/create');
        }else{

            $table = DB()->table('event');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('event');
            $data['event'] = $table->where('event_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Event/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Event/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $event_id = $this->request->getPost('event_id');

        $data['event_name'] = $this->request->getPost('event_name');
        $data['short_details'] = $this->request->getPost('short_details');
        $data['location'] = $this->request->getPost('location');
        $data['event_date'] = $this->request->getPost('event_date');
        $data['url'] = $this->request->getPost('url');

        $this->validation->setRules([
            'event_name' => ['label' => 'event_name', 'rules' => 'required'],
            'short_details' => ['label' => 'short_details', 'rules' => 'required'],
            'location' => ['label' => 'location', 'rules' => 'required'],
            'event_date' => ['label' => 'event_date', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
        ]);

        $data['updatedBy'] = $this->session->userId;

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/update/' . $event_id);
        } else {
            $table = DB()->table('event');
            $table->where('event_id', $event_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/update/' . $event_id);
        }
    }

    public function slider_update(){
        $id = $this->request->getPost('id');
        if (!empty($_FILES['photo']['name'])){
            $target_dir = FCPATH . '/uploads/event/banner/';
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
            $news_img = 'event_slide_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(1500, 840, 'center')->save($target_dir.''.$news_img);
            unlink($target_dir.''.$namePic);
            $data['value'] = $news_img;

            $table = DB()->table('global_settings');
            $table->where('id', $id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/');
        }else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Event/');
        }
    }


    public function delete($id){

        $table = DB()->table('event');
        $table->where('event_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Event');
    }


}
