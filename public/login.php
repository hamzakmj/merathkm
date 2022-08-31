<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['style' => '/merath/css/style.css', 'title' => 'Login']) ?>
<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<nav class="navbar" >
    <div class="max-width">
        <div class="logo"><a href="#">ميراث<span>كم</span></a></div>
        <ul class="menu" style="<?= current_user() ? "margin-left: 500px" : "margin-left: 600px"; ?>;">
            <li><a href="/../merath/public/main.php#home" class="menu-btn">الرئيسية</a></li>
            <li><a href="/../merath/public/main.php#about" class="menu-btn">عن موقعنا </a></li>
            <li><a href="/../merath/public/main.php#services" class="menu-btn">الخدمات </a></li>
            <li><a href="/../merath/public/main.php#contact" class="menu-btn">الاتصال </a></li>
        </ul>
    </div>
    <div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div>
    </div>
</nav>
<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

<form action="login.php" method="post">
    <h1>تسجيل الدخول</h1>
    <div>
        <label for="username">اسم المستخدم:</label>
        <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>">
        <small><?= $errors['username'] ?? '' ?></small>
    </div>

    <div>
        <label for="password">كلمة السر:</label>
        <input type="password" name="password" id="password">
        <small><?= $errors['password'] ?? '' ?></small>
    </div>

    <div>
        <label for="remember_me">
            <input type="checkbox" name="remember_me" id="remember_me" value="checked" <?= $inputs['remember_me'] ?? '' ?> />
            تذكرني على هذا الحاسوب
        </label>
        <small><?= $errors['agree'] ?? '' ?></small>
    </div>

    <section>
        <button type="submit">دخول</button>
        <a href="register.php">إنشاء حساب جديد</a>
    </section>

</form>

<?php view('footer') ?>