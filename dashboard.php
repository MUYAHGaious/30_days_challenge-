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
          <li><a href="bog.php">
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
  
          <li><a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
        </ul>
      </nav>
  
  
      <section class="main">
        <div class="main-top">
          <h1>Certifications</h1>
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="users">
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Sama David</h4>
            <p>Ui designer</p>
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
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Mbah Precious</h4>
            <p>Progammer</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>82%</span></td>
                  <td><span>85%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Che John</h4>
            <p>tester</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>94%</span></td>
                  <td><span>92%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Bih Ngia Angup</h4>
            <p>Ui designer</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>85%</span></td>
                  <td><span>82%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
        </div>
        <h1>Projects</h1>
        <i class="fas fa-user-cog"></i>
        <div class="users">
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>number guessing game</h4>
            <p>day 5/30 number guessing game with html, css and php</p>
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
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Balbina kherr</h4>
            <p>Progammer</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>82%</span></td>
                  <td><span>85%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Badan John</h4>
            <p>tester</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>94%</span></td>
                  <td><span>92%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
          <div class="card">
            <img src="./img/lava.jpg">
            <h4>Salina micheal</h4>
            <p>Ui designer</p>
            <div class="per">
              <table>
                <tr>
                  <td><span>85%</span></td>
                  <td><span>82%</span></td>
                </tr>
                <tr>
                  <td>Month</td>
                  <td>Year</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
        </div>
  
        <section class="mng-skill">
          <div class="mng-skill-list">
            <h1 >Manage Skills</h1>
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
                <tr>
                  <td>01</td>
                  <td>Sam David</td>
                  <td>Design</td>
                  <td>03-24-22</td>
                  <td>8:00AM</td>
                  <td>3:00PM</td>
                  <td><button>View</button></td>
                </tr>
                <tr class="active">
                  <td>02</td>
                  <td>Balbina Kherr</td>
                  <td>Coding</td>
                  <td>03-24-22</td>
                  <td>9:00AM</td>
                  <td>4:00PM</td>
                  <td><button>View</button></td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Badan John</td>
                  <td>testing</td>
                  <td>03-24-22</td>
                  <td>8:00AM</td>
                  <td>3:00PM</td>
                  <td><button>View</button></td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Sara David</td>
                  <td>Design</td>
                  <td>03-24-22</td>
                  <td>8:00AM</td>
                  <td>3:00PM</td>
                  <td><button>View</button></td>
                </tr>
                <!-- <tr >
                  <td>05</td>
                  <td>Salina</td>
                  <td>Coding</td>
                  <td>03-24-22</td>
                  <td>9:00AM</td>
                  <td>4:00PM</td>
                  <td><button>View</button></td>
                </tr>
                <tr >
                  <td>06</td>
                  <td>Tara Smith</td>
                  <td>Testing</td>
                  <td>03-24-22</td>
                  <td>9:00AM</td>
                  <td>4:00PM</td>
                  <td><button>View</button></td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </section>
      </section>
    </div>

    
  
  </body>
</html>