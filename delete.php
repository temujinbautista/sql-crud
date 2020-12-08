<?php
require_once 'inc/config.php';
require 'inc/header.php';
$uid = $_GET['uid'];

$sql = "SELECT * FROM users WHERE ID = $uid";
$results = $conn->query($sql);
$row = $results->fetch_assoc();
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <b></b>
                DELETING USER: <b><?php echo $row['name']; ?></b>
            </h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name:</td>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><?php echo $row['age']; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="index.php?" class="btn btn-outline-secondary">BACK</a>
                        <a href="deleteuser.php?uid=<?php echo $row['ID']; ?>" class="btn btn-outline-danger float-right">CONFIRM DELETION</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
require 'inc/footer.php';
?>