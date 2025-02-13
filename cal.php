<?php

// Function to display the help message
function displayHelp() {
    echo "Usage: php calculator.php [operation] [number1] [number2]\n";
    echo "Operations:\n";
    echo "  add      - Add two numbers\n";
    echo "  subtract - Subtract the second number from the first\n";
    echo "  multiply - Multiply two numbers\n";
    echo "  divide   - Divide the first number by the second\n";
    echo "Example: php calculator.php add 5 3\n";
}

// Check if the correct number of arguments is provided
if ($argc != 4) {
    displayHelp();
    exit(1);
}

// Get the operation and numbers from the command line arguments
$operation = strtolower($argv[1]);
$number1 = (float)$argv[2];
$number2 = (float)$argv[3];

// Perform the requested operation
switch ($operation) {
    case 'add':
        $result = $number1 + $number2;
        echo "Result: $result\n";
        break;
    case 'subtract':
        $result = $number1 - $number2;
        echo "Result: $result\n";
        break;
    case 'multiply':
        $result = $number1 * $number2;
        echo "Result: $result\n";
        break;
    case 'divide':
        if ($number2 == 0) {
            echo "Error: Division by zero is not allowed.\n";
            exit(1);
        }
        $result = $number1 / $number2;
        echo "Result: $result\n";
        break;
    default:
        echo "Error: Invalid operation.\n";
        displayHelp();
        exit(1);
}

?>
