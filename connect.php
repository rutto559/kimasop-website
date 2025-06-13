<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$dbUsername = "root";       // Your DB username (usually 'root' on XAMPP)
$dbPassword = "";           // Empty password on XAMPP
$dbname = "my_database";          // Make sure this DB exists in phpMyAdmin

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
   // echo "Connected to database<br>";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $username = $conn->real_escape_string($_POST['username']);
    $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
    $email = $conn->real_escape_string($_POST['email']);
   
  }
    // Debug: Show form data
   // echo "Form submitted!<br>";
    //print_r($_POST);

    // Insert into 'persons' table
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $conn->real_escape_string($_POST['username']);
        $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
        $email = $conn->real_escape_string($_POST['email']);
        
    
        // Debug output
       // echo "Form submitted!<br>";
       // print_r($_POST);
    
        $sql = "INSERT INTO details (username, phonenumber, email) 
                VALUES ('$username', '$phonenumber', '$email')";
    
        if ($conn->query($sql) === TRUE) {
            //echo "Record added successfully!<br>";
            $last_id = $conn->insert_id;
    
            $last_record_query = "SELECT * FROM details WHERE id = $last_id";
            $result = $conn->query($last_record_query);
         /*  
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Last inserted record:<br>";
                    echo "ID: " . $row["id"] . "<br>";
                    echo "Username: " . $row["username"] . "<br>";
                    echo "Phone Number: " . $row["phonenumber"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    
                }
            } else {
                echo "No record found!";
            }
                */
        } 
        
        else {
            echo "Error: " . $conn->error;
        }
            
        
    }

//tetreave quary from database


        
   
    
// Close connection
$conn->close();



?>

</body>
</html>
