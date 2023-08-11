<?php
$con=mysqli_connect('localhost','root','','nic_task');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <h1>Registration List</h1><hr>
    <?php
    if(isset($_POST['stateid']))
{
    $stateid=$_POST['stateid'];
    $query=mysqli_query($con,"SELECT * FROM `city_list` WHERE `state_id`='$stateid'");
    echo '<option value="">Select City Now</option>';
    while($fet=mysqli_fetch_array($query))
    {
        ?>
<option value="<?php echo $fet['city_name'];?>"><?php echo $city = $fet['city_name'];?></option>
<?php
    }
}
    ?>
    <div class="container">
        <u><h1>Filter</h1></u>
        <form method="post">
        <div class="row">
            <div class="col-md-4">
        <label>State</label>
        <select class="form-control" name="state" id="state">
            <option value="">Select State</option>
            <?php
            $query=mysqli_query($con,"select * from state_list");
       
        while($fet=mysqli_fetch_array($query))
        {
            
            ?>
        <option value="<?php echo $fet['id']; ?>"><?php echo $fet['state']; ?></option>
        <?php
        }
            ?>
        </select>
        </div>
            
        <div class="col-md-4">
        <label>City</label>
        <select class="form-control" name="city" id="city">
            <option value="">Select City</option>
        </select>
        </div>
        <div class="col-md-4">
            <br>
        <input type="submit" name="sb" class="btn btn-primary">
        </div>
            </div>
        </form>
    
        
    </div>
    <br><br>
    
    <?php
    if(isset($_POST['sb']))
    {
     $city=$_POST['city'];
        echo '<div class="container">
    <a href="add_form.php"><button class="btn btn-primary float-right">Add New</button></a><br><br>
        <table class="table" border="1">
    <tr>
    <th>State</th>
    <th>City</th>
    <th>Total Count</th>
    </tr>';
        $query = mysqli_query($con,"SELECT `State`,`City`, COUNT(`City`) FROM registration WHERE `City`='$city' GROUP BY `City`");
        while($fet=mysqli_fetch_array($query))
        {
            
        ?>
        <tr>
        <td><?php  echo $fet['City']; ?></td>
        <?php   $st=$fet['State'];
            if(!empty($st))
            {
        $stat = mysqli_query($con,"select * from state_list where id='$st'");
            if($row=mysqli_fetch_array($stat))
        {
                ?>
            <td><?php  echo $row['state']; ?></td>
            <?php
        }}
            ?>
        <td><?php  echo $fet['COUNT(`City`)']; ?></td>
        
        
        </tr>
        <?php
        }
    echo '</table></div>';
    }
    else
    {
            
        echo '<div class="container">
    <a href="add_form.php"><button class="btn btn-primary float-right">Add New</button></a><br><br>
        <table class="table" border="1">
    <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Education</th>
    <th>Language</th>
    <th>State</th>
    <th>City</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>';
        $query = mysqli_query($con,"select * from registration");
        while($fet=mysqli_fetch_array($query))
        {
            
        ?>
        <tr>
        <td><?php  echo $fet['Name']; ?></td>
        <td><?php  echo $fet['Age']; ?></td>
        <td><?php  echo $fet['Gender']; ?></td>
        <td><?php  echo $fet['Education']; ?></td>
        <td><?php  echo $fet['Language']; ?></td>
        <?php   $st=$fet['State'];
            if(!empty($st))
            {
        $stat = mysqli_query($con,"select * from state_list where id='$st'");
            if($row=mysqli_fetch_assoc($stat))
        {
                ?>
            <td><?php  echo $row['state']; ?></td>
            <?php
        }}
            ?>
            
        <td><?php  echo $fet['City']; ?></td>
        <td><a href="update.php?id=<?php echo base64_encode($fet['id']); ?>"><button class="btn btn-warning">Update</button></a></td>
        <td><a href="index.php?id=<?php echo $fet['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
        </tr>
        <?php
        }
    echo '</table></div>'; 
    }
    ?>
    
 
</body>
</html>

<script>
    $(document).ready(function()
    {
        $('#state').on('change',function(){
            var state = $(this).val();
            $.ajax({
               method:'POST',
                url:'try.php',
                data:{stateid:state},
                dataType:'html',
                success:function(data)
                {
                   $('#city').html(data);
                }
            });
        });
    });
        
    </script>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query=mysqli_query($con,"DELETE FROM `registration` WHERE `id`='$id'");
    echo '<script> alert("Deleted Successfully");
        window.location.href = "index.php";
        </script>';
}
?>