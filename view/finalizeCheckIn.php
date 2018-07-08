<?php
    $title = "Finalize Rider Check In";
   require '../view/headerInclude.php';
    //$row = getRegisteredRiders();
     //$errorMessage = error_reporting(E_ALL);
    // print_r($errorMessage);
	//phpinfo();
?>
<div class="container">
 <div class="container padding-bottom">
            <div class="row">
           
                <h2> Final Check In Page: </br> </h2>
                <h4> Please Select the rider that is checking in and on the following page please complete the necessary info. </br> On Submit you will be redirected back to the list. </h4>
                <table id="riderInfo" class="table table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <!--<th> Rider_Id </th> -->
                            <th>Rider Number</th>
                            <th>Rider Name</th>
                            <th>Rider Address</th>
                            <th>Horse Name</th>
                            <th>Division</th>
                            <th>Checked In</th>
                            <th>Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($row as $rider){ $i++; ?>
                        <tr class ="clickable-row" data-event= "<?php echo $row['rider_id']?>" data-href="../controller/controller.php?action=RiderInfo&amp;riderID=<?php echo $rider['rider_id'] ?>"> 
                          <!--  <td><a> <?php echo $rider['rider_id']?></a></td> -->
                            <td><a> <?php echo $rider['RNum']  ?></a></td>
                            <td><?php echo $rider['rider_fname'] . ' ' . $rider['rider_lname'] ?></td>
                            <td><?php echo $rider['street_address'] . ', ' . $rider['state'] . ', ' . $rider['zip'] ?></td>
                            <td><?php echo $rider['horse_name'] ?></td>
                            <td><?php echo $rider['Division'] ?></td>
                            <td><?php echo $rider['CheckedIn'] ?></td>
                            <td><?php echo $rider['Paid'] ?></td>
                        </tr>
                    <?php } ?></tbody>
                </table>
            </div>
    

</div> <!-- /.container -->
  <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
            //bindEvents();
            
        });
    </script>
<?php
    require '../view/footerInclude.php';
?>