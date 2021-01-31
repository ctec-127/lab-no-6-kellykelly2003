<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {
        // conversion formulas
        // If unit 1 equals celsius then.....
        if (is_numeric($temp)) {
            if ($unit1 == "celsius") {
                if ($unit2 == "fahrenheit"){
                    // Celsius to Fahrenheit = T(°C) × 9/5 + 32
                    $convertedTemp = ($temp * 9/5) + 32;
                    echo "<h2>$temp degree's Celsius is equal to $convertedTemp degree's Fahrenheit</h2>";
                } elseif ($unit2 == "kelvin") {
                    // Celsius to Kelvin = T(°C) + 273.15
                    $convertedTemp = $temp + 273.15;
                    echo "<h2>$temp degree's Celsius is equal to $convertedTemp degree's Kelvin</h2>";
                } elseif ($unit2 == "celsius"){
                    $convertedTemp = $temp;
                    echo "<h2>$temp degree's Celsius is equal to $convertedTemp degree's Celsius</h2>";
                }
            } elseif ($unit1 == "fahrenheit") {
                if ($unit2 == "celsius") {
                    // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
                    $convertedTemp = ($temp - 32) * 5/9;
                    echo "<h2>$temp degree's Fahrenheit is equal to $convertedTemp degree's Celsius</h2>";
                } elseif ($unit2 == "kelvin") {
                    // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
                    $convertedTemp = ($temp + 459.67) * 5/9;
                    echo "<h2>$temp degree's Fahrenheit is equal to $convertedTemp degree's Kelvin</h2>";
                } elseif ($unit2 == "fahrenheit") {
                    $convertedTemp = ($temp);
                    echo "<h2>$temp degree's Fahrenheit is equal to $convertedTemp degree's Fahrenheit</h2>";
                }
            } elseif ($unit1 == "kelvin") {
                if ($unit2 == "fahrenheit"){
                    // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
                    $convertedTemp = $temp * 9/5 - 459.67;
                    echo "<h2>$temp degree's Kelvin is equal to $convertedTemp degree's Fahrenheit</h2>";
                } elseif ($unit2 == "celsius") {
                    // Kelvin to Celsius = T(K) - 273.15
                    $convertedTemp = $temp -273.15;
                    echo "<h2>$temp degree's Kelvin is equal to $convertedTemp degree's Celsius</h2>";
                } elseif ($unit2 == "kelvin") {
                    $convertedTemp = $temp;
                    echo "<h2>$temp degree's Kelvin is equal to $convertedTemp degree's Kelvin</h2>";
                }
            }else echo "<h2>Please select the units you would like to convert the temperature to</h2>";
        } else echo "<h2>Please enter a number into the temperature field to convert it!</h2>";
        // You need to develop the logic to convert the temperature based on the selections and input made

    } // end function

    // Logic to check for POST and grab data from $_POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store the original temp and units in variables
        
        // You can then use these variables to help you make the form sticky
        // then call the convertTemp() function
        // Once you have the converted temperature you can place PHP within the converttemp field using PHP
        // I coded the sticky code for the originaltemp field for you

        $originalTemperature = $_POST['originaltemp'];
        $originalUnit = $_POST['originalunit'];
        $conversionUnit = $_POST['conversionunit'];
        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
    } // end if

    ?>
    <!-- Form starts here -->
    <h1>Temperature Converter</h1>
    <h4>CTEC 127 - PHP with SQL 1</h4>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="group">
            <label for="temp">Temperature</label>
            <input type="text" value="<?php if (isset($_POST['originaltemp'])) 
                                                    {echo $_POST['originaltemp'];}?>" 
                                name="originaltemp" 
                                size="14" 
                                maxlength="7" 
                                id="temp">

            <select name="originalunit">
                <option value="--Select--">--Select--</option>
                <option value="celsius"     <?php if((isset($originalUnit)) && ($originalUnit == "celsius"))    echo 'selected'?>>Celsius</option>
                <option value="fahrenheit"  <?php if((isset($originalUnit)) && ($originalUnit == "fahrenheit")) echo 'selected'?>>Fahrenheit</option>
                <option value="kelvin"      <?php if((isset($originalUnit)) && ($originalUnit == "kelvin"))     echo 'selected'?>>Kelvin</option>
            </select>
        </div>

        <div class="group">
            <label for="convertedtemp">Converted Temperature</label>
            <input type="text" value="<?php if (isset($convertedTemp)) 
                                                    echo $convertedTemp?>" 
                                name="convertedtemp" 
                                size="14" 
                                maxlength="7" 
                                id="convertedtemp" disabled>

            <select name="conversionunit">
                <option value="--Select--">--Select--</option>
                <option value="celsius" <?php if((isset($conversionUnit)) && ($conversionUnit == "celsius")) echo 'selected'?>>Celsius</option>
                <option value="fahrenheit" <?php if((isset($conversionUnit)) && ($conversionUnit == "fahrenheit")) echo 'selected'?>>Fahrenheit</option>
                <option value="kelvin"<?php if((isset($conversionUnit)) && ($conversionUnit == "kelvin")) echo 'selected'?>>Kelvin</option>
            </select>
        </div>
        <input type="submit" value="Convert" />
    </form>
    <br><br>
    <img src="img/therms.jpg" alt="Image of thermometer" width=794>
</body>

</html>