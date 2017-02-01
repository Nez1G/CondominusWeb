<?php
 include ('session.php');
 
 $title=$_POST["title"];
 
  
 $result=mysql_query("SELECT condo_morada FROM condominios where condo_morada like '%$title%' ");
 $found=mysql_num_rows($result);
 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li>$row[post_title]</br>
            <a href=$row[guid]>$row[guid]</a></li>";
    }   
 }else{
    echo "<li>No Tutorial Found<li>";
 }
 // ajax search
?>