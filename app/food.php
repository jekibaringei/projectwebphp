<?php 
    require "../config/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Page</title>
    <link rel="stylesheet" href="../css/style1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
      <div class="inner-width">
        <h1 class="logo">Cinta<span style="color:#04fafd;">Lokal</span></h1>
        <i class="menu-toggle-btn fas fa-bars"></i>
        <nav class="navigation-menu">
          <a href="../index.php"><i class="fas fa-home home"></i> Beranda</a>
          <a href="../app/paketan.php"></i> Paketan</a>
          <a href="../app/food.php"></i> Makanan</a>
          <a href="../app/drink.php"></i> Minuman</a>
          <a href="../app/tentang.php"></i> Tentang Kami</a>
        </nav>
      </div>
    </header>
    <div class="wrapper">
        <button class="tambah"><a href="../config/makanan/tambah.php">Tambah Data</a></button>
        <table>
            <tr id="header">
                <th>ID</th>
                <th>Kode</th>
                <th>Nama Makanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $sql ="SELECT * FROM makanan";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[id]</td>
                    <td>$row[kode]</td>
                    <td>$row[namamakanan]</td>
                    <td>$row[deskripsi]</td>
                    <td>$row[harga]</td>
                    <td>
                    <button class='edit'><a href='../config/makanan/edit.php?id=$row[id]'>Edit</a></button>
                    <button class='hapus'><a href='../config/makanan/hapus.php?id=$row[id]'>Hapus</a></button>
                    </td>
                </tr>";
                }
            ?>
        </table>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>