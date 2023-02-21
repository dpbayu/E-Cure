<?php
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
} else {
    // PHP
    require '../function.php';
    require '../assets/libs/vendor/autoload.php';
    if (!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }
    $page = 'poly';
    ?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partials/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partials/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partials/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Poly</h1>
        </div>
        <div class="d-flex justify-content-end gap-1 mb-3">
            <div class="d-flex justify-content-end gap-1 mb-3">
                <a href="data.php" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="function.php" method="POST">
                    <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Poly</th>
                                <th>Floor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no = 1;
                        foreach ($chk as $id) {
                        $sql_poli = mysqli_query($db, "SELECT * FROM tbl_poly WHERE id_poly = '$id'");
                        while ($data = mysqli_fetch_array($sql_poli)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <input type="hidden" name="id[]" value="<?= $data['id_poly'] ?>">
                                    <input type="text" name="name_poly[]" value="<?= $data['name_poly'] ?>"
                                        class="form-control" require>
                                </td>
                                <td>
                                    <input type="text" name="place_poly[]" value="<?= $data['place_poly'] ?>"
                                        class="form-control" require>
                                </td>
                            </tr>
                            <?php
                        }
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="form-group d-flex justify-content-end">
                        <input type="submit" name="edit" value="Edit Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>
<?php 
}
?>