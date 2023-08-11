<?php
$con=mysqli_connect('localhost','root','','nic_task');
header("Content-Type: JSON");
$apiData = array();

        $query = mysqli_query($con,"select * from registration");
		$i=0;
        while($fet=mysqli_fetch_array($query))
        {
              
        $apiData[$i]['name'] = $fet['Name'];
        $apiData[$i]['age'] = $fet['Age'];
        $apiData[$i]['gender'] = $fet['Gender'];
        $apiData[$i]['education'] = $fet['Education'];
        $apiData[$i]['language'] = $fet['Language'];
         $apiData[$i]['st'] = $st=$fet['State'];
            if(!empty($st))
            {
        $stat = mysqli_query($con,"select * from state_list where id='$st'");
            if($row=mysqli_fetch_array($stat))
        {
               
            $apiData[$i]['state'] = $row['state'];
            
        }}
           
            
			$apiData[$i]['city'] = $fet['City'];
        
        
        }
    echo  json_encode($apiData, JSON_PRETTY_PRINT);
   ?>
 