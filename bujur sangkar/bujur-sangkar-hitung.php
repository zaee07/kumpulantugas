<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil kalkulasi
    </title>
</head>
<body>
    <h1>Hasil kalkulasi bujur sangkar</h1>
    <?php
        $sisi = $_POST['sisi'];
        $keliling = 4*$sisi;
        $luas = $sisi*$sisi;


        print "<p>Bujur sangkar dengan sisi " . $sisi .
        " memiliki : <br> luas = " . $luas .  " cm² <br> keliling = " 
        . $keliling . " cm</p>";
    ?>

     <p>
        <a href="bujur-sangkar-input.html"> hitung lagi?</a>
    </p>
</body>
</html>