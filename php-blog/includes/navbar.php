

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
<a class="nav-link active" aria-current="page" href="index__.php">
  <div class="container">
  <div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="assets/img/udl-sba.png" alt="pfesaadmus" class="w-100">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div>
</a>
    <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index__.php">Home</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Timetable
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalyyy" data-bs-whatever="@mdo" style="border: none; background-color: transparent; padding: 5; cursor: pointer;">Lessons Timetable</button>
        <?php if ( $_SESSION['auth_role'] == '0'): ?>
        </li>
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalexam" data-bs-whatever="@mdo" style="border: none; background-color: transparent; padding: 5; cursor: pointer;">Exams Timetable</button>
        <?php endif; ?>
    </ul>
    
</li>
<li class="nav-item">
<button type="button" class="nav-link " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="border: none; background-color: transparent; padding: -5; cursor: pointer; ">Contact</button>
        </li>
        

          <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_name']; ?>
          </a>
          <ul class="dropdown-menu">
            <li>
              
              <button type="button" class="dropdown-item" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModala" data-bs-whatever="@mdo">My Profile</button>
            <li>
            <form action="allcode.php" method="POST">
              <button type ="submit" name="logout_btn" class="dropdown-item">Logout</button>
            </form>
          </li>
          </ul>
        </li>

            <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>

        <?php endif; ?>
      </ul>
      
    </div>
  </div>
</nav>



<div class="modal fade" id="exampleModala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <?php if(isset($_SESSION['auth_user'])) { ?>
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3 text-center">
            <div class="border p-3 d-inline-block">
              <img src="assets/img/user.png" 
                   alt="Profile Photo" 
                   class="img-thumbnail rounded-circle" 
                   style="width: 150px; height: 150px; object-fit: cover;">
              
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="full-name" class="col-form-label">Full Name</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_name']; ?>" class="form-control" id="full-name">
            </div>
            <div class="col-md-6">
              <label for="email" class="col-form-label">Email</label>
              <input  readonly type="email" value="<?= $_SESSION['auth_user']['user_email']; ?>" class="form-control" id="email">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="birth-date" class="col-form-label">Birth Date</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_birth_date']; ?>" class="form-control" id="birth-date">
            </div>
            <div class="col-md-6">
              <label for="phone-number" class="col-form-label">Phone Number</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_phone_num']; ?>" class="form-control" id="phone-number">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="address" class="col-form-label">Address</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_address']; ?>" class="form-control" id="address">
            </div>
            <?php if ( $_SESSION['auth_role'] == '0'): ?>
            <div class="col-md-6">
              <label for="field" class="col-form-label">Field</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_field']; ?>" class="form-control" id="field">
            </div>
            <?php endif; ?>
          </div>
          <div class="row mb-3">
          <?php if ( $_SESSION['auth_role'] == '0'): ?>
            <div class="col-md-6">
              <label for="group" class="col-form-label">Group</label>
              <input  readonly type="text" value="<?= $_SESSION['auth_user']['user_groupe']; ?>" class="form-control" id="group">
            </div>
            <?php endif; ?>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php }?> 
