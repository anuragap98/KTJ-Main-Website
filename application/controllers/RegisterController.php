<?php
class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('DropdownModel');
        $this->load->helper(array('form' ,'url' ));
        $this->load->helper('security');
		$this->load->library('form_validation');
		//$this->load->model('admin/AdminExtraModel');
    }

    public function index()
    {
        $data = array(
        'cities'    => $this->DropdownModel->getcities(),
        'colleges'  => $this->DropdownModel->getcolleges(),
        'states'    => $this->DropdownModel->getstates()
        );
        $this->load->view('templates/header');
        $this->load->view('registration_formnew', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('name',       'Name',         'trim|required');
        $this->form_validation->set_rules('email',      'Email',        'trim|required|valid_email');
        $this->form_validation->set_rules('password',   'Password',     'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf',   'Password Confirmation',    'trim|required|matches[password]');
        $this->form_validation->set_rules('mobile',     'mobile',       'trim|required|is_natural');
        $this->form_validation->set_rules('college',    'college',      'trim|required');
        $this->form_validation->set_rules('dob',        'dob',          'trim|required');
        $this->form_validation->set_rules('city',       'city',         'trim|required');
        $this->form_validation->set_rules('state',      'state',        'trim|required');
        $this->form_validation->set_rules('department', 'department',   'trim|required');
        $this->form_validation->set_rules('college_id', 'college_id',   'trim|required');
        $this->form_validation->set_rules('gender',     'gender',       'trim|required');

        //Temporary
        $member_id = $this->UserModel->getlastid();
        $member_id = strtoupper(str_pad(dechex($member_id+1), 4, '0', STR_PAD_LEFT));
        $memid = '20KTJ'.$member_id;

        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'cities'    => $this->DropdownModel->getcities(),
                'colleges'  => $this->DropdownModel->getcolleges(),
                'states'    => $this->DropdownModel->getstates()
            );
            $this->load->view('templates/header');
            $this->load->view('registration_formnew', $data);
            $this->load->view('templates/footer');
        }
        else 
        {
            $data = array(
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'mobile'        => $this->input->post('mobile'),
                'college'       => $this->input->post('college'),
                'dob'           => $this->input->post('dob'),
                'city'          => $this->input->post('city'),
                'state'         => $this->input->post('state'),
                'department'    => $this->input->post('department'),
                'college_id'    => $this->input->post('college_id'),
                'gender'        => $this->input->post('gender'),
                'member_id'     => $memid
            );
            //$data = html_escape($data);

            $result = $this->UserModel->register($data);

            if($result == TRUE)
            {
				//$relicusers = $this->AdminExtraModel->getrelicusers();
				//$res = $this->AdminExtraModel->putusers($relicusers);
                $data['message'] = 'Registration Successful';
                $this->load->view('templates/header');
                $this->load->view('welcome_message', $data);
                $this->load->view('templates/footer');
            }
            else 
            {
                $data['message'] = 'Email already Registered.';
                $data = array(
                    'cities'    => $this->DropdownModel->getcities(),
                    'colleges'  => $this->DropdownModel->getcolleges(),
                    'states'    => $this->DropdownModel->getstates()
                );
                $this->load->view('templates/header');
                $this->load->view('registration_formnew', $data);
                $this->load->view('templates/footer');
            }
        }
    }
    public function register(){
    	$this->create();
    }
}
?>