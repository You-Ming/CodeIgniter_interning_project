<?php

class MY_model extends CI_Model{
    
    protected $table = NULL;
    protected $id_name = NULL;
    protected $insert_id = NULL;
    protected $num_rows = 0;
    protected $num_rows_total = NULL;
    protected $affected_rows = 0;
    
    public function __construct(){
        parent::__construct();
    }
    
    public function set_table($table,$id_name){
        $this->load->database();
        $this->table = $table;
        $this->id_name = $id_name;
    }
    
    public function create($data){
        $this->insert_id = NULL;
        if($this->db->insert($this->table,$data)){
            $this->insert_id = $this->db->insert_id();
            return TRUE;
        }
        return FALSE;
    }
    
    public function read($limit = NULL,$offset = NULL){
        $this->num_rows = 0;
        $this->num_rows_total = 0;
        
        $this->db->from($this->table);
        if($limit !== NULL){
            $this->num_rows_total = $this->db->count_all_results('',FALSE);
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        $this->num_rows = $query->num_rows();
        
        return $query->result_array();
        
    }
    
    public function read_by_id($id){
        $this->num_rows = 0;
        $query = $this->db->get_where($this->table,array($this->id_name => $id));
        $this->num_rows = $query->num_rows();
        
        return $query->row_array();
    }
    
    public function read_by_key($array){
        $this->num_rows = 0;
        $query = $this->db->get_where($this->table,$array);
        $this->num_rows = $query->num_rows();
        
        return $query->row_array();
    }
    
    public function read_by_where($array,$limit = NULL,$offset = NULL){
        $this->db->where($array);
        return $this->read($limit,$offset);
    }
    
    public function update($data,$where){
        $this->affected_rows = 0;
        if($this->db->update($this->table,$data,$where)){
            $this->affected_rows = $this->db->affected_rows();
            return TRUE;
        }
        return FALSE;
    }
    
    public function update_by_id($data,$id){
        return $this->update($data,array($this->id_name => $id));
    }
    
    public function delete($where){
        $this->affected_rows = 0;
        if($this->db->delete($this->table,$where)){
            $this->affected_rows = $this->db->affected_rows();
            return TRUE;
        }
        return FALSE;
    }
    
    public function delete_by_id($id){
        return $this->delete(array($this->id_name => $id));
    }
    
    public function insert_id(){
        return $this->insert_id;
    }
    
    public function num_rows(){
        return $this->num_rows;
    }
    
    public function num_rows_total(){
        return $this->num_rows_total;
    }
    
    public function affected_rows(){
        return $this->affected_rows;
    }
    
    public function ascape_chars($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
    
}