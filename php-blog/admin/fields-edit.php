<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
    <h4 class="mt-4">Fields Edit</h4>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item">Fields Edit</li>
        </ol>
         <div class="row">
             <div class="col-md-6">
                 <div class="card">
                     <div class="card-header">
                    <h4>Edit Field</h4>
                    </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])) {
                            $field_id = $_GET['id'];
                            $field = "SELECT * FROM fields WHERE id ='$field_id'";
                            $field_run = mysqli_query($con,$field);

                            if(mysqli_num_rows($field_run) > 0) {
                                foreach($field_run as $field) { 
                                ?>


                             
                        <form action="code.php" method="POST">
                            <input type="hidden" name="field_id" value="<?=$field['id']; ?>">
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Field Name</label>
                                    <input required type="text" name="field_name" value="<?=$field['name'];?>" class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Description</label>
                                   
                                    <textarea required name="description" rows="4" cols="50"  class="form-control"> <?=$field['description'];?> </textarea>
                                </div>
                               <!--  -->
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_field" class="btn btn-primary">Update Field</button>
                                </div>
                            </div>
                        </form>
                        <?php
                                }
                            } else {
                                ?>
                                <h4>No Record Found</h4>
                                <?php
                            }
                        }
                         
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>

<!-- Ro7 tergod khy video number 8 d9i9a 11.35 -->