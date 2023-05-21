<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perjalanan
    </title>
    <style>
        h1 {
  text-align: center;
}

table {
  margin: 0 auto;
  width: 70%;
}

table th,
table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}

a {
  width: 170px;
  margin: 0 auto;
  padding: 5px;
  background-color: #7788ee;
  color: white;
  border: none;
  cursor: pointer;
  display: block;
  text-decoration: none;
  text-align: center;
}

a:hover {
  background-color: #0033ee;
}
    </style>
</head>
<body>
    <h1>Daftar Perjalanan</h1>
    <table>
        <tr>
            <th>tanggal</th>
            <th>Jarak tempuh</th>
            <th>Makan Pagi</th>
            <th>Makan Siang</th>
            <th>Makan Malam</th>
            <th>Menginap</th>
        </tr>
        <?php
            $file = 'perjalanan.txt';
            $bukaFile = fopen($file, 'r');
            $tampilFile = fgets($bukaFile);
            
            while(!feof($bukaFile)) {
                list($tanggal, $bulan, $tahun, $jarak, $makanPagi, $makanSiang, $makanMalam, $inap) = 
                explode(":", $tampilFile); ?>

            <tr>
                <td><?= $tanggal ?><?= $bulan ?><?= $tahun ?></td>
                <td><?= $jarak ?> Km</td>
                <td><?= $makanPagi ?></td>
                <td><?= $makanSiang ?></td>
                <td><?= $makanMalam ?></td>
                <td><?= $inap ?></td>
            </tr>

            <?php
                $tampilFile = fgets($bukaFile);
                };
                fclose($bukaFile); 
            ?>
    </table>
    <p><a href="input-perjalanan.php" class="button">Tambahkan perjalanan</a></p>
</body>
</html>