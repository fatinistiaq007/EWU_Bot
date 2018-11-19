	
	<?php
		
		class Message
		{ 
			protected $connect;
    		public function __construct() {
		        $host = 'localhost';
		        $user = 'root';
		        $pass = '';
		        $db = 'east_west';
		        $this->connect = mysqli_connect($host, $user, $pass, $db);
		        if (!$this->connect) {
		            die('database are not connect' . mysqli_error($this->connect));
		        }
		     }  
			
		    //  public function Save_message() {
   			//  	$message = $_POST['question'];
		    //     $sql = "INSERT INTO tbl_message(message) VALUES ('$message')";
		    //     if (mysqli_query($this->connect, $sql)) {
		    //         $msg = "Msg Save Successfully";
		    //         return $msg;
		    //     } else {
		    //         die("Message not selected" . mysqli_error($this->connect));
		    //     }
    		// } 

   			public function select_all_message($sql) {
   			 	//$message = $msg;
		        //$sql = "SELECT * FROM `keywords` WHERE `keyword` LIKE '$msg%'";
		        $query_result = mysqli_query($this->connect, $sql);
		        
		        return $query_result;
    		}
    }

?>