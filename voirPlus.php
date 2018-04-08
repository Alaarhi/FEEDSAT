<?php
include 'dbConnection.php';


if(isset($_GET['param']))
{
$req = $bd->query('select max(timestamp) as timemax from comment');
if($req)
$result=$req->fetch();
header('Content-Type: application/json');
echo json_encode(array("timemax" => $result['timemax']));
exit();
}

if(isset($_GET['parametre']))
{
    $i=0;
    $bloc="";
    $shown2="";
    $lastCount=0;
    if(($_GET['param2']==1)||($_GET['lastCount']==" "))
    {        
    $req = $bd->query('select count(*) as somme, commentId from interact group by commentId order by somme desc');
    }
    else 
    {
    $req = $bd->query('select * from ((select count(*) as somme, commentId from interact group by commentId order by somme desc) as table1  )  where (somme<='.$_GET['lastCount'].') ');
    if(isset($_GET['shown2']))
    {
    $result2;
    while(($result2=$req->fetch())&&($result2['commentId']!=($_GET['shown2'])))
    {}
    }
    }


    if($req)
    {
    while(($result2=$req->fetch())&&($i<3))
    {                   
        $req0 = $bd->query('select * from comment where id = "'.$result2['commentId'].'" and profId="'.$_GET['profId'].'" ');
        if($req0)
        {
        $result=$req0->fetch();
        $req2 = $bd->query('select * from student where id = "'.$result['studentId'].'"');
        $req3 = $bd->query('select count(*) as NInteract from interact where commentId = '.$result['id']);
        if($req2&&$req3)
        {
        $NInteract = $req3->fetch();
        $student=$req2->fetch();    
        $studentName="";

        if($result['visibility']=="1")
        $studentName=$student['surname'].' '.$student['name'];
        else 
        $studentName="Anonyme";

        $checked="";
        $idSession="0";
        $fct="";
        $disabled="";
            if(isset($_SESSION['idEtudiant']))
            {
                $clapStatus = $bd->query("select * from interact where studentId=".$_SESSION['idEtudiant']." and commentId=".$result['id']);
                if($clapStatus->rowCount())
                $checked="checked";
                $idSession=$_SESSION['idEtudiant'];
                $fct="clap(".$result['id'].",".$idSession.")";                
            }
            else
            {
            $fct="clapPopUp()";
            $disabled="disabled";
            }
        $bloc=$bloc.'<div class="pm-comment-box-container">
        
                                                <div class="pm-comment-box-avatar-container">
                                                    <div class="pm-comment-avatar" style="background-image:url(img/studentAvatar.png);">
                                                    </div>
                                                    <ul class="pm-comment-author-list">
                                                        <li><p class="pm-comment-name">'.$studentName.'</p></li>
                                                        <li style="padding-left: 24%">
        
        
        
                                                        </li>
                                                        <li><p class="pm-comment-date">'.date("j M Y", strtotime($result['timestamp'])).'</p></li>
                                                    </ul>
        
        
                                                </div>
                                                <div class="col-md-1" style="padding-top: 25px">
        
                                                    <button id="'.$result["id"].'" class="clap" onclick="'.$fct.'">
                                                        <span>
                                                          <!--  SVG Created by Luis Durazo from the Noun Project  -->
                                                          <svg id="'.$result["id"].'1" class="clap--icon '.$checked.' '.$disabled.'" xmlns="http://www.w3.org/2000/svg" viewBox="-549 338 100.1 125">
                                                        <path d="M-471.2 366.8c1.2 1.1 1.9 2.6 2.3 4.1.4-.3.8-.5 1.2-.7 1-1.9.7-4.3-1-5.9-2-1.9-5.2-1.9-7.2.1l-.2.2c1.8.1 3.6.9 4.9 2.2zm-28.8 14c.4.9.7 1.9.8 3.1l16.5-16.9c.6-.6 1.4-1.1 2.1-1.5 1-1.9.7-4.4-.9-6-2-1.9-5.2-1.9-7.2.1l-15.5 15.9c2.3 2.2 3.1 3 4.2 5.3zm-38.9 39.7c-.1-8.9 3.2-17.2 9.4-23.6l18.6-19c.7-2 .5-4.1-.1-5.3-.8-1.8-1.3-2.3-3.6-4.5l-20.9 21.4c-10.6 10.8-11.2 27.6-2.3 39.3-.6-2.6-1-5.4-1.1-8.3z"/>
                                                        <path d="M-527.2 399.1l20.9-21.4c2.2 2.2 2.7 2.6 3.5 4.5.8 1.8 1 5.4-1.6 8l-11.8 12.2c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l34-35c1.9-2 5.2-2.1 7.2-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l28.5-29.3c2-2 5.2-2 7.1-.1 2 1.9 2 5.1.1 7.1l-28.5 29.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.4 1.7 0l24.7-25.3c1.9-2 5.1-2.1 7.1-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l14.6-15c2-2 5.2-2 7.2-.1 2 2 2.1 5.2.1 7.2l-27.6 28.4c-11.6 11.9-30.6 12.2-42.5.6-12-11.7-12.2-30.8-.6-42.7m18.1-48.4l-.7 4.9-2.2-4.4m7.6.9l-3.7 3.4 1.2-4.8m5.5 4.7l-4.8 1.6 3.1-3.9"/>
                                                      </svg>
                                                        </span>
        
                                                      </button>
                                                    <div id="'.$result["id"].'11" class="clapsNumber" >'.$NInteract['NInteract'].'</div>
                                                    </div>
        
                                                <div class="pm-comment">
                                                    <p>'.$result['comment'].'</p>
                                                </div>
        
                                                <div class="pm-comment-reply-btn">
        
                                                </div>
        
                                                
                                            </div>
                                                                                    
                                            
                                            ';
                                            $i=$i+1;
                                            $lastCount=$result2['somme'];
                                            $shown2 = $result['id'];
        }
    }
}
}
    header('Content-Type: application/json');
    $bloc=$bloc.'<script>clapping('.$_GET['nbrClicksTopComments'].');</script>';
    
    echo json_encode(array("comment" => $bloc, "lastCount" => $lastCount,"shown2" => $shown2));    
    exit();
}



