<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'medical_record';
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
            <h1>Data Medical Record</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="patient">Name Patient</label>
                            <select class="form-control" name="id_patient" id="patient">
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pasien = mysqli_query($db, "SELECT * FROM tbl_patient");
                                while ($data_pasien = mysqli_fetch_array($sql_pasien)) { 
                                    echo '<option value="'.$data_pasien['id_patient'].'">'.$data_pasien['name_patient'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="illness">Illness</label>
                            <textarea class="form-control" id="illness" name="illness" placeholder="Input illness"
                                rows="5" style="resize: none;" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="doctor">Name Doctor</label>
                            <select class="form-control" name="id_doctor" id="doctor">
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_doctor = mysqli_query($db, "SELECT * FROM tbl_doctor");
                                while ($data_doctor = mysqli_fetch_array($sql_doctor)) { 
                                    echo '<option value="'.$data_doctor['id_doctor'].'">'.$data_doctor['name_doctor'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Input diagnosis"
                                rows="5" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="poly">Name Poly</label>
                            <select class="form-control" name="id_poly" id="poly">
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_poly = mysqli_query($db, "SELECT * FROM tbl_poly ORDER BY name_poly ASC");
                                while ($data_poly = mysqli_fetch_array($sql_poly)) { 
                                    echo '<option value="'.$data_poly['id_poly'].'">'.$data_poly['name_poly'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="medicine">Name medicine</label>
                            <select class="form-control" multiple="multiple" name="id_medicine[]" id="medicine">
                                <?php
                                $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine ORDER BY name_medicine ASC");
                                while ($data_medicine = mysqli_fetch_array($sql_medicine)) { 
                                    echo '<option value="'.$data_medicine['id_medicine'].'">'.$data_medicine['name_medicine'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="check_up_date">Check Up Date</label>
                            <input class="form-control" type="date" id="check_up_date" name="check_up"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="add">Add</button>
                            <button class="btn btn-danger" type="reset" name="reset" value="Reset">Reset</button>
                            <a href="data.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#medicine').select2({
                placeholder: "Pilih Hobi",
                allowClear: true,
                language: "id"
            });
        });
    </script>
    <!-- JS -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>