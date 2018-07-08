$.ajax({
          type: "POST",
          data: {formSubmit:formSubmission}, //{formSubmit: formSubmission, classes: selectedClasses},//jsonPost, //{form: formSubmission}
          url: "../model/process_checkInAjax.php",
          success: function(result) {
             console.log("Ajax Returned Success Func Result " + result);
             //alert(result);
          },
          error: function(result) {
             console.log("Ajax Returned Fail Result " + result);
          //   alert(result);
          }
       });
       
       
       
       
       
       
       
         success: function(result) {
             console.log("Ajax Returned Success Func Result " + result);
             alert("Rider was succesfully checked-in, returning to check in list");
             window.location.href = "../controller/controller.php?action=CheckIn"; 
          },
          error: function(result) {
             console.log("Ajax Returned Fail Result " + result);
             alert("Error Checking In");
             e.preventDefault();
             return;
          }
          
          
          
          
          
          SELECT
    p.rider_id,
    r.rider_number RNum,
    p.rider_fname,
    p.rider_lname,
    p.street_address,
    p.state,
    p.zip,
    r.horse_name,
    d.division_name Division,
    p.CheckedIn,
    p.Paid
FROM
    kcrus_person p,
    kcrus_rider r,
    kcrus_registration_combo rc,
    kcrus_divison d
WHERE
    p.rider_id = r.rider_id AND r.rider_id = rc.rider_id AND rc.division_id = d.division_id
    
    
    
    
  