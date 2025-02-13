# PHP Calculator

A simple yet powerful command-line calculator written in PHP. This calculator supports a wide range of operations, including arithmetic, algebra, geometry, and more. It also includes a logging feature to track all calculations performed.

## Features

### Arithmetic Operations
- **Addition (`add`)**: Add two numbers.
- **Subtraction (`subtract`)**: Subtract the second number from the first.
- **Multiplication (`multiply`)**: Multiply two numbers.
- **Division (`divide`)**: Divide the first number by the second.
- **Modulus (`modulus`)**: Calculate the remainder of the first number divided by the second.
- **Power (`power`)**: Calculate the first number raised to the power of the second.
- **Square Root (`sqrt`)**: Calculate the square root of a number.
- **Logarithm (`log`)**: Calculate the natural logarithm (base `e`) of a number.
- **Base-10 Logarithm (`log10`)**: Calculate the base-10 logarithm of a number.
- **Factorial (`factorial`)**: Calculate the factorial of a number.
- **Trigonometric Functions (`sin`, `cos`, `tan`)**: Calculate sine, cosine, and tangent of a number (in radians).

### Algebraic Operations
- **Linear Equation Solver (`linear`)**: Solve the equation `ax + b = 0`.
- **Quadratic Equation Solver (`quadratic`)**: Solve the equation `ax² + bx + c = 0`.
- **System of Linear Equations Solver (`system2x2`)**: Solve a system of two linear equations.
- **Determinant of a 2x2 Matrix (`det2x2`)**: Calculate the determinant of a 2x2 matrix.

### Geometric Calculations
- **Square**:
  - Area (`square_area`)
  - Perimeter (`square_perimeter`)
- **Rectangle**:
  - Area (`rectangle_area`)
  - Perimeter (`rectangle_perimeter`)
- **Triangle**:
  - Area (`triangle_area`)
- **Circle**:
  - Area (`circle_area`)
  - Circumference (`circle_circumference`)
- **Cube**:
  - Volume (`cube_volume`)
  - Surface Area (`cube_surface_area`)
- **Cuboid**:
  - Volume (`cuboid_volume`)
  - Surface Area (`cuboid_surface_area`)
- **Cylinder**:
  - Volume (`cylinder_volume`)
  - Surface Area (`cylinder_surface_area`)
- **Sphere**:
  - Volume (`sphere_volume`)
  - Surface Area (`sphere_surface_area`)

### Logging
- All calculations are logged to a file named `calculator.log` in the same directory as the script. Each log entry includes the timestamp, operation, arguments, and result.

## Usage

1. Clone the repository:
   ```bash
   git clone https://github.com/anagimenez6/Calculator-php.git
   cd Calculator-php
   ```

2. Run the calculator:
   ```bash
   php calculator.php [operation] [arguments...]
   ```

### Examples

- **Addition**:
  ```bash
  php calculator.php add 5 3
  ```
  **Output:**
  ```
  Result: 8.0000
  ```

- **Square Area**:
  ```bash
  php calculator.php square_area 4
  ```
  **Output:**
  ```
  Result: 16.0000
  ```

- **Quadratic Equation Solver**:
  ```bash
  php calculator.php quadratic 1 -3 2
  ```
  **Output:**
  ```
  Result: 2.0000, 1.0000
  ```

- **Cylinder Volume**:
  ```bash
  php calculator.php cylinder_volume 3 5
  ```
  **Output:**
  ```
  Result: 141.3717
  ```

## Log File

All calculations are logged in `calculator.log`. Example log entry:
```
[2023-10-05 12:34:56] Operation: add, Arguments: 5, 3, Result: 8.0000
```

## Requirements

- PHP 7.0 or higher.
