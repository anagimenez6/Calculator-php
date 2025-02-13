<?php

// Fungsi untuk menampilkan pesan bantuan
function displayHelp() {
    echo "Penggunaan: php calculator.php [operasi] [angka1] [angka2]\n";
    echo "Operasi yang tersedia:\n";
    echo "  add      - Menambahkan dua angka\n";
    echo "  subtract - Mengurangi angka kedua dari angka pertama\n";
    echo "  multiply - Mengalikan dua angka\n";
    echo "  divide   - Membagi angka pertama dengan angka kedua\n";
    echo "Contoh: php calculator.php add 5 3\n";
}

// Periksa apakah jumlah argumen yang diberikan benar
if ($argc != 4) {
    displayHelp();
    exit(1);
}

// Ambil operasi dan angka dari argumen command line
$operation = strtolower($argv[1]);
$number1 = (float)$argv[2];
$number2 = (float)$argv[3];

// Lakukan operasi yang diminta
switch ($operation) {
    case 'add':
        $result = $number1 + $number2;
        echo "Hasil: $result\n";
        break;
    case 'subtract':
        $result = $number1 - $number2;
        echo "Hasil: $result\n";
        break;
    case 'multiply':
        $result = $number1 * $number2;
        echo "Hasil: $result\n";
        break;
    case 'divide':
        if ($number2 == 0) {
            echo "Error: Pembagian dengan nol tidak diperbolehkan.\n";
            exit(1);
        }
        $result = $number1 / $number2;
        echo "Hasil: $result\n";
        break;
    default:
        echo "Error: Operasi tidak valid.\n";
        displayHelp();
        exit(1);
}

?>
