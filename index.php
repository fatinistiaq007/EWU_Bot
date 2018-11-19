<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require 'class/class.php';
        $obj = new Message;
		$question = trim($_POST['question']);
/*
		$sql = "SELECT baad FROM `trim`";
		$msg = $obj->select_all_message($sql);
		while ($row = mysqli_fetch_array($msg)) {

            $question = trim($question, $row['baad']); //$row['ID']
            $question = trim($question);
        }
        //$question1 = trim($question1)
		//$question = trim($question);


		$sql = "SELECT * FROM `keywords` WHERE `keyword` LIKE '%$question%'";
        $msg = $obj->select_all_message($sql); */
        $message_info = 'pai nai';

        $sql = "SELECT * FROM `keywords`";
        $msg = $obj->select_all_message($sql);

            while ($row = mysqli_fetch_array($msg)) 
            {
                if(strpos($question, $row['keyword']) !== false)
                {
                
                    $message_info = $row['value'];
                    break;
                }
            }

        if($message_info == 'pai nai')
        {
            $message_info = 'I do not know this question answer right now.Hopefully I will give the answer soon.Stay with us.Thank you.';
            $sql ="INSERT INTO `question`(`qsn`) VALUES ('$question')";
            $msg = $obj->select_all_message($sql);
        }



/*
        if(mysqli_num_rows($msg) == 0)
        {
        	$sql ="INSERT INTO `keywords`(`keyword`, `value`) VALUES ('$question','?')";
        	$obj->select_all_message($sql);
        }
        else{

        	while ($row = mysqli_fetch_array($msg)) 
        	{
            	
            	if($row['value']!='?')
            	{
            		$message_info = $row['value'].$question;
            	}

        	}
        } */

    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ewu Addmission Help Zone</title>
        <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        	<div class="row">
        		<div class="col-md-8">
        			<h1 class="text-center">EWU ADDMISSION HELP ZONE</h1>
        		</div>
        		<div class="col-md-4">
        			<img src="img/ewu.jpg" class="pull-right">
        		</div>
        	</div>

        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<form action="" method="post">
        					<table>
                                <tr>
        							<td><b><h3>Ask Your Question</h3></b></td>
        						</tr>
        						<tr>
        							<td>
        								<textarea cols="60" rows="3" name="question">

                                <?php
                                                if(isset($message_info))
                                                    echo $message_info;
                                            ?>
                                        </textarea>
        							</td>
        						</tr>

        						<tr>
        							<td>
        								<button class="btn btn-info btn-block" name="btn">send</button>
        							</td>
        						</tr>
        					</table>
        				</form>
        			</div>
        		</div>
        	</div>


    </body>
</html>
