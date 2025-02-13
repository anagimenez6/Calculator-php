<?php

// Fungsi untuk menampilkan pesan bantuan
function displayHelp() {
    echo "Penggunaan: php calculator.php [operasi] [argumen...]\n";
    echo "Operasi yang tersedia:\n";
    echo "  add       - Menambahkan dua angka\n";
    echo "  subtract  - Mengurangi angka kedua dari angka pertama\n";
    echo "  multiply  - Mengalikan dua angka\n";
    echo "  divide    - Membagi angka pertama dengan angka kedua\n";
    echo "  modulus   - Menghitung sisa pembagian angka pertama dengan angka kedua\n";
    echo "  power     - Menghitung angka pertama pangkat angka kedua\n";
    echo "  sqrt      - Menghitung akar kuadrat dari angka pertama\n";
    echo "  log       - Menghitung logaritma natural (basis e) dari angka pertama\n";
    echo "  log10     - Menghitung logaritma basis 10 dari angka pertama\n";
    echo "  factorial - Menghitung faktorial dari angka pertama\n";
    echo "  sin       - Menghitung sinus dari angka pertama (dalam radian)\n";
    echo "  cos       - Menghitung cosinus dari angka pertama (dalam radian)\n";
    echo "  tan       - Menghitung tangen dari angka pertama (dalam radian)\n";
    echo "  linear    - Menyelesaikan persamaan linear ax + b = 0\n";
    echo "  quadratic - Menyelesaikan persamaan kuadrat ax² + bx + c = 0\n";
    echo "  system2x2 - Menyelesaikan sistem persamaan linear dua variabel\n";
    echo "  det2x2    - Menghitung determinan matriks 2x2\n";
    echo "Contoh:\n";
    echo "  php calculator.php add 5 3\n";
    echo "  php calculator.php linear 2 -4\n";
    echo "  php calculator.php quadratic 1 -3 2\n";
    echo "  php calculator.php system2x2 2 3 8 4 1 7\n";
    echo "  php calculator.php det2x2 1 2 3 4\n";
}

// Fungsi untuk menghitung faktorial
function factorial($n) {
    if ($n < 0) {
        return "Error: Faktorial tidak terdefinisi untuk bilangan negatif.\n";
    }
    if ($n == 0 || $n == 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

// Fungsi untuk menyelesaikan persamaan linear ax + b = 0
function solveLinear($a, $b) {
    if ($a == 0) {
        return "Error: Koefisien 'a' tidak boleh nol.\n";
    }
    return -$b / $a;
}

// Fungsi untuk menyelesaikan persamaan kuadrat ax² + bx + c = 0
function solveQuadratic($a, $b, $c) {
    if ($a == 0) {
        return "Error: Koefisien 'a' tidak boleh nol.\n";
    }
    $discriminant = ($b * $b) - (4 * $a * $c);
    if ($discriminant < 0) {
        return "Error: Diskriminan negatif, akar imajiner.\n";
    }
    $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
    $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
    return [$x1, $x2];
}

// Fungsi untuk menyelesaikan sistem persamaan linear dua variabel
function solveSystem2x2($a, $b, $c, $d, $e, $f) {
    $det = ($a * $e) - ($b * $d);
    if ($det == 0) {
        return "Error: Determinan nol, sistem tidak memiliki solusi unik.\n";
    }
    $x = (($c * $e) - ($b * $f)) / $det;
    $y = (($a * $f) - ($c * $d)) / $det;
    return [$x, $y];
}

// Fungsi untuk menghitung determinan matriks 2x2
function determinant2x2($a, $b, $c, $d) {
    return ($a * $d) - ($b * $c);
}

// Periksa apakah jumlah argumen yang diberikan benar
if ($argc < 2) {
    displayHelp();
    exit(1);
}

// Ambil operasi dari argumen command line
$operation = strtolower($argv[1]);

// Lakukan operasi yang diminta
switch ($operation) {
    case 'add':
    case 'subtract':
    case 'multiply':
    case 'divide':
    case 'modulus':
    case 'power':
        if ($argc != 4) {
            echo "Error: Operasi ini membutuhkan dua angka.\n";
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
                    echo "Error: Pembagian dengan nol tidak diperbolehkan.\n";
                    exit(1);
                }
                $result = $number1 / $number2;
                break;
            case 'modulus':
                if ($number2 == 0) {
                    echo "Error: Pembagian dengan nol tidak diperbolehkan.\n";
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
            echo "Error: Operasi ini membutuhkan satu angka.\n";
            displayHelp();
            exit(1);
        }
        $number = (float)$argv[2];
        switch ($operation) {
            case 'sqrt':
                if ($number < 0) {
                    echo "Error: Akar kuadrat tidak terdefinisi untuk bilangan negatif.\n";
                    exit(1);
                }
                $result = sqrt($number);
                break;
            case 'log':
                if ($number <= 0) {
                    echo "Error: Logaritma tidak terdefinisi untuk bilangan negatif atau nol.\n";
                    exit(1);
                }
                $result = log($number);
                break;
            case 'log10':
                if ($number <= 0) {
                    echo "Error: Logaritma basis 10 tidak terdefinisi untuk bilangan negatif atau nol.\n";
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
    case 'linear':
        if ($argc != 4) {
            echo "Error: Operasi ini membutuhkan dua koefisien (a dan b).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $result = solveLinear($a, $b);
        break;
    case 'quadratic':
        if ($argc != 5) {
            echo "Error: Operasi ini membutuhkan tiga koefisien (a, b, dan c).\n";
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
            echo "Error: Operasi ini membutuhkan enam koefisien (a, b, c, d, e, f).\n";
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
            echo "Error: Operasi ini membutuhkan empat elemen matriks (a, b, c, d).\n";
            displayHelp();
            exit(1);
        }
        $a = (float)$argv[2];
        $b = (float)$argv[3];
        $c = (float)$argv[4];
        $d = (float)$argv[5];
        $result = determinant2x2($a, $b, $c, $d);
        break;
    default:
        echo "Error: Operasi tidak valid.\n";
        displayHelp();
        exit(1);
}

// Tampilkan hasil akhir
if (is_array($result)) {
    echo "Hasil: " . implode(", ", $result) . "\n";
} else {
    echo "Hasil: " . $result . "\n";
}

?>