if(isset($_GET['lastTime']))
{
$lastTime=$_GET['lastTime'];
$req = $bd->query('select * from comment where ( timestamp <= "'.$lastTime.'" and approved="1" and profId="'.$_GET['profId'].'")  order by timestamp desc');

$i=0;
$bloc="";
$shown="";

if($req)
while(($result=$req->fetch())&&($i<3))
{
    if ( $_GET['shown'] != $result['id'] ) 
    {
    $req2 = $bd->query('select * from student where id = "'.$result['studentId'].'"');
    $req3 = $bd->query('select count(*) as NInteract from interact where commentId = '.$result['id']);
    $NInteract = $req3->fetch();
    $student=$req2->fetch();    
    $studentName="";
    if($result['visibility']=="1")
    $studentName=$student['surname'].' '.$student['name'];
    else 
    $studentName="Anonyme";
    $checked="";
    $idSession="0";
    $fct="";
    $disabled="";    
        if(isset($_SESSION['idEtudiant']))
        {
            $clapStatus = $bd->query("select * from interact where studentId=".$_SESSION['idEtudiant']." and commentId=".$result['id']);
            if($clapStatus->rowCount())
            $checked="checked";
            $idSession=$_SESSION['idEtudiant'];
            $fct="clap(".$result['id'].",".$idSession.")";                
        }
        else
        {
        $disabled="disabled";            
        $fct="clapPopUp()";
        }
    $bloc=$bloc.'<div class="pm-comment-box-container">
    
                                            <div class="pm-comment-box-avatar-container">
                                                <div class="pm-comment-avatar" style="background-image:url(img/studentAvatar.png);">
                                                </div>
                                                <ul class="pm-comment-author-list">
                                                    <li><p class="pm-comment-name">'.$studentName.'</p></li>
                                                    <li style="padding-left: 24%">
    
    
    
                                                    </li>
                                                    <li><p class="pm-comment-date">'.date("j M Y", strtotime($result['timestamp'])).'</p></li>
                                                </ul>
    
    
                                            </div>
                                            <div class="col-md-1" style="padding-top: 25px">
    
                                                <button id="'.$result["id"].'" class="clap" onclick="'.$fct.'">
                                                    <span>
                                                      <!--  SVG Created by Luis Durazo from the Noun Project  -->
                                                      <svg id="'.$result["id"].'1" class="clap--icon '.$checked.' '.$disabled.'" xmlns="http://www.w3.org/2000/svg" viewBox="-549 338 100.1 125">
                                                    <path d="M-471.2 366.8c1.2 1.1 1.9 2.6 2.3 4.1.4-.3.8-.5 1.2-.7 1-1.9.7-4.3-1-5.9-2-1.9-5.2-1.9-7.2.1l-.2.2c1.8.1 3.6.9 4.9 2.2zm-28.8 14c.4.9.7 1.9.8 3.1l16.5-16.9c.6-.6 1.4-1.1 2.1-1.5 1-1.9.7-4.4-.9-6-2-1.9-5.2-1.9-7.2.1l-15.5 15.9c2.3 2.2 3.1 3 4.2 5.3zm-38.9 39.7c-.1-8.9 3.2-17.2 9.4-23.6l18.6-19c.7-2 .5-4.1-.1-5.3-.8-1.8-1.3-2.3-3.6-4.5l-20.9 21.4c-10.6 10.8-11.2 27.6-2.3 39.3-.6-2.6-1-5.4-1.1-8.3z"/>
                                                    <path d="M-527.2 399.1l20.9-21.4c2.2 2.2 2.7 2.6 3.5 4.5.8 1.8 1 5.4-1.6 8l-11.8 12.2c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l34-35c1.9-2 5.2-2.1 7.2-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l28.5-29.3c2-2 5.2-2 7.1-.1 2 1.9 2 5.1.1 7.1l-28.5 29.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.4 1.7 0l24.7-25.3c1.9-2 5.1-2.1 7.1-.1 2 1.9 2 5.2.1 7.2l-24.7 25.3c-.5.5-.4 1.2 0 1.7.5.5 1.2.5 1.7 0l14.6-15c2-2 5.2-2 7.2-.1 2 2 2.1 5.2.1 7.2l-27.6 28.4c-11.6 11.9-30.6 12.2-42.5.6-12-11.7-12.2-30.8-.6-42.7m18.1-48.4l-.7 4.9-2.2-4.4m7.6.9l-3.7 3.4 1.2-4.8m5.5 4.7l-4.8 1.6 3.1-3.9"/>
                                                  </svg>
                                                    </span>
    
                                                  </button>
                                                <div id="'.$result["id"].'11" class="clapsNumber" >'.$NInteract['NInteract'].'</div>
                                                </div>
    
                                            <div class="pm-comment">
                                                <p>'.$result['comment'].'</p>
                                            </div>
    
                                            <div class="pm-comment-reply-btn">
    
                                            </div>
    
                                            
                                        </div>
                                                                                
                                        
                                        ';
                                        $i=$i+1;
                                        $lastTime=$result['timestamp'];
                                        $shown = $result['id'];
    }
}
}
header('Content-Type: application/json');
$bloc=$bloc.'<script>clapping('.$_GET['nbrClicksRecents'].');</script>';
echo json_encode(array("comment" => $bloc, "lastTime" => $lastTime,"shown" => $shown));

?>