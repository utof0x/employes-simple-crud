<?php include 'parts/header.php' ?>
<?php
  $connection = require_once 'Connection.php';

  if (!isset($_GET['id'])) {
    include 'parts/not_found.php';
    exit;
  }

  $employee = $connection->getEmployeeById($_GET['id']);
?>

<div class="container">
  <div class="card">
      <div class="card-header">
        <h3>View User: <b><?php echo $employee['first_name'] . ' ' . $employee['last_name'] ?></b></h3>
      </div>
      <div class="card-body">
        <a class="btn btn-secondary" href="update.php?id=<?php echo $employee['id'] ?>">Update</a>
        <a class="btn btn-danger" href="delete.php?id=<?php echo $employee['id'] ?>">Delete</a>
        <!-- <form style="display: inline-block" method="POST" action="delete.php">
          <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">
          <button class="btn btn-danger">Delete</button>
        </form> -->
      </div>
      <table class="table">
        <tbody>
        <?php if (isset($employee['photo'])): ?>
          <tr>
            <th>Photo:</th>
            <td>
              <img
                style="width: 40px;"
                src="data:image/jpeg;base64,<?php echo base64_encode($employee['photo']); ?>"
                alt="Photo"
              />
            </td>
          </tr>
        <?php endif; ?>
        <tr>
          <th>First Name:</th>
          <td><?php echo $employee['first_name'] ?></td>
        </tr>
        <tr>
          <th>Last Name:</th>
          <td><?php echo $employee['last_name'] ?></td>
        </tr>
        <tr>
          <th>Title:</th>
          <td><?php echo $employee['title'] ?></td>
        </tr>
        <tr>
          <th>Phone number:</th>
          <td><?php echo $employee['phone_number'] ?></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><?php echo $employee['email'] ?></td>
        </tr>
        </tbody>
      </table>
  </div>
</div>

<?php include 'parts/footer.php' ?>
