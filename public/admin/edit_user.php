<?php
require __DIR__ . '/../../../merath/src/bootstrap.php';
require __DIR__ . '/../../../merath/public/admin/edit_user-ph.php';
?>
<?php view('header', ['style' => '/../merath/css/style_admin.css', 'title' => 'Dashboard/User']) ?>



<body>
<?php view('aside_admin')?>


      <div class="content">
        <h2 class="page-title"> تحرير العضو </h2>

        <form action="edit_user.php" method="post">
          <?php $x=$_GET['user_id']?>
        <div>
            <label for="id"> id:<?=$x ?? ''?></label>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $x;?>" class="text-input">
          </div>
          
          <div>
            <label for="username">اسم المستخدم:</label>
            <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?> text-input">
            <small><?= $errors['username'] ?? '' ?></small>
          </div>

          <div>
            <label for="email">البريد الألكتروني:</label>
            <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?> text-input">
            <small><?= $errors['email'] ?? '' ?></small>
          </div>

          <div>
            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?> text-input">
            <small><?= $errors['password'] ?? '' ?></small>
          </div>

          <div>
            <label for="password2"> تأكيد كلمة المرور:</label>
            <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?> text-input">
            <small><?= $errors['password2'] ?? '' ?></small>
          </div>
          <div>
            <center>
              <button type="submit" class="btn btn-big"> تحديث </button>

            </center>
          </div>
        </form>
      </div>
    </div>


  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
  <?php view('footer', ['js' => '/../merath/src/js/mange_admin.js']) ?>