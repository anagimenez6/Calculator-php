<?php

// Fungsi untuk menampilkan pesan bantuan
function displayHelp() {
    echo "Penggunaan: php calculator.php [operasi] [angka1] [angka2] ...\n";
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
    echo "Contoh: php calculator.php add 5 3\n";
    echo "        php calculator.php sqrt 16\n";
    echo "        php calculator.php sin 1.57\n";
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
    default:
        echo "Error: Operasi tidak valid.\n";
        displayHelp();
        exit(1);
}

// Tampilkan hasil akhir
echo "Hasil: " . number_format($result, 4) . "\n";

?>
