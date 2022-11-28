<?php 
require '../functions.php';
$id = "";
$kode = "";
$namamakanan = "";
$deskripsi = "";
$harga = "";

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
 // menampilkan data

 if ( !isset($_GET["id"]) ){
    header("location:../../app/food.php");
    exit;
 }

    $id = $_GET["id"];

    //  membaca data yang terpilih
    $sql = "SELECT * FROM makanan WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location:../../app/food.php");
        exit;
    }

    $kode = $row["kode"];
    $namamakanan = $row["namamakanan"];
    $deskripsi = $row["deskripsi"];
    $harga = $row["harga"];
}
else{
    // update data

    $id = $_POST["id"];
    $kode = $_POST["kode"];
    $namamakanan = $_POST["namamakanan"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    do{
        if( empty($id) || empty($kode) || empty($namamakanan) || empty($deskripsi) || empty($harga) ) {
            $errorMessage = "All the fields are required";
            break;
          }

          $sql = "UPDATE makanan SET kode = '$kode', namamakanan = '$namamakanan', deskripsi = '$deskripsi', harga = '$harga' WHERE id = $id";

          $result = $conn->query($sql);

          if (!$result) {
            $errorMessage = "Invalid Query: " .$conn->error;
            break;
          }

          $successMessage = "Data updated correctly";

          header("location:../../app/food.php");
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
        <h1>Data Makanan</h1>
        <?php 
          if ( !empty($errorMessage) ){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kode" value="<?= $kode; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama Makanan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="namamakanan" value="<?= $namamakanan; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="deskripsi" value="<?= $deskripsi; ?>">
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
                  <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
            <div class="row mb-3">
              <div class="offset-sm-3 col-sm-3 d-grid">
                  <a class="btn btn-outline-primary" href="../../app/food.php" role="button">Batal</a>
              </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>