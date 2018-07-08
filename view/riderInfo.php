<?php
    $title = "Rider Check In";
    require '../view/headerInclude.php';
    //print_r($rider);
    //print_r($classList);
    $riderName =  $rider['rider_fname'] . '  ' . $rider['rider_lname'];
	//phpinfo();
    //print_r($classList);
?> 
<style>
            .btn-primary{
                background-color: #ff6a99 !important;
                border-color: #ff6a99 !important;
                color: black;
            }

            .required:after { content:" *";
            color: red;}
            
            .cartClass{
                opacity: .4 !important;
                color: blue;  
            }
</style>
   <form id="checkIn">
 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-5">
        </div>
         <div class ="row">
                         <div class="container-fluid">
    <section class="container">
			
			
        <h3 class="dark-grey">Check In <?php echo $riderName ?> </h3> 
        <input type="text"  required name="riderID" style ="display:none" id="riderID" value="<?php echo $rider['rider_id']?>" required>          
            <div class="row">
                    <div class="form-group col-lg-3 ">
                            <label class='required'>Rider Number</label>
                            <input type="text" name="rNum" class="form-control" id="rNum" value= "<?php echo $rider['rider_number'];?>" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                            <label class='required'>First Name</label>
                            <input type="text" name="fName" class="form-control" id="fName" value="<?php echo $rider['rider_fname']?>" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                            <label class='required'>Last Name</label>
                            <input type="text" name="lName" class="form-control" id="lName" value="<?php echo $rider['rider_lname']?>" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                            <label class='required'>Age</label>
                            <input type="number" name="age" class="form-control" id="age" value="<?php echo $rider['age']?>"  required>
                    </div>
                </div>
                <div class="row">

                   
                    <div class="form-group col-lg-3 ">
                        <label class='required'>Horse Name</label>
                        <input type="text" name="horseName" class="form-control" id="horseName" value="<?php echo $rider['horse_name']?>" required>
                    </div>
                          <div class="form-group col-lg-3 ">
                        <label class='required'>Payment Method: Cash or Check Number </label>
                        <input type="text" name="paymentMethod" class="form-control" id="checkNum" value="<?php echo $rider['check_Num']?>" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label class='required'>Total Due:</label>
                        <input type="text"  name="amountDue" class="form-control" id="totalPrice" value="<?php echo $rider['total_price']?>" required>
                    </div>
                     <div class="form-group col-lg-3 ">
                         <label  class="required">Has Paid</label>
                         <select name='paid' class='form-control' id='paid'  required >
                             <option value="<?php if($rider['paid'] == 'N'){ echo 'N';} else{ echo 'Y';}?>"><?php echo $rider['paid']?></option>
                             <option vlaue="<?php if($rider['paid'] == 'N'){ echo 'Y';} else{ echo 'N';}?>"><?php if($rider['paid'] == 'N'){ echo 'Y';} else{ echo 'N';}?></option>
                         </select>    
                     </div>
              
                    
                </div> 
                <div class="row">
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Street</label>
                            <input type="text" name="street" class="form-control" id="Street" value="<?php echo $rider['street_address']?>" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>City</label>
                            <input type="text" name="city" class="form-control" id="City" value="<?php echo $rider['city']?>" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>State</label>
                            <select class="form-control" id="state" name="state" required>
                                        <option value="<?php echo $rider['state']?>"><?php echo $rider['state']?></option>
                                        <option value="AK">Alaska</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="IA">Iowa</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MD">Maryland</option>
                                        <option value="ME">Maine</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MT">Montana</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NY">New York</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VA">Virginia</option>
                                        <option value="VT">Vermont</option>
                                        <option value="WA">Washington</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WY">Wyoming</option>
                                </select>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Zip</label>
                            <input type="number" name="zipCode" class="form-control" id="Zip" value="<?php echo $rider['zip']?>" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $rider['email']?>" required>
                         </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Phone Number</label>
                            <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber" value="<?php echo $rider['phone_number']?>"  required>
                        </div>
            </div> 
            <div class="row">

             
            </div>    
            <div class="row">
              
            </div> 
                    <div class ="row">
                 <div class="form-group col-lg-4">
                     <label class='required'> Division </label> &nbsp; &nbsp;
                  <select id="divisionSelect" name="division">
                      
                       <option value='<?php echo $rider['division_id'];?>'><?php echo $rider['division_name'];?></option>
                <?php foreach ($row as $div){ ?> <option value='<?php echo $div['division_id'];?>'><?php echo $div['division_name'];?></option> <?php } ?>
                  </select>
                 </div>
                    </div>
                <div class ="row">
                 <div class="form-group col-lg-3">   
              <!--  <button type="submit" class="btn btn-primary">Register</button> -->
              
                  <div id="results"> </div>
                 </div>
                </div>
	</section>
