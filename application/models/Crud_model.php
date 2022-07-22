<?php

class Crud_model extends CI_Model
{


    public function get_entries()
    {
        $query = $this->db->get('crud');
        if(count( $query->result() ) > 0){
            return $query->result();

        }
        
    }

    public function insert_entry($data)
    {
        return  $this->db->insert('crud', $data);
    }


public function delete_entry($id){

    return $this->db->delete('crud', array('id' => $id));


}

public function edit_entry($id){

   $this->db->select("*");
   $this->db->from("crud");    
   $this->db->where("id", $id);    
$query = $this->db->get();
if (count($query->result()) > 0 ){

    return $query->row();
}

}




    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
