<?php 
require '../functions.php';
$kode = "";
$nama_paket = "";
$nama_makanan = "";
$nama_minuman = "";
$harga = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kode = $_POST["kode"];
  $nama_paket = $_POST["nama_paket"];
  $nama_makanan = $_POST["nama_makanan"];
  $nama_minuman = $_POST["nama_minuman"];
  $harga = $_POST["harga"];

  do{
    if( empty($kode) || empty($nama_paket) || empty($nama_makanan) || empty($nama_minuman) || empty($harga) ) {
      $errorMessage = "All the fields are required";
      break;
    }

    // menambahkan data baru ke database
    $sql = "INSERT INTO paketan (kode, nama_paket, nama_makanan, nama_minuman, harga) VALUES ('$kode','$nama_paket', '$nama_makanan', '$nama_minuman', '$harga')";
    $result = $conn->query($sql);

    if (!$result){
      $errorMessage = "Invalid Query: " . $conn->error;
      break;
    }


    $kode = "";
    $nama_paket = "";
    $nama_makanan = "";
    $nama_minuman = "";
    $harga = "";

    $successMessage = "Data added correcly";

    header("location:../../app/paketan.php");
    exit;
  }while(false);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
      <div class="container my-5">
        <h1>Data Paket</h1>
        <?php 
          if ( !empty($errorMessage) ){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kode" value="<?= $kode; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama Paket</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_paket" value="<?= $nama_paket; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Makanan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_makanan" value="<?= $nama_makanan; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Minuman</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_minuman" value="<?= $nama_minuman; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="numeric" class="form-control" name="harga" value="<?= $harga; ?>">
                </div>
            </div>

            <?php 
              if ( !empty($successMessage) ){
                echo "<div class='row mb-3'>
                  <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                  </div>
                </div>";
              }
            ?>
            <div class="row mb-3">
              <div class="offset-sm-3 col-sm-3 d-grid">
                  <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </div>
            <div class="row mb-3">
              <div class="offset-sm-3 col-sm-3 d-grid">
                  <a class="btn btn-outline-primary" href="../../app/paketan.php" role="button">Batal</a>
              </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>