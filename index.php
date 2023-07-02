<?php
  $connection = require_once './Connection.php';
  $employees = $connection->getEmployees();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Employee simple CRUD</title>
</head>
<body>
  <table class="table">
    <thead>
      <tr>
        <th>Photo</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>Title</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee): ?>
        <tr>
          <td>
            <img
              style="width: 40px;"
              src="data:image/jpeg;base64,<?php echo base64_encode($employee['photo']); ?>"
              alt="Photo"
            />
          </td>
          <td><?php echo $employee['first_name'] ?></td>
          <td><?php echo $employee['last_name'] ?></td>
          <td><?php echo $employee['title'] ?></td>
          <td><?php echo $employee['phone_number'] ?></td>
          <td><?php echo $employee['email'] ?></td>
          <td>
            <a href="" class="btn btn-sm btn-outline-info">View</a>
            <a href="update.php?id=<?php echo $employee['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
            <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>