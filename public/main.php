<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ .'/../src/main.php';
?>

<?php view('header', ['title' => 'ميراثكم', 'style' => '/../merath/css/style-main.css']) ?>

<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<nav class="navbar">
    <div class="max-width">
        <div class="logo"><a href="#">ميراث<span>كم</span></a></div>
        <ul class="menu" style="<?=current_user() ? "margin-left: 500px": "margin-left: 600px"; ?>;">


            <li><a href="#home" class="menu-btn">الرئيسية</a></li>
            <li><a href="#about" class="menu-btn">عن موقعنا </a></li>
            <li><a href="#services" class="menu-btn">الخدمات </a></li>
            <li><a href="#contact" class="menu-btn">الاتصال </a></li>
        </ul>
        <div class="dropdown" id="menu-btn" style="<?=current_user() ? "": "display: none"; ?>;">
                <button class="dropbtn" id="dropdown_user"><?= current_user() ?></button>
                <div class="dropdown-content">
                    <a href="/../merath/public/user/number6.php"><b>الصفحة الشخصية</b></a>
                    <a href="/../merath/public/user/number1.php"><b>صفحة الحسابات </b></a>
                    <a href="/../merath/public/logout.php"><b>تسجيل خروج </b></a>
                </div>
            </div>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>

<!-- home section start -->
<section class="home" id="home">
    <div class="max-width">
        <div class="home-content">
            <div class="text-1">مرحبًا ، اسمي هو</div>
            <div class="text-2">ميراثكم</div>
            <div class="text-3">وأنا <span class="typing"></span></div>
            <a href="/../merath/public/login.php" style="<?=!current_user() ? "": "display: none"; ?>;" title="اذهب لصفحة التسجيل">الدخول / التسجيل </a>
        </div>
    </div>
</section>

<!-- about section start -->
<section class="about" id="about">
    <div class="max-width">
        <h2 class="title">عن موقعنا </h2>
        <div class="about-content">
            <div class="column left">
                <img src="/../merath/src/img/2.jpg" alt="ميراثكم" style="width: 70%;">
            </div>
            <div class="column right">
                <div class="text">ميراثكم <span class="typing-2"></span></div>
                <p>
                    <center>
                        <b>
                            <h3>
                                بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ
                            </h3>
                        </b>
                    </center>
                    <em>
                        <b>
                            لِلرِّجَالِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ وَلِلنِّسَاءِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ مِمَّا قَلَّ مِنْهُ أَوْ كَثُرَ نَصِيبًا مَفْرُوضًا
                            *
                            وَإِذَا حَضَرَ الْقِسْمَةَ أُولُو الْقُرْبَى وَالْيَتَامَى وَالْمَسَاكِينُ فَارْزُقُوهُمْ مِنْهُ وَقُولُوا لَهُمْ قَوْلًا مَعْرُوفًا

                        </b>
                        <br>
                        سورة النساء الآيات 7-8
                        <br>
                        <br>
                        بغض النظر عن اللغات والأجناس ، إلا أن الدين عند الله هو الإسلام وبذلك حُسّن الحق به
                        وعليها فان الميراث حق من حقوق العباد وبالإسلام تبيّن كيف يُعطى لكل شخص من الوَرَثّة
                        وهُنا يأتي دور هذا الموقع المتواضع ، حيث أنه سيعطي القيمة المحتسبة من المجموع الكلي من الميراث لكل وارث
                        ومن واجبنا كمسلمين التوضيح بهذا لمن لا علم لديهم به
                        وعليها موقعنا وفريقنا سيقوم بهذا ، إن شاء الله

                    </em>
                </p>
                <a href="/../merath/public/merath/hisaba2.php">الحساب السريع </a>
            </div>
        </div>
    </div>
</section>

<!-- services section start -->
<section class="services" id="services">
    <div class="max-width">
        <h2 class="title">خدماتنا</h2>
        <div class="serv-content">
            <div class="card">
                <div class="box">
                    <i class="fas fa-paint-brush"></i>
                    <div class="text"> رسم الميراث</div>
                    <p>
                        <b>
                            من البديهي هنا انه علينا رسم كيفية حساب الميراث بشكل لائق

                        </b>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <i class="fas fa-chart-line"></i>
                    <div class="text">مؤشر الحساب </div>
                    <p>

                        <b>

                            يوجد ما يسمى بمؤشر الزيادة والنقصان في أمور الميراث حيث أنه إن كان لا يوجد ابناء للمتوفي فان نسبة قيمة الميراث للأخوة والاخوات ستزداد ، والعكس صححيح

                        </b>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <i class="fas fa-code"></i>
                    <div class="text">تصميم الموقع </div>
                    <p>
                        <b>


                            من خدماتنا لكم تصميم هذا الموقع بطريقة سلسة ومُريحة لكم ليسهل عليكم التعامل معه

                        </b>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- skills section start -->


<!-- contact section start -->
<section class="contact" id="contact">
    <div class="max-width">
        <h2 class="title">اتصل بنا </h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">ابقى على تواصل </div>
                <p>

                    <em>

                        من منا لا يحب الإجابة عليه بأسرع وقت عند حدوث أمر ما
                        <br>
                        لذلك أعزائي نضع هذه الخدمة هنا لكم لتمكنكم من الإتصال بنا في أسرع وقت ، ونحن إن شاء الله سنجيب بأسرع وقت أيضًا


                    </em>
                </p>
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <div class="info">
                            <div class="head"><b>الاسم</b></div>
                            <div class="sub-title">ميراثكم</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info">
                            <div class="head"><b>الموقع</b></div>
                            <div class="sub-title">الاردن ، المفرق ، آل البيت</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head"><b>البريد الإلكتروني</b></div>
                            <div class="sub-title">merathcom@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column right">
                <div class="text">أرسل لنا </div>
                <form action="main.php" method="post">
                    <div class="fields">
                        <div class="field name">
                        <input type="text" name="username"  id="username" placeholder=" الأسم " value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?> text-input">
            <small><?php $errors['username'] ?? '' ?></small>
                        </div>
                        <div class="field email" >
            <input type="email" name="email" id="email" placeholder=" البريد الألكتروني" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?> text-input">
            <small><?= $errors['email'] ?? '' ?></small>
                        </div>
                    </div>
                    <div class="field">
                    <input type="text" name="subject" id="subject" placeholder=" العنوان " value="<?= $inputs['subject'] ?? '' ?>" class="<?= error_class($errors, 'subject') ?> text-input">
            <small><?= $errors['subject'] ?? '' ?></small>
                    </div>
                    <div class="field textarea">
                    <input type="text" name="message_user" id="message_user" placeholder=" الرساله " value="<?= $inputs['message_user'] ?? '' ?>" class="<?= error_class($errors, 'message_user') ?> text-input">
            <small><?= $errors['message_user'] ?? '' ?></small>
                    </div>
                    <div class="button-area">
                        <button type="submit">إرسال الرسالة </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- footer section start -->
<footer>
    <span>أُنشأ من قبل <a href="https://www.google.com"><b>فريق ميراثكم </b> </a> | <span class="far fa-copyright"></span> ٢٠٢٢ جميع الحقوق محفوظة</span>
</footer>

<script src="/../merath/src/js/main_js.js"></script>
</body>

</html>