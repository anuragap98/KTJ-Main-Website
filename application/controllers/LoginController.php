<?php
class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(array('form' ,'url' ));
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            $this->load->view('templates/header1');
            $this->load->view('admin_page');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('login_form');
            $this->load->view('templates/footer');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');   

        if($this->form_validation->run() == FALSE)
        {
            if(isset($this->session->userdata['logged_in']))
            {
                $this->load->view('templates/header1');
                $this->load->view('admin_page');
                $this->load->view('templates/footer');
            }
            else
            {
                $this->load->view('templates/header');
                $this->load->view('login_form');
                $this->load->view('templates/footer');
            }
        }
        else 
        {
            $data = array(
                'email'     => $this->input->post('email'),
                'password'  => $this->input->post('password')
            );

            $result = $this->UserModel->login($data);

            if ($result['login'] == TRUE) 
            {
                $session_data = array(
                    'email' => $this->input->post('email')
                );
                $data['userinfo'] = $result['userinfo'];
                $this->session->set_userdata('logged_in', $session_data);
                $this->session->set_userdata('userinfo', $result);
                $this->load->view('templates/header1');
                $this->load->view('admin_page', $data);   
                $this->load->view('templates/footer'); 
            }
            else 
            {
                $data['message'] = "Invalid Username or Password";
                $this->load->view('templates/header');
                $this->load->view('login_form', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function logout()
    {
        $session_data = array(
            'email' => ''
        );

        $this->session->unset_userdata('logged_in', $session_data);
        $data['message'] = 'Successfully Logout';
        $this->load->view('templates/header');
        $this->load->view('login_form', $data);
        $this->load->view('templates/footer');
    }
}
