<?php

// CALCULATOR PHP V.10
// Function to display the help message
function displayHelp() {
    echo "Usage: php calculator.php [operation] [arguments...]\n";
    echo "Available operations:\n";
    echo "  arithmetic:\n";
    echo "    add       - Add two numbers\n";
    echo "    subtract  - Subtract the second number from the first\n";
    echo "    multiply  - Multiply two numbers\n";
    echo "    divide    - Divide the first number by the second\n";
    echo "    modulus   - Calculate the remainder of the first number divided by the second\n";
    echo "    power     - Calculate the first number raised to the power of the second\n";
    echo "    sqrt      - Calculate the square root of the first number\n";
    echo "    log       - Calculate the natural logarithm (base e) of the first number\n";
    echo "    log10     - Calculate the base-10 logarithm of the first number\n";
    echo "    factorial - Calculate the factorial of the first number\n";
    echo "    sin       - Calculate the sine of the first number (in radians)\n";
    echo "    cos       - Calculate the cosine of the first number (in radians)\n";
    echo "    tan       - Calculate the tangent of the first number (in radians)\n";
    echo "  algebra:\n";
    echo "    linear    - Solve the linear equation ax + b = 0\n";
    echo "    quadratic - Solve the quadratic equation ax² + bx + c = 0\n";
    echo "    system2x2 - Solve a system of two linear equations\n";
    echo "    det2x2    - Calculate the determinant of a 2x2 matrix\n";
    echo "  geometry:\n";
    echo "    square_area       - Calculate the area of a square (side)\n";
    echo "    square_perimeter  - Calculate the perimeter of a square (side)\n";
    echo "    rectangle_area    - Calculate the area of a rectangle (length, width)\n";
    echo "    rectangle_perimeter - Calculate the perimeter of a rectangle (length, width)\n";
    echo "    triangle_area     - Calculate the area of a triangle (base, height)\n";
    echo "    circle_area       - Calculate the area of a circle (radius)\n";
    echo "    circle_circumference - Calculate the circumference of a circle (radius)\n";
    echo "    cube_volume       - Calculate the volume of a cube (side)\n";
    echo "    cube_surface_area - Calculate the surface area of a cube (side)\n";
    echo "    cuboid_volume     - Calculate the volume of a cuboid (length, width, height)\n";
    echo "    cuboid_surface_area - Calculate the surface area of a cuboid (length, width, height)\n";
    echo "    cylinder_volume   - Calculate the volume of a cylinder (radius, height)\n";
    echo "    cylinder_surface_area - Calculate the surface area of a cylinder (radius, height)\n";
    echo "    sphere_volume     - Calculate the volume of a sphere (radius)\n";
    echo "    sphere_surface_area - Calculate the surface area of a sphere (radius)\n";
    echo "Examples:\n";
    echo "  php calculator.php add 5 3\n";
    echo "  php calculator.php square_area 4\n";
    echo "  php calculator.php cylinder_volume 3 5\n";
}

