<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($nim !== "" && (!ctype_digit($nim) || strlen($nim) < 6 || strlen($nim) > 12)) {
    $error[] = "NIM harus berupa angka dengan panjang 6 sampai 12 digit.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<h2>Formulir Data Mahasiswa</h2>

<form method="POST">
    <label>Nama:
        <input type="text" name="nama" required>
    </label>
    <br><br>

    <label>NIM:
        <input type="text" name="nim" required>
    </label>
    <br><br>

    <label>Program Studi:
        <input type="text" name="prodi" required>
    </label>
    <br><br>

    <label>Semester:
        <input type="number" name="semester" min="1" max="14" required>
    </label>
    <br><br>

    <label>Email:
        <input type="email" name="email" required>
    </label>
    <br><br>

    <button type="submit">Kirim Data</button>
    <button type="reset">Reset</button>
</form>

<?php
if ($error) {
    echo "<h3>Terjadi Kesalahan:</h3>";

    foreach ($error as $pesan) {
        echo "<p>" . htmlspecialchars($pesan) . "</p>";
    }
} elseif ($data) {
    echo "<h3>Data Mahasiswa Berhasil Diterima</h3>";
    echo "Nama: " . htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") . "<br>";
    echo "NIM: " . htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") . "<br>";
    echo "Program Studi: " . htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") . "<br>";
    echo "Semester: " . $data["semester"] . "<br>";
    echo "Email: " . htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8");
}
?>
