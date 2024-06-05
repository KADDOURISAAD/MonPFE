<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="view-register.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></i></div>
                                Admins
                            </a>
                            <a class="nav-link" href="view-teacher.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                                Teachers
                            </a>
                            <a class="nav-link" href="view-student.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                                Students
                            </a>
                           
                            <a class="nav-link" href="view-rooms.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i></div>
                                Rooms
                            </a>
                            <a class="nav-link" href="view-fields.php">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-leanpub"></i></div>
                                Fields
                            </a>
                            <a class="nav-link" href="view-levels.php">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-leanpub"></i></div>
                                Levels
                            </a>
                            <a class="nav-link" href="view-course.php?field=null&semester=null">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></i></div>
                                Module
                            </a>

                            <a class="nav-link" href="view-groupe-fields.php?field=null">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></i></div>
                                Groups
                            </a>
                            <div class="sb-sidenav-menu-heading">Generate Timtables</div>
                            <!-- Modules -->
                            
                            <!-- Groups -->
                
                            <!--  -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutss" aria-expanded="false" aria-controls="collapseLayoutss">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Time table
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angles-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="generate-new.php?field=null&semester=null">Lessons Timetable</a>
                                    <a class="nav-link" href="generate-exams-new.php?field=null&semester=null">Exams Timetable</a>
                                    
                                    
                                </nav>
                            </div>
                            <!--  -->
                           
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php if(isset($_SESSION['auth_user'])) : ?>
                        <?= $_SESSION['auth_user']['user_name']; ?>
                        <?php endif; ?>
                    </div>
                </nav>
</div>