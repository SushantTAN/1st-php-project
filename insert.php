<?php
include("connection.php");
error_reporting(0);
?>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Web Technology </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
        <a class="navbar-brand opfont" href="#" style="font-size: 250%">Web Technology</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link text-grey opfont" href="./insert.php" style="font-size: 200%">Create Entry </a>
                <div></div>
                <a class="nav-link text-grey opfont" href="./viewlist.php" style="font-size: 200%">View List</a>
            </div>
        </div>
    
    </nav>
    </div>
    <br/>
        
    <!--Insert Data -->
    <div >
    <h1 class="opfont" style="text-align:center; font-size: 500%">Form Fillup</h1>
    <form actions="" method="POST" style="width: 30%; position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Between 1 and 100 chars" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Roll no</label>
            <input name="rollno" type="text" class="form-control" id="exampleInputEmail1" placeholder="Number less than 11 digits" aria-describedby="emailHelp">
        </div>
        
        <!-- Gender -->
        <div class="form-check">
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
        <button type="submit" name="submit" class="btn btn-primary sbutton">Submit</button>
        <button type="reset" class="btn btn-secondary sbutton">Reset</button> 
</form>
</div>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname = $_POST['fullname'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $faculty = $_POST['faculty'];
    $passedout = $_POST['passedout'];
    if($passedout == ""){
        $passedout = "Running";
    }



        if($fname!="" && $rollno!="" && $gender!="" && $faculty!="" && $passedout!=""){

            if(strlen($fname)<=100 && strlen($rollno)<=10){
            $query = "INSERT INTO STUDENT VALUES ('$fname', '$rollno', '$gender', '$faculty', '$passedout')";
            $data = mysqli_query($conn, $query);
        
            if($data){
                echo '<div class="alert alert-success" style="text-align:center; position:absolute; bottom:0; width:100vw;" role="alert">
                    Data inserted into database
                    </div>';
            }
        }else{
            echo '<div class="alert alert-warning" style="text-align:center; position:absolute; bottom:0;width:100vw;" role="alert">
            Input parameters are not met
            </div>';
        }
            }
            else{
            echo '<div class="alert alert-warning" style="text-align:center; position:absolute; bottom:0;width:100vw;" role="alert">
            All fields are required
            </div>';
        }
    }
?>

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