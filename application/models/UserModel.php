<?php
class UserModel extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function register($data)
    {
        $this->db->from('user')->where('email', $data['email'])->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() == 0)
        {
            $this->db->insert('user', $data);
            if($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
        }
        else 
        {
            return FALSE;
        }
    }
    public function getlastid()
    {
        $this->db->select('id')->from('user')->order_by('id', 'DESC')->limit(1);
        $query = $this->db->get();
        return $query->result()[0]->id;
    }
    public function login($data)
    {
        $this->db->from('user')->where('email', $data['email'])->limit(1);
        // This gets the whole query 
        $query = $this->db->get();
        
        if($query->num_rows() == 1)         // email matched
        {
            // Use the result method to get the data
            $user = $query->result();
            $hashedpassword = $user[0]->password;
            // password_verify is used to verify the password
            if(password_verify($data['password'], $hashedpassword) == TRUE)     /// password matched
            {
                return array(
                    'login' => TRUE,
                    'userinfo' => $user[0]
                );
            }
            else    //password did not match
            {
                return array(
                    'login' => FALSE,
                    'userinfo' => ''
                );
            }
        }
        else      // email not found
        {
            return array(
                'login' => FALSE,
                'userinfo' => ''
            );
        }
    }
}
?>