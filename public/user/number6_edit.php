<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/user_info_edit-ph.php';
?>
<?php view('header', ['style' => '/merath/css/number2.css', 'title' => 'المعلومات الشخصية']) ?>

<body>
  <section class="home-section">
    <?php view('aside_user') ?>


    <div class="content">
      <center>
      تحرير العضو :<?= current_user() ?></center>

          <form action="number6_edit.php" method="post" class="form-edit">
            <?php $y = find_user_by_username($_SESSION['username']);
            $r = $y['id'];
            ?>
            <div>
              <label for="id"> <?= $r ?? '' ?>:id</label>
              <input type="hidden" name="user_id" id="user_id" value="<?= $r ?>" class="text-input">
            </div>

            <div>
              <label for="username">اسم المستخدم :</label>
              <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?> text-input">
              <small><?= $errors['username'] ?? '' ?></small>
            </div>

            <div>
              <label for="username"> العمر:</label>
              <input type="number" name="age" id="age" value="<?= $inputs['age'] ?? '' ?>" class="<?= error_class($errors, 'age') ?> text-input">
              <small><?= $errors['age'] ?? '' ?></small>
            </div>

            <div>
              <label for="phone_number"> رقم الهاتف:</label>
              <input type="number" name="phone_number" id="phone_number" value="<?= $inputs['phone_number'] ?? '' ?>" class="<?= error_class($errors, 'phone_number') ?> text-input">
              <small><?= $errors['phone_number'] ?? '' ?></small>
            </div>

            <div>
              <label for="nationality"> الجنسية:</label>
              <input type="text" name="nationality" id="nationality" value="<?= $inputs['nationality'] ?? '' ?>" class="<?= error_class($errors, 'nationality') ?> text-input">
              <small><?= $errors['nationality'] ?? '' ?></small>
            </div>

            <div>
              <label for="nationality"> صوره شخصيه:</label>
              <input type="text" name="user_img" id="user_img" value="<?= $inputs['user_img'] ?? '' ?>" class="<?= error_class($errors, 'user_img') ?> text-input">
              <small><?= $errors['user_img'] ?? '' ?></small>
            </div>

            <div>
              <center>
                <button type="submit" class="btn btn-big"> تحديث </button>

              </center>
            </div>
          </form>
    </div>

  </section>

  <!--********** JAVA SCRIPT **********-->
  <script src="script.js"></script>
  <?php view('footer') ?>