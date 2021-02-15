<html>
    <head>
        <title>Web Technology </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <style>
            td{
                padding:20px;
            }
            .opfont{
                font-family: 'Brush Script MT', cursive;
            }
        </style>
    </head>

    <body>

    <!--Navbar -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
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

    <h1 class="opfont" style="text-align:center; font-size: 500%">View list</h1>

    <?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM STUDENT";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0){

    ?>
        <div class="container-md">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Roll no</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Faculty</th>
                <th scope="col">Passed out</th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            </thead>
    <?php

    while($result = mysqli_fetch_assoc($data)){
        echo "
        <tr>
        <td>".$result['Roll no']."</td>
        <td>".$result['Full Name']."</td>
        <td>".$result['Gender']."</td>
        <td>".$result['Faculty']."</td>
        <td>".$result['Passed out']."</td>
        <td><a href=update.php?rn=",urlencode($result['Roll no']),"&fn=",urlencode($result['Full Name']),"&gn=",urlencode($result['Gender']),"&fa=",urlencode($result['Faculty']),"&po=",urlencode($result['Passed out']),">Edit</a></td>
        <td><a onclick='return checkdelete()' href=delete.php?rn=",urlencode($result['Roll no'])," >Delete</a></td>
    </tr>
        "
        ;
    }
}
else{
    echo "Table has no records";
}

?>
    </table>
    </div>

    <script>
        function checkdelete(){
            return confirm('Are you sure you want to delete?');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
    </body>
</html>