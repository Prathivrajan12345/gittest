<?php
$con=mysqli_connect('localhost','root','','nic_task');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation Dynamic Dependency Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function()
    {
        $('#state').on('change',function(){
            var state = $(this).val();
            $.ajax({
               method:'POST',
                url:'update.php',
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
</head>
<body>
        <h1>Registration Form</h1>
    <div class="container">
    <form method="post">
        <?php
        if(!empty($_GET['id']))
        {
            $id=base64_decode($_GET['id']);
        $query=mysqli_query($con,"SELECT * FROM registration WHERE id='$id'");
            if($fet=mysqli_fetch_array($query))
            {
            
        ?>
        <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" value="<?php echo $fet['Name']; ?>" name="nme" required>
        </div>
        
        <div class="form-group">
        <label>Age</label>
        <input type="number" class="form-control" value="<?php echo htmlentities($fet['Age']); ?>" name="age" required>
        </div>

        <div class="form-group">
        <label>Gender</label><br>
            <span>Male</span>
        <input type="radio" value="Male" <?php if($fet['Gender']=='Male') {echo "checked";} ?> name="gen" required>
            <span>Female</span>
        <input type="radio" value="Female" <?php if($fet['Gender']=='Female') {echo "checked";} ?> name="gen" required>
        </div>
        
        
        <div class="form-group">
        <label>Education</label>
        <select class="form-control" name="edu" required>
            <option value="">Select Education</option>
            <option value="10th" <?php if($fet['Education']=='10th') {echo "selected";} ?>>10th</option>
            <option value="12th" <?php if($fet['Education']=='12th') {echo "selected";} ?>>12th</option>
            <option value="UG" <?php if($fet['Education']=='UG') {echo "selected";} ?>>UG</option>
            <option value="PG" <?php if($fet['Education']=='PG') {echo "selected";} ?>>PG</option>
        </select>
        </div>
       
        <div class="form-group">
        <label>Language</label><br>
            <?php
                $lan = $fet['Language'];
               $lang = explode(",",$lan);
                ?>
        <span>Tamil</span>
            <input type="checkbox" <?php if(in_array('Tamil',$lang)) { echo "checked";} ?> value="Tamil"  name="lang[]" >
        <span>English</span>
            <input type="checkbox" <?php if(in_array('English',$lang)) { echo "checked";} ?> value="English" name="lang[]" >
        <span>Hindi</span>
            <input type="checkbox" <?php if(in_array('Hindi',$lang)) { echo "checked";} ?> value="Hindi" name="lang[]" >
        </div>
        
        
        <div class="form-group">
        <label>State</label>
        <select class="form-control" name="state" id="state">
            <?php
                $state_list=mysqli_query($con,"select * from state_list");
                while($st_li=mysqli_fetch_array($state_list))
                {
            ?>
            <option value="<?php echo $st_li['id']; ?>" <?php if($fet['State']==$st_li['id']) {echo "selected";} ?>><?php echo $st_li['state']; ?></option>
            <?php
                }
                ?>
        </select>
        </div>
         
        <div class="form-group">
        <label>City</label>
        <select class="form-control" name="city" id="city">
            <?php
                $city_list=mysqli_query($con,"select * from city_list");
                while($ci_li=mysqli_fetch_array($city_list))
                {
                    ?>
            <option value="<?php echo $ci_li['id']; ?>"  <?php if($fet['City']==$ci_li['city_name']) {echo "selected";} ?>><?php echo $ci_li['city_name']; ?></option>
            <?php
                }
                ?>
        </select>
        </div>

        <div class="form-group">
        <input type="submit" class="btn btn-primary" name="sb" value="Update">
        </div>
        
        
    </form>
    </div>
</body>
</html>

<?php
                }
        }
if(isset($_POST['sb']))
{
    $name=$_POST['nme'];
    $age=$_POST['age'];
    $gender=$_POST['gen'];
    $education=$_POST['edu'];
    $language=$_POST['lang'];
    $lan="";
    foreach($language as $lang)
    {
        $lan .= $lang.",";
    }
    $state = $_POST['state'];
    $city = $_POST['city'];
$query=mysqli_query($con,"UPDATE `registration` SET `Name`='$name',`Age`='$age',`Gender`='$gender',`Education`='$education',`Language`='$lan',`State`='$state',`City`='$city' WHERE `id`='$id'")or die(mysqli_error($con));
    
    if(!empty($query))
    {
        echo '<script> alert("Updated Successfully");
        window.location.href = "index.php";
        </script>';
    }
    else
    {
        echo '<script> alert("Something Went Wrong Try Again");
        </script>';
    }
}
?>