<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']) ?>
<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<nav class="navbar">
    <div class="max-width">
        <div class="logo"><a href="#">ميراث<span>كم</span></a></div>
        <ul class="menu" style="<?= current_user() ? "margin-left: 500px" : "margin-left: 600px"; ?>;">
            <li><a href="/../merath/public/main.php#home" class="menu-btn">الرئيسية</a></li>
            <li><a href="/../merath/public/main.php#about" class="menu-btn">عن موقعنا </a></li>
            <li><a href="/../merath/public/main.php#services" class="menu-btn">الخدمات </a></li>
            <li><a href="/../merath/public/main.php#contact" class="menu-btn">الاتصال </a></li>
        </ul>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
<form action="register.php" method="post">
    <h1> التسجيل كمستخدم جديد</h1>

    <div>
        <label for="username">اسم المستخدم :</label>
        <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?>">
        <small><?= $errors['username'] ?? '' ?></small>
    </div>

    <div>
        <label for="email">لبريد الألكتروني:</label>
        <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?>">
        <small><?= $errors['email'] ?? '' ?></small>
    </div>

    <div>
        <label for="password">كلمة السر:</label>
        <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?>">
        <small><?= $errors['password'] ?? '' ?></small>
    </div>

    <div>
        <label for="password2">تأكيد كلمة السر:</label>
        <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?>">
        <small><?= $errors['password2'] ?? '' ?></small>
    </div>

    <div>
        <label for="agree">
            <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
            تتفق مع
            <a href="#" title="term of services">مصطلح الخدمات</a>
        </label>
        <small><?= $errors['agree'] ?? '' ?></small>
    </div>

    <button type="submit">التسجيل</button>

    <footer>مسجل مسبق? <a href="login.php">تسجيل الدخول من هنا</a></footer>

</form>

<?php view('footer') ?>