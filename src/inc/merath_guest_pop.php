


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

  <Tr id="pbrother">
    <td>كل أخ لأب </td>
    <td id="sbrother"> </td>
  </tr>


  
  <Tr id="pradd">
    <td>الباقي </td>
    <td id="sradd"> </td>
  </tr><!-- rad -->




</table>
<button class="btn btn-big close" type="button"> اغلاق </button>

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