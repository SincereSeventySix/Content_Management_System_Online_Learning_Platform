<?php

?>CREATE TABLE student_info_1 ( user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, first_name VARCHAR(60), last_name VARCHAR(60), email VARCHAR (100), student_name VARCHAR(60), student_age VARCHAR(60), student_gen VARCHAR(1), username VARCHAR(40), password VARCHAR(255), current_year VARCHAR(10), english_level VARCHAR(10), join_date DATETIME, profile VARCHAR(40), test TINYINT(1) NOT NULL )

<?php
$query = "CREATE TABLE {$name} ( $id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $l_name VARCHAR(80) NOT NULL, $l_loc VARCHAR(60) NOT NULL, $l_stat TINYINT(1));";
$query .= "CREATE TABLE {$name2} ( $id2 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $sav_name VARCHAR(60) NOT NULL, $sav_loc VARCHAR(100));";
$query .= "CREATE TABLE {$name3} ( $id3 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $tool_name VARCHAR(60) NOT NULL, $tool_loc VARCHAR(100));";
$query .= "CREATE TABLE {$name4} ( $id3 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $game_name VARCHAR(60) NOT NULL, $game_loc VARCHAR(100));";
$query .= "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('tool_vow', 'Vowel-Tool');";
$query .= "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('tool_chat', 'Quick Chat');";
$query .= "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('tool_verb', 'Tense Tool');";
$query .= "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('tool_sen', 'Sen-Maker');";
$query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat) VALUES ('Nouns: The Biggest Family', 'less_nouns1', 'false');";
$query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat) VALUES ('Pronouns: Professional Nouns', 'less_proN1', 'false');";
$query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat) VALUES ('Verbs: The Doers', 'less_verbs1', 'false');";
$query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat) VALUES ('Adjectives: Fishing for Fun', 'less_adj1', 'false');";
$query .= "INSERT INTO {$name2} ($sav_name, $sav_loc) VALUES ('less_nouns1', 'Nouns: The Biggest Family');";
$query .= "INSERT INTO {$name2} ($sav_name, $sav_loc) VALUES ('less_proN1', 'Pronouns: Professional Nouns');";
$query .= "UPDATE student_info_1 SET test = '$test' WHERE user_id = $user ";

?>