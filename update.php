<!DOCTYPE html>
<html>
<head>
    <title>Project Monitoring</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_project
    if (isset($_GET['id_project'])) {
        $id_project=input($_GET["id_project"]);

        $sql="select * from anggota where id_project=$id_project";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_project=htmlspecialchars($_POST["id_project"]);
        $nameproject=input($_POST["nameproject"]);
        $client=input($_POST["client"]);
        $projectleader=input($_POST["projectleader"]);
        $startdate=input($_POST["startdate"]);
        $enddate=input($_POST["enddate"]);

        //Query update data pada tabel anggota
        $sql="update anggota set
            nameproject='$nameproject',
			client='$client',
			projectleader='$projectleader',
			startdate='$startdate',
			enddate='$enddate'
			where id_project=$id_project";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <div class="row my-3">
     <div class="col-md">
        <br><br>
        <h2 class="text-uppercase text-center fw-bold"><i class="bi bi-pencil-square"></i>&nbsp;Edit Data</h2>
      </div>
      <hr>
    </div>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"">
        <div class="form-group">
            <label>Name Project:</label>
            <input type="text" name="nameproject" class="form-control" value="<?php echo $data['nameproject']; ?>" placeholder="Ketik di sini..." required />

        </div>
        <div class="form-group">
            <label>Client:</label>
            <input type="text" name="client" class="form-control" value="<?php echo $data['client']; ?>" placeholder="Ketik di sini..." required/>

        </div>
        <div class="form-group">
            <label>Project Leader:</label>
            <input type="text" name="projectleader" class="form-control" value="<?php echo $data['projectleader']; ?>" placeholder="Ketik di sini..." required/>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="startdate" class="form-control" value="<?php echo $data['startdate']; ?>" placeholder="Ketik di sini..." required/>
        </div>
        <div class="form-group">
            <label>End Date:</label>
            <input type="date" name="enddate" class="form-control" value="<?php echo $data['enddate']; ?>" placeholder="Ketik di sini..." required/>
        </div>

        <div class="form-group">
                                <label for="nomor" class="col-form-label">Progress:</label>
                                <input type="number" class="form-control" id="progress" name="progress"
                                    value="<?=$proyekById['progress'];?>" max="100">
                            </div>
                            <div class="form-group col-md-2">
                            </div>

        <input type="hidden" name="id_project" value="<?php echo $data['id_project']; ?>" />

        
                <a href="index.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
                <br><hr>
    </form>
</div>
<!-- credit -->
    <footer class="text-center" style="padding-top: 5px;">
    <p>Created by : <u class="fw-bold">Rani Khairani</u></p>
    </footer>
<!-- Close credit -->
</body>
</html>