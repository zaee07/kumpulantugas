<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kuis mtk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($_GET['keluar'])) {
            // sudah bermain
    ?>
        <h1>Terima kasih sudah bermain</h1>
        <p>TOTAL SKOR : <?= $_SESSION['skor'] ?> DARI <?= $_SESSION['jumlah soal'] ?> SOAL</p>
        <p><a href="index.php">main lagi ?</a></p>
        <footer>
            <h4>made with</h4>❤
        </footer>
    <?php
        } else {
            // sedang bermain
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // cek jawaban
                $jawaban = $_POST['jawaban'];
                $jawabanBenar = $_SESSION['angka 1'] + $_SESSION['angka 2'];

                if($jawaban == $jawabanBenar) {
                    // benar
    ?>
                    <h1>Jawaban Anda Benar !</h1>
    <?php
                    $_SESSION['skor'] += 1;
                    $_SESSION['jumlah soal'] += 1;
                } else {
                    // salah
    ?>
                    <h1>Jawaban Anda Salah !</h1>
    <?php
                    $_SESSION['jumlah soal'] += 1;
                }
            } else {
                $_SESSION['skor'] = 0;
                $_SESSION['jumlah soal'] = 0;
                echo '<h1>Selamat Datang di Kuis Matematika</h1>';
            }
    ?>
    <p>SKOR : <?= $_SESSION['skor']; ?> DARI <?= $_SESSION['jumlah soal'] ?> SOAL</p>
    <h2>Berapakah jawaban soal berikut ini?</h2>

    <form action="index.php" method="post">
        <?php
        $angka1 = rand(1, 100);
        $angka2 = rand(1, 100);
        $_SESSION['angka 1'] = $angka1;
        $_SESSION['angka 2'] = $angka2;
        ?>
        <label for="soal"><?= $angka1; ?> + <?= $angka2; ?> = <input type="text" name="jawaban" id="soal"> </label>
        <input type="submit" value="Jawab" class="button">
    </form>
    <p><a href="index.php?keluar">Keluar Kuis !</a></p>
    <footer>
            <h4>made with</h4>❤
    </footer>
    <?php } ?>
</body>
</html>