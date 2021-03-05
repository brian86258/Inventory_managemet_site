<?php
    $datetime=$_POST['datetime'];
    $term=$_POST['term'];
    $num=$_POST['num'];

    echo $datetime."    ".$term."  ".$num; 
    $term_repl=$term;
    $pos1=strpos($term_repl,'(');
    // $pos2=strpos($term,')');
   
    echo "<br>".$pos1;
    echo "<br>".$pos2;
    echo "<br>".$term;

    $series=substr($term,$pos1+1, -1);
    $name=substr($term,0,$pos1);
    echo "<br>".$series;
    echo "<br>".$name;

?>

