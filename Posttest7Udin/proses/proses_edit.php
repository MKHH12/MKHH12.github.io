<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id   = $_POST['id'];
  $nama_mobil   = $_POST['nama_mobil'];
  $deskripsi     = $_POST['deskripsi'];
  $harga_beli    = $_POST['harga_beli'];
  $harga_jual    = $_POST['harga_jual'];
  $gambar_mobil = $_FILES['gambar_mobil']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_mobil != "") {

  $tanggal_hari_ini = date("Y-m-d");


  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $_FILES['gambar_mobil']['name']); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_mobil']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $tanggal_hari_ini . '-' . $angka_acak . '.' . $ekstensi; //menggabungkan angka acak dengan nama file sebenarnya

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
          move_uploaded_file($_FILES['gambar_mobil']['tmp_name'], '../gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
                  $query = "UPDATE produk SET nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_mobil = '$nama_gambar_baru'";
                  $query .= "WHERE id = '$id'";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil diubah.');window.location='../halaman1/test.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_produk.php';</script>";
            }
} else {
    $query = "UPDATE produk SET nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual'    ";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
             " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='../halaman1/test.php';</script>";
    }
}
?>

 

