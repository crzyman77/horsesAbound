<?php
    $title = "Class Results";
    require '../view/headerInclude.php';
	//phpinfo();
    //$results = getClassResults(11);
    //print_r($results);
 ?>           
  
<div class="container">
 <div class="container padding-bottom">
     <h2> Select the Class that was Completed </h2>          
 <div class ="row">
    <div id = "classSelector" class="form-group col-lg-4">
        <label class='required'> Class that Completed </label> &nbsp; &nbsp;
     <select id="classSelect" name="class">
          <option value =''> Select Class </option>
          <?php foreach ($row as $class){ ?> <option value='<?php echo $class['CLASS_NUM'];?>'><?php $classDesc = $class['CLASS_NUM'] . ' - ' . $class['CLASS_NAME']; echo $classDesc; ?></option> <?php } ?>
     </select>
    </div>
</div>

<div class ='row'>
    <table id="riderInfo" class="table table-hover table-bordered table-responsive">
        <thead>
            <tr>
                <!--<th> Rider_Id </th> -->
                <th>Placing</th>
                <th>Rider Number</th>
                <th>Rider Name</th>
                <th>Horse Name</th>
            </tr>
        </thead>
        <tbody>
<!--            <tr>
                <td>1</td>
                <td contenteditable="true"></td>
            </tr>
              <tr>
                <td>2</td>
                <td contenteditable="true"></td>
            </tr>
              <tr>
                <td>3</td>
                <td contenteditable="true"></td>
            </tr>
              <tr>
                <td>4</td>
                <td contenteditable="true"></td>
            </tr>
              <tr>
                <td>5</td>
                <td contenteditable="true"></td>
            </tr>-->
        </tbody>
    </table>
</div>

 </div></div> <!-- Container Divs -->
<script>
 var ridersPlaced = [];
 function makeAjaxRequest(classID){
        $.ajax({
          type: "POST",
          data: { classID: classID },
          url: "../model/process_resultsAjax.php",
          success: function(res) {
            var result = $.parseJSON(res);
           // console.log('AJAX return ' + result);
            
        //    console.log('AJAX return ' +res);
         //   var classSelect = $('#classSelect');
         var resultsTable = $('#riderInfo');
         var tableRows = '';
            for(var key in result){
                var riderName = result[key]["rider_fname"] + " " + result[key]["rider_lname"];
              tableRows +=  "<tr><td>" + result[key]["place"] + "</td><td>" + result[key]["rider_number"] + "</td><td>" + riderName + "</td><td>" + 
                      result[key]["horse_name"] + "</td></tr>";
             }
           resultsTable.append(tableRows);
        }});
        }
      ;

    
$("#classSelect").on("change",function(){
    var selected = $(this).val();
    $('tbody tr').remove();
    console.log('Class Being Sent '+ selected);
    makeAjaxRequest(selected);   
});

        
</script>



<?php
    require '../view/footerInclude.php';
?>