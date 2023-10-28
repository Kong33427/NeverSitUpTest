<!DOCTYPE html>
<html>
<head>
    <title>Display Unique Shuffle Possibilities (Test2)</title>
</head>
<body>

<?php
function permute($input, $permutation, $used, &$results) {
    if (strlen($permutation) == strlen($input)) {
        array_push($results, $permutation);
    } else {
        for ($i = 0; $i < strlen($input); $i++) {
            if (!$used[$i]) {
                $used[$i] = true;
                permute($input, $permutation . $input[$i], $used, $results);
                $used[$i] = false;
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["input"];
    $results = [];
    //echo strlen($userInput);
    $used = array_fill(0, strlen($userInput), false);
    permute($userInput, '', $used, $results);
    // Remove dupe
    $results = array_unique($results);
    
    echo "input: " . htmlspecialchars($userInput) . "<br>";
    
    $count = count($results);
    echo "# of unique shuffle: " . $count . "<br>";

    echo "Result:<br>";
    foreach ($results as $result) {
        echo htmlspecialchars($result) . "<br>";
    }
}
?>

<h1>Display Unique Shuffle Possibilities (Test2)</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <label for="input">Enter something:</label>
    <input type="text" name="input" id="input">
    <input type="submit" value="Submit">
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Display Odd Occurring Letters</title>
</head>
<body>
