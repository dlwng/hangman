<?php

   $db = new mysqli('localhost', 'root', '', 'plwa');
   if ($db->connect_error):
      die ("Could not connect to db " . $db->connect_error);
   endif;

   $query = "SELECT word FROM Words ORDER BY RAND() LIMIT 1";
   $result = $db->query($query);
   $rows = $result->num_rows;
   if ($rows >= 1):
      header('Content-type: text/xml');
      echo "<?xml version='1.0' encoding='utf-8'?>";
      echo "<Word>";
      $row = $result->fetch_array();
      $ans = $row["word"];
      echo "<value>$ans</value>";
      echo "</Word>";
   else:
      die ("DB Error");
   endif;
?>