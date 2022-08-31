<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php view('header', ['style' => '/merath/css/merath.css', 'title' => 'حساب الميراث ']) ?>


<div class="main-container">

  <!-- aside start -->

  <?php view('aside_user')
  ?>
  <!-- aside end -->
  <?php
  $mearth_ar = array(
    "الزوج", "الأخ الشقيق", "الزوجة",  "الأخت الشقيقة",
    "الابن",  "الأخ لأب", "البنت",  "الأخت لأب", "ابن الابن",  "الإخوة لأم", "بنت الابن",
    "ابن الأخ الشقيق", "الأب", "ابن الأخ لأب", "الأم", "العم الشقيق", "الجد لأب",
    "العم لأب", " الجدة لأب ", "ابن العم الشقيق", "الجدة لأم",  "ابن العم لأب"
  );
  $mearth = array(
    array("husband" => "brother"), array("wife" =>  "sister"),
    array("son" =>  "mbrother"), array("daughter" =>  "msister"), array("grandson" =>  "nephewsond"),
    array("granddaughter" =>  "nephew"), array("father" => "nephewson"), array("mother" => "uncle"),
    array("grandfather" =>  "uncled"), array(" grandmother" =>  "uncleson"), array("unclesond" =>  "oasaba")
  );
  $t = 0
  //echo var_dump($keys);

  ?>
  <!-- main content start -->
  <div class="main-content">

    <!-- home section statr -->
    <section class="home section">
      <div class="container">
        <div class="row">
          <div class="home-info padd-15">

          </div>
        </div>
      </div>

      <h3 class="hello"><center>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</center></h3>                        
                  <center><p class="hello">لِلرِّجَالِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ وَلِلنِّسَاءِ نَصِيبٌ مِمَّا تَرَكَ الْوَالِدَانِ وَالْأَقْرَبُونَ مِمَّا قَلَّ مِنْهُ أَوْ كَثُرَ نَصِيبًا مَفْرُوضًا * وَإِذَا حَضَرَ الْقِسْمَةَ أُولُو الْقُرْبَى وَالْيَتَامَى وَالْمَسَاكِينُ فَارْزُقُوهُمْ مِنْهُ وَقُولُوا لَهُمْ قَوْلًا مَعْرُوفًا</p></center>
<sup class="hello" style="float: left;">سورة النساء الآيات 7-8</sup>
      <div id="root">

        <main class="App-main">
          <div class="Card Input">
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


<?php view('merath_popup') ?>
<script src="/sdcard/library/bootstrap/js/bootstrap.min.js"></script>
<script src="jquery-3.5.1.min.js"></script>
<script src="/../merath/src/js/merath.js"></script>



</body>

</html>