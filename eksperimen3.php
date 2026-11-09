<?php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

$harga1 = 150000;
$harga2 = 250000;
$harga3 = 75000;

echo "Harga Buku: " . formatRupiah($harga1) . "<br>";
echo "Harga Tas: " . formatRupiah($harga2) . "<br>";
echo "Harga Pulpen: " . formatRupiah($harga3);
?>
