<?php
class TeamController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TeamModel');
        $this->load->model('UserModel');
        $this->load->model('EventModel');
        $this->load->helper(array('form' ,'url' ));
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['events'] = $this->EventModel->getAll();
        $this->load->view('templates/header1');
        $this->load->view('team_create', $data);
        $this->load->view('templates/footer');
    }
}