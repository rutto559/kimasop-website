<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my Stitches</title>
</head>
<body>
    <div class="container my-s">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/stitches/creat.php" role="button">New Client</a>
        <br>

        <table class="table">
    <thead>  
        <tr>
                <th>id</th>
                <th>username</th>
                <th>phonenumber</th>
                <th>email</th>
                <th>comment</th>
                <th>Action</th>
                
            </tr>
    </thead>
    <tbody>

    <?php
    $servername ="localhost";
    $dbusername ="root";
    $dbpassward ="";
    $dbname ="my_database";

    // Create connection to the database

    $connection = mysqli_connect($servername,$dbusername,$dbpassward,$dbname);

    // Check connection 
    if(!$connection){
       die ("connect_faild:" . $conection->connect_error());
    }
   /* else {
        echo "connect to database <br>";
    }*/

    //read all rows from database table
    $my_database = "SELECT * FROM details";
    $result = $connection->query($my_database);

    if (!$result)
    {
        die ( "invalid query:" .$conection->query);
    }

     //read data from rows
     while ($row = $result->fetch_assoc()) {


        echo "
         <tr>
                <td>$row[id]</td>
                <td>$row[username]</td>
                <td>$row[phonenumber]</td>
                <td>$row[email]</td>
                <td>$row[comment]</td>

                
                
                <td>
                    <a class='btn btn-primary btn-sn' href='/stitches/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-primary btn-sn' href='/stitches/delete.php?id=$row[id]'>Delete</a>
                </td>

            </tr>
        ";
     }
     
    ?>
            
    </tbody>
    </table>
    </div>
</body>
</html>