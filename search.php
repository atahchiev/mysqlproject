<!DOCTYPE html>
<html>
<head>
    <title>other page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php  
    include 'gender.php'; 
    require 'config.php';
    $conn=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
    $db=mysql_select_db(DB_NAME,$conn) or die("Failed to connect to MySQL: " . mysql_error());
    $name = explode(" ", trim($_POST["name"]));
    $wordscount = count($name);
    // echo $wordscount;
    echo $_POST["subject"];

    $name2 = "('". join('\', \'',$name) . "')";  
    // echo $name2; 
    $sex = $_POST["sex"];
    $sex_q = ("Select * from student where gender = '" . $sex . "' or 'B' = '" . $sex . "'" );
    $php_sex_q = mysql_query ($sex_q);  
    $name_q = 0;
    echo $wordscount;
    if ($wordscount == 1)
        $name_q = ("Select * from student where (('') in ".$name2." or (( first_name in ".$name2." or second_name in " . $name2 . " or third_name in " . $name2 .")))"  );
    else if ($wordscount == 2)
        // echo 10;
        $name_q = "Select * from student where ((first_name in ".$name2." and second_name in " . $name2 . ") or (first_name in " . $name2 ." and third_name in " . $name2 . ") or (third_name in " . $name2 ." and second_name in " . $name2 . "  ))";
    else if ($wordscount == 3)
        $name_q = ("Select * from student where ((first_name in ".$name2." and second_name in " . $name2 . " and third_name in " . $name2 ."))"  );
    $php_name_q = mysql_query($name_q);
    $name_sex_q = $name_q . " and (gender = '" . $sex . "' or 'B' = '" . $sex . "')";
    
    $php_name_sex_q = mysql_query($name_sex_q);
    $chunk = "<table id=thetable> <tr>";
    foreach (array_keys(mysql_fetch_assoc($php_name_q)) as $value)
        $chunk = $chunk . " <td> $value </td>";
    $chunk = $chunk . "</tr>";
    while($row = mysql_fetch_assoc($php_name_q)):
        $chunk = $chunk . "<tr>";
        foreach ($row as $key => $value)
            $chunk = $chunk . " <td> $value </td>";
        $chunk = $chunk . "</tr>";
    endwhile;    
        $chunk =  $chunk . "</table > ";
        echo $chunk;
    // echo $_POST["name"];
?>

</body>
</html>