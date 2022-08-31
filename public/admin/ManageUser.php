<?php
require __DIR__ . '/../../../merath/src/bootstrap.php';
require __DIR__ . '/../../../merath/public/admin/creatuser-ph.php';
?>
<?php view('header', ['style' => '/../merath/css/style_admin.css', 'title' => 'Dashboard/User']) ?>


<body>


  <?php view('aside_admin')?>


    <div class="content">
    <center>
      <div class="home-content">
        <div class="admin-content">

          <div class="button-group">
            <a href="/../merath/public/admin/createuser.php" class="btn btn-big"> إضافة مستخدم </a>
          </div>
        </div>
    </center>
      <h2 class="page-title"> إدارة المستخدم </h2>
      
      <table>
        <thead>
          <th>ID</th>
          <th> اسم االمستخدم </th>
          <th> عنوان </th>
          <th> صلاحية </th>
          <th colspan="2"> أجراءات </th>

        </thead>
        <tbody>
            <div class="row">
              <?php
              include_once('/xampp/htdocs/merath/src/libs/connection.php');
              $a = 1;
              $stmt = db()->prepare(
                "SELECT * FROM users"
              );
              $stmt->execute();
              $users = $stmt->fetchAll();
              foreach ($users as $row) {
              ?>
                <tr>
                  <td><?= $row["id"] ?></td>
                  <td><?= $row["username"] ?></td>
                  <td><?= $row["email"] ?></td>
                  <td><?= ($row["is_admin"]) ? 'مشرف' : 'مستخدم'; ?></td>
                  <td><a href="/../merath/public/admin/edit_user.php?user_id=<?php echo $row['id']; ?>" class="edit">التحرير</a></td>
                  <td><a style="<?=is_user_admin_by_id($row["is_admin"]) ? "display: none": ""; ?>" href="/../merath/public/admin/delete_user.php?delete_id=<?php echo $row['id'];?>"   class="delete" id="delete">  حذف </a></td>
                </tr>
            </div>
            </td>
            </tr>
          <?php
              }
          ?>
        </tbody>
      </table>
    </div>

    </div>
  </section>
  <
  <?php view('footer', ['js' => '/../merath/src/js/mange_admin.js']) ?>