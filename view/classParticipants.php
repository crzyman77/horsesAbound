<?php
    $title = "Riders By Class";
    require_once '../view/headerInclude.php';
 ?>           
  
<div class="container">
 <div class="container padding-bottom">
     <h2>Select the to Class Line Up </h2>          
 <div class ="row">
    <div id = "classSelector" class="form-group col-lg-4">
        <label class='required'> Class Line Up </label> &nbsp; &nbsp;
     <select id="classSelect" name="class">
          <option value =''> Select Class </option>
          <?php foreach ($row as $class){ ?> <option value='<?php echo $class['CLASS_NUM'];?>'><?php $classDesc = $class['CLASS_NUM'] . ' - ' . $class['CLASS_NAME']; echo $classDesc; ?></option> <?php } ?>
     </select>
    </div>
</div>

<div id = 'showOnLoad' class ='row' style = ''>
    <h4 id='riderCount'></h4>
    <table id="riderInfo" class="table table-hover table-bordered table-responsive">
        <thead>
            <tr>
                <!--<th> Rider_Id </th> -->
                <th>Rider_Number</th>
                <th>Rider Name</th>
                <th>Horse Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

 </div>
</div> <!-- Container Divs -->

<script>
 var ridersPlaced = [];
 function makeAjaxRequest(classID){
        $.ajax({
          type: "POST",
          data: { classID: classID },
          url: "../model/process_classParticipantsAjax.php",
          success: function(res) {
            var result = $.parseJSON(res);
            console.log(result);

           var resultsTable = $('#riderInfo');
           var tableRows = '';
           var riderCount = 0;
          for(var key in result){
              var riderName = result[key]["rider_fname"] + " " + result[key]["rider_lname"];
              tableRows +=  "<tr><td>" + result[key]["rider_number"] + "</td><td>" + riderName + "</td><td>" + 
                      result[key]["horse_name"] + "</td></tr>";
              riderCount = riderCount + 1;
             }
           resultsTable.append(tableRows);
           $('#riderCount').text('Riders in Class ' + riderCount);
           return;
        }});
  } ;   
        
$("#classSelect").on("change",function(){
    var selected = $(this).val();
    $('tbody tr').remove();
    console.log('Class Being Sent '+ selected);
    makeAjaxRequest(selected);   
});

        
</script>

<?php
    require_once '../view/footerInclude.php';
?>