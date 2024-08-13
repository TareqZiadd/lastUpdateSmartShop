
<?php

class ContactUs{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

// ContactUs model
public function contactInfo($data) {
    $this->db->query("INSERT INTO contact_us (full_name, email, subject, message,user_id)
                      VALUES (:full_name, :email, :subject, :message,:user_id)");

    // Ensure these keys match the ones in your $data array
    $this->db->bind(':full_name', $data['full_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':subject', $data['subject']);
    $this->db->bind(':message', $data['message']);
    $this->db->bind(':user_id', $data['user_id']);

    // Execute the query
    if ($this->db->execute()) { 
        return true;
    } else {
        return false;
    }
}

        
}
