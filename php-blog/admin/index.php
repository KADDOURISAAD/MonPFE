<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
                        <h1 class="mt-4">Timetable Management </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php include('message.php');?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                    
                                <div class="card bg-light text-dark mb-4">
                                
                                    <div class="card-body">Teachers
                                      <?php
                                           $dash_courses_query = "SELECT * FROM users WHERE role_as=2";
                                           $dash_courses_query_run = mysqli_query($con,$dash_courses_query );
                                           if($courses_total = mysqli_num_rows($dash_courses_query_run)) {
                                                echo '<h4 class="mb-0">'.$courses_total.'</h4>';
                                           } else {
                                            echo '<h4 class="mb-0">No Data</h4>';
                                           }
                                        ?>
                                        <div class="col-md-2">
                                        <img src="assets/img/teachers-day.png" alt="pfesaadmus" class="w-100">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-light text-dark mb-4">
                                    <div class="card-body">Students
                                        <?php
                                           $dash_courses_query = "SELECT * FROM users WHERE role_as=0";
                                           $dash_courses_query_run = mysqli_query($con,$dash_courses_query );
                                           if($courses_total = mysqli_num_rows($dash_courses_query_run)) {
                                                echo '<h4 class="mb-0">'.$courses_total.'</h4>';
                                           } else {
                                            echo '<h4 class="mb-0">No Data</h4>';
                                           }
                                        ?>
                                        <div class="col-md-2">
                                        <img src="assets/img/student.png" alt="pfesaadmus" class="w-100">
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-light text-dark mb-4">
                                    <div class="card-body">Rooms
                                    <?php
                                           $dash_courses_query = "SELECT * FROM rooms ";
                                           $dash_courses_query_run = mysqli_query($con,$dash_courses_query );
                                           if($courses_total = mysqli_num_rows($dash_courses_query_run)) {
                                                echo '<h4 class="mb-0">'.$courses_total.'</h4>';
                                           } else {
                                            echo '<h4 class="mb-0">No Data</h4>';
                                           }
                                        ?>
                                        <div class="col-md-2">
                                        <img src="assets/img/classroom.png" alt="pfesaadmus" class="w-100">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card bg-light text-dark mb-4">
                                    <div class="card-body">Groups
                                    <?php
                                           $dash_courses_query = "SELECT * FROM groups ";
                                           $dash_courses_query_run = mysqli_query($con,$dash_courses_query );
                                           if($courses_total = mysqli_num_rows($dash_courses_query_run)) {
                                                echo '<h4 class="mb-0">'.$courses_total.'</h4>';
                                           } else {
                                            echo '<h4 class="mb-0">No Data</h4>';
                                           }
                                        ?>
                                        <div class="col-md-2">
                                        <img src="assets/img/group.png" alt="pfesaadmus" class="w-100">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        
                        
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        
                                    </div>
                                    <div class="card-body"><?php include('chart1.php');?></div>
                                </div>
                            </div>
                           
                        <!--  -->
    
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>