<?php
require_once 'inc/config.php';
require 'inc/header.php';
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
                    <input type="text" required name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" required name="age" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" required name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" required name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" required name="confirm" class="form-control" required>
                </div>
                <div class="form-group">
                    <a href="index.php?" class="btn btn-outline-success">BACK</a>
                    <button class="btn btn-secondary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'inc/footer.php';
?>