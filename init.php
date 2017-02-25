<?php

	$db = new mysqli('localhost', 'root', '', 'plwa');

	if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
    endif;

	$db->query("drop table Words");

	$result = $db->query("CREATE TABLE Words (
		id int(30) AUTO_INCREMENT PRIMARY KEY,
		word varchar(50) NOT NULL)
	")


	or die ("Invalid: " . $db->error);
	echo "Database created <br/>";

	$myfile = fopen("words.txt", "r");

		while(!feof($myfile)) {
			$line = fgets($myfile);

			$sql = "INSERT INTO Words (word)
					VALUES ('$line')";

	   	 	if ($db->query($sql) === TRUE) {
	    		echo "Words have been inserted <br/>";
			} 

			else {
	    		echo "Error: " . $sql . "<br>" . $db->error;
			}
		}
?>