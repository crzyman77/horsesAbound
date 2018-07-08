<?php
    $title = "Kelli Baker Registration";
    require '../view/headerInclude.php';
	//phpinfo();
?>
<script>
  $(document).ready(function(){
    $("#cartClass").click(function(){
        alert("The paragraph was clicked.");
    });
});
</script>
   <form id="registerMe">
 <!-- Page Content -->
    <div class="container">

      <div class="row">
         <div class ="row">
                         <div class="container-fluid">
    <section class="container">
			
			
                <h2 class="dark-grey">Registration for 2018</h2>
                <div class ="row">
                    <div class="form-group col-lg-12">
                            <label class='required'>IMPORTANT PLEASE READ: 
Welcome to the 2018 Kelli's CRUSADE Horse show. This is where you will register. You must register each rider and horse pair separately AND each division separately as you will be using a different rider number. (For example - if you have horse name "Buddy" in W/T 15 & over and "Trudy" in W/T 15 & Over, you must register twice. ) Upon completion of this form, please press submit. On the day of the show, please see attendant at check in to pay, sign your release form, and confirm your classes. Thank you for supporting Kelli's CRUSADE!
</label>
                      
                    </div>
                </div>
            <div class="row">
             
                    <div class="form-group col-lg-3 ">
                            <label class='required'>First Name</label>
                            <input type="text" name="fName" class="form-control" id="fName" value="" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                            <label class='required'>Last Name</label>
                            <input type="text" name="lName" class="form-control" id="lName" value="" required>
                    </div>
                    <div class="form-group col-lg-3 ">
                            <label class='required'>Age</label>
                            <input type="number" name="age" class="form-control" id="age" value=""  required>
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label class='required'>Horse Name</label>
                        <input type="text" name="horseName" class="form-control" id="horseName" value="" required>
                    </div>
            </div>
                     <div class="row">
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Street</label>
                            <input type="text" name="street" class="form-control" id="Street" value="" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>City</label>
                            <input type="text" name="city" class="form-control" id="City" value="" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>State</label>
                            <select class="form-control" id="state" name="state" required>
                                        <option value="">N/A</option>
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
                            <input type="number" name="zipCode" class="form-control" id="Zip" value="" required>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="" required>
                         </div>
                        <div class="form-group col-lg-3 ">
                            <label class='required'>Phone Number</label>
                            <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber" value=""  required>
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
                      <option value ='default'> Select Division </option>
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
        <div id="showClasses"></div>
        </div> <!-- end showClasContainer -->
        <!-- /.col-lg-9 -->
      </div>
 
         &nbsp;&nbsp;
