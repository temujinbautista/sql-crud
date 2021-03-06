<?php
require_once 'inc/config.php';
require 'inc/header.php';


//Fetch Data Query for Viewing
$sql = "SELECT * FROM users";
$results = $conn->query($sql);
?>

<div class="container">
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            //Loop to Display All Data
            if ($results->num_rows > 0) :
                while ($row = $results->fetch_assoc()) :
            ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td colspan="2">
                            <a href="update.php?uid=<?php echo $row['ID'] ?>" class="btn btn-outline-success">UPDATE</a>
                            <a href="delete.php?uid=<?php echo $row['ID'] ?>" class="btn btn-outline-danger">DELETE</a>
                        </td>
                    </tr>
            <?php endwhile;
            endif; ?>
            <tr>
                <td colspan="3">
                    <a href="login.php" class="btn btn-outline-secondary">LOGOUT</a>
                </td>
                <td>
                    <a href="adduser.php" class="btn btn-outline-primary" style="margin-left: 14px;">ADD NEW USER</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
require 'inc/footer.php';
?>