<?php include 'parts/header.php' ?>

<?php
  $connection = require_once 'Connection.php';
  $validator = require_once 'Validator.php';

  $employee = [
    'first_name' => '',
    'last_name' => '',
    'title' => '',
    'phone_number' => '',
    'email' => '',
  ];

  $errors = [
    'first_name' => '',
    'last_name' => '',
    'title' => '',
    'phone_number' => '',
    'email' => '',
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = NULL;
    $employee = array_merge($employee, $_POST);
    $isValid = $validator->validateForm($employee, $errors);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      $photo = file_get_contents($_FILES['photo']['tmp_name']);
    }

    if ($isValid) {
      $connection->addEmployee($employee, $photo);
      header('Location: index.php');
    }
  }
?>

<?php include 'parts/form.php' ?>
<?php include 'parts/footer.php' ?>
