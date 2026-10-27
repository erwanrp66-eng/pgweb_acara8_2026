<?php
require 'koneksi.php';

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<h2>Data Penduduk</h2>";
echo "<a href='input/index.html'>Input</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas</th>
            <th>Jumlah Penduduk</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["kecamatan"]) . "</td>
                  <td>" . $row["longitude"] . "</td>
                  <td>" . $row["latitude"] . "</td>
                  <td>" . $row["luas"] . "</td>
                  <td align='right'>" . $row["jumlah_penduduk"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>