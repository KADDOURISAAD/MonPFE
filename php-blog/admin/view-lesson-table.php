<?php

 include('authentication.php');
 include('includes/header.php');



?>
<div class="container-fluid px-4">
                        <h4 class="mt-4">Time table</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item">Lessons Timtable</li>
                        </ol>
                        <div class="row">
                            <!-- Jdid -->
                            <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">
                              <h4>Generate Timetable
                       
                                </h4>
                            <div class="card-body">
                            <div class="row">
                              <!-- New Card -->
                             
                                <!-- fasila -->
                            
                                <div class="col-md-6 mb-3">
                                <label for="">Semester</label>
                                <select required name="semester" class="form-control">
                                 <option value="">Select Semester</option>
                                    <option value="S1">Semester 1</option>
                                    <option value="S2">Semester 2</option>
                                
                                    </select>
                                </div>
                                
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                <label for="">Field</label>
                                <select required name="field" class="form-control">
                                <option value="">Select Field</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                               
                               <!-- card end -->
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                <label for="">Teacher</label>
                                <select required name="teacher" class="form-control">
                                <option value="">Select Teacher</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Lesson</label>
                                <select required name="lesson" class="form-control">
                                <option value="">Select Lesson</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Group</label>
                                <select required name="group" class="form-control">
                                <option value="">Select Group</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Time</label>
                                <select required name="time" class="form-control">
                                <option value="">Select Time</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Day</label>
                                <select required name="day" class="form-control">
                                <option value="">Select Day</option>
                                    
                                    </select>
                                </div>
                                
                               
                           
                               

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_room" class="btn btn-primary">Add event</button>
                                </div>
                            </div>                              
                        <div class="table-responsive-xl">
                          
                        <table class="table table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">Time</th>
            <th scope="col">Sunday</th>
            <th scope="col">Monday</th>
            <th scope="col">Tuesday</th>
            <th scope="col">Wednesday</th>
            <th scope="col">Thursday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>8:30-10:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>10:00-11:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>11:30-13:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>13:00-14:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>14:00-15:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>15:30-17:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
      </table>
</div>
</div>
</div>
</div>
</div>
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>