// Function to log calculations to a file
function logCalculation($operation, $arguments, $result) {
    $logFile = 'calculator.log';
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] Operation: $operation, Arguments: " . implode(", ", $arguments) . ", Result: $result\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Function to calculate factorial
function factorial($n) {
    if ($n < 0) {
        return "Error: Factorial is not defined for negative numbers.\n";
    }
    if ($n == 0 || $n == 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

// Function to solve the linear equation ax + b = 0
function solveLinear($a, $b) {
    if ($a == 0) {
        return "Error: Coefficient 'a' cannot be zero.\n";
    }
    return -$b / $a;
}

// Function to solve the quadratic equation ax² + bx + c = 0
function solveQuadratic($a, $b, $c) {
    if ($a == 0) {
        return "Error: Coefficient 'a' cannot be zero.\n";
    }
    $discriminant = ($b * $b) - (4 * $a * $c);
    if ($discriminant < 0) {
        return "Error: Negative discriminant, imaginary roots.\n";
    }
    $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
    $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
    return [$x1, $x2];
}

// Function to solve a system of two linear equations
function solveSystem2x2($a, $b, $c, $d, $e, $f) {
    $det = ($a * $e) - ($b * $d);
    if ($det == 0) {
        return "Error: Determinant is zero, no unique solution.\n";
    }
    $x = (($c * $e) - ($b * $f)) / $det;
    $y = (($a * $f) - ($c * $d)) / $det;
    return [$x, $y];
}

// Function to calculate the determinant of a 2x2 matrix
function determinant2x2($a, $b, $c, $d) {
    return ($a * $d) - ($b * $c);
}

// Function to calculate area and perimeter of 2D shapes
function squareArea($side) {
    return $side * $side;
}

function squarePerimeter($side) {
    return 4 * $side;
}

function rectangleArea($length, $width) {
    return $length * $width;
}

function rectanglePerimeter($length, $width) {
    return 2 * ($length + $width);
}

function triangleArea($base, $height) {
    return 0.5 * $base * $height;
}

function circleArea($radius) {
    return pi() * $radius * $radius;
}

function circleCircumference($radius) {
    return 2 * pi() * $radius;
}

// Function to calculate volume and surface area of 3D shapes
function cubeVolume($side) {
    return pow($side, 3);
}

function cubeSurfaceArea($side) {
    return 6 * pow($side, 2);
}

function cuboidVolume($length, $width, $height) {
    return $length * $width * $height;
}

function cuboidSurfaceArea($length, $width, $height) {
    return 2 * ($length * $width + $length * $height + $width * $height);
}

function cylinderVolume($radius, $height) {
    return pi() * pow($radius, 2) * $height;
}

function cylinderSurfaceArea($radius, $height) {
    return 2 * pi() * $radius * ($radius + $height);
}

function sphereVolume($radius) {
    return (4 / 3) * pi() * pow($radius, 3);
}

function sphereSurfaceArea($radius) {
    return 4 * pi() * pow($radius, 2);
}

// Check if the correct number of arguments is provided
if ($argc < 2) {
    displayHelp();
    exit(1);
}

// Get the operation from the command line arguments
$operation = strtolower($argv[1]);

// Perform the requested operation
switch ($operation) {
    // Arithmetic operations
    case 'add':
    case 'subtract':
    case 'multiply':
    case 'divide':
    case 'modulus':
    case 'power':
        if ($argc != 4) {
            echo "Error: This operation requires two numbers.\n";
            displayHelp();
            exit(1);
        }
        $number1 = (float)$argv[2];
        $number2 = (float)$argv[3];
        switch ($operation) {
            case 'add':
                $result = $number1 + $number2;
                break;
            case 'subtract':
                $result = $number1 - $number2;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                break;
            case 'divide':
                if ($number2 == 0) {
                    echo "Error: Division by zero is not allowed.\n";
                    exit(1);
                }
                $result = $number1 / $number2;
                break;
            case 'modulus':
                if ($number2 == 0) {
                    echo "Error: Division by zero is not allowed.\n";
                    exit(1);
                }
                $result = $number1 % $number2;
                break;
            case 'power':
                $result = pow($number1, $number2);
                break;
        }
        break;
    case 'sqrt':
    case 'log':
    case 'log10':
    case 'factorial':
    case 'sin':
    case 'cos':
    case 'tan':
        if ($argc != 3) {
            echo "Error: This operation requires one number.\n";
            displayHelp();
            exit(1);
        }
        $number = (float)$argv[2];
        switch ($operation) {
            case 'sqrt':
                if ($number < 0) {
                    echo "Error: Square root is not defined for negative numbers.\n";
                    exit(1);
                }
                $result = sqrt($number);
                break;
            case 'log':
                if ($number <= 0) {
                    echo "Error: Logarithm is not defined for non-positive numbers.\n";
                    exit(1);
                }
                $result = log($number);
                break;
            case 'log10':
                if ($number <= 0) {
                    echo "Error: Base-10 logarithm is not defined for non-positive numbers.\n";
                    exit(1);
                }
                $result = log10($number);
                break;
            case 'factorial':
                $result = factorial($number);
                break;
            case 'sin':
                $result = sin($number);
                break;
            case 'cos':
                $result = cos($number);
                break;
            case 'tan':
                $result = tan($number);
                break;
        }
        break;
    // Algebra operations
    case 'linear':
        if ($argc != 4) {
            echo "Error: This operation requires two coefficients (a and b).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $result = solveLinear($a, $b);
        break;
    case 'quadratic':
        if ($argc != 5) {
            echo "Error: This operation requires three coefficients (a, b, and c).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $c = (float)$argv[4];
        $result = solveQuadratic($a, $b, $c);
        break;
    case 'system2x2':
        if ($argc != 8) {
            echo "Error: This operation requires six coefficients (a, b, c, d, e, f).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $c = (float)$argv[4];
        $d = (float)$argv[5];
        $e = (float)$argv[6];
        $f = (float)$argv[7];
        $result = solveSystem2x2($a, $b, $c, $d, $e, $f);
        break;
    case 'det2x2':
        if ($argc != 6) {
            echo "Error: This operation requires four matrix elements (a, b, c, d).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $c = (float)$argv[4];
        $d = (float)$argv[5];
        $result = determinant2x2($a, $b, $c, $d);
        break;
    // Geometry operations
    case 'square_area':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (side).\n";
            displayHelp();
            exit(1);
        }
        $side = (float)$argv[2];
        $result = squareArea($side);
        break;
    case 'square_perimeter':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (side).\n";
            displayHelp();
            exit(1);
        }
        $side = (float)$argv[2];
        $result = squarePerimeter($side);
        break;
    case 'rectangle_area':
        if ($argc != 4) {
            echo "Error: This operation requires two arguments (length and width).\n";
            displayHelp();
            exit(1);
        }
        $length = (float)$argv[2];
        $width = (float)$argv[3];
        $result = rectangleArea($length, $width);
        break;
    case 'rectangle_perimeter':
        if ($argc != 4) {
            echo "Error: This operation requires two arguments (length and width).\n";
            displayHelp();
            exit(1);
        }
        $length = (float)$argv[2];
        $width = (float)$argv[3];
        $result = rectanglePerimeter($length, $width);
        break;
    case 'triangle_area':
        if ($argc != 4) {
            echo "Error: This operation requires two arguments (base and height).\n";
            displayHelp();
            exit(1);
        }
        $base = (float)$argv[2];
        $height = (float)$argv[3];
        $result = triangleArea($base, $height);
        break;
    case 'circle_area':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (radius).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $result = circleArea($radius);
        break;
    case 'circle_circumference':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (radius).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $result = circleCircumference($radius);
        break;
    case 'cube_volume':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (side).\n";
            displayHelp();
            exit(1);
        }
        $side = (float)$argv[2];
        $result = cubeVolume($side);
        break;
    case 'cube_surface_area':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (side).\n";
            displayHelp();
            exit(1);
        }
        $side = (float)$argv[2];
        $result = cubeSurfaceArea($side);
        break;
    case 'cuboid_volume':
        if ($argc != 5) {
            echo "Error: This operation requires three arguments (length, width, height).\n";
            displayHelp();
            exit(1);
        }
        $length = (float)$argv[2];
        $width = (float)$argv[3];
        $height = (float)$argv[4];
        $result = cuboidVolume($length, $width, $height);
        break;
    case 'cuboid_surface_area':
        if ($argc != 5) {
            echo "Error: This operation requires three arguments (length, width, height).\n";
            displayHelp();
            exit(1);
        }
        $length = (float)$argv[2];
        $width = (float)$argv[3];
        $height = (float)$argv[4];
        $result = cuboidSurfaceArea($length, $width, $height);
        break;
    case 'cylinder_volume':
        if ($argc != 4) {
            echo "Error: This operation requires two arguments (radius and height).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $height = (float)$argv[3];
        $result = cylinderVolume($radius, $height);
        break;
    case 'cylinder_surface_area':
        if ($argc != 4) {
            echo "Error: This operation requires two arguments (radius and height).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $height = (float)$argv[3];
        $result = cylinderSurfaceArea($radius, $height);
        break;
    case 'sphere_volume':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (radius).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $result = sphereVolume($radius);
        break;
    case 'sphere_surface_area':
        if ($argc != 3) {
            echo "Error: This operation requires one argument (radius).\n";
            displayHelp();
            exit(1);
        }
        $radius = (float)$argv[2];
        $result = sphereSurfaceArea($radius);
        break;
    default:
        echo "Error: Invalid operation.\n";
        displayHelp();
        exit(1);
}

// Display the final result
if (is_array($result)) {
    echo "Result: " . implode(", ", $result) . "\n";
} else {
    echo "Result: " . number_format($result, 4) . "\n";
}

// Log the calculation
$arguments = array_slice($argv, 2);
logCalculation($operation, $arguments, $result);

?>