</div>
         </div>
        
          
      </div>
        <div id="showClassContainer">
        <div  id = 'preRegister' class = 'row' sytle = 'margins:auto;' >
            <h2>You Reigstered For the Following Classes, </h2>
            <table id='registeredClasses' class="table table-hover table-bordered table-responsive">
              <thead>
                 <tr>
                  <th>Class Number</th>
                  <th>Class Name</th>
                  <th>Price</th>
                  <th>Registered </th>
                </tr>
              </thead>
              <tbody>
                <!-- Filled in JS -->
              </tbody>
            </table>
&nbsp;&nbsp;
<!--        </div>
        <div id="showClasses"></div>
        </div>  end showClasContainer 
         /.col-lg-9 
      </div>-->
 
         &nbsp;&nbsp;
<div class ='container'     
 <div class ="row">
  <div class ="col-lg-4 col-md-6 mb-4">
        <button  type="submit" class="btn-primary" style="border-radius: 15px"> CHECK IN </button>
     </div>
 </div>
   </form>
      <!-- /.row -->
    <!-- /.container -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    var selectedClasses = [];
    var indexCounter = 0;
    var origDivision = <?php echo $rider['division_id'];?>;
    var totalCost = 0;
    //Add Classes
    function addToCart(classID){
       console.log("Index Count before Addition: " + indexCounter);
        console.log('Class ID to add to array: ' + classID);
        selectedClasses.splice(indexCounter,indexCounter,classID);
        inputID = indexCounter + 16;
        console.log("input tag id " + inputID);
        $('#checkIn').append( "<div id=\"Class"+inputID+"\"style=\"display:none;\"><input type=\"text\" name=\""+inputID+"\" value=\""+classID+"\"/></div>");
        console.log(selectedClasses);
        indexCounter = indexCounter + 1;
        var cost = 5;
        if (classID == 1 || classID == 6 || classID == 21 || classID == 999){ cost = 10;};
        totalCost += parseInt(cost);
        $("#totalPrice").val(totalCost);
    };
    
    //Remove Classes
   function removeFromCart($el){
       var removeClass = $el;
       console.log("Class to remove " + removeClass);
       var classIDRemove = selectedClasses.findIndex(selectedClass => selectedClass === removeClass);
       removeInputID = classIDRemove + 16;
       console.log("Input Tag to Remove " + removeInputID);
       console.log("Class ID Remove" + classIDRemove);
        $("#Class"+removeInputID).remove(); //remove from the appended inmput element within the form
      
        selectedClasses.splice(classIDRemove,1);
       console.log("Class ID  Index we found " + classIDRemove);
       //console.log(selectedClasses);
       indexCounter = indexCounter - 1;
       console.log("Index Count After Subtraction " + indexCounter);
       console.log(selectedClasses);
     //  console.log("Class to remove " + removeClass);
        var cost = 5;
        if (removeClass == 1 || removeClass == 6 || removeClass == 21 || removeClass == 999){ cost = 10;};
        totalCost = totalCost - parseInt(cost);
        $("#totalPrice").val(totalCost);
   };
  
  //AJAX CALL
    function makeAjaxRequest(divisionID){
        console.log("param: " + divisionID);
        var cost = 0;
        $.ajax({
          type: "POST",
          data: { divisionID: divisionID },
          url: "../model/process_ajax.php",
          success: function(res) {
            var result = $.parseJSON(res);
            console.log("orig " + origDivision);
            var selectedList = <?php echo json_encode($classList);?>;
            console.log(result);
//            console.log('Classes Recieved: ');
//            console.log(classes);
            var resultsTable = $('#registeredClasses');
            var showClassHTML = "";
          result.forEach(function(element){
                var hasFound=false;
                    selectedList.forEach(function(sl){
                        if(sl.class_id === element.CLASS_NUM){
                            hasFound=true;
                         showClassHTML+='<tr><td><h5>'+element.CLASS_NUM+'</h5></td><td><h5>'+element.CLASS_NAME+'</h5></td><td><h5>$'+element.class_price+'</h5></td><td><h5><input id="'+element.CLASS_NUM+'" type="checkbox" checked="checked" value="'+element.CLASS_NUM+'"></h5></td></tr>';
                         addToCart(element.CLASS_NUM);
                        }//end if
                    });//sl foreach
                if(!hasFound){

                         showClassHTML+='<tr><td><h5>'+element.CLASS_NUM+'</h5></td><td><h5>'+element.CLASS_NAME+'</h5></td><td><h5>$'+element.class_price+'</h5></td><td><h5><input id="'+element.CLASS_NUM+'" type="checkbox" value="'+element.CLASS_NUM+'"></h5></td></tr>';
                }//not
              });//end result
             resultsTable.append(showClassHTML);
          }
        });//end ajax
       // $("#showClasses").html(showClassHTML);
    };
            
      $("#divisionSelect").on("change", function(){
        selectedClasses=[];
        totalCost = 0;
        var selected = $(this).val();
        $('tbody tr').remove();
        $("#totalPrice").val('');
        makeAjaxRequest(selected);

      });
      
      $("#rNum").change(function(){
         var chosenNum = $(this).val();
         var riderNums = <?php echo json_encode($riderNums);?>;
         console.log(chosenNum);
         console.log(riderNums);
         for(var key in riderNums){
             if(chosenNum === riderNums[key]['rider_number']){
                 alert("This number has already been choosen, please choose another");
                 $(this).val("");
                 $(this).focus();
                 return;
             }  
         }
      });
   
   $(document).on("change", "input[type='checkbox']", function () {
       var classNum = $(this).val();
    console.log(classNum);
    if (this.checked) {addToCart(classNum);}
    else{removeFromCart(classNum);}
});


     //ON READY DOM MANIPULATION
   jQuery(document).ready(function(){
          var select = $("#divisionSelect").val();
          makeAjaxRequest(select);
    });
    
   $("#checkIn").submit( function(e) {
      // var jsonPost = []; 
       //var formSubmission = JSON.stringify($(this).serialize());
        var formSubmission = $(this).serialize();
        console.log( "Form Values " + formSubmission );
     // console.log("Serialized Values " + $(this).serialize());
        $.ajax({
          type: "POST",
          data: {formSubmit:formSubmission}, //{formSubmit: formSubmission, classes: selectedClasses},//jsonPost, //{form: formSubmission}
          url: "../model/process_checkInAjax.php",
          success: function(result) {
             console.log("Ajax Returned Success Func Result " + result);
           alert("Rider was succesfully checked-in, returning to check in list");
           window.location.href = "../controller/controller.php?action=CheckIn"; 
          // e.preventDefault();
          //   return;
          },
          error: function(result) {
             console.log("Ajax Returned Fail Result " + result);
             //alert("Error Checking In");
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