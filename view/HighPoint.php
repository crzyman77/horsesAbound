<?php
    $title = "High Point";
    require '../view/headerInclude.php';
	//phpinfo();
    //$results = getClassResults(11);
    //print_r($results);
    
   //Arrays Called on Controller 
//     $WT15U = getDivisionHighPoint(1); //Walk Trot 15Un
//     $WT16O = getDivisionHighPoint(2); //Walk Trot 16Ov
//     $U15 = getDivisionHighPoint(3);   //Under 15 
//     $O16 = getDivisionHighPoint(4);   //Over 16
//     $LL = getDivisionHighPoint(5);    //Lead Line
 ?>           
<div class="container">
 <div class="container padding-bottom">
     <h2> Division: Walk Trot 15 & Under </h2>          
 <div class ="row">

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
                <th>First Place </th>
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($WT15U as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td>
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
 
<div class="container">
 <div class="container padding-bottom">
     <h2> Division: 15 & Under </h2>          
 <div class ="row">
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
                <th>First Place </th>
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($U15 as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td>
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

 </div></div> <!-- END 15 & Under -->
 
 <div class="container"> <!-- Begin Walk Trot 16 Over -->
 <div class="container padding-bottom">
     <h2> Division: Walk Trot 16 & Over </h2>          
 <div class ="row">

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
                <th>First Place </th>
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($WT16O as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td>
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

 </div></div>   <!-- END Walk Trot 16 Over -->
 
<div class="container">
 <div class="container padding-bottom">
     <h2> Division: 16 & Over </h2>          
 <div class ="row">

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
                <th>First Place </th>            
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($O16 as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td>
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

 </div></div> <!-- END 16 & Over --> 
 
<div class="container">
 <div class="container padding-bottom">
     <h2> Division: Lead Line </h2>          
 <div class ="row">
    
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
                <th>First Place </th>
            </tr>
        </thead>     
        <tbody>
            <?php $i=0; foreach ($LL as $rider){ $i++; ?>
            <tr> 
                <td><?php echo $i?></td> 
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

 </div></div> <!-- END LEAD LINE -->
 

<?php
    require '../view/footerInclude.php';
?>