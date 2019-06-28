<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contoh Melakukan Query Tanpa Parameter</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='main.js'></script>
</head>
<body>

<?php
// Prasarat
// Harus ada database bernama "latihan".
// Di dalam database "latihan" ada tabel bernama "mhs".
// Tabel "mhs" terdiri dari kolom nim, nama, lahir, nilai

$dbname = 'latihan';
$dbuser = 'root';
$dbpass ='matadewa008';
$dbhost = 'localhost';
$dbchar = 'utf8mb4';
$dbcoll = '';

$dsn = "mysql:host=$dbhost; dbname=$dbname; charset=$dbchar";

$options = [
PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES        => false,

];
$pdo = new PDO($dsn, $dbuser, $dbpass, $options);

$sql = "SELECT * FROM mhs";
$stmt = $pdo->query($sql);
$didapat = $stmt->rowCount();

if($didapat == 0) {
    echo "Record Tidak Di Temukan";
}
else {
echo "<p>Di Temukan $didapat record (baris).</p>";

$no_urut=0;

echo "<table class=table1>";
echo "<tr>
<th>No</th>
<th>NIM</th>
<th>NAMA</th>
<th>LAHIR</th>
<th>NILAI</th>
</tr>";


while ($buff = $stmt->fetch()){
    $no_urut++;
    echo "<tr>";
    echo "<td>"$no_urut"</td>";
    echo "<td>" . htmlentities($buff['nim']) . "</td>";
    echo "<td>" . htmlentities($buff['nama']) . "</td>";
    echo "<td>" . htmlentities($buff['lahir']) . "</td>";
    echo "<td>" . htmlentities($buff['nilai']) . "</td>";
    echo "</tr>";

};
echo "</tr>";
echo "</table>";
};


?>
    
</body>
</html>