<?php

class Validator {
  public function validateForm($employee, &$errors)
  {
    $isValid = false;

    if (!$employee['first_name']) {
      $errors['first_name'] = 'First name is required';
    } else if (!$employee['first_name']) {
      $errors['last_name'] = 'Last name is required';
    } else if (!$employee['title']) {
      $errors['title'] = 'Title is required';
    } else if (!$employee['phone_number']) {
      $errors['phone_number'] = 'Phone number is required';
    } else if (!$employee['email']) {
      $errors['email'] = 'Email is required';
    } else {
      $isValid = true;
    }

    return $isValid;
  }
}

return new Validator();