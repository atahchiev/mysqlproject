<?php 
include 'gender.php'; 
require 'config.php';
$conn=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$conn) or die("Failed to connect to MySQL: " . mysql_error());
// echo var_dump($conn);

// $dbh = new PDO('mysql:host=localhost;dbname=kotka', $user, $pass);
?>

<html>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
    <head>
        <title>My Page</title>
    </head>
    
    <body> 
        <h3>Search  Contacts Details</h3> 
        <p>You  may search either by first or last name</p> 
        <form  method="post" action="search.php"  id="searchform"> 
          <input  type="text" name="name">  <input  type="submit" name="submit" value="Search"> <br>
          <select name="sex">
                <option value="B">B</option>
                <option value="M">M</option>
                <option value="F">F</option>
          </select>
          <select name="subject">
                <option value="all">all</option>
                <option value="www">www</option>
                <option value="math">math</option>
                <option value="computer">computer</option>
          </select>
          
        </form> 
        
        
      </body> 

    <?php 
        echo $_POST["order"];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $male = mysql_query("Select * from student ");
        
        // while($row = mysql_fetch_assoc($male)):
        //     echo $row['first_name'] . "<br>";
        // endwhile; 

    ?>
</html>
