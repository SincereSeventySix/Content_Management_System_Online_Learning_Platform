CREATE DATABASE IF NOT EXISTS students;
CREATE TABLE IF NOT EXISTS students.student_info_1 (
  user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  first_name VARCHAR(60),
  last_name VARCHAR(60),
  email VARCHAR(100),
  student_name VARCHAR(60),
  student_age VARCHAR(60),
  student_gen VARCHAR(1),
  username VARCHAR(40),
  password VARCHAR(255),
  current_year VARCHAR(10),
  english_level VARCHAR(10),
  join_date DATETIME,
  profile VARCHAR(40),
  test TINYINT(1) NOT NULL DEFAULT 0,
  tool_count INT NOT NULL DEFAULT 0
);
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
FLUSH PRIVILEGES;
