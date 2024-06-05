<?php
include('authentication.php');
include('includes/header.php');

$field = $_GET['field'];
$semester = $_GET['semester'];
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Course List</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Course List</li>
    </ol>
    <div class="row">
        <div class="col-md-6 mb-3">
            <form action="view-course.php" method="POST">
                <select required name="field_name_module" id="field_name_module" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <option value="<?=$field?>"><?php if($field != 'null') {echo $field;} else{echo "Select Level";}?></option>
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
        <div class="col-md-6 mb-3">
            <select required name="semester_module" id="semester_module" class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option value="<?=$semester?>">
                    <?php
                    if($semester=='S1'){echo'Semester 1';}elseif($semester=='S2'){echo'Semester 2';}else{echo'Select Semester';}
                    ?>
                </option>
                <option value="S1">Semester 1</option>
                <option value="S2">Semester 2</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php');?>
            <div class="card">
                <div class="card-header">
                    <h4><?php if($field=='null' || $semester=='null'){echo'Select Level and Semester';}else{echo 'Course'.' '.$field.' '.$semester;}?>
                        <a href="add-course.php" class="btn btn-primary float-end">Add Course</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Module</th>
                                <th class="text-center">Cours</th>
                                <th class="text-center">TD</th>
                                <th class="text-center">TP</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Coefficient</th>
                                <th class="text-center">Credit</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $subject = $con->query("SELECT * FROM courses WHERE semester = '$semester' AND field_name='$field' ORDER BY field_name ASC");
                            while($row = $subject->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td class="">
                                    <p>Module: <b><?php echo $row['course_name'] ?></b></p>
                                    <p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
                                </td>
                                <td><?php echo $row['has_course'] == '1' ? 'Yes' : 'No'; ?></td>
                                <td><?php echo $row['has_td'] == '1' ? 'Yes' : 'No'; ?></td>
                                <td><?php echo $row['has_tp'] == '1' ? 'Yes' : 'No'; ?></td>
                                <td><?= $row['field_name']?></td>
                                <td><?= $row['semester']?></td>
                                <td><?= $row['coef']?></td>
                                <td><?= $row['credit']?></td>
                                <td><a href="course-edit.php?id=<?= $row['id']?>" class="btn btn-success">Edit</a></td>
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
                    Are you sure you want to delete this course?
                    <input type="hidden" name="course_delete" id="course_id" value="">
                    <input type="hidden" name="semester" value="<?=$semester?>">
                    <input type="hidden" name="field_name" value="<?=$field?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="course_deletee" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("field_name_module").addEventListener("change", redirectToAnotherPage);
    document.getElementById("semester_module").addEventListener("change", redirectToAnotherPage);

    function redirectToAnotherPage() {
        var fieldName = document.getElementById("field_name_module").value;
        var semester = document.getElementById("semester_module").value;
        var url = "view-course.php?field=" + encodeURIComponent(fieldName) + "&semester=" + encodeURIComponent(semester);
        window.location.href = url;
    }

    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var courseId = button.getAttribute('data-id');
        var modalInput = deleteModal.querySelector('#course_id');
        modalInput.value = courseId;
    });
</script>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
