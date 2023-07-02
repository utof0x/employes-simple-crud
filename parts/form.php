<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>
        Update employee
      </h3>
    </div>
    <div class="card-body">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label>First name</label>
          <input
            name="first_name"
            value="<?php echo $employee['first_name'] ?>"
            class="form-control <?php echo $errors['first_name'] ? 'is-invalid' : '' ?>"
          />
          <div class="invalid-feedback">
            <?php echo $errors['first_name'] ?>
          </div>
        </div>
        <div class="form-group">
          <label>Last name</label>
          <input
            name="last_name"
            value="<?php echo $employee['last_name'] ?>"
            class="form-control <?php echo $errors['last_name'] ? 'is-invalid' : '' ?>"
          />
          <div class="invalid-feedback">
            <?php echo $errors['last_name'] ?>
          </div>
        </div>
        <div class="form-group">
          <label>Title</label>
          <input
            name="title"
            value="<?php echo $employee['title'] ?>"
            class="form-control <?php echo $errors['title'] ? 'is-invalid' : '' ?>"
          />
          <div class="invalid-feedback">
            <?php echo $errors['title'] ?>
          </div>
        </div>
        <div class="form-group">
          <label>Phone number</label>
          <input
            name="phone_number"
            value="<?php echo $employee['phone_number'] ?>"
            class="form-control <?php echo $errors['phone_number'] ? 'is-invalid' : '' ?>"
          />
          <div class="invalid-feedback">
            <?php echo $errors['phone_number'] ?>
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input
            name="email"
            value="<?php echo $employee['email'] ?>"
            class="form-control <?php echo $errors['email'] ? 'is-invalid' : '' ?>"
          />
          <div class="invalid-feedback">
            <?php echo $errors['email'] ?>
          </div>
        </div>
        <div class="form-group">
          <label>Image</label>
          <input name="photo" type="file" class="form-control-file">
        </div>
        <button class="btn btn-success">Update</button>
      </form>
    </div>
  </div>
</div>
