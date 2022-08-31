<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php view('header', ['style' => '/merath/css/number2.css', 'title' => 'حسابات سابقة']) ?>

<div  class="main-container">

    <!-- aside start -->
    
    <?php view('aside_user')?>
    <!-- aside end -->

       
<!-- main content start -->
<div class="main-content">




     <section class="home section">
        <div class="container">
            <div class="row">
                <div class="home-info padd-15">
                   
                  <h3 class="h3 my-profession"><center> أنت الآن في صفحة الحسابات السابقة ، حيث أنه هنا سنطلعك على حساباتك التي اجريتها سابقًا وحفظتها</center></h3>
                 
                  <h2><center>الحسابات السابقة</center></h2>

                  <br>
                  <style>
                    table, th, td {
                      border:2px solid Gray;
                    }
                    </style>
                 <center> <table>
                    <tr>
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th>التاريخ </th>
                    <th>النتيجة</th>


                    </tr>
                    <tr>
                      <td> 1</td>
                      <td>تركة أبا زيد </td>
                      <td>20/2/2022</td>
                      <td>أظهر</td>
                    </tr>
                     <tr>
                      <td>2</td>
                      <td>تركة اسماعيل </td>
                      <td>5/3/2022</td>
                      <td>أظهر</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>تركة المرحومة أم معاذ</td>
                      <td>20/8/2022</td>
                      <td>أظهر</td>
                    </tr>
                  </table></center>
                </div>
                
            </div>
        </div> 
     </section>


    <!--********** JAVA SCRIPT **********-->
    <script src="script.js"></script>
<?php view('footer') ?>