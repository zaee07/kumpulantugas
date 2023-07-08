<?php
include("html-pustaka.php");
$judul = 'Koneksi DB mahasiswa';

// parameter untuk koneksi db
$server = 'localhost';
$user = 'root';
$pwd = '';
$db = 'siska_dasprog';

htmlStart($judul);
$conn=mysqli_connect($server, $user, $pwd, $db);
if(!$conn) {
    echo "error gagal terkoneksi dengan $server username=$user .(" . 
        mysqli_connect_errno() . "-" . mysqli_connect_error() . ")";
} //else { echo "berhasil terkoneksi di$server dengan username $user <br>"; }
// $query1 = "SELECT * FROM mahasiswa";
$query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
// $hasil1 = mysqli_query($conn, $query1);
$hasil = mysqli_query($conn, $query);
// var_dump(mysqli_fetch_assoc($hasil2));die();


if( isset($_POST["cari"])) {
    $mhs= $_POST["keyword"];
    $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn
             WHERE nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%$'";

    $hasil3 = mysqli_query($conn, $query);
?>
    <h1>DAFTAR MAHASISWA</h1>
<form action="#" method="post">
    <input type="text" name="keyword" id="keyword" autofocus placeholder="ketikan nama" autocomplete="off">
    <button type="submit" name="cari">Cari</button>
</form>
<table>
    <thead>
        <th>NIM</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>NO TELPON</th>
        <th>TTL</th>
        <th>PRODI_ID</th>
        <th>DOSEN NIDN</th>
    </thead>
    <tbody>
    <?php
        while($row= mysqli_fetch_assoc($hasil3)) {
    ?>
        <tr>
            <td><?= $row['nim']?></td>
            <td><?= $row['nama_lengkap']?></td>
            <td><?= $row['alamat']?></td>
            <td><?= $row['no_telp']?></td>
            <td><?= $row['tgl_lahir']?></td>
            <td><?= $row['nama_prodi']?></td>
            <td><?= $row['nama_dosen']?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<?php     
}
// $hasil2 = mysqli_query($conn, $query2);
// $_POST["cari"];
// $mhs= $_POST["keyword"];
// $query3 = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
//              FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn
//              WHERE nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%$'";
// $hasil3 = mysqli_query($conn, $query3);
// $hasil2 = mysqli_query($conn, $query2);
// var_dump($hasil3);

if(!$hasil) {
    die("query gagal:" . mysqli_error($conn) . "<br>");
}

if(mysqli_fetch_assoc($hasil) == 0) {
    echo "record tidak ada.";
} else {
?>

<h1>DAFTAR MAHASISWA</h1>
<form action="#" method="post">
    <input type="text" name="keyword" id="keyword" autofocus placeholder="ketikan nama" autocomplete="off">
    <button type="submit" name="cari">Cari</button>
</form>
<table>
    <thead>
        <th>NIM</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>NO TELPON</th>
        <th>TTL</th>
        <th>PRODI_ID</th>
        <th>DOSEN NIDN</th>
    </thead>
    <tbody>
    <?php
        while($row= mysqli_fetch_assoc($hasil)) {
    ?>
        <tr>
            <td><?= $row['nim']?></td>
            <td><?= $row['nama_lengkap']?></td>
            <td><?= $row['alamat']?></td>
            <td><?= $row['no_telp']?></td>
            <td><?= $row['tgl_lahir']?></td>
            <td><?= $row['nama_prodi']?></td>
            <td><?= $row['nama_dosen']?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<?php
}

mysqli_close($conn);
htmlEnd();
?>