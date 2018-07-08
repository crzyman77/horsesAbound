<?php
    $title = "Best in Show";
    require '../view/headerInclude.php';
	//phpinfo();
    //$results = getClassResults(11);
    //print_r($results);
    
   //Arrays Called on Controller 
//     $TopRider = getDivisionHighPoint();

 ?>           
<div class="container">
 <div class="container padding-bottom">
     <h2> Best In Show </h2>          
 <div class ="row">
</div>

<div class ='row'>
    <table id="riderInfo" class="table table-hover table-bordered table-responsive">
        <thead>
            <tr>
                <!--<th> Rider_Id </th> -->
                <th>Place</th>
                <th>Division </th>
                <th>Rider Number</th>
                <th>Rider Name</th>
                <th>Horse Name</th>
                <th>Score </th>
                <th>First Place Count </th>
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($Riders as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td>
                <td><?php echo $rider['division_name'] ?></td>
                <td><a> <?php echo $rider['rider_number']  ?></a></td>
                <td><?php echo $rider['rider_fname'] . ' ' . $rider['rider_lname'] ?></td>
                <td><?php echo $rider['horse_name']?></td>
                <td><?php echo $rider['score'] ?></td>
                <td><?php echo $rider['firstPlace'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

 </div></div>   <!-- END Walk Trot 15 Under -->
 

 

<?php
    require '../view/footerInclude.php';
?>