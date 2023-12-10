<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $sql = "UPDATE `crud` SET `nama`='$nama',
    `npm`='$npm',`kelas`='$kelas',`jurusan`='$jurusan',`email`='$email' WHERE id=$id";

    $result = mysqli_query($conn, $sql);



    if ($result) {
       header("Location: index.php?msg=Data Sudah di Update!");
    } else {
       echo "Failed: " . mysqli_error($conn);
    }
 }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: aqua;">
    Data Mahasiswa
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Data</h3>
            <p class="text-muted">Klik Update setelah semua sudah diedit</p>
        </div>

        <?php
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>


        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">nama: </label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
                    

                    <div class="col">
                        <label class="form-label">npm: </label>
                        <input type="text" class="form-control" name="npm" value="<?php echo $row['npm'] ?>"> 

                    <div class="col">
                        <label class="form-label">kelas: </label>
                        <input type="text" class="form-control" name="kelas" value="<?php echo $row['kelas'] ?>"> 
                        
                    <div class="col">
                        <label class="form-label">jurusan: </label>
                        <input type="text" class="form-control" name="jurusan" value="<?php echo $row['jurusan'] ?>"> 
                        
                    <div class="col">
                        <label class="form-label">email: </label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>"> 
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>