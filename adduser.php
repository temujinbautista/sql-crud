<?php
require_once 'inc/config.php';
require 'inc/header.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Email in Use Verification Query
    $email = $_POST['email'];
    $qry = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($qry);
    $uEmail = $result->fetch_assoc();

    //Password Confirmation
    if ($_POST['password'] !== $_POST['confirm']) {
        echo '<script language="javascript">';
        echo 'alert("Password Does Not Match")';
        echo '</script>';

        //Error on Used Email
    } elseif ($email == $uEmail['email']) {
        echo '<script language="javascript">';
        echo 'alert("Email Already In Use")';
        echo '</script>';
    } else {
        //Create User Query
        $sql = $conn->prepare("INSERT INTO users (name, age, email, password) VALUES (?, ?, ?, MD5(?))");
        $sql->bind_param("ssss", $_POST['name'], $_POST['age'], $_POST['email'], $_POST['confirm']);
        if ($sql->execute()) {
            header('Location: index.php?');
        } else {
            header('adduser.php');
        }
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ADD NEW USER</h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" min="1" required name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" required name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" required name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" required name="confirm" class="form-control">
                </div>
                <div class="form-group">
                    <a href="index.php?" class="btn btn-outline-secondary">BACK</a>
                    <button class="btn btn-outline-primary float-right">ADD USER</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'inc/footer.php';
?>