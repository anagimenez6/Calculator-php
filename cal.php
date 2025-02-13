<?php

// Fungsi untuk menampilkan pesan bantuan
function displayHelp() {
    echo "Penggunaan: php calculator.php [operasi1] [angka1] [operasi2] [angka2] ...\n";
    echo "Operasi yang tersedia:\n";
    echo "  add      - Menambahkan dua angka\n";
    echo "  subtract - Mengurangi angka kedua dari angka pertama\n";
    echo "  multiply - Mengalikan dua angka\n";
    echo "  divide   - Membagi angka pertama dengan angka kedua\n";
    echo "  modulus  - Menghitung sisa pembagian angka pertama dengan angka kedua\n";
    echo "  power    - Menghitung angka pertama pangkat angka kedua\n";
    echo "Contoh: php calculator.php add 5 subtract 3 multiply 2\n";
}

// Periksa apakah jumlah argumen yang diberikan benar
if ($argc < 4 || ($argc - 1) % 2 != 0) {
    displayHelp();
    exit(1);
}

// Inisialisasi hasil dengan angka pertama
$result = (float)$argv[1];

// Loop melalui argumen untuk melakukan operasi
for ($i = 2; $i < $argc; $i += 2) {
    $operation = strtolower($argv[$i]);
    $number = (float)$argv[$i + 1];

    switch ($operation) {
        case 'add':
            $result += $number;
            break;
        case 'subtract':
            $result -= $number;
            break;
        case 'multiply':
            $result *= $number;
            break;
        case 'divide':
            if ($number == 0) {
                echo "Error: Pembagian dengan nol tidak diperbolehkan.\n";
                exit(1);
            }
            $result /= $number;
            break;
        case 'modulus':
            if ($number == 0) {
                echo "Error: Pembagian dengan nol tidak diperbolehkan.\n";
                exit(1);
            }
            $result %= $number;
            break;
        case 'power':
            $result = pow($result, $number);
            break;
        default:
            echo "Error: Operasi tidak valid: $operation\n";
            displayHelp();
            exit(1);
    }
}

// Tampilkan hasil akhir
echo "Hasil: $result\n";

?>
