<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <?php    
    $group_field = $_GET['field'];
    $subject = $con->query("SELECT * FROM groups WHERE field ='$group_field' order by name");
    ?>
    <h4 class="mt-4">Groups List</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Groups List</li>
    </ol>
    <div class="row">
        <div class="col-md-6 mb-3">
            <form action="view-course.php" method="POST">
                <select required name="field_name_grp" id="field_name_grp" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <option value="<?=$group_field?>"><?php if($group_field != 'null') {echo $group_field;} else{echo "Select Level";}?></option>
                    <?php
                    $field_query = "SELECT * FROM levels";
                    $field_query_run = mysqli_query($con, $field_query);

                    if ($field_query_run) {
                        foreach ($field_query_run as $row) {
                            ?>
                            <option value="<?= $row['name'] ?>" data-value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                            <?php
                        }
                    } else {
                        echo "<option value=''>No fields found</option>";
                    }
                    ?>
                </select>
            </form>
        </div>  
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Group</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Group Name</label>
                                    <input required type="text" name="group_name" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Level</label>
                                    <input required type="text" name="field_name" value="<?php if($group_field=='null'){echo 'No Level Selected';}else{echo $group_field;}?> " class="form-control" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Number of students</label>
                                    <input required type="text" name="student_number" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_group" class="btn btn-primary">Add Group</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4><?php if($group_field=='null'){echo 'Select Field Please';}else{echo $group_field.' '.'groups';}?></h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Group Name</th>
                                    <th class="text-center">Number of students</th>
                                    <th class="text-center">Delete</th>
                                </tr> 
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                while($row=$subject->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['student_number'] ?></td>
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
                        Are you sure you want to delete this group?
                        <input type="hidden" name="groupe_delete" id="group_id" value="">
                        <input type="hidden" name="field_name" value="<?=$group_field?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="group_delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("field_name_grp").addEventListener("change", redirectToAnotherPage);

        function redirectToAnotherPage() {
            var fieldName = document.getElementById("field_name_grp").value;
            var url = "view-groupe-fields.php?field=" + encodeURIComponent(fieldName);
            window.location.href = url;
        }

        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var groupId = button.getAttribute('data-id');
            var modalInput = deleteModal.querySelector('#group_id');
            modalInput.value = groupId;
        });
    </script>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
