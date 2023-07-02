<?php include 'parts/header.php' ?>
<?php
  $connection = require_once 'Connection.php';
  $validator = require_once 'Validator.php';

  if (!isset($_GET['id'])) {
    include "parts/not_found.php";
    exit;
  }

  $employeeId = $_GET['id'];
  $employee = $connection->getEmployeeById($employeeId);

  if (!$employee) {
    include "parts/not_found.php";
    exit;
  }

  $errors = [
    'first_name' => '',
    'last_name' => '',
    'title' => '',
    'phone_number' => '',
    'email' => '',
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = NULL;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      $photo = file_get_contents($_FILES['photo']['tmp_name']);
    }

    $isValid = $validator->validateForm($_POST, $errors);

    if ($isValid) {
      $connection->updateEmployee($employeeId, $_POST, $photo);
      header("Location: index.php");
    }
}
?>

<?php include 'parts/form.php' ?>
<?php include 'parts/footer.php' ?>

