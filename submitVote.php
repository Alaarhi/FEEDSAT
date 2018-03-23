<?php
include 'dbConnection.php';

$requ = $bd->query("select * from rating where studentId='".$_SESSION['idEtudiant']."' and studentLevel='".$_SESSION['niveau']."' and profId='".$_GET['profId']."'");
if($requ->fetch())
{
    $requ = $bd->prepare("update rating set absenteism=:absenteism,ambiance=:ambiance,courseContent=:courseContent,gradesCredibility=:gradesCredibility,pedagogy=:pedagogy,score=:score where (studentId=:studentId and studentLevel=:studentLevel and profId=:profId) ");
    $req2=$bd->query('select * from rcriteria');
    while ($result=$req2->fetch())
    {
        if($result['criteria']=="Ambiance en classe")
            $adcr=$result['weight'];
        if($result['criteria']=="Contenu du cours")
            $cdcr=$result['weight'];
        if($result['criteria']=="Crédibilité de la note")
            $cdlnr=$result['weight'];
        if($result['criteria']=="Pédagogie")
            $pdgr=$result['weight'];
        if($result['criteria']=="Taux de présence")
            $tdpr=$result['weight'];
        
    }
    $note=($_GET['cours']*$cdcr+$_GET['ambiance']*$adcr+$_GET['note']*$cdlnr+$_GET['pedagogie']*$pdgr+$_GET['presence']*$tdpr)/10;
    $note=round($note, 1);
    
    $requ->execute(array(
        'absenteism' => $_GET['presence'],
        'ambiance' => $_GET['ambiance'],
        'courseContent' => $_GET['cours'],
        'gradesCredibility' => $_GET['note'],
        'pedagogy' => $_GET['pedagogie'],
        'score' => $note,
        'studentLevel' => $_SESSION['niveau'],
        'studentId' => $_SESSION['idEtudiant'],
        'profId' => $_GET['profId'],
    ));
}

else 
{


$req = $bd->prepare("insert into rating (absenteism,ambiance,courseContent,gradesCredibility,pedagogy,score,studentLevel,studentId,profId) values (:absenteism,:ambiance,:courseContent,:gradesCredibility,:pedagogy,:score,:studentLevel,:studentId,:profId) ");
$req2=$bd->query('select * from rcriteria');
while ($result=$req2->fetch())
{
    if($result['criteria']=="Ambiance en classe")
        $adcr=$result['weight'];
    if($result['criteria']=="Contenu du cours")
        $cdcr=$result['weight'];
    if($result['criteria']=="Crédibilité de la note")
        $cdlnr=$result['weight'];
    if($result['criteria']=="Pédagogie")
        $pdgr=$result['weight'];
    if($result['criteria']=="Taux de présence")
        $tdpr=$result['weight'];
    
}
$note=($_GET['cours']*$cdcr+$_GET['ambiance']*$adcr+$_GET['note']*$cdlnr+$_GET['pedagogie']*$pdgr+$_GET['presence']*$tdpr)/10;
$note=round($note, 1);

$req->execute(array(
    'absenteism' => $_GET['presence'],
    'ambiance' => $_GET['ambiance'],
    'courseContent' => $_GET['cours'],
    'gradesCredibility' => $_GET['note'],
    'pedagogy' => $_GET['pedagogie'],
    'score' => $note,
    'studentLevel' => $_SESSION['level'],
    'studentId' => $_SESSION['idEtudiant'],
    'profId' => $_GET['profId'],
));
}
echo('done');

?>