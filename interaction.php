<?php
include 'dbConnection.php';

if(isset($_GET['param'])&&isset($_GET['commentId'])&&isset($_GET['studentId']))
{
    $commentId=$_GET['commentId'];
    $studentId=$_GET['studentId'];
    $param=$_GET['param'];
    if($param==1)
    {
        $req = $bd->prepare("delete from interact where commentId = :commentId and studentId = :studentId");
        $req->execute(array(
            'commentId' => $commentId,
            'studentId' => $studentId,
            ));
        echo $commentId." ".$studentId;        
    }
    else
    {
        $req = $bd->prepare("insert into interact values ('1',:studentId,:commentId)");
        $req->execute(array(
            'commentId' => $commentId,
            'studentId' => $studentId,
            ));
        echo $commentId." ".$studentId; 
    }


}
exit();

?>