<?php
require_once 'inc/config.php';
require 'inc/loginStyle.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();
    if ($row['email'] == $email && $row['password'] == $password) {
        header('Location: index.php?');
    } else {
        echo "Error";
    }
}
?>

<div class="login-form">
    <form method="POST">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
</div>


<?php
require 'inc/footer.php';
?>