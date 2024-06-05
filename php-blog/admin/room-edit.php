<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
    <h4 class="mt-4">Room Edit</h4>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item">Room Edit</li>
        </ol>
         <div class="row">
             <div class="col-md-6">
                 <div class="card">
                     <div class="card-header">
                    <h4>Edit Room</h4>
                    </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])) {
                            $room_id = $_GET['id'];
                            $room = "SELECT * FROM rooms WHERE id ='$room_id'";
                            $room_run = mysqli_query($con,$room);

                            if(mysqli_num_rows($room_run) > 0) {
                                foreach($room_run as $room) { 
                                ?>


                             
                        <form action="code.php" method="POST">
                            <input type="hidden" name="room_id" value="<?=$room['id']; ?>">
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Room Name</label>
                                    <input type="text" name="room_name" value="<?=$room['room_name'];?>" class="form-control">
                                </div>
                                
                               
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
    <label for="">Room Type</label>
    <select   name="room_type" class="form-control">
        <option value="TD" <?= $room['room_type'] == 'TD' ? 'selected' : '' ?>>TD</option>
        <option value="TP" <?= $room['room_type'] == 'TP' ? 'selected' : '' ?>>TP</option>
        <option value="Amphi" <?= $room['room_type'] == 'Amphi' ? 'selected' : '' ?>>AMPHI</option>
    </select>
    </div>

                               
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_room" class="btn btn-primary">Update room</button>
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