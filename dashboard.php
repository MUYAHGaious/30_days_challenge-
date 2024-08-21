<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve session variables
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
$profile_picture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : './img/logo.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="debug.css">
    <link rel="stylesheet" href="css/all.min.css">
    
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="edit_profile.php" class="logo">
                    <img src="./img/logo.png">
                    <span class="nav-item">Me!</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-menorah"></i>
                    <span class="nav-item">Dashboard</span>
                </a></li>
                <li><a href="skills.php">
                    <i class="fas fa-comment"></i>
                    <span class="nav-item">Skills</span>
                </a></li>
                <li><a href="blog.php">
                    <i class="fas fa-database"></i>
                    <span class="nav-item">Blog</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">mng-skill</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Setting</span>
                </a></li>
                <li><a href="logout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <!-- Welcome Message -->
                <div class="welcome-msg">
                    <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
                </div>

                <!-- Search Box and Profile Picture (Aligned to the right) -->
                <div >
                    <!-- Search Box -->
                    <div class="search-box">
                        <input type="text" placeholder="Search...">
                        <i class="fas fa-search"></i>
                    </div>

                    <!-- Profile Picture -->
                    <div class="profile-picture">
                        <a class="img_special" href="edit_profile.php">
                            <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture">
                        </a>
                    </div>
                </div>
            </div>

            <h1>Certifications</h1>
            <div class="users">
                <!-- Certification cards here -->
                <div class="card">
                    <img src="./img/lava.jpg">
                    <h4>Sama David</h4>
                    <p>UI Designer</p>
                    <div class="per">
                        <table>
                            <tr>
                                <td><span>85%</span></td>
                                <td><span>87%</span></td>
                            </tr>
                            <tr>
                                <td>Month</td>
                                <td>Year</td>
                            </tr>
                        </table>
                    </div>
                    <button>Profile</button>
                </div>
                <!-- Add more cards as needed -->
            </div>

            <h1>Projects</h1>
            <div class="users">
                <!-- Project cards here -->
                <div class="card">
                    <img src="./img/lava.jpg">
                    <h4>Number Guessing Game</h4>
                    <p>Day 5/30: Number Guessing Game with HTML, CSS, and PHP</p>
                    <div class="per">
                        <table>
                            <tr>
                                <td><span>85%</span></td>
                                <td><span>87%</span></td>
                            </tr>
                            <tr>
                                <td>Month</td>
                                <td>Year</td>
                            </tr>
                        </table>
                    </div>
                    <button>Profile</button>
                </div>
                <!-- Add more cards as needed -->
            </div>

            <section class="mng-skill">
                <div class="mng-skill-list">
                    <h1>Manage Skills</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Depart</th>
                                <th>Date</th>
                                <th>Join Time</th>
                                <th>Logout Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Table Row -->
                            <tr>
                                <td>01</td>
                                <td>Sam David</td>
                                <td>Design</td>
                                <td>03-24-22</td>
                                <td>8:00AM</td>
                                <td>3:00PM</td>
                                <td><button>View</button></td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>
</body>
</html>
