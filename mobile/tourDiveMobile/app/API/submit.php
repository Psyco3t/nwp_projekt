<?php
require_once '../../../../php/functions.php';
$data = json_decode(file_get_contents('php://input'), true);
//remove tour
if ($data['type']=='DeleteTour')
{
 $attractionID=$data['attractID'];
 $uid=$data['uid'];
 $row=$data['row'];
 PDOexec("DELETE FROM tourlist WHERE user_id='$uid' AND attraction_id='$attractionID'");
 $return=array('message'=>'Tour deleted');
 echo json_encode($return);
 http_response_code(200);
 exit();
}
//remove favorite
if ($data['type']=='removeFavorite')
{
 $uid=$data['uid'];
 $attractID=$data['attractID'];
 PDOexec("DELETE FROM favorites WHERE user_id='$uid' AND attraction_id='$attractID'");
 $return=array('message'=>'Favorite deleted');
 echo json_encode($return);
 http_response_code(200);
 exit();
}
//post a comment
if ($data['type']=='postComment')
{
 $attractionID=$data['attractID'];
 $uid=$data['uid'];
 $text=$data['text'];
 $status=$data['status'];
 PDOexec("INSERT INTO comments (`attraction_id`,`text`,`user_id`,`status`) VALUES('$attractionID','$text','$uid','$status')");
 $return=array('message'=>'comment created');
 echo json_encode($return);
 http_response_code(201);
 exit();
}
//add to favorites
if ($data['type']=='addFavorite')
{
 $attractId=$data['attractID'];
 $uid=$data['uid'];
 PDOexec("INSERT INTO favorites (user_id,attraction_id) VALUES('$uid','$attractId')");
 $return=array('message'=>'added to favorites');
 echo json_encode($return);
 http_response_code(200);
 exit();
}
//add list
if ($data['type']=='addList')
{
 $name=$data['name'];
 $uid=$data['uid'];
 PDOexec("INSERT INTO tourlist (`listname`,user_id) VALUES('$name','$uid')");
 exit();
}
//remove list
if ($data['type']=='removeList'){
 $name=$data['name'];
 $uid=$data['uid'];
 PDOexec("DELETE FROM tourlist WHERE `listname`='$name' AND `user_id`='$uid'");
 exit();
}

//add to list and check if already added to list
if($data['type']=='addToList'){
 $attractId=$data['attractID'];
 $name=$data['name'];
 $getRow=$data['rowCount'];
 $uid=$data['uid'];
 if($data['check']>0)
    {
        PDOexec("UPDATE tourlist SET `attraction_id`='$attractId' WHERE `listname`='$name'");
        $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
        echo $count;
        $count=$count+1;
        updateView($attractId, $count);
        exit();
    }
    else{
      PDOexec("INSERT INTO tourlist (`listname`,`user_id`,`attraction_id`) VALUES ('$name','$uid','$attractId')");
      $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
      //echo $count;
      $count=$count+1;
      updateView($attractId, $count);
    exit();
    }
}