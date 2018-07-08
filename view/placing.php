<?php
    $title = "Placing for Class";
    require '../view/headerInclude.php';
	//phpinfo();
?>
<style>
    .hideTable{ display:none;
    }
      .btn-primary{
                background-color: #ff6a99 !important;
                border-color: #ff6a99 !important;
                color: black;
            }
      .invalidNum {
          background-color: rgba(255, 0, 0, 0.4) !important;
          color:black !important;
      }
      .validNum{
          background-color: rgba(0, 255, 0, 0.3) !important;
          color:black !important;
      }
</style>


<div class="container">
 <div class="container padding-bottom">
     <h2> Select the Class that was Completed </h2>
<!-- <div class ="row">
                 <div class="form-group col-lg-4 ">
                     <label class='required'> Division </label> &nbsp; &nbsp;
                  <select id="divisionSelect" name="division">
                      <option value =''> Select Division </option>
                      <?//php foreach ($row as $div){ ?> <option value='<?//php echo $div['division_id'];?>'><?//php echo $div['division_name'];?></option> <?//php } ?>
                  </select>
                 </div>
                    </div>-->

 <div class ="row">
    <div id = "classSelector" class="form-group col-lg-4 ">
        <label class='required'> Class to Place </label> &nbsp; &nbsp;
     <select id="classSelect" name="class">
                      <option value =''> Select Class </option>
                      <?php foreach ($row as $class){ ?> <option value='<?php echo $class['CLASS_NUM'];?>'><?php echo $class['CLASS_NUM'] . " - " . $class['CLASS_NAME'];?></option> <?php } ?>
                  </select>
     
    </div>
</div>

<div class ='row'>
    <table id="riderInfo" class="table table-hover table-bordered table-responsive hideTable">
        <thead>
            <tr>
                <!--<th> Rider_Id </th> -->
                <th>Placing</th>
                <th>Rider Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td contenteditable="true" id ="place1" onblur="checkIfValid($(this).html(),$(this))" ></td>
                
            </tr>
              <tr>
                <td>2</td>
                <td contenteditable="true" id ="place2" onblur="checkIfValid($(this).html(),$(this))"></td>
            </tr>
              <tr>
                <td>3</td>
                <td contenteditable="true" id ="place3" onblur="checkIfValid($(this).html(),$(this))"></td>
            </tr>
              <tr>
                <td>4</td>
                <td contenteditable="true" id ="place4" onblur="checkIfValid($(this).html(),$(this))"></td>
            </tr>
              <tr>
                <td>5</td>
                <td contenteditable="true"id ="place5" onblur="checkIfValid($(this).html(),$(this))"></td>
            </tr>
        </tbody>
    </table>
</div>
<div class ='container'     
 <div class ="row">
  <div class ="col-lg-4 col-md-6 mb-4">
        <button id="submission" type="submit" class="btn-primary" style="border-radius: 15px"> Submit Results </button>
     </div>
 </div>
 </div></div> <!-- Container vs -->
<script>
 var ridersPlaced = [];
 var indexCounter = 1;
 var validRiderNumbers = [];
 
 function makeAjaxCall(classNum){
        $.ajax({
          type: "POST",
          data: { classID: classNum },
          url: "../model/process_riderNumAjax.php",
          success: function(res) {
            var result = $.parseJSON(res);
             console.log(result);
             for (key in result){
                 var riderNum = result[key]['rider_number'];
                 //console.log(riderNum);
                 validRiderNumbers.push(riderNum);
             }
          } });
    };
 
 function checkIfValid(val, $el){
     //console.log($el);
     for (i=0; i < validRiderNumbers.length; i++){
         if ( val === validRiderNumbers[i]){
            // alert("Valid Rider Number");
             $el.removeClass("invalidNum");
             $el.addClass("validNum");
             return;
         }
     }
     $el.addClass("invalidNum");
     //alert("Bad Number");
     return false;
 };
 
 function resetTable(){
     $("#place1").removeClass("validNum invalidNum");
     $("#place1").empty();
     $("#place2").removeClass("validNum invalidNum");
     $("#place2").empty();
     $("#place3").removeClass("validNum invalidNum");
     $("#place3").empty();
     $("#place4").removeClass("validNum invalidNum");
     $("#place4").empty();
     $("#place5").removeClass("validNum invalidNum");
     $("#place5").empty();
 }
 
//$("#place1").blur(function(){
//    var num = $("#place1").val();
//   console.log("Rider Num: " + num );
//   console.log("It works");
//});

$("#classSelect").on("change",function(){
     $("#riderInfo").removeClass("hideTable"); 
     resetTable();
     var classNumber = $('#classSelect').val();
     validRiderNumbers = [];
     makeAjaxCall(classNumber);
   //console.log("Final Valid RiderNums: " + validRiderNumbers );

});

$('#submission').click(function(e){
   // var division = $('#divisionSelect').val();
    var classNum = $('#classSelect').val();
    var riderPlace = []; var tableData = $('table').find('td');
    for( var i = 0; i < tableData.size(); i= i + 2)
    {
        riderPlace.push(tableData[i].textContent, tableData[i+1].textContent, classNum);     
    }
   var riderPlaceJSON = JSON.stringify(riderPlace);
   //console.log("Division Slected " + division + " Class Selected " + classNum );
   //console.log(riderPlaceJSON);
   $.ajax({
          type: "POST",
          data: {classPlacing:riderPlaceJSON}, //{formSubmit: formSubmission, classes: selectedClasses},//jsonPost, //{form: formSubmission}
          url: "../model/process_placingAjax.php",
          success: function(result) {
             console.log("Ajax Returned Success Func Result " + result);
             alert("Class was Succesfully Placed");
             window.location.href = "../controller/controller.php?action=Placing"; 
         // e.preventDefault(); //added for debugging and no redirects
          //  return;
          },
          error: function(result) {
             console.log("Ajax Returned Fail Result " + result);
             alert("Error Placing Class, Please try again");
              e.preventDefault();
             return;
          }
       });
       e.preventDefault();   
      // return false;
       e.stopPropagation();
   
});
        
</script>



<?php
    require '../view/footerInclude.php';
?>