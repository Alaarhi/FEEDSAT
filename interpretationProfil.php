<?php 
include 'dbConnection.php';

$requete=$bd->query("select * from rating where profId=".$_GET['id']);
$k=1;
$espcarre=0;
$espxcarre=0;
$note=0;
if($requete)
while($ratings=$requete->fetch())
{
    $note=$ratings['score'];
        $espxcarre=$espxcarre+$note*$note;
        $espcarre=$espcarre+$note;
        $k=$k+1;
}
    $espxcarre=$espxcarre/$k;
    $espcarre=$espcarre/$k;
    $espcarre=$espcarre*$espcarre;
    $variance=$espxcarre-$espcarre;
    $ecartType=sqrt($variance);
    $ecartType=round($ecartType,0);
    if($ecartType>=3)
    $etat="divergence";
    else
    $etat="convergence";

    $pos1=array("Par rapport à ","Concernant ","Relativement à ");
    $pos2=array("cet enseignant, les ","ce prof, les ");
    $pos3=array("opinions ","avis ","appréciations ","jugements "); 
    $pos41=array("divergent ","différent ","s'écartent ");
    $pos42=array("convergent","se rencontrent","se réunissent");
    $pos5=array(" significativement. "," de façon flagrante. "," de manière marquante. ");
    if($etat=="divergence")
    {
    $pos4=$pos41;
    $phrase1=$pos1[rand(0,2)].$pos2[rand(0,1)].$pos3[rand(0,3)].$pos4[rand(0,2)].$pos5[rand(0,2)];    
    }
    else 
    {
    $pos4=$pos42;
    $phrase1=$pos1[rand(0,2)].$pos2[rand(0,1)].$pos3[rand(0,3)].$pos4[rand(0,2)].". ";    
    }



?>