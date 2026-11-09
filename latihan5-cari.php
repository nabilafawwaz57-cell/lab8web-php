<?php
$mahasiswa = ["Nabila", "Alya", "Bima", "Citra", "Doni"];
?>

<form method="GET" action="">
    <label for="kata">Cari nama mahasiswa:</label>
    <input id="kata" name="kata" type="text">
    <button type="submit">Cari</button>
</form>

<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);

    if (in_array(strtolower($kata), array_map("strtolower", $mahasiswa))) {
        echo "<p>Nama ditemukan: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
    } else {
        echo "<p>Nama tidak ditemukan.</p>";
    }
}
?>
