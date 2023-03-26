<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "multilogin";

$connect    = mysqli_connect($host, $user, $pass, $db);
if (!$connect) { //cek connect
    die("Tidak bisa terconnect ke database");
}
$NIK        = "";
$username   = "";
$telephone     = "";
$email = "";
$pass = "";
$witel = "";
$role = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $query       = "delete from users where id = '$id'";
    $q1         = mysqli_query($connect,$query);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $query       = "select * from users where id = '$id'";
    $q1         = mysqli_query($connect,$query);
    $r1         = mysqli_fetch_array($q1);
    $NIK        = $r1['NIK'];
    $username       = $r1['username'];
    $telephone     = $r1['telephone'];
    $email        = $r1['email'];
    $pass       = $r1['password'];
    $witel     = $r1['witel'];
    $role        = $r1['role'];

    if ($NIK == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $NIK        = $_POST['NIK'];
    $username   = $_POST['username'];
    $telephone  = $_POST['telephone'];
    $email      = $_POST['email'];
    $pass       = $_POST['pass'];
    $witel      = $_POST['witel'];
	$role       = $_POST['role'];

    if ($NIK && $username && $telephone && $pass) {
        if ($op == 'edit') { //untuk update
            $query       = "update users set NIK = '$NIK',username='$username',telephone = '$telephone',email = '$email', password = '$pass', witel = '$witel', role = '$role' where id = '$id'";
            $q1         = mysqli_query($connect,$query);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $query   = "insert into users(NIK,username,telephone,email,password,witel,role) values ('$NIK','$username','$telephone','$email','$pass','$witel','$role')";
            $q1     = mysqli_query($connect,$query);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Users</title>
    <link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 1300px
        }

        .card {
            margin-top: 18px;
        }
    </style>
</head>

<body>
<?php include("header.php"); ?>
    <div class="mx-auto" style="margin-top:25px;">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NIK" name="NIK" value="<?php echo $NIK ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label">telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $telephone ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $pass ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label">witel</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="witel" id="witel">
                                <option value="">- Pilih Witel -</option>
                                <option value="Kudus" <?php if ($witel == "Kudus") echo "selected" ?>>Kudus</option>
                                <option value="Magelang" <?php if ($witel == "Magelang") echo "selected" ?>>Magelang</option>
                                <option value="Pekalongan" <?php if ($witel == "Pekalongan") echo "selected" ?>>Pekalongan</option>
                                <option value="Purwokerto" <?php if ($witel == "Purwokerto") echo "selected" ?>>Purwokerto</option>
                                <option value="Semarang" <?php if ($witel == "Semarang") echo "selected" ?>>Semarang</option>
                                <option value="Solo" <?php if ($witel == "Solo") echo "selected" ?>>Solo</option>
                                <option value="Yogyakarta" <?php if ($witel == "Yogyakarta") echo "selected" ?>>Yogyakarta</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label">role</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="role" id="role">
                                <option value="">- Pilih Role -</option>
                                <option value="Tim Buser" <?php if ($role == "Tim Buser") echo "selected" ?>>Tim Buser</option>
                                <option value="Admin Witel" <?php if ($role == "Admin Witel") echo "selected" ?>>Admin Witel</option>
                                <option value="Admin Regional" <?php if ($role == "Admin Regional") echo "selected" ?>>Admin Regional</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data users
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">NIK</th>
                            <th scope="col">username</th>
                            <th scope="col">telephone</th>
                            <th scope="col">email</th>
                            <th scope="col">password</th>
                            <th scope="col">witel</th>
                            <th scope="col">role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from users order by id desc";
                        $q2     = mysqli_query($connect, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $NIK        = $r2['NIK'];
                            $username       = $r2['username'];
                            $telephone     = $r2['telephone'];
                            $email   = $r2['email'];
                            $pass     = $r2['password'];
                            $witel     = $r2['witel'];
                            $role     = $r2['role'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $NIK ?></td>
                                <td scope="row"><?php echo $username ?></td>
                                <td scope="row"><?php echo $telephone ?></td>
                                <td scope="row"><?php echo $email ?></td>
                                <td scope="row"><?php echo $pass ?></td>
                                <td scope="row"><?php echo $witel ?></td>
                                <td scope="row"><?php echo $role ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>
