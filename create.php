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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nameproject=input($_POST["nameproject"]);
        $client=input($_POST["client"]);
        $projectleader=input($_POST["projectleader"]);
        $startdate=input($_POST["startdate"]);
        $enddate=input($_POST["enddate"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into anggota (nameproject,client,projectleader,startdate,enddate) values
		('$nameproject','$client','$projectleader','$startdate','$enddate')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <div class="row my-3">
     <div class="col-md">
        <br><br>
        <h2 class="text-uppercase text-center fw-bold"><i class="bi bi-plus-square"></i>&nbsp;Input Data</h2>
      </div>
      <hr>
    </div>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Name Project:</label>
            <input type="text" name="nameproject" class="form-control" placeholder="Ketik di sini..." required />

        </div>
        <div class="form-group">
            <label>Client:</label>
            <input type="text" name="client" class="form-control" placeholder="Ketik di sini..." required/>

        </div>
        <div class="form-group">
            <label>Project Leader:</label>
            <input type="text" name="projectleader" class="form-control" placeholder="Ketik di sini..." required/>

        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="startdate" class="form-control" placeholder="Ketik di sini..." required/>
        </div>
        <div class="form-group">
            <label>End Date:</label>
            <input type="date" name="enddate" class="form-control" placeholder="Ketik di sini..." required/>
        </div>
        <div class="form-group">
        <label>Progress:</label>

                <form style="background-color: gray" id="upload_container" action="upload.php" method="post">
        <div>
        <label>Upload Image File:</label>
        <input name="userImage" id="userImage" type="file" class="demoInputBox" />
        </div>
        <br />
        <a href="index.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <div id="progress-div"><div id="progress-bar"></div></div>
        <div id="targetLayer"></div>
        </form>
        </div>
        
        <hr>
                
                
    </form>
</div>

<!-- credit -->
<footer class="text-center" style="padding-top: 5px;">
    <p>Created by : <u class="fw-bold">Rani Khairani</u></p>
    </footer><br>
<!-- Close credit -->

</body>
</html>