<?php
  class User_model extends CI_Model {

    public function updateUser($data,$nim){
      $this->db->update('user', $data, ['nim' => $nim]);
      return $this->db->affected_rows();
  }

    public function getAllUser($id = null){
      if($id===null){
          //$this->db->join('user', 'user.username =  komentar.username');
          //$this->db->join('forum_elektro', 'forum_elektro.nama_thread =  komentar.nama_thread');
          return $this->db->get('user')->result_array();  
          
      }else{
          return $this->db->get_where('user', ['id' => $id])->result_array();  
      }
      
  }

    public function register($username,$nim,$email,$password){
      if( $username=="" || $nim=="" || $email=="" || $password=="" ){
        return false;
      }else{
        $arraySave = array(
            //'id' => $id,
            'username' => $username,
            'nim' => $nim,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $result  = $this->db->insert("user", $arraySave);
        if($result){
          return $arraySave;
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
            $data =  array('id'=>$row->id, 'username' => $row->username , 'nim'=>$row->nim, 'email' => $row->email, 'password'=>$row->password);
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