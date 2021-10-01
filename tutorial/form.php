<?php

$nameError=$ageError="";
$name=$age="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    if (empty($name)) {
        $nameError="Name is required";
    } elseif ($age < 18) {
        $ageError = "Age is smaller than 18";
    } else {
        echo "<br>Entered name is :".$name;
        echo "<br>Entered age is :".$age;
        exit();        
    }
}

?>

<html>
    <body>
        <form action="" method="POST">
            Enter your name: <input type="text" name="name" value=<?php echo $name; ?>><br><?php echo $nameError ?><br>
            Enter your age: <input type="number" name="age" <?php echo $age; ?><br><?php echo $ageError ?><br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>