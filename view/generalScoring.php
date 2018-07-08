<?php
    $title = "Riders Score Report";
    require '../view/headerInclude.php';
	//phpinfo();
    //$results = getClassResults(11);
    //print_r($results);
    
   //Arrays Called on Controller 
//     $TopRider = getDivisionHighPoint();

 ?>           
<div class="container">
 <div class="container padding-bottom">
     <h2> General Score of Riders </h2>          
 <div class ="row">
</div>

     <h4> Select the Division the Rider is in </h4>
 <div class ="row">
                 <div class="form-group col-lg-4 ">
                     <label class='required'> Division </label> &nbsp; &nbsp;
                  <select id="divisionSelect" name="division">
                      <option value =''> Select Division </option>
                      <?php foreach ($row as $div){ ?> <option value='<?php echo $div['division_id'];?>'><?php echo $div['division_name'];?></option> <?php } ?>
                  </select>
                 </div>
                    </div>

<div class ='row'>
    <table id="riderInfo" class="table table-hover table-bordered table-responsive">
        <thead>
            <tr>
                <!--<th> Rider_Id </th> -->
                <th>Place</th>
                <th>Rider Number</th>
                <th>Rider Name</th>
                <th>Horse Name</th>
                <th>Score </th>
            </tr>
        </thead>     
        <tbody>
         
        </tbody>
    </table>
</div>

 </div></div>
 
<script>
  function makeAjaxRequest(divisionID){
        $.ajax({
          type: "POST",
          data: { divisionID: divisionID },
          url: "../model/process_scoreRequestAjax.php",
          success: function(res) {
            var result = $.parseJSON(res);
            var resultsTable = $('#riderInfo');
            var tableRows = '';
            var place = 1;
            for(var key in result){
                var riderName = result[key]["rider_fname"] + " " + result[key]["rider_lname"];
              tableRows +=  "<tr><td>" + place + "</td><td>" + result[key]["rider_number"] + "</td><td>" + riderName + "</td><td>" + 
                      result[key]["horse_name"] + "</td><td>"+result[key]["score"]+"</td></tr>";
              place++;
                  
             }
           resultsTable.append(tableRows);
        }});
        }
      ;
    
    $("#divisionSelect").on("change", function(){
        var selected = $(this).val();
        $('#classSelect option').remove();
        $('tbody tr').remove();
        makeAjaxRequest(selected);   
        $("#classSelector").removeClass("hideTable");
        
    });



</script>
 

<?php
    require '../view/footerInclude.php';
?>