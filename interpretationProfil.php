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
    $pos5=array(" significativement. "," de façon remarquable. "," de manière marquante. ");
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

    $requeteSatisFiliaire=$bd->query("select count(score) as nbr ,sum(score) as score,fos from student,rating,fos where ( rating.studentId=student.id and student.fosId=fos.id and profId=".$_GET['id']." ) group by fos ");
    $filiairesS=array();
    $filiairesNonS=array();
    while($filiaireSatisf=$requeteSatisFiliaire->fetch())
    {   if($filiaireSatisf['nbr']!=0)
        if(($filiaireSatisf['score']/$filiaireSatisf['nbr'])>=6)
        {
            if($filiaireSatisf['fos']=="Réseaux informatiques et télécommunications")
            array_push($filiairesS,"RT");

            if($filiaireSatisf['fos']=="Génie Logiciel")
            array_push($filiairesS,"GL");

            if($filiaireSatisf['fos']=="Mathématiques, Physique, Informatique")
            array_push($filiairesS,"MPI");

            if($filiaireSatisf['fos']=="Instrumentation et maintenance industrielle")
            array_push($filiairesS,"IMI");

            if($filiaireSatisf['fos']=="Informatique Industrielle et Automatique")
            array_push($filiairesS,"IIA");

            if($filiaireSatisf['fos']=="Chimie Biologie Appliquée")
            array_push($filiairesS,"CBA");

            if($filiaireSatisf['fos']=="Chimie")
            array_push($filiairesS,"CH");

            if($filiaireSatisf['fos']=="Biologie")
            array_push($filiairesS,"BIO");
        }
        else if (($filiaireSatisf['score']/$filiaireSatisf['nbr'])<=4)
        {
            if($filiaireSatisf['fos']=="Réseaux informatiques et télécommunications")
            array_push($filiairesNonS,"RT");

            if($filiaireSatisf['fos']=="Génie Logiciel")
            array_push($filiairesNonS,"GL");

            if($filiaireSatisf['fos']=="Mathématiques, Physique, Informatique")
            array_push($filiairesNonS,"MPI");

            if($filiaireSatisf['fos']=="Instrumentation et maintenance industrielle")
            array_push($filiairesNonS,"IMI");

            if($filiaireSatisf['fos']=="Informatique Industrielle et Automatique")
            array_push($filiairesNonS,"IIA");

            if($filiaireSatisf['fos']=="Chimie Biologie Appliquée")
            array_push($filiairesNonS,"CBA");

            if($filiaireSatisf['fos']=="Chimie")
            array_push($filiairesNonS,"CH");

            if($filiaireSatisf['fos']=="Biologie")
            array_push($filiairesNonS,"BIO");
        }
    }
    $phrase3="";
    if((sizeof($filiairesS)>0)&&(sizeof($filiairesNonS)==0))
    $phrase3 = "De plus, on constate qu'il va très bien avec les ".$filiairesS[rand(0,sizeof($filiairesS)-1)].".";
    if((sizeof($filiairesS)==0)&&(sizeof($filiairesNonS)>0))
    $phrase3 = "De plus, on constate qu'il ne va pas trop avec les ".$filiairesS[rand(0,sizeof($filiairesS)-1)].".";
    if((sizeof($filiairesS)>0)&&(sizeof($filiairesNonS)>0))
    $phrase3 = "De plus, on constate qu'il va très bien avec les ".$filiairesS[rand(0,sizeof($filiairesS)-1)]." mais pas aussi bien avec les ".$filiairesNonS[rand(0,sizeof($filiairesNonS)-1)].".";
    $phrase=$phrase.$phrase3;
?>