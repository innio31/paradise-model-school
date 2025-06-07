<?php
require_once 'includes/auth.php';

if(!isLoggedIn()) {
    header("location: index.php");
    exit;
}

// Get student data
$student_id = $_SESSION["student_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Greenwood High</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="portal-dashboard">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                <span class="d-none d-sm-inline">Greenwood High</span>
                <span class="d-inline d-sm-none">GHS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?php echo htmlspecialchars($_SESSION["student_name"]); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 d-none d-lg-block">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">
                                <i class="fas fa-book me-2"></i>My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="grades.php">
                                <i class="fas fa-chart-bar me-2"></i>Grades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance.php">
                                <i class="fas fa-calendar-check me-2"></i>Attendance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timetable.php">
                                <i class="fas fa-calendar-alt me-2"></i>Timetable
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="resources.php">
                                <i class="fas fa-file-alt me-2"></i>Resources
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="messages.php">
                                <i class="fas fa-envelope me-2"></i>Messages
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="dashboard-header mb-4">
                    <h3>Welcome back, <?php echo htmlspecialchars($_SESSION["student_name"]); ?></h3>
                    <p class="text-muted">Admission Number: <?php echo htmlspecialchars($_SESSION["admission_number"]); ?></p>
                </div>
                
                <!-- Dashboard Widgets -->
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Current Courses</h5>
                                    <i class="fas fa-book fa-2x text-primary"></i>
                                </div>
                                <h2 class="mt-3">6</h2>
                                <a href="courses.php" class="btn btn-sm btn-outline-primary mt-2">View All</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Attendance</h5>
                                    <i class="fas fa-calendar-check fa-2x text-success"></i>
                                </div>
                                <div class="progress mt-3" style="height: 20px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 92%;" 
                                         aria-valuenow="92" aria-valuemin="0" aria-valuemax="100">92%</div>
                                </div>
                                <a href="attendance.php" class="btn btn-sm btn-outline-success mt-2">Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Average Grade</h5>
                                    <i class="fas fa-chart-line fa-2x text-info"></i>
                                </div>
                                <h2 class="mt-3">A-</h2>
                                <a href="grades.php" class="btn btn-sm btn-outline-info mt-2">View Report</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Announcements -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Announcements</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Midterm Exams Schedule</h6>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">The midterm exams schedule has been posted. Please check your timetable.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Science Fair Registration</h6>
                                    <small class="text-muted">1 week ago</small>
                                </div>
                                <p class="mb-1">Registration for the annual science fair is now open until October 15th.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Library Hours Update</h6>
                                    <small class="text-muted">2 weeks ago</small>
                                </div>
                                <p class="mb-1">The library will have extended hours during exam period.</p>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Events -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Upcoming Events</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Event</th>
                                        <th>Location</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oct 10, 2023</td>
                                        <td>Midterm Exams Begin</td>
                                        <td>Various Classrooms</td>
                                        <td>8:00 AM</td>
                                    </tr>
                                    <tr>
                                        <td>Oct 15, 2023</td>
                                        <td>Science Fair Registration Deadline</td>
                                        <td>Online</td>
                                        <td>11:59 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Oct 20, 2023</td>
                                        <td>Career Day</td>
                                        <td>School Auditorium</td>
                                        <td>9:00 AM - 2:00 PM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>