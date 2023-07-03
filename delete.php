<?php

  $connection = require_once 'Connection.php';
  
  if (!isset($_GET['id'])) {
    include 'parts/not_found.php';
    exit;
  }

  $connection->deleteEmployee($_GET['id']);
  header('Location: index.php');