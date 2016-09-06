<?php
function DB_Open(){
mysql_connect ("localhost", "polloand_regped", "regped");
//mysql_connect ("localhost", "root", "ABCde123.");
mysql_select_db ("polloand_regped");
}
?>
