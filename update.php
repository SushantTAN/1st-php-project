<?php
include("connection.php");
error_reporting(0);
?>

<html>
    <head>
        <title>Web Technology </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            .opfont{
                font-family: 'Brush Script MT', cursive;
            }
        </style>
    </head>

    <body>

    <!--Navbar -->
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand opfont" href="#" style="cursive; font-size: 250%">Web Technology</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link text-grey opfont" href="./insert.php" style="font-size: 200%">Create Entry </a>
                <a class="nav-link text-grey opfont" href="./viewlist.php" style="font-size: 200%">View List</a>
            </div>
        </div>
    </div>
    </nav>
    
    <br/>
    <h1 class="opfont" style="text-align:center; font-size: 500%">Update Entry</h1>
        
    <!--Insert Data -->
    <div >
    <form actions="" method="POST" style="width: 30%; position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input name="fullname" type="text" class="form-control" id="fullname" aria-describedby="emailHelp" value="<?php echo $_GET['fn'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Roll no</label>
            <input name="rollno" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_GET['rn'] ?>">
        </div>
        
        <!-- Gender -->
        <div class="form-check" >
            <input value="male" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check mb-3">
            <input value="female" class="form-check-input" type="radio" name="gender" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
            Female
            </label>
        </div>

        <!-- Faculty -->
        <div class="mb-3">
        <select name="faculty">
            <option value="Arts">Arts</option>
            <option value="Management">Management</option>
            <option value="IT">IT</option>
        </select>
        </div>

        <!-- Passed out? -->
            <div class="mb-3 form-check">
            <input name="passedout" value="passedout" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Passed out?</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary sbutton">Update</button>
        <button type="reset" class="btn btn-secondary sbutton">Reset</button> 
</form>
</div>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "";

        $fname = $_POST['fullname'];
        $rollno = $_POST['rollno'];
        $gender = $_POST['gender'];
        $faculty = $_POST['faculty'];
        $passedout = $_POST['passedout'];

        $query = "UPDATE STUDENT SET `FULL NAME`='$fname', GENDER='$rollno', FACULTY='$gender', `PASSED OUT`='$passedout' WHERE `ROLL NO`='$rollno' ";

        $data = mysqli_query($conn, $query);
        if($data){
            echo '<div class="alert alert-success" style="text-align:center; position:absolute; bottom:0; width:100vw;" role="alert">updated successfully</div>';
        }
        else{
            echo '<div class="alert alert-warning" style="text-align:center; position:absolute; bottom:0;width:100vw;" role="alert">record not updated</div>';
        }
    }
    else{
        echo "";
    }
?>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $(".sbutton").hover(function(){
            $(this).css("width", "15em");
                }, function(){
            $(this).css("width", "10em");
        });
        });
    </script>

    </body>
</html>