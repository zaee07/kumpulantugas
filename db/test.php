<?php
include("func.php");
$judul = 'testing';
htmlStart($judul);
// cek koneksi db
if(!$conn) {
    echo "error gagal terkoneksi dengan $server username=$user .(" . 
        mysqli_connect_errno() . "-" . mysqli_connect_error() . ")";
}
$sql = "SELECT DISTINCT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
        FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
$result = mysqli_query($conn, $sql);

// # test function cari
if( isset($_POST["cari"])) {
    $mhs= cari($_POST["keyword"], $_POST["prodi"]);var_dump($mhs);
    $result = mysqli_query($conn, $mhs);
}

// if(isset($_POST["cari"])) {
//     $prodi = $_POST['prodi'];
//     $keyword = $_POST['keyword'];

//     if ( !empty($prodi) && !empty($keyword) ) {
//         $sql = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
//             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_prodi = '$prodi' AND nama_lengkap LIKE '%$keyword%' OR nim LIKE '%$keyword%'";
//     } elseif( !empty($prodi) ) {
//         $sql = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
//             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_prodi = '$prodi'";
//     } elseif( !empty($keyword) ) {
//         $sql = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
//             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_lengkap LIKE '%$keyword%' OR nim LIKE '%$keyword%'";
//     } else {
//         $sql = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
//             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
//     }
// }


if(mysqli_fetch_assoc($result) == 0) {
    echo "<p>Record data tidak ditemukan <a href='mahasiswa-basisdata.php'>kembali ke dashboard</a></p>";
} else 
{


?>
<h1>Daftar Mahasiswa</h1>
<form action="" method="post">
    <input type="text" name="keyword" id="keyword" autofocus placeholder="ketikan nama/nim" autocomplete="off" class="input">
    <select name="prodi" id="prodi" class="input">
        <option value="">Semua</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Agri Bisnis">Agri Bisnis</option>
        <option value="PGSD">PGSD</option>
        <option value="Akuntansi">Akuntansi</option>
        <option value="Hubungan Internasional">Hubungan Internasional</option>
        <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
    </select>
    <input type="submit" value="cari" name="cari" class="button">
</form>
<table>
    <thead>
        <th>NIM</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>NO TELPON</th>
        <th>TTL</th>
        <th>PRODI</th>
        <th>DOSEN</th>
    </thead>
    <tbody>
    <?php
        while($row= mysqli_fetch_assoc($result)) {
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
    <?php
        }
        mysqli_close($conn);
    ?>
    </tbody>
</table>
<?php
}
htmlEnd();
?>