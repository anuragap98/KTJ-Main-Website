<?php
class PagesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->helper(array('form' ,'url' ));
        $this->load->model('PagesModel');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }
    
    public function schedule()
    {
        $this->load->view('templates/header');
        $this->load->view('schedule');
        $this->load->view('templates/footer');
    }

    public function accomodation()
    {
        $this->load->view('templates/header');
        $this->load->view('accomodation');
        $this->load->view('templates/footer');
    }

    public function notices()
    {
        $data['notices'] = $this->PagesModel->getnotices();
        $this->load->view('templates/header');
        $this->load->view('notices', $data);
        $this->load->view('templates/footer');
    }

    public function privacy()
    {
        $this->load->view('templates/header');
        $this->load->view('privacy');
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        $this->load->view('templates/header');
        $this->load->view('contact');
        $this->load->view('templates/footer');
    }

}
