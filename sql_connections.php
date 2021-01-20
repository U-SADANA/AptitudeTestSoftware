<?php

function getConn() {
    // Authentication credentials
   $cleardb_url = parse_url("mysql://b9ad6106fda39e:7a6d2989@us-cdbr-east-03.cleardb.com/heroku_01cda5d379b4d85?reconnect=true");
   $DB_HOST = $cleardb_url["host"];
   $DB_USERNAME = $cleardb_url["user"];
   $DB_PASSWORD = $cleardb_url["pass"];
   $DB_NAME = substr($cleardb_url["path"], 1);
   $DB_CHARSET = "utf8mb4";

   // $DB_HOST =  "remotemysql.com";
   // $DB_NAME =  "3f3XkfQeQr";
   // $DB_USERNAME =  "3f3XkfQeQr";
   // $DB_PASSWORD =  "ZRB7dBQCqd";
   // $DB_CHARSET =  "utf8mb4";

  $dsn = "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET;
  $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];

  try {
      $pdo = new PDO($dsn, $DB_USERNAME, $DB_PASSWORD, $options);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }

  return $pdo;
}

?>
