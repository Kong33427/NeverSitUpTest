<!DOCTYPE html>
<html>
<head>
    <title>Smiley Face Counter (Test4)</title>
</head>
<body>
    <h1>Smiley Face Counter</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        
        // Split the input by comma to get individual smiley faces
        $smiley_faces = explode(',', $input);
        $smiley_count = 0;
        
        // Iterate through each smiley face and check if it's valid
        foreach ($smiley_faces as $face) {
            if (preg_match('/[:;][-~]?[)D]/', $face)) {
                $smiley_count++;
            }
        }
        
        echo "<p>Input: $input</p>";
        echo "<p>Number of Smiley Faces: $smiley_count</p>";
    }
    ?>
    <h1>Smiley Face Counter (Test4)</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input">Enter smiley faces (separated by commas):</label>
        <input type="text" name="input" id="input" required>
        <input type="submit" value="Count Smiley Faces">
    </form>
</body>
</html>
