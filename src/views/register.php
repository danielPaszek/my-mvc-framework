<?php

use app\core\form\Form;

$form = new Form();
?>
<div class="container">
  <h1>Register</h1>

  <?php
    $form->begin('', 'POST', ["class" => "row g-3 align-items-center"]); ?>
  <div class="row mt-3 g-3">
    <div class="col"><?php echo $form->field($model, 'firstname') ?></div>
    <div class="col"><?php echo $form->field($model, 'lastname') ?></div>
  </div>
  <div class="row g-3 align-items-center">
    <div class="col-3">
      <?php echo $form->field($model,
      'email')->setType('email')->setClasses("form-control"); ?>
    </div>
    <div class="col-3 d-flex align-items-center">
      <div class="form-text ">
        We'll never share your email with anyone else.
      </div>
    </div>
  </div>
  <div class="row g-3 align-items-center">
    <div class="col">
      <?php echo $form->field($model,
      'password')->setType('password')->setClasses("form-control"); ?>
    </div>
    <div class="col">
      <?php echo $form->field($model,
      'passwordConfirm')->setType('password')->setClasses("form-control"); ?>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-3">
      <button
        type="submit"
        style="max-width: 600px; width: 100%"
        class="btn btn-primary"
      >
        Submit
      </button>
    </div>
  </div>

  <?php $form->end();?>
</div>
