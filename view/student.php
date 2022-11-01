<?php require_once 'header.php';?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <a href="index.php?action=add-student" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add student
            </a>
        </div>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($result)) {
                foreach ($result as $row => $value) {
            ?>
                <tr>
                    <td><?php echo $result[$row]['name']; ?></td>
                    <td><?php echo $result[$row]['email']; ?></td>
                    <td><?php echo $result[$row]['dob']; ?></td>
                    <td><?php echo $result[$row]['class']; ?></td>
                    <td>
                        <a href="index.php?action=edit-student&id=<?php echo $result[$row]['id']; ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete-student&id=<?php echo $result[$row]['id']; ?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>