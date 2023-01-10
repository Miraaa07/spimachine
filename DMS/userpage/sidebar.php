<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="styleforma.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/sp.png" alt="">
            </div>

            <span class="logo_name">SPI Downtime System</span>
			
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php?page=home">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="index.php?page=machine">
                    <i class="uil uil-monitor-heart-rate"></i>
                    <span class="link-name">Machine</span>
                </a></li>
                <li><a href="index.php?page=category">
                    <i class="uil uil-bars"></i>
                    <span class="link-name">Category</span>
                </a></li>
                <li><a href="index.php?page=operator">
                    <i class="uil uil-cog"></i>
                    <span class="link-name">Operator</span>
                </a></li>
                <li><a href="index.php?page=product">
                    <i class="uil uil-cube"></i>
                    <span class="link-name">Product</span>
                </a></li>
                <li><a href="index.php?page=option">
                    <i class="uil uil-search-alt"></i>
                    <span class="link-name">Option</span>
                </a></li>
				 <li><a href="index.php?page=shift">
                    <i class="uil uil-arrows-h"></i>
                    <span class="link-name">Shift</span>
                </a></li>
				 <li><a href="index.php?page=variant">
                    <i class="uil uil-window"></i>
                    <span class="link-name">Variant</span>
                </a></li>
				 <li><a href="index.php?page=workcenter">
                    <i class="uil uil-wheelchair"></i>
                    <span class="link-name">Workcenter</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="ajax.php?action=logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    
    <script src="script.js"></script>
</body>
</html>