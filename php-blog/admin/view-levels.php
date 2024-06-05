<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Levels List</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Levels List</li>
    </ol>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Level</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Level Name</label>
                                <input required type="text" name="level_name" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Field</label>
                                <select name="field_name" id="field_name" required class="form-control">
                                    <option value="">Select Field</option>
                                    <?php
                                    $field_query = "SELECT * FROM fields";
                                    $field_query_run = mysqli_query($con, $field_query);

                                    if ($field_query_run) {
                                        foreach ($field_query_run as $field_row) {
                                            echo '<option value="' . $field_row['name'] . '">' . $field_row['name'] . '</option>';
                                        }
                                    } else {
                                        echo "<option value=''>No fields found</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea required name="description" rows="4" cols="50" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_level" class="btn btn-primary">Add level</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php include('message.php');?>
            <div class="card">
                <div class="card-header">
                    <h4>Levels List</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Field</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $subject = $con->query("SELECT * FROM levels ORDER BY id ASC");
                            while($row = $subject->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td>
                                    <p>Level: <b><?php echo $row['name'] ?></b></p>
                                    <p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
                                </td>
                                <td><?php echo $row['field'] ?></td>
                                <td><a href="levels-edit.php?id=<?= $row['id']?>" class="btn btn-success">Edit</a></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $row['id'] ?>">Delete</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="code.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this level?
                    <input type="hidden" name="level_id" id="level_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="level_delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var levelId = button.getAttribute('data-id');
        var modalInput = deleteModal.querySelector('#level_id');
        modalInput.value = levelId;
    });
</script>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
