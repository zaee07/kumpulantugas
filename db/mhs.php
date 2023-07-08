<?php
include("html-pustaka.php");
$judul = 'testing';
htmlStart($judul);

// koneksi db -> siska
$server = 'localhost';
$username = 'root';
$pwd = '';
$db = 'siska_dasprog';

$conn = mysqli_connect($server, $username, $pwd, $db);
if(!$conn) {
    echo "error gagal terkoneksi dengan $server username=$user .(" . 
        mysqli_connect_errno() . "-" . mysqli_connect_error() . ")";
}

if( isset($_POST["cari"]) ) {
// statement post $_POST["cari"] $_SERVER['REQUEST_METHOD'] == 'POST'
    $mhs= $_POST["keyword"];
    $prodi = $_POST["prodi"];
    // var_dump($_POST['prodi']);die;
    $query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%'";
    if($prodi != '0' ) {
        $query .= " nama_prodi='$prodi'";
    }
    // $query .= " nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%'";
    $tes = "SELECT * FROM FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn WHERE nama_lengkap LIKE '%$mhs%' OR nim LIKE '%$mhs%'id_prodi='$prodi'";

    $result = mysqli_query($conn, $query);//var_dump(mysqli_errno($conn));var_dump(mysqli_error($conn));

    // validasi query
    if(!$result) {
        die("query gagal:" . mysqli_error($conn) . "<br>");
    }
// post -> kosong
    if(mysqli_fetch_assoc($result) == 0) {
        echo "record tidak ada.";
    } else 
    {
?>
    <h1>DAFTAR MAHASISWA</h1>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" autofocus placeholder="ketikan nama" autocomplete="off">
        <select name="prodi" id="prodi">
            <option value="0">Semua</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Agri Bisnis">Agri Bisnis</option>
            <option value="PGSD">PGSD</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="Hubungan Internasional">Hubungan Internasional</option>
            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
        </select>
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
        <?php while($row= mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nim']?></td>
                <td><?= $row['nama_lengkap']?></td>
                <td><?= $row['alamat']?></td>
                <td><?= $row['no_telp']?></td>
                <td><?= $row['tgl_lahir']?></td>
                <td><?= $row['nama_prodi']?></td>
                <td><?= $row['nama_dosen']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php
    }

mysqli_close($conn);
htmlEnd();

} else 
{
// statement get
$query = "SELECT nim, nama_lengkap, mahasiswa.alamat, mahasiswa.no_telp, tgl_lahir, nama_prodi, nama_dosen
             FROM(mahasiswa JOIN prodi ON prodi_id=id_prodi) JOIN dosen ON dosen_pa_nidn=nidn";
$hasil = mysqli_query($conn, $query);
    // validasi query
if(!$hasil) { die("query gagal:" . mysqli_error($conn) . "<br>"); }
// get -> kosong
if(mysqli_fetch_assoc($hasil) == 0) {
    echo "record tidak ada.";
} else {
?>
    <h1>DAFTAR MAHASISWA</h1>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" autofocus placeholder="ketikan nama" autocomplete="off">
        <select name="prodi" id="prodi">
            <option value="0">Semua</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Agri Bisnis">Agri Bisnis</option>
            <option value="PGSD">PGSD</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="Hubungan Internasional">Hubungan Internasional</option>
            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
        </select>
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
        <?php while($row= mysqli_fetch_assoc($hasil)) : ?>
            <tr>
                <td><?= $row['nim']?></td>
                <td><?= $row['nama_lengkap']?></td>
                <td><?= $row['alamat']?></td>
                <td><?= $row['no_telp']?></td>
                <td><?= $row['tgl_lahir']?></td>
                <td><?= $row['nama_prodi']?></td>
                <td><?= $row['nama_dosen']?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
<?php
    }
mysqli_close($conn);
}

//mysqli_close($conn);
htmlEnd();
?>