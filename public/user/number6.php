<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php view('header', ['style' => '/merath/css/number2.css', 'title' => 'المعلومات الشخصية']) ?>

<div class="main-container">

  <!-- aside start -->

  <?php view('aside_user') ?>


  <section class="home section">
    <div class="container">
      <div class="row">
        <div class="home-info padd-15">
          <h3 class="hello">
            <center>مرحبًا بك في صفحتك الشخصية </center> <span class="name">
              <center><?= current_user() ?></center>
            </span>
          </h3>
          <h3 class="h3 my-profession">
            <center> أنت الآن في صفحة المعلومات الشخصية ، حيث أنه هنا سنطلعك على معلوماتك التي أدخلتها لهذا الموقع </center>
          </h3>
          <?php
          include_once('/xampp/htdocs/merath/src/libs/connection.php');
          $y = find_user_by_username($_SESSION['username']);
          $r = $y['id'];
          $stmt = db()->prepare(
            "SELECT * FROM user_info
            WHERE user_info_id=:user_info_id"
          );
          $stmt->bindValue(':user_info_id', $r);
          $stmt->execute();
          $users = $stmt->fetchAll();
          $x = 1;
          if ($users[0]['name'] == 'name') { ?>
            <div class="image">

              <img src="/../merath/src/img/3.jpg" alt="user_img" style="  width: 100px" class="thaer" />


              <h2>
                <center>المعلومات الشخصية</center>
              </h2>
              <br>
              <center>
                <table id="prof" class="center" >
                  <tr>
                  <tr>
                    <th>id</th>
                    <td></td>
                  <tr>
                  <tr>
                    <th>الإسم</th>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>العمر </th>
                    <td></td>
                  </tr>
                  <tr>
                    <th> الرقم الهاتف</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>الجنسية</th>
                    <td></td>
                  </tr>
                  </tr>
                  <tbody>
                    <tr>
                      <td colspan="2"><a href="/../merath/public/user/number6_edit.php" class="edit"><button class="buttons"> تحديث المعلومات</button></a></td>
                    </tr>
                  </tbody>
                  <?php
                } else {
                  foreach ($users as $row) {
                    if ($x > 1) {
                      break;
                    } else {
                      $x++;
                  ?>
                      <div class="image">

                        <img src="<?= $row["user_img"] ?>" alt="user_img" style="  width: 100px" class="thaer" />

                        <p><?= $row["name"] ?></p>

                        <h2>
                          <center>المعلومات الشخصية</center>
                        </h2>
                        <br>
                        <center>
                          <table id="prof" class="center">
                            <tr>
                            <tr>
                              <th>id</th>
                              <td><?= $row["id"] ?></td>
                            <tr>
                            <tr>
                              <th>الإسم</th>
                              <td> <?= $row["name"] ?> </td>
                            </tr>
                            <tr>
                              <th>العمر </th>
                              <td><?= $row["age"] ?></td>
                            </tr>
                            <tr>
                              <th> الرقم الهاتف</th>
                              <td><?= $row["phone_number"] ?></td>
                            </tr>
                            <tr>
                              <th>الجنسية</th>
                              <td> <?= $row["nationality"] ?></td>
                            </tr>
                            </tr>
                            <tbody>
                              <tr>
                                <td colspan="2"><a href="/../merath/public/user/number6_edit.php?user_id=<?php echo $row['id']; ?>" class="edit"><button class="buttons"> تحديث المعلومات</button></a></td>
                              </tr>
                            </tbody>
                      <?php
                    }
                  }
                }
                      ?>
                          </table>
                        </center>
                      </div>
            </div>
        </div>
      </div>

  </section>
  <!--********** JAVA SCRIPT **********-->
  <script src="script.js"></script>
  <?php view('footer') ?>