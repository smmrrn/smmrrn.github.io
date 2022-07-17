<!DOCTYPE html>
<html>
<head>
<title>Project Monitoring</title>
    <!-- Load file CSS Bootstrap offline -->
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
<style>
    body{
        background-color: #dbeafe;
    }
    .container{
        background-color: #fff;
        padding-top: 40px;
        padding-bottom: 40px;
        border-radius: 10px;
    }
</style>
<body>
    <br>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_project
    if (isset($_GET['id_project'])) {
        $id_project=htmlspecialchars($_GET["id_project"]);

        $sql="delete from anggota where id_project='$id_project' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

<div class="row my-3">
     <div class="col-md">
        <br><br>
        <h2 class="text-uppercase text-center fw-bold">Project Monitoring</h2>
      </div>
      <hr>
    </div>
    <div class="container">
    <a href="create.php" class="btn btn-primary" role="button"><i class="bi bi-plus-lg"></i>&nbsp;</a>
<tbody>
            <table class="table">
            <thead class="table-light">
        <br>
   
        <tr>
            <th>No</th>
            <th>Name Project</th>
            <th>Client</th>
            <th>Project Leader</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Progress</th>
            <th colspan='2'>Action</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by id_project desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nameproject"]; ?></td>
                <td><?php echo $data["client"];   ?></td>
                <td><?php echo $data["projectleader"];   ?></td>
                <td><?php echo $data["startdate"];   ?></td>
                <td><?php echo $data["enddate"];   ?></td>
                <td><div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                </div></td>
                <td>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_project=<?php echo $data['id_project']; ?>" class="btn btn-danger" role="button"><i class="bi bi-trash-fill"></i>&nbsp;</a>
                    <a href="update.php?id_project=<?php echo htmlspecialchars($data['id_project']); ?>" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i>&nbsp;</a>
                </td>
            </tr>
        
     
            <?php
        }
        ?></thead>
            </tbody>
    </table>
<!-- credit -->
<footer class="text-center" style="padding-top: 5px;">
    <p>Created by : <u class="fw-bold">Rani Khairani</u></p>
    </footer>
<!-- Close credit -->

</div>
</body>
</html>