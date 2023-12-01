<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
    <title>ITKM</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            /* Set the width of the containers */
            margin-left: 10px;
            /* Add margin to the left side */
            margin-right: auto;
        }

        /* Add this CSS to provide space between the dropdowns */
        .d-inline-flex {
            display: inline-flex;
            margin-right: 10px;
            /* Adjust the space between dropdowns as needed */
        }



        .nav-link1 {
            display: inline-block;
            padding: 10px 20px;
            /* Adjust the padding as needed */
            border-radius: 25px;
            /* Set the border-radius for the curved rectangle */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Add shadow effect */
            background-color: #ffffff;
            /* Background color for the curved rectangle */
            color: #333;
            /* Text color */
            text-decoration: none;
            /* Remove default underline style */
            transition: all 0.3s ease;
            /* Add smooth transition effect */
        }

        .nav-link1:hover {
            background-color: #f5f5f5;
            /* Change background color on hover */
        }

        .custom-dropdown {
            border-radius: 15px;
            /* Adjust the border-radius value to change the curve of the rectangle */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Adjust the shadow values for the desired shadow effect */
            background-color: #ffffff;
            /* Set the background color of the dropdown menu */
        }

        /* Optional: Add padding and other styles to the dropdown items if needed */
        .custom-dropdown .dropdown-item {
            padding: 10px 20px;
            color: #333;
            /* Set text color */
        }

        .custom-dropdown .dropdown-item:hover {
            background-color: #f5f5f5;
            /* Set background color on hover */
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/download.jpeg" alt="homepage" height="40px" width="40px" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/mkce.png" alt="homepage" height="50px" width="100%" class="light-logo" />
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell font-24"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" /></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <?php require("navlinks.php") ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper h-100">
            <div class="page-breadcrumb">


                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Total Items</h4>

                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                <div>
                                <button class="btn btn-primary mr-2 dropdown-toggle waves-effect waves-dark" id="departmentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Product <i class="bi bi-filter"></i>
</button>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="departmentDropdown">
                <?php
                require_once("config.php");
                $sql = "SELECT ndept FROM departement";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<a class="dropdown-item department-item" href="#" data-dept="' . $row["ndept"] . '">' . $row["ndept"] . '</a>';
                    }
                } else {
                    echo "0 results found in the department table";
                }   
                echo '<a class="dropdown-item department-item" href="#" data-dept="overall">Overall</a>';

                ?>
                  
                <div class="dropdown-divider"></div>
            </div>
        </div>


                                    <div>
                                        <button class="btn btn-primary mr-2 dropdown-toggle waves-effect waves-dark" href="#" id="companyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Company <i class="bi bi-filter"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="companyDropdown">
                                            <?php
                include("config.php");
                $sql = "SELECT ncompany FROM company";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<a class="dropdown-item company-item" href="#" data-company="' . $row["ncompany"] . '">' . $row["ncompany"] . '</a>';
                    }
                } else {
                    echo "0 results found in the company table";
                }   

                                echo '<a class="dropdown-item department-item" href="#" data-dept="overall">Overall</a>';

                ?>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div id="productList"></div>
                            </div>
                            <?php
                            include("config.php");

                            $dash = "SELECT product, COUNT(*) as count FROM eitems GROUP BY product";
                            $sqldash = mysqli_query($db, $dash);

                            // Define an array of predefined subtle colors
                            $boxColors = array(
                                '#3498db', // Blue
                                '#e74c3c', // Red
                                '#2ecc71', // Green
                                '#f39c12', // Yellow
                                '#9b59b6', // Purple
                                '#16a085', // Teal
                                '#d35400', // Orange
                                '#34495e', // Dark Blue
                                '#7f8c8d'  // Gray
                            );

                            echo '<div class="container-fluid">';
                            echo '<br>';
                            echo '<div class="row " id="hidding">';

                            $colorIndex = 0; // Initialize the color index

                            while ($row = mysqli_fetch_assoc($sqldash)) {
                                $productType = strtoupper($row['product']);
                                $count = $row['count'];
                                $iconClass = '';

                                // Use the next color from the array
                                $boxColor = $boxColors[$colorIndex];

                                switch ($productType) {
                                    case 'KEYBOARD':
                                        $iconClass = 'mdi mdi-keyboard mdi-24px';
                                        break;
                                    case 'AC':
                                        $iconClass = 'mdi mdi-air-conditioner mdi-24px';
                                        break;
                                    case 'LAN':
                                        $iconClass = 'mdi mdi-lan mdi-24px';
                                        break;
                                    case 'DESKTOP':
                                        $iconClass = 'mdi mdi-desktop-mac mdi-24px';
                                        break;
                                    case 'MOUSE':
                                        $iconClass = 'mdi mdi-mouse mdi-24px';
                                        break;
                                    case 'ROUTER':
                                        $iconClass = 'mdi mdi-wifi mdi-24px';
                                        break;
                                    case 'CPU':
                                        $iconClass = 'mdi mdi-office mdi-24px';
                                        break;
                                    case 'CAMERA':
                                        $iconClass = 'mdi mdi-camera mdi-24px';
                                        break;
                                    case 'FAN':
                                        $iconClass = 'mdi mdi-fan mdi-24px';
                                        break;
                                    case 'LIGHT':
                                        $iconClass = 'mdi mdi-lightbulb mdi-24px';
                                        break;
                                    case 'SWITCHBOARD':
                                        $iconClass = 'mdi mdi-flash mdi-24px';
                                        break;
                                    case 'WIRE':
                                        $iconClass = 'mdi mdi-flash mdi-24px';
                                        break;
                                    case 'MIC':
                                        $iconClass = 'mdi mdi-microphone mdi-24px';
                                        break;
                                    case 'ETHERNET':
                                        $iconClass = 'mdi mdi-ethernet mdi-24px';
                                        break;
                                    case 'TV':
                                        $iconClass = 'mdi mdi-television mdi-24px'; // TV icon
                                        break;
                                    case 'CHARGER':
                                        $iconClass = 'mdi mdi-cellphone mdi-24px'; // Charger icon
                                        break;
                                    case 'SWITCH':
                                        $iconClass = 'mdi mdi-switch mdi-24px'; // Charger icon
                                        break;
                                    default:
                                        $iconClass = 'mdi mdi-help-circle-outline mdi-24px'; // Default icon (question mark icon)
                                        break;
                                }

                                echo '<div class="col-md-6 col-lg-4">';
                                echo '<div class="card card-hover" style="background-color: ' . $boxColor . ';">';
                                echo '<div class="box text-center ">';
                                echo '<i class="' . $iconClass . ' text-white"></i>';
                                echo '<h1 class="font-light text-white">' . $productType . '</h1>';
                                echo '<h5 class="font-light text-white">Count: ' . $count . '</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                                // Increment the color index and loop back to the beginning if needed
                                $colorIndex = ($colorIndex + 1) % count($boxColors);
                            }

                            echo '</div>';
                            echo '</div>';
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // Attach click event to department items in the dropdown
                $('.department-item').click(function(e) {
                    e.preventDefault();
                    console.log();
                    var selectedDept = $(this).data('dept');

                    // AJAX request to fetch data based on selected department
                    $.ajax({
                        url: 'fetch_item_data.php', // PHP script to fetch data based on department
                        type: 'GET',
                        data: {
                            department: selectedDept
                        },
                        success: function(data) {
                            // Update the productList div with fetched data
                            $('#productList').html(data);
                            $("#hidding").hide(" #hidding");
                        },
                        error: function(xhr, status, error) {
                            // Handle error if necessary
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Attach click event to company items in the dropdown
                $('.company-item').click(function(e) {
                    e.preventDefault();
                    var selectedCompany = $(this).data('company');

                    // AJAX request to fetch products based on selected company
                    $.ajax({
                        url: 'fetch_products.php', // PHP script to fetch products based on company
                        type: 'GET',
                        data: {
                            company: selectedCompany
                        },
                        success: function(data) {
                            // Update the productList div with fetched products
                            $('#productList').html(data);
                            $("#hidding").hide(" #hidding");
                        },
                        error: function(xhr, status, error) {
                            // Handle error if necessary
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Attach click event to company items in the dropdown
                $('.office-item').click(function(e) {
                    e.preventDefault();
                    var selectedOffice = $(this).data('office');

                    // AJAX request to fetch products based on selected company
                    $.ajax({
                        url: 'fetch_office.php', // PHP script to fetch products based on company
                        type: 'GET',
                        data: {
                            office: selectedOffice
                        },
                        success: function(data) {
                            // Update the productList div with fetched products
                            $('#productList').html(data);
                            $("#hidding").hide(" #hidding");
                        },
                        error: function(xhr, status, error) {
                            // Handle error if necessary
                        }
                    });
                });
            });
        </script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="dist/js/custom.min.js"></script>
        <!-- this page js -->
        <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
        <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
        <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php include("footer.php"); ?>
</body>

</html>
