<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $table = DB()->table('slider');
        $data['slider'] = $table->get()->getResult();
//        unset($_SESSION['subscribe']);
        echo view('web/header');
        echo view('web/index', $data);
        echo view('web/footer');
    }

    public function news()
    {
        $data['slug'] = 'news';

        $table = DB()->table('news');
        $data['news'] = $table->orderBy('years','DESC')->get()->getResult();

        echo view('web/header_2', $data);
        echo view('web/news', $data);
        echo view('web/footer');
    }

    public function news_view($id)
    {
        $data['slug'] = 'news';

        $table = DB()->table('news');
        $data['news'] = $table->where('news_id', $id)->get()->getRow();

        $table2 = DB()->table('news');
        $data['newsArray'] = $table2->get()->getResult();

        $tableGallery = DB()->table('news_gallary');
        $data['newsGallery'] = $tableGallery->where('news_id', $id)->get()->getResult();
        $data['project'] = 'project';
        echo view('web/header_2', $data);
        echo view('web/news_detail', $data);
        echo view('web/footer');
    }

    public function work()
    {
        $data['slug'] = 'work';
        $data['codeSub'] = 'work';

        $table = DB()->table('works');
        $data['works'] = $table->orderBy('work_id', 'DESC')->get()->getResult();

        $categoryTable = DB()->table('category');
        $data['category'] = $categoryTable->where('status', '1')->get()->getResult();

//        unset($_SESSION['image_protect']);

        echo view('web/header_2', $data);
        echo view('web/work', $data);
        echo view('web/footer',$data);
    }

    public function work_view($id)
    {
        $data['slug'] = 'work_view';

        $table = DB()->table('works');
        $data['works'] = $table->where('work_id', $id)->get()->getRow();




        echo view('web/header_3', $data);
        echo view('web/work_detail', $data);
        echo view('web/footer');
    }
    
    public function image_protect(){
        $code = $this->request->getPost('code');
        $otp = title_by_global_settings_value('image_unlock_code');

//        print $code.'<br>';
//        print $otp;

        if ($otp == $code){
            $sessionArray=['image_protect' => '1'];
            $this->session->set($sessionArray);
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Successfully submitted</div>');
            return redirect()->to(site_url('Home/work'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Pleuse input currect code!</div>');
            return redirect()->to(site_url('Home/work'));
        }



//        unset($_SESSION['image_protect']);
    }

    public function category_by_work()
    {
        $category = $this->request->getPost('category_id[]');
        $view = '';
        if (!empty($category)) {
            foreach ($category as $cat) {
                $table = DB()->table('works');
                $works = $table->where('cat_id', $cat)->get()->getResult();
                if (!empty($works)) {
                    $i=1;
                    foreach ($works as $val) {
                        $img = get_data_by_id('image', 'work_gallary', 'work_id', $val->work_id);
                        $view .= '<div class="gallery-item iso-item hentry tag-masterplan tag-residential author-lucrezia-biasutti post-type-image article-index-1 featured" id="fadeIn_'.$i++.'">
                        <a href="' . base_url() . '/Home/work_view/' . $val->work_id . '"
                           title="' . $val->project_name . '">
                            <div class="iso-image img-wrap cover">' . image_view('uploads/work_img', $val->work_id, 'thum_' . $img, 'thum_no_img.jpg', 'lazyload')
                            . '</div>
                            <div class="item-meta-wrapper">
                                <div class="item-meta">
                                    <div class="item-title">' . $val->project_name . '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                    }
                }else{
                    $view .= 'No data available on this category';
                }

            }
        } else {
            $table = DB()->table('works');
            $works = $table->get()->getResult();

            foreach ($works as $val) {
                $img = get_data_by_id('image', 'work_gallary', 'work_id', $val->work_id);
                $view .= '<div class="gallery-item iso-item hentry tag-masterplan tag-residential author-lucrezia-biasutti post-type-image article-index-1 featured">
                        <a href="' . base_url() . '/Home/work_view/' . $val->work_id . '"
                           title="' . $val->project_name . '">
                            <div class="iso-image img-wrap cover">' . image_view('uploads/work_img', $val->work_id, 'thum_' . $img, 'thum_no_img.jpg', 'lazyload')
                    . '</div>
                            <div class="item-meta-wrapper">
                                <div class="item-meta">
                                    <div class="item-title">' . $val->project_name . '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
            }
        }
        print $view;

    }

    public function office()
    {
        $data['slug'] = 'office';

        $peopleTable = DB()->table('people');
        $data['people'] = $peopleTable->where('status', '1')->get()->getResult();

        $publicationTable = DB()->table('publication');
        $data['publication'] = $publicationTable->where('status', '1')->get()->getResult();

        $clientTable = DB()->table('client');
        $data['client'] = $clientTable->where('status', '1')->get()->getResult();

        $eventTable = DB()->table('event');
        $data['event'] = $eventTable->where('status', '1')->get()->getResult();

        $awardsTable = DB()->table('awards');
        $data['awards'] = $awardsTable->where('status', '1')->orderBy('year', 'DESC')->get()->getResult();

        $profileTable = DB()->table('blocks');
        $data['profile'] = $profileTable->where('page_type', '1')->get()->getResult();

        $contactTable = DB()->table('blocks');
        $data['contact'] = $contactTable->where('page_type', '2')->get()->getResult();

        $employmentTable = DB()->table('blocks');
        $data['employment'] = $employmentTable->where('page_type', '3')->get()->getResult();

        $podcastsTable = DB()->table('podcasts');
        $data['podcasts'] = $podcastsTable->orderBy('podcasts_id', 'DESC')->limit('3')->get()->getResult();

        $current_vacanciesTable = DB()->table('current_vacancies');
        $data['current_vacancies'] = $current_vacanciesTable->get()->getResult();

        echo view('web/header_2', $data);
        echo view('web/office', $data);
        echo view('web/footer');
    }


    public function working_at(){
        $data['slug'] = 'working_at';

        echo view('web/header_2', $data);
        echo view('web/working_at', $data);
        echo view('web/footer');
    }


    public function internship_application(){
        $data['slug'] = 'internship_application';

        echo view('web/header_2', $data);
        echo view('web/internship_application', $data);
        echo view('web/footer');
    }

    public function internship_action(){
        $data['intern_sem_id'] = $this->request->getPost('intern_sem_id');
        $data['email'] = $this->request->getPost('email');
        $data['last_name'] = $this->request->getPost('last_name');
        $data['first_name'] = $this->request->getPost('first_name');
        $data['phone'] = $this->request->getPost('phone');
        $data['address'] = $this->request->getPost('address');
        $data['zip_code'] = $this->request->getPost('zip_code');
        $data['city'] = $this->request->getPost('city');
        $data['country_id'] = $this->request->getPost('country_id');

        $data['citizenship_ids'] = json_encode($this->request->getPost('citizenship_ids[]'));
        $data['language_ids'] = json_encode($this->request->getPost('language_ids[]'));
        $data['software_ids'] = json_encode($this->request->getPost('software_ids[]'));

        $data['university'] = $this->request->getPost('university');
        $data['education_id'] = $this->request->getPost('education_id');
        $data['graduation_date'] = $this->request->getPost('graduation_date');
        $data['createdBy'] = '1';


        if (!empty($_FILES['cv']['name'])){
            $target_dir = FCPATH . '/uploads/internship/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }
            //new image uplode
            $cv = $this->request->getFile('cv');
            $namePic = $cv->getRandomName();
            $cv->move($target_dir,$namePic);
            $data['cv'] = $namePic;
        }

        if (!empty($_FILES['portfolio']['name'])){
            $target_dir = FCPATH . '/uploads/internship/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }
            //new image uplode
            $portfolio = $this->request->getFile('portfolio');
            $namefile = $portfolio->getRandomName();
            $portfolio->move($target_dir,$namefile);
            $data['portfolio'] = $namefile;
        }

        if (!empty($_FILES['additional_documents']['name'])){
            $target_dir = FCPATH . '/uploads/internship/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            $additional_documents = $this->request->getFile('additional_documents');
            $namefile = $additional_documents->getRandomName();
            $additional_documents->move($target_dir,$namefile);
            $data['additional_documents'] = $namefile;
        }




        $data['linkedin'] = $this->request->getPost('linkedin');
        $data['how_you_hear_id'] = $this->request->getPost('how_you_hear_id');
        $data['additional_notes'] = $this->request->getPost('additional_notes');

        $this->validation->setRules([
            'intern_sem_id' => ['label' => 'intern_sem_id', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'last_name' => ['label' => 'last_name', 'rules' => 'required'],
            'first_name' => ['label' => 'first_name', 'rules' => 'required'],
            'phone' => ['label' => 'phone', 'rules' => 'required'],
            'address' => ['label' => 'address', 'rules' => 'required'],
            'zip_code' => ['label' => 'zip_code', 'rules' => 'required'],
            'city' => ['label' => 'city', 'rules' => 'required'],
            'country_id' => ['label' => 'country_id', 'rules' => 'required'],
            'university' => ['label' => 'university', 'rules' => 'required'],
            'education_id' => ['label' => 'education_id', 'rules' => 'required'],
            'how_you_hear_id' => ['label' => 'how_you_hear_id', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . '</div>');
            return redirect()->to('/Home/internship_application');
        }else{

            $table = DB()->table('internship_application');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Submit successfully</div>');
            return redirect()->to('/Home/internship_application');

        }




    }

    public function job_application(){
        $data['slug'] = 'job_application';

        echo view('web/header_2', $data);
        echo view('web/job_application', $data);
        echo view('web/footer');
    }

    public function job_application_action(){

        $data['applied_position_id'] = $this->request->getPost('applied_position_id');
        $data['email'] = $this->request->getPost('email');
        $data['last_name'] = $this->request->getPost('last_name');
        $data['first_name'] = $this->request->getPost('first_name');
        $data['phone'] = $this->request->getPost('phone');
        $data['address'] = $this->request->getPost('address');
        $data['zip_code'] = $this->request->getPost('zip_code');
        $data['city'] = $this->request->getPost('city');
        $data['country_id'] = $this->request->getPost('country_id');

        $data['citizenship_ids'] = json_encode($this->request->getPost('citizenship_ids[]'));
        $data['language_ids'] = json_encode($this->request->getPost('language_ids[]'));
        $data['software_ids'] = json_encode($this->request->getPost('software_ids[]'));
        $data['experience_country_id'] = json_encode($this->request->getPost('experience_country_id[]'));

        $data['years_of_experience'] = $this->request->getPost('years_of_experience');
        $data['university'] = $this->request->getPost('university');
        $data['graduation_date'] = $this->request->getPost('graduation_date');
        $data['degree_title'] = $this->request->getPost('degree_title');
        $data['education_id'] = $this->request->getPost('education_id');
        $data['createdBy'] = '1';


        if (!empty($_FILES['cv']['name'])){
            $target_dir = FCPATH . '/uploads/job_application/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }
            //new image uplode
            $cv = $this->request->getFile('cv');
            $namePic = $cv->getRandomName();
            $cv->move($target_dir,$namePic);
            $data['cv'] = $namePic;
        }

        if (!empty($_FILES['portfolio']['name'])){
            $target_dir = FCPATH . '/uploads/job_application/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }
            //new image uplode
            $portfolio = $this->request->getFile('portfolio');
            $namefile = $portfolio->getRandomName();
            $portfolio->move($target_dir,$namefile);
            $data['portfolio'] = $namefile;
        }

        if (!empty($_FILES['additional_documents']['name'])){
            $target_dir = FCPATH . '/uploads/job_application/';
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            $additional_documents = $this->request->getFile('additional_documents');
            $namefile = $additional_documents->getRandomName();
            $additional_documents->move($target_dir,$namefile);
            $data['additional_documents'] = $namefile;
        }




        $data['linkedin'] = $this->request->getPost('linkedin');
        $data['how_you_hear_id'] = $this->request->getPost('how_you_hear_id');
        $data['salary_expectations'] = $this->request->getPost('salary_expectations');
        $data['available_start_date'] = $this->request->getPost('available_start_date');
        $data['additional_notes'] = $this->request->getPost('additional_notes');
        $data['review_process'] = $this->request->getPost('review_process');

        $this->validation->setRules([
            'applied_position_id' => ['label' => 'applied_position_id', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'last_name' => ['label' => 'last_name', 'rules' => 'required'],
            'first_name' => ['label' => 'first_name', 'rules' => 'required'],
            'phone' => ['label' => 'phone', 'rules' => 'required'],
            'address' => ['label' => 'address', 'rules' => 'required'],
            'zip_code' => ['label' => 'zip_code', 'rules' => 'required'],
            'city' => ['label' => 'city', 'rules' => 'required'],
            'country_id' => ['label' => 'country_id', 'rules' => 'required'],
            'university' => ['label' => 'university', 'rules' => 'required'],
            'education_id' => ['label' => 'education_id', 'rules' => 'required'],
            'how_you_hear_id' => ['label' => 'how_you_hear_id', 'rules' => 'required'],
            'available_start_date' => ['label' => 'available_start_date', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . '</div>');
            return redirect()->to('/Home/job_application');
        }else{

            $table = DB()->table('job_application');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Submit successfully</div>');
            return redirect()->to('/Home/job_application');

        }
    }

    public function privacy_policy(){
        $data['slug'] = 'working_at';

        echo view('web/header_2', $data);
        echo view('web/privacy_policy', $data);
        echo view('web/footer');
    }

    public function subscribe_action(){
        $data['email'] = $this->request->getPost('email');
        $data['createdBy'] = '1';

        $this->validation->setRules([
            'email' => ['label' => 'email', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . '</div>');
            return redirect()->to('/');
        }else{

            $table = DB()->table('subscribe');
            $table->insert($data);

            $ses = array('subscribe' => '1');
            $this->session->set($ses);

//            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Submit successfully</div>');
            return redirect()->to('/');

        }
    }
}
