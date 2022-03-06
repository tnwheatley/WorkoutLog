<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php
  require_once 'functions.php';

  createTable('exercises',
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
               category VARCHAR(16) NOT NULL,
               subcategory VARCHAR(50) NOT NULL,
	             name VARCHAR(50) NOT NULL,
               information VARCHAR(255)');


  createTable('members',
              'user VARCHAR(16) NOT NULL UNIQUE,
               pass VARCHAR(255) NOT NULL,
	             role VARCHAR(16),
               salt VARCHAR(255),
               INDEX(user(6))');

  createTable('messages',
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              message VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

  createTable('friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');

  createTable('profiles',
              'user VARCHAR(16),
              text VARCHAR(4096),
              INDEX(user(6))');

  createTable('cardioLog',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	            user VARCHAR(16),
              date DATETIME,
              exercise VARCHAR(50),
	            distance VARCHAR(16),
              time VARCHAR(16),
              comments VARCHAR(4096),
              INDEX(USER(6))');
  
  createTable('workoutLog',
  'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(16),
        exerciseType VARCHAR(16),
        date DATETIME,
        exercise VARCHAR(50),
        distance VARCHAR(16),
        sets VARCHAR(16),
        repetitions VARCHAR(16),
        weight VARCHAR(16),
        time VARCHAR(16),
        comments VARCHAR(4096),
        INDEX(USER(6))');

  createTable('profileimg',
	        'user VARCHAR(16),
		status int(11) not null,
		extension VARCHAR(16)');

?>

    <br>...done.
  </body>
</html>