<div class ='container'     
 <div class ="row">
    <div class="form-group col-lg-3 ">
        <label class=''>Total Due:</label>
        <input type="text" disabled name="horseName" required class="form-control" id="totalPrice" value="0" required>
    </div>
    <div class="form-group col-lg-3 ">
        <input type="text"  name="amountDue" style ="display:none;" required class="form-control" id="amountDue" value="0" required>
    </div>
  <div class ="col-lg-4 col-md-6 mb-4">
        <button  type="submit" class="btn-primary" style="border-radius: 15px"> Submit Class Selection for Division </button>
     </div>
 </div>
   </form>
      <!-- /.row -->
    <!-- /.container -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    var selectedClasses = [];
    var indexCounter = 0;
    var totalCost = 0;
    
    function makeAjaxRequest(divisionID){
        $.ajax({
          type: "POST",
          data: { divisionID: divisionID },
          url: "../model/process_ajax.php",
          success: function(res) {
            var result = $.parseJSON(res);
            //console.log(res);
            var showClassHTML = "";
            for(var key in result){
                showClassHTML += "<div id=\"class"+result[key]["CLASS_NUM"]+"\" class=\"col-lg-4 col-md-6 mb-4 wholeClass\">";
                showClassHTML += "         <div class=\"card h-100\">";
                showClassHTML +=" <div class=\"card-body\">";
                showClassHTML +=" <div class=\"hiddenID\" style=\"display: none;\">"+result[key]["CLASS_NUM"]+"</div>";
                showClassHTML +=" <h5 class=\"card-title\"> ";
                showClassHTML +="<h6>" + result[key]["CLASS_NUM"] + " - " + result[key]["CLASS_NAME"] + "</h6>";
                showClassHTML +="</h5> <h6>$" + result[key]["class_price"] + ".00</h6>";
                showClassHTML += result[key]["DIVISION_NAME"] + "</div> <div class=\"card-footer\">\n";
                showClassHTML +="<div id=\"cartClass\" class=\"btn-primary\" style=\"border-radius: 15px; width:35%;\"> &nbsp;&nbsp; Add to Cart &nbsp; </div> </div></div></div>";
            }
        $("#showClasses").html(showClassHTML);
        }});
        }
      $("#divisionSelect").on("change", function(){
            var age = $('#age').val();
            var divSelected = $('#divisionSelect').val();
            //console.log("Age: " + age);
            if(age === '' ){
                alert('Please enter the Riders Age before selecting a division.');
                $('#age').focus();
                $("#divisionSelect option[value='default'").attr("selected",true);
                //e.preventDefault();
                return;
            }
            else if(age > 15){
                if (divSelected == 1 || divSelected == 3){
                    alert('You are too Old for this division, please select another division');
                   //  $('#age').focus();
                    $("#divisionSelect option[value='default'").attr("selected",true);
                   // e.preventDefault();
                    return;
                }
            }
            else if (age < 16 && age != 0){
                if (divSelected == 2 || divSelected == 4){
                    alert('You are not old enough to register for these divisions, please select the proper division for your age bracket');
                   //  $('#age').focus();
                $("#divisionSelect option[value='default'").attr("selected",true);
                    //e.preventDefault();
                    return;
                }
            }  // End of Age Validation Check
            
        var selected = $(this).val();
        makeAjaxRequest(selected);
    

      });

  $('#showClassContainer').on('click', '.wholeClass', function (){
       // alert("Div Class Worked");
       console.log("Index Count before Addition: " + indexCounter);
       $(this).removeClass("wholeClass"); // this and the cartClass, help to unique out this class for array add/delete
        $(this).addClass("cartClass");
        $(this).find('#cartClass').html("&nbsp;&nbsp; In Cart &nbsp;");
        var classID = $(this).find('.hiddenID').text();
        selectedClasses.splice(indexCounter,indexCounter,classID);
        inputID = indexCounter + 12;
        console.log("input tag id " + inputID);
        $('#registerMe').append( "<div id=\"Class"+inputID+"\"style=\"display:none;\"><input type=\"text\" name=\""+inputID+"\" value=\""+classID+"\"/></div>");
        console.log(selectedClasses);
      //  classOption = indexCounter + 11;
        indexCounter = indexCounter + 1;
        console.log("Index Count After Addition " + indexCounter);
                var cost = 5;
        if (classID == 1 || classID == 6 || classID == 21 || classID == 999 || classID == 998 || classID == 30){ cost = 10;};
        totalCost += parseInt(cost);
        $("#totalPrice").val(totalCost);
        $("#amountDue").val(totalCost);
       // console.log("Class Id Added " + classID);
    });
    
   $('#showClassContainer').on('click','.cartClass',function(e){
       $(this).removeClass("cartClass"); // this and the remove, help to unique out this class for array add/delete
       $(this).addClass("wholeClass");
       $(this).find('#cartClass').html("&nbsp;&nbsp; Add to Cart &nbsp;");
       var removeClass = $(this).find('.hiddenID').text();
       console.log("Class to remove " + removeClass);
       var classIDRemove = selectedClasses.findIndex(selectedClass => selectedClass === removeClass);
       removeInputID = classIDRemove + 12;
       console.log("Input Tag to Remove " + removeInputID);
      // console.log("Class ID Remove" + classIDRemove);
        $("#Class"+removeInputID).remove(); //remove from the appended inmput element within the form
      
        selectedClasses.splice(classIDRemove,1);
     //  console.log("Class ID  Index we found " + classIDRemove);
       //console.log(selectedClasses);
       indexCounter = indexCounter - 1;
       console.log("Index Count After Subtraction " + indexCounter);
     //  console.log("Class to remove " + removeClass);
             var cost = 5;
        if (removeClass == 1 || removeClass == 6 || removeClass == 21 || removeClass == 999 || removeClass == 998 || removeClass == 30){ cost = 10;};
        totalCost = totalCost - parseInt(cost);
        $("#totalPrice").val(totalCost);
           $("#amountDue").val(totalCost);
   });
   
   $("#registerMe").submit( function(e) {
      // var jsonPost = []; 
       //var formSubmission = JSON.stringify($(this).serialize());
        var formSubmission = $(this).serialize();
        console.log( "Form Values " + formSubmission );
     // console.log("Serialized Values " + $(this).serialize());
       $.ajax({
          type: "POST",
          data: {formSubmit:formSubmission}, //{formSubmit: formSubmission, classes: selectedClasses},//jsonPost, //{form: formSubmission}
          url: "../model/process_registrationAJAX.php",
          success: function(result) {
             console.log("Ajax Returned Success Func Result " + result);
             window.location.href = "../controller/controller.php?action=Home";
             alert("IMPORTANT PLEASE READ: Thank you for registering for the 2018 Kelli's CRUSADE Horseshow. When you are ready to check in, please go to the entry booth and give your name to the attendant. They will get you set up with a rider number. If you would like to change information, do not enter yourself again, simply talk to the attendant and we will get you straightened out." );
          },
          error: function(result) {
             console.log("Ajax Returned Fail Result " + result);
          //   alert(result);
          
          }
       });
       e.preventDefault();   
       return false;
       e.stopPropagation();
   });
    </script>    
    
    <style>
            .required:after { content:" *";
            color: red;}
            
            .cartClass{
                opacity: .4;  
            }
            .btn-primary{
                background-color: #ff6a99 !important;
                border-color: #ff6a99 !important;
                color: black;
            }
    </style>
<?php
    require '../view/footerInclude.php';
?>