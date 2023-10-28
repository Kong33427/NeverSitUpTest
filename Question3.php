<!DOCTYPE html>
<html>
<head>
    <title>Display Odd Number (Test3)</title>
</head>
<body>

<?php
function findOddNumbers($input) {
    $numbers = array_filter(explode(',', $input), 'is_numeric');
    $occurrences = array_count_values($numbers);
    $oddOccurrences = array_filter($occurrences, function ($value) {
        return $value % 2 !== 0;
    });
    //find expression match
    if (preg_match('/[a-zA-Z]/', $input)) {
        echo "Error: Letters are not allowed. Please enter only numbers separated by commas.";
    } elseif (empty($oddOccurrences)) {
        echo "No numbers appear an odd number of times in the input.";
    } else {
        echo "Numbers that appear an odd number of times: " . implode(', ', array_keys($oddOccurrences));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = $_POST["user_input"];
    findOddNumbers($user_input);
}
?>
<h1>Display Odd Number (Test3)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="user_input">Enter numbers separated by commas:</label>
    <input type="text" name="user_input" id="user_input">
    <input type="submit" value="Submit">
</form>

</body>
</html>
