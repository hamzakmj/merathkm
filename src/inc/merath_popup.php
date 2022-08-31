

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
<Br /><br />
الناتج <br />
<table id="res">

  <Tr id="pfather">
    <td> الأب </td>
    <td id="sfather"> </td>
  </tr>


  <Tr id="pmother">
    <td> الأم </td>
    <td id="smother"> </td>
  </tr>


  <Tr id="pgrandfather">
    <td> الجد </td>
    <td id="sgrandfather"> </td>
  </tr>

  <Tr id="pgrandmothers">
    <td>الجدة </td>
    <td id="sgrandmothers"> </td>
  </tr> <!-- أو مجموع كل الجدات -->

  <Tr id="pgrandmother">
    <td> كل جدة </td>
    <td id="sgrandmother"> </td>
  </tr> <!-- كل جدة -->


  <Tr id="pwifes">
    <td>الزوجات </td>
    <td id="swifes"> </td>
  </tr><!--  مجموع كل الزوجات  -->


  <Tr id="pwife">
    <td>كل زوجة </td>
    <td id="swife"> </td>
  </tr>

  <Tr id="phusband">
    <td> الزوج </td>
    <td id="shusband"> </td>
  </tr>

  <Tr id="pson">
    <td>كل ابن </td>
    <td id="sson"> </td>
  </tr>

  <Tr id="pdaughter">
    <td>كل بنت </td>
    <td id="sdaughter"> </td>
  </tr>


  <Tr id="pgrandson">
    <td>كل حفيد </td>
    <td id="sgrandson"> </td>
  </tr>

  <Tr id="pgranddaughter">
    <td>كل حفيدة </td>
    <td id="sgranddaughter"> </td>
  </tr>


  <Tr id="pbrother">
    <td>كل أخ لأب </td>
    <td id="sbrother"> </td>
  </tr>


  <Tr id="psister">
    <td>كل أخت لأب </td>
    <td id="ssister"> </td>
  </tr>



  <Tr id="pmbrother">
    <td>كل أخ لأم </td>
    <td id="smbrother"> </td>
  </tr>


  <Tr id="pmsister">
    <td>كل أخت لأم </td>
    <td id="smsister"> </td>
  </tr>

  <Tr id="pnephew">
    <td>كل ابن أخ </td>
    <td id="snephew"> </td>
  </tr>


  <Tr id="pnephewson">
    <td>كل من أبناء أو أحفاد أبناء </td>
    <td id="snephewson"> </td>
  </tr>



  <Tr id="puncle">
    <td>كل عم </td>
    <td id="suncle"> </td>
  </tr>


  <Tr id="puncleson">
    <td>كل من أبناء أو أحفاد الأعمام</td>
    <td id="suncleson"> </td>
  </tr>



  <Tr id="poasaba">
    <td>كل فرد من الآخرون </td>
    <td id="soasaba"> </td>
  </tr>



  <Tr id="pradd">
    <td>الباقي </td>
    <td id="sradd"> </td>
  </tr><!-- rad -->




</table>
<button class="btn btn-big close" type="button"> اغلاق </button>
<button class="btn btn-big" id="summ"   onclick="sum()"> حفظ النتائج </button>
<P id="demo"></P>
  </div>

</div>

<script>
  //document.getElementById("demo").innerHTML = sum();
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