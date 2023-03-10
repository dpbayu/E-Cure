<!-- PHP -->
<?php
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'profile';
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
            <h1>Profile</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
            <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label" for="name_admin">Fullname</label>
                        <input class="form-control" type="text" id="name_admin" name="name_admin"
                            value="<?php echo $_SESSION['name_admin'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username"
                            value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <img src="img/<?php echo $_SESSION['profile_admin'] ?>" class="rounded-circle" height="200"
                        width="200">
                    <div class="form-group mb-3">
                        <label class="form-label" for="profil">Profile</label>
                        <input class="form-control" type="file" id="profile" name="profile_admin">
                    </div>
                    <button type="submit" name="update" class="btn btn-success me-2">Update</button>
                </form>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>