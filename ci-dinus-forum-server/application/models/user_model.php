<?php
  class User_model extends CI_Model {

    public function register($username,$email,$password){
      if($username=="" || $email=="" || $password=="" ){
        return false;
      }else{
        $arraySave = array(
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $result  = $this->db->insert("user", $arraySave);
        if($result){
          return true;
        }else{
          return false;
        }
      }

    }

    public function logins($username,$password){
      $this->db->where('username',$username);
      $this->db->limit(1);
      $query = $this->db->get('user');
      if($query->num_rows()>0){
        $row = $query->row();
          if(password_verify($password, $row->password)){
            $data[] =  array('username' => $row->username , 'email' => $row->email);
            return $data;
          }else{
            return false;
          }
      }else{
        return false;
      }
    }


  }

?>