<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\LicenseModel;
use App\Models\ShopsModel;
use App\Models\UsersModel;

class Settings extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    private $module_name = 'Settings';

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
        }else {

            $table = DB()->table('admin');
            $data['settings'] = $table->get()->getResult();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Settings/list',$data);
            echo view('Admin/footer');
        }
    }

    public function view($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {

            $table = DB()->table('admin');
            $data['settings'] = $table->where('user_id',$id)->get()->getRow();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Settings/view',$data);
            echo view('Admin/footer');
        }
    }

    public function update($user_id){
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        }else {
            $table = DB()->table('admin');
            $data['settings'] = $table->where('user_id',$user_id)->get()->getRow();

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Settings/update',$data);
            echo view('Admin/footer');
        }
    }

    public function general_update(){
        $data['user_id'] = $this->request->getPost('user_id');
        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        if (!empty($data['password'])) {
            $data['password'] = sha1($this->request->getPost('password'));
            $data['con_password'] = sha1($this->request->getPost('con_password'));
        }

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Settings/update/'.$data['user_id'].'?active=general');
        }else{
            $table = DB()->table('admin');
            $table->where('user_id',$data['user_id'])->update($data);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Data update successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Settings/update/'.$data['user_id'].'?active=general');
        }
    }

    public function personal_update(){
        $data['user_id'] = $this->request->getPost('user_id');
        $data['comName'] = $this->request->getPost('ComName');
        $data['country'] = $this->request->getPost('country');
        $data['mobile'] = $this->request->getPost('mobile');
        $data['address'] = $this->request->getPost('address');

        $table = DB()->table('admin');
        $table->where('user_id',$data['user_id'])->update($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Data update successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Settings/update/'.$data['user_id'].'?active=personal');
    }

    public function photo_update(){
        $data['user_id'] = $this->request->getPost('user_id');

        if (!empty($_FILES['pic']['name'])){
            $target_dir = FCPATH . '/uploads/admin_image/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            //old image unlink
            $old_img = get_data_by_id('pic','admin','user_id',$data['user_id']);
            if (!empty($old_img)){
                $imgPath = $target_dir.''.$old_img;
                if (file_exists($imgPath)) {
                    unlink($target_dir . '' . $old_img);
                }
            }

            //new image uplode
            $pic = $this->request->getFile('pic');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir,$namePic);
            $pro_nameimg = 'profile_'.$pic->getName();
            $this->crop->withFile($target_dir.''.$namePic)->fit(160, 160, 'center')->save($target_dir.''.$pro_nameimg);
            unlink($target_dir.''.$namePic);
            $data['pic'] = $pro_nameimg;
        }

        $table = DB()->table('admin');
        $table->where('user_id',$data['user_id'])->update($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Data update successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Settings/update/'.$data['user_id'].'?active=photo');
    }



}