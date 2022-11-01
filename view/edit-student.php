<?php require_once("header.php"); ?>

<!-- create form -->
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h3>Edit Student</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="<?php echo $result[0]['name']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="<?php echo $result[0]['email']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="form-control" placeholder="Enter date of birth" value="<?php echo $result[0]['dob']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="class">Class</label>
                    <input type="text" name="class" id="class" class="form-control" placeholder="Enter class" value="<?php echo $result[0]['class']; ?>" required>
                </div>
                <div class="form-group mb3">
                    <button type="submit" name="add" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Edit student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>