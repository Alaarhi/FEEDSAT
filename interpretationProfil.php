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

    $pos1=array("Par rapport à ","En ce qui concerne ","Relativement à ");
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
    $phrase=$phrase1;



    $lowLevelScoree=0;
    $highLevelScoree=0;
    $requeteLowLevel=$bd->query("select count(score) as count, sum(score) as somme from rating where studentLevel<=2 and profId=".$_GET['id']);
    $requeteHighLevel=$bd->query("select count(score) as count, sum(score) as somme from rating where studentLevel>=3 and profId=".$_GET['id']);
    if(($lowLevelScore=$requeteLowLevel->fetch())&&($lowLevelScore['count']!=0))
    $lowLevelScoree=($lowLevelScore['somme']/$lowLevelScore['count']);
    if(($highLevelScore=$requeteHighLevel->fetch())&&($highLevelScore['count']!=0))
    $highLevelScoree=$highLevelScore['somme']/$highLevelScore['count'];
    
    $pos4="";
    $pos1=array("En fait, ","En effet, ");
    $pos2=array("normalement ","remarquablement ","trouvé ","considéré ","");
    $pos3=array("plus efficace ","plus populaire ");
    if($lowLevelScoree>($highLevelScoree+3))
    $pos4=array("pour les niveaux inférieurs. ","en cycle préparatoire. ");
    if($highLevelScoree>($lowLevelScoree+3))    
    $pos4=array("pour les niveaux supérieurs. ","en deuxième cycle. ");    
    if($pos4!="")
    {
        $phrase2=$pos1[rand(0,1)]."il est ".$pos2[rand(0,4)].$pos3[rand(0,1)].$pos4[rand(0,1)]." ";    
        $phrase=$phrase.$phrase2;
    }
?>