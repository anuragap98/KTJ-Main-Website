<?php
class TeamModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getlastteamid()
    {
        $this->db->select('id')->from('event_team')->order_by('id', 'DESC')->limit(1);
        $query = $this->db->get();
        return $query->result()[0]->id;
    }

    public function register($data)
    {
        $this->db->insert('event_team', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function contains($member, $eventid)
    {
        $q = "SELECT * FROM event_team WHERE ((captain = $member) OR (member1 = $member) OR (member2 = $member) OR (member3 = $member) OR (member4 = $member) OR (member5 = $member)) AND eventid = $eventid ";
        $query = $this->db->query($q);
        if($query->num_rows() == 0)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
}