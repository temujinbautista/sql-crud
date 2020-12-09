<?php
require_once 'inc/config.php';
require 'inc/header.php';
$uid = $_GET['uid'];

$sql = "SELECT * FROM users WHERE ID = $uid";
$results = $conn->query($sql);
$row = $results->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();
    if ($_POST['newPassword'] !== $_POST['confirm']) {
        echo '<script language="javascript">';
        echo 'alert("Password Does Not Match")';
        echo '</script>';
    } elseif ($email == $row['email']) {
        echo '<script language="javascript">';
        echo 'alert("Email Already In Use")';
        echo '</script>';
    } else {
        $sql = $conn->prepare("UPDATE users SET name=?, age=?, email=?, password=MD5(?) WHERE ID = $uid");
        $sql->bind_param("ssss", $_POST['name'], $_POST['age'], $_POST['email'], $_POST['confirm']);
        if ($sql->execute()) {
            header('Location: index.php?');
        } else {
            header('update.php');
        }
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">UPDATING USER: <b><?php echo $row['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="<?php echo $row['name'] ?>" required name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" value="<?php echo $row['age'] ?>" min="1" required name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?php echo $row['email'] ?>" required name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" required name="newPassword" class="form-control">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" required name="confirm" class="form-control">
                </div>
                <div class="form-group">
                    <a href="index.php?" class="btn btn-outline-secondary">BACK</a>
                    <button class="btn btn-outline-success float-right">UPDATE USER</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'inc/footer.php';
?>