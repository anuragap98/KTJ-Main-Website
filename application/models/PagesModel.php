<?php
class PagesModel extends CI_Model 
{
	public function __construct()
    {
        $this->load->database();
    }
    public function getnotices()
    {
        $q = "SELECT * FROM notices ORDER BY time DESC";
        $query = $this->db->query($q);
        return $query->result();
    }
}