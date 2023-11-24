
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_pgweb8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM otwgilifood";
$result = $conn->query($sql);

$data = array(); // Array untuk menampung data marker

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Latitude = $row["Latitude"];
        $Longitude = $row["Longitude"];
        $Nama = $row["Nama"];

        // Tambahkan data ke dalam array
        $data[] = array(
            "latitude" => $Latitude,
            "longitude" => $Longitude,
            "nama" => $Nama
        );
    }
}

// Ubah array menjadi format JSON
echo json_encode($data);

$conn->close();
?>
