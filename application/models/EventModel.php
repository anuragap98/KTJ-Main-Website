<?php
class EventModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getAll()
    {
        $this->db->from('events');
        $query = $this->db->get();

        if($query->num_rows() >= 1)
        {
            $events = $query->result();
            return $events;
        }
        else {
            return "nothing returned.";
        }
    }

    /*
    | -------------------------------------------------------------------
    |  get()
    | -------------------------------------------------------------------
    |
    |  This is getting an event based on eventname
    |
    */

    public function get($eventname) 
    {
        $this->db->from('events')->where('name', $eventname)->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            $event = $query->result();
            return $event;
        }
        else {
            return 'didnt get anything';
        }
    }

    /*
    | -------------------------------------------------------------------
    |  store()
    | -------------------------------------------------------------------
    |
    |  This is for adding events in event table. 
    |   Only accesible in admin panel.
    |
    */  
    public function store($data)
    {
        $this->db->insert('events', $data);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    /*
    | -------------------------------------------------------------------
    |  register()
    | -------------------------------------------------------------------
    |
    |  This is for registering users in an event.
    |  $data should be an array with event_id and user_id
    |
    */

    public function register($data)
    {
        $this->db->from('event_user')->where('event_id', $data['event_id'])->where('user_id', $data['user_id'])->limit(1);
        $query = $this->db->get();

        if($query->num_rows() != 0)
        {
            return 0;
        }
        else
        {
            $this->db->insert('event_user', $data);
            if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    public function contains($member, $eventid)
    {
        $q = "SELECT * FROM event_user WHERE user_id = $member AND event_id = $eventid";
        $query = $this->db->query($q);
        if($query->num_rows() == 0)
        {
            return 0;
        }
        else {
            return 1;
        }
    }

    public function gamefestcontains($member, $eventid)
    {
        $q = "SELECT * FROM event_user_gamefest WHERE user_id = $member AND event_id = $eventid";
        $query = $this->db->query($q);
        if($query->num_rows() == 0)
        {
            return 0;
        }
        else {
            return 1;
        }
    }

    public function geteventbygenre($genreid)
    {
        $q = "SELECT events.id, events.name, event_detail.about, event_detail.description, event_detail.rules, event_detail.ps, event_detail.contact, events.team_size FROM events, event_detail WHERE genre = $genreid AND events.id = event_detail.event_id";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function gamefestregister($data)
    {
	    $this->db->from('event_user_gamefest')
		    ->where('event_id', $data['event_id'])
		    ->where('user_id', $data['user_id'])
		    ->where('transaction_id', $data['transaction_id'])
		    ->limit(1);
        $query = $this->db->get();
	
	// If record already present then 0
        if($query->num_rows() != 0)
        {
            return 0;
        }
        else
        {
            $this->db->insert('event_user_gamefest', $data);
            if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 2;
            }
        }
    }
    public function gamefestcheck($data)
    {
	$this->db->from('event_user_gamefest')
		    ->where('event_id', $data['event_id'])
		    ->where('user_id', $data['user_id'])
		    ->limit(1);
        $query = $this->db->get();
	
	// If record already present then 0
        if($query->num_rows() != 0)
        {
            return 0;
	}
	else
	{
		return 1;
	}
    }

}
