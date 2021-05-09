<?php
 include 'database.php';
	session_start();
	$db;
	class User{
		public $db;
		public function __construct(){
			$this->db = new Database();

			if(!$this->db->db) {

				echo "Error : Unable to open database\n";
			 } else {
				echo "";
			 }
		 }
		

		/*** for registration process ***/
		public function reg_user($username,$email,$password){

			$sql="SELECT * FROM users WHERE username='$username' OR email='$email'";

			//checking if the username or email is available in db
			$check = $this->db->query($sql);
			//$check =  pg_query($this->db->db, $sql) ;
			$count_row =$this->db->num_rows($check);
			
			//if the username is not in db then insert to the table
			if ($count_row == 0){
				//$sql1="INSERT INTO users (username,email,pass,user_role) VALUES ('$username','$email',$password,'$role')";
				//$ret = pg_query($this->db->db, $sql1);
				$ret=$this->db->insert('users',['username'=>"'$username'",'email'=>"'$email'",'pass'=>$password,'user_role'=>"'user'"]);
				//echo "Insert result is:";
				//print_r($db->getResult());
				//print_r($this->db->db);
				
				if($ret){
        
					echo "Data saved Successfully";
					return true;
			}else{
				
					echo "Something Went Wrong";
					return false;
			}
        		
			}
			else { return false;}
		}

		/*** for login process ***/
		public function check_login($email, $password){
			$sql2="SELECT * from users WHERE email='$email' and pass=$password;";

			$result = $this->db->query($sql2);

        	$user_data = $this->db->fetch_row($result);
			$count_row = $this->db->num_rows($result);
	
	        if ($count_row == 1) {
				// this login var will use for the session thing
			
	            $_SESSION['login'] = true;
	            $_SESSION['id'] = $user_data[0];
				return true;	
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_username($id){
			$sql3="SELECT username FROM users WHERE id = $id";
			$result = $this->db->query($sql3);
	        //$result = pg_query($this->db->db, $sql3);
	        $user_data = $this->db->fetch_row($result);
			echo $user_data[0];
			//die('here');
    	}
		public function addUser($username,$email,$password){
			$sql="INSERT INTO USERS (username,email,pass) VALUES ('$username','$email',$password);";

			$check = $this->db->query($sql);
			//$check =  pg_query($this->db->db, $sql) ;
			$rows=$this->db->fetch_all($check);
			
				return $rows;
		}
		public function isAdmin($id){
			$sql="SELECT user_role FROM users WHERE id=$id;";

			$check = $this->db->query($sql);
			//$check =  pg_query($this->db->db, $sql) ;
			$rows=$this->db->fetch_all($check);
			if($rows[0]['user_role']=='admin'){
				return true;
			}else{
				return false;
			}
		}


		public function fetchAllUser(){
			$sql="SELECT * from users;";

			$check = $this->db->query($sql);
			//$check =  pg_query($this->db->db, $sql) ;
			$rows=$this->db->fetch_all($check);
			
				return $rows;
		}
		public function deleteUser($id){
			$sql="DELETE FROM users WHERE id=$id";

			$check = $this->db->query($sql);
			//$check =  pg_query($this->db->db, $sql) ;
			$rows=$this->db->fetch_all($check);
			
				return $rows;
		}



    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>