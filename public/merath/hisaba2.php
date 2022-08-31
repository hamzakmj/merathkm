<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php view('header', ['style' => '/../merath/css/hisabat1.css', 'title' => 'حساب الميراث ']) ?>


  <body>
    
  <nav class="navbar">
    <div class="max-width" style="<?= current_user() ? "justify-content: space-between;" : ""; ?>;">
        <div class="logo"><a href="#">ميراث<span>كم</span></a></div>
        <ul class="menu" style="<?=current_user() ? "margin-left: 500px": "margin-left: 600px"; ?>;">


            <li><a href="/../merath/public/main.php#home" class="menu-btn">الرئيسية</a></li>
            <li><a href="/../merath/public/main.php#about" class="menu-btn">عن موقعنا </a></li>
            <li><a href="/../merath/public/main.php#services" class="menu-btn">الخدمات </a></li>
            <li><a href="/../merath/public/main.php#contact" class="menu-btn">الاتصال </a></li>
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

<div class="main-container">

  <?php
  $mearth_ar = array(
    "الزوج", "الابن", "الزوجة",  "البنت",
    "الأب","الأخ الشقيق", "الأم",  "االأخت الشقيق");
  $mearth = array(
    array("husband" => "son"), array("wife" =>  "daughter"),
    array("father" =>  "brother"), array("mother" =>  "sister"));
$t=0
  //echo var_dump($keys);

  ?>

<div class="main-content">

<!-- home section statr -->
<section class="home section">
  <div class="container">
    <div class="row">
      <div class="home-info padd-15">

      </div>
    </div>
  </div>


  <div id="root">

    <main class="App-main">
      <div class="Card Input">
      <h3 class="hello"><center>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</center></h3>                        
                  <center><p class="hello">لِلرِّجَالِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ وَلِلنِّسَاءِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ مِمَّا قَلَّ مِنْهُ أَوْ كَثُرَ نَصِيبًا مَفْرُوضًا * وَإِذَا حَضَرَ الْقِسْمَةَ أُولُو الْقُرْبَى وَالْيَتَامَى وَالْمَسَاكِينُ فَارْزُقُوهُمْ مِنْهُ وَقُولُوا لَهُمْ قَوْلًا مَعْرُوفًا</p></center>
<sup class="hello" style="float: left;">سورة النساء الآيات 7-8</sup>
        <Form id="myform">
          <table>
            <thead>
              <tr>
                <th>أنواع الورثة</th>
                <th>أعداد الورثة</th>
                <th>أنواع الورثة</th>
                <th>أعداد الورثة</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  جنس المتوفى : </td>
                <td>
                  <select id="d" onchange="mf()">
                    <option value="select"> اختار </option>
                    <option value="male"> ذكر </option>
                    <option value="female"> انثى </option>
                  </select>
                </td>
                <td>
                  التركه : </td>
                <td>
                  <input id="amount" type="text" id="fname" name="fname">
                </td>
              </tr>
              <?php
              $keys = array_keys($mearth);
              for ($i = 0; $i < count($mearth); $i++) {
                //echo $keys[$i] . "{<br>";
                foreach ($mearth[$keys[$i]] as $key => $value) {
                  //echo var_dump($key);
              ?>
                  <tr>
                    <?php if ($key == "husband" || $key == "father" || $key == "mother") { ?>
                      <td class="<?= ($key == "husband") ? "ihusband" : "lol" ?>"><?= $mearth_ar[$t];
                                                                                  $t++; ?></td>
                      <td id=<?= ($key == "husband") ? "ihusband" : "lol" ?>><select id=<?= $key ?>>
                          <option value="0">لا</option>
                          <option value="1">نعم</option>
                        </select></td>
                    <?php } else { ?>
                      <td class="<?= ($key == "wife") ? "iwife" : "lol" ?>"><?= $mearth_ar[$t];
                                                                            $t++; ?></td>
                      <td id=<?= ($key == "wife") ? "iwife" : "lol" ?>><select id=<?= $key ?>>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select></td>
                    <?php } ?>
                    <td><?= $mearth_ar[$t];
                        $t++; ?></td>
                    <td id=<?= ($value == "wife") ? "iwife" : "lol" ?>><select id=<?= $value ?>>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select></td>
                  </tr>
                  <?php
                  ?>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </Form>
      </div>
      <div class="button-group">
        <button class="btn btn-big" type="button" onclick="calc()"> حساب </button>
        <button class="btn btn-big" id="myBtn"> اظهر النتائج </button>
      </div>
    </main>
  </div>

  </Form>
</div>
</main>
</div>
</section>
</div>

<Br />
<Br />

<?php view('merath_guest_pop') ?>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="/sdcard/library/bootstrap/js/bootstrap.min.js"></script>
<script src="jquery-3.5.1.min.js"></script>
<script src="/../merath/src/js/merath_guest.js"></script>



</body>

</html>