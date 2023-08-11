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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function()
    {
        $('#state').on('change',function(){
            var state = $(this).val();
            $.ajax({
               method:'POST',
                url:'add_form.php',
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
        <h1>Register Now</h1>
    <div class="container">
    <form method="post">
        <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="nme" required>
        </div>
        
        <div class="form-group">
        <label>Age</label>
        <input type="number" class="form-control" name="age" required>
        </div>
        
        <div class="form-group">
        <label>Gender</label><br>
            <span>Male</span>
        <input type="radio" value="Male" name="gen" required>
            <span>Female</span>
        <input type="radio" value="Female" name="gen" required>
        </div>
        
        <div class="form-group">
        <label>Education</label>
        <select class="form-control" name="edu" required>
            <option value="">Select Education</option>
            <option value="10th">10th</option>
            <option value="12th">12th</option>
            <option value="UG">UG</option>
            <option value="PG">PG</option>
        </select>
        </div>
       
        <div class="form-group">
        <label>Language</label><br>
        <span>Tamil</span>
            <input type="checkbox" value="English" name="lang[]">
        <span>English</span>
            <input type="checkbox" value="Tamil" name="lang[]">
        <span>Hindi</span>
            <input type="checkbox" value="Hindi" name="lang[]">
        </div>
        
        
        <div class="form-group">
        <label>State</label>
        <select class="form-control" name="state" id="state">
            <option value="">Select State</option>
            <?php
            $query=mysqli_query($con,"select * from state_list");
       
        while($fet=mysqli_fetch_array($query))
        {
            $state = $fet['state'];
            ?>
        <option value="<?php echo $fet['id']; ?>"><?php echo $fet['state']; ?></option>
        <?php
        }
            ?>
        </select>
        </div>
        
        <div class="form-group">
        <label>City</label>
        <select class="form-control" name="city" id="city">
            <option value="">Select City</option>
        </select>
        </div>

        
        <div class="form-group">
        <input type="submit" class="btn btn-primary" name="sb" value="Register">
        </div>
        
        
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['sb']))
{
    $name = $_POST['nme'];
    $age = $_POST['age'];
    $gender = $_POST['gen'];
    $education = $_POST['edu'];
    $language=$_POST['lang'];
    $lan="";
    foreach($language as $lang)
    {
        $lan .= $lang.",";
    }
    $state = $_POST['state'];
    /*$query = mysqli_query($con,"SELECT * FROM `state_list` WHERE `id`='$state'");
    while($fet=mysqli_fetch_array($query))
    {
       $state = $fet['state'];
    }*/
    $city = $_POST['city'];
    
    $query = mysqli_query($con,"INSERT INTO `registration`(`Name`, `Age`, `Gender`, `Education`, `Language`, `State`, `City`) VALUES ('$name','$age','$gender','$education','$lan','$state','$city')");
        if(!empty($query))
    {
        echo '<script> alert("Inserted Successfully");
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