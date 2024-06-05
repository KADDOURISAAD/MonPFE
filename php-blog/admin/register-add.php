<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
  
    
         <div class="row mt-4">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                    <h4>Add Admin
                        <a href="view-register.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                    </div>
                     <div class="card-body">
                     <form action="code.php" method="POST">
                        
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">First Name</label>
                                    <input required type="text" name="fname"  class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input required type="text" name="lname"  class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Email Adress</label>
                                    <input required type="text" name="email"  class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input required type="text" name="password"  class="form-control">
                                </div>
                              <!-- fasila -->
                              <input required type="hidden" name="role_as" value ="1"  class="form-control">
                              
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Birth date</label>
                                    <input required type="date" name="birth_date"  class="form-control">
                                </div>
                                <!--  -->
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Gender</label>
                                    <select name="gender" required class="form-control">
                                        <option value="">--Select Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <!--  -->
                                
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Mobile Number</label>
                                    <input required type="number" name="mobile_number"  class="form-control">
                                </div>
                                <!--  -->
                                 <!-- fasila -->
                                 <div class="col-md-6 mb-3">
                                    <label for="">Adress</label>
                                    <input required type="text" name="address"  class="form-control">
                                </div>
                                <!--  -->
                                <div class="col-md-12 mb-3">
                                    <button required type="submit" name="add_user" class="btn btn-primary">Add Admin</button>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>


<!-- video 9 d9i9a 8.36 -->