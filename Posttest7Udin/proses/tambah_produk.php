<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD DATA MOBIL</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }

    a {
          background-color: salmon;
          color: #fff;
          padding: 7.5px;
          text-decoration: none;
          font-size: 12px;
    }

    .back {
        text-align: left;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Data</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
            <label>Nama Mobil</label>
            <input type="text" name="nama_mobil" autofocus="" required="" />
        </div>
        <div>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" />
        </div>
        <div>
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" required="" />
        </div>
        <div>
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" required="" />
        </div>
        <div>
            <label>Gambar Mobil</label>
            <input type="file" name="gambar_mobil" required="" />
        </div>
        <div>
            <button type="submit">Simpan Data</button>
        </div>
        </section>
      </form>
      <div class="back">
            <a href="../halaman1/test.php"><-- &nbsp; Back</a>
      </div>
  </body>
</html>