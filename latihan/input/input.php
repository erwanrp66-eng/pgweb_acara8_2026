<?php
require '../koneksi.php';

$kecamatan       = $_POST['kecamatan'];
$longitude       = $_POST['longitude'];
$latitude        = $_POST['latitude'];
$luas            = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Validasi sisi server
if (trim($kecamatan) === "" || !is_numeric($longitude) || !is_numeric($latitude)
    || !is_numeric($luas) || $luas <= 0 || !ctype_digit($jumlah_penduduk)) {
    die("Data tidak valid. <a href='index.html'>Kembali</a>");
}

$stmt = $conn->prepare(
    "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sdddi", $kecamatan, $longitude, $latitude, $luas, $jumlah_penduduk);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: ../index.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>