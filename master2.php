<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $tPhone = $_POST["t-phone"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $web = $_POST["web"];
    $supcode = $_POST["supp_code"];
    $gst_in = $_POST["gstin"];

    // Prepare the SQL statement using a prepared statement
    $stmt = $db->prepare("INSERT INTO master (`name`, `add1`, `add2`, `t-phone`, `mobile`, `email`, `web`,`supp_code`,`gstin`) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("sssssss", $name, $add1, $add2, $tPhone, $mobile, $email, $web, $supcode, $gst_in);

    $res = [];  // Initialize response array

    if ($stmt->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Data inserted successfully!'
        ];
    } else {
        $res = [
            'status' => 201,
            'message' => 'Data Not inserted successfully!'
        ];
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $db->close();

    echo json_encode($res);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Check if DELETE data is provided
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data && isset($data['id'])) {
        $id = $data['id'];

        // Delete the order
        $sql = "DELETE FROM master WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Delete the items associated with the order
            $sql = "DELETE FROM master WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Order deleted successfully.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to delete items.'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to delete order.'];
        }

        $stmt->close();
    } else {
        // Return an error response if DELETE data is missing or invalid
        http_response_code(400);
        echo json_encode(array('message' => 'Invalid data provided.'));
    }

    echo json_encode($response);
    exit();
}


?>




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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
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
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
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
                    <?php include('navlinks.php'); ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title mb-3">Master</h4>

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
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>    
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    /* Custom CSS to increase the size of the large modal */
    .modal-lg1 {
        max-width: 75%; /* Adjust the percentage to your desired size */
    }

    /* Optional: Increase modal header font size or make other adjustments as needed */
    .modal-lg1 .modal-header {
        font-size: 24px;
    }
    .modal-content {
    border-radius: 20px; /* Change border curvature */
  }
  .modal-title {
    font-size: 24px; /* Adjust the font size as desired */
    padding: 20px; /* Add padding to increase height and width */
}
  
</style>
<!--Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg1" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" ><b>Master Entry</b></h5>
          <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="card-body">
                            <div class="card">
            
                                <div class="card-header bg-dark text-light" >
            
                                    Add new vendor
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-1">
                                        <form id="insert_master">
                                            <div class="form-group row">
                                                <label for="vendor" class="col-md-3 col-form-label">Vendor Name*</label>
                                               <div class="col-md-9">
                                                <input type="text" class="form-control btn-rounded" id="vendor" name="name" aria-describedby="emailHelp" placeholder="Supplier_code" required>
                                                </div> </div>
                                            <div class="form-group row">
                                                <label for="vendor" class="col-md-3 col-form-label">Supplier_code*</label>
                                               <div class="col-md-9">
                                                <input type="text" class="form-control btn-rounded" id="vendor_code" name="supp_code" aria-describedby="emailHelp" placeholder="Vendor Name" required>
                                            </div></div>
                                            <div class="form-group row">
                                                <label for="vendor" class="col-md-3 col-form-label">Gst_in</label>
                                                <div class="col-md-9">
                                               <input type="text" class="form-control btn-rounded" id="gst_in" name="gstin" aria-describedby="emailHelp" placeholder="GST_IN" required>
                                           </div></div>
                                            <div class="form-group row ">
                                                <label for="address1" class="col-md-3 col-form-label">Address_1*</label> 
                                                <div class="col-md-9">
                                               <input type="text" class="form-control btn-rounded" id="address" name="add1" placeholder="Address_1">
                                          </div></div>
                                            <div class="form-group row">
                                                <label for="address2" class="col-md-3 col-form-label">Address_2</label>
                                                <div class="col-md-9">
                                                 <input type="text" class="form-control btn-rounded" id="address1" name="add2" placeholder="Address_2">
                                            </div></div>
                                            <div class="form-group row">
                                                <label for="tEphone" class="col-md-3 col-form-label">Telephone</label>
                                                <div class="col-md-9">
                                               <input type="text" class="form-control btn-rounded" id="address2" name="t-phone" placeholder="Telephone">
                                            </div> </div>
                                            <div class="form-group row">
                                                <label for="Mobile_no" class="col-md-3 col-form-label">Mobile_no</label>
                                                <div class="col-md-9">
                                                 <input type="text" class="form-control btn-rounded" id="address3" name="mobile" placeholder="Mobile_no">
                                            </div></div>
                                            <div class="form-group row">
                                            <label for="Mobile_no" class="col-md-3 col-form-label">E-mail</label>
                                            <div class="col-md-9">
                                             <input type="text" class="form-control btn-rounded" id="address4" name="email" placeholder="E-mail">
                                            </div></div>
                                            <div class="form-group row" >
                                                <label for="website" class="col-md-3 col-form-label">Website</label>
                                                <div class="col-md-9">
                                               <input type="text" class="form-control mb-3 btn-rounded" id="address5" name="web" placeholder="Website">
                                            </div> </div>
                                            <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>
                                </div>
                                </blockquote>
                                </form>

                            </div>

                            <div class="container-fluid">
                                <!-- ============================================================== -->
                                <!-- Start Page Content -->
                                <!-- ============================================================== -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- <h5 class="card-title">Products</h5> -->
                                                <div class="table-responsive">
                                                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                                    <thead class="table-dark ">
                                                                        <tr>
                                                                            <th scope="col">S.No</th>
                                                                            <th scope="col">Supplier Name</th>
                                                                            <th scope="col">Supplier Address</th>
                                                                            <th scope="col">Address</th>
                                                                            <th scope="col">Telephone</th>
                                                                            <th scope="col">Mobile_no</th>

                                                                            <th scope="col">Email</th>
                                                                            <th scope="col">Website</th>


                                                                            <th scope="col">Action</th>

                                                                        </tr>
                                                                    </thead>

                                                                    <tbody id="table-body">
                                                                        <?php
                                                                        include 'config.php';
                                                                        $sql1 = "SELECT * FROM master";
                                                                        $result1 = $db->query($sql1);
                                                                        $sn = 1;

                                                                        if ($result1->num_rows > 0) {
                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                echo "<tr>";
                                                                                echo "<th scope='row'>" . $sn . "</th>";
                                                                                echo "<td>" . $row["name"] . "</td>";
                                                                                echo "<td>" . $row["add1"] . "</td>";
                                                                                echo "<td>" . $row["add2"] . "</td>";
                                                                                echo "<td>" . $row["t-phone"] . "</td>";
                                                                                echo "<td>" . $row["mobile"] . "</td>";
                                                                                echo "<td>" . $row["email"] . "</td>";
                                                                                echo "<td>" . $row["web"] . "</td>";
                                                                                echo "<td><button onclick='delete_order(" . $row["id"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-product'>Delete</button></td>";
                                                                                echo "</tr>";
                                                                                $sn++;
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- End PAge Content -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- Right sidebar -->
                                <!-- ============================================================== -->
                                <!-- .right-sidebar -->
                                <!-- ============================================================== -->
                                <!-- End Right sidebar -->
                                <!-- ============================================================== -->
                            </div>
                        </div>
                    
        </div>
       
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add Company</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
               
                    <div class="card-body">
                        <div class="card-header bg-dark text-light">
                            Add new company
                        </div>

                        <blockquote class="blockquote mb-1">
                            <form id="insert_company">
                                <div class="form-group row"><!---formm-2 insert_company--->
                                    <label for="vendor"  >Company_Name*</label>
                                    <div class="col-md-9" >
                                    <input type="text" class="form-control btn-rounded" id="vendor" name="ncompany" aria-describedby="emailHelp" placeholder="Company_name" required>
                                </div>  </div>

                                <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>
                            </form>
                        </blockquote>
                    </div>

                    <!---------------------------------------add company table ---------------------------------->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Products</h5> -->
                                    <div class="table-responsive">
                                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                        <thead class="table-dark ">
                                                            <tr>
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Company name</th>
                                                                <th scope="col">Action</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody id="table-bodys">
                                                            <?php
                                                            include 'config.php';
                                                            $sql12 = "SELECT * FROM company";
                                                            $result12 = $db->query($sql12);
                                                            $sn = 1;

                                                            if ($result12->num_rows > 0) {
                                                                while ($row = $result12->fetch_assoc()) {
                                                                    echo "<tr>";
                                                                    echo "<th scope='row'>" . $sn . "</th>";
                                                                    echo "<td>" . $row["ncompany"] . "</td>";
                                                                    echo "<td><button onclick='delete_company(" . $row["cid"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-company'>Delete</button></td>";
                                                                    echo "</tr>";
                                                                    $sn++;
                                                                }
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
       
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add Department</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <div class="card-body">
                        <div class="card-header bg-dark text-light">
                            Add new Departement
                        </div>

                        <blockquote class="blockquote mb-1">
                            <form id="insert_departement"><!-------departement---------->
                                <div class="form-group row"><!---formm-2 insert_company--->
                                    <label for="vendor" >Departement_Name*</label>
                                   <div class="col-md-9" > <input type="text" class="form-control btn-rounded" id="ndept" name="ndept" aria-describedby="emailHelp" placeholder="Departement_name" required>
                                </div> </div>

                                <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>
                            </form>
                        </blockquote>
                    </div>

                    <!---------------------------------------add company table ---------------------------------->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Products</h5> -->
                                    <div class="table-responsive">
                                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                        <thead class="table-dark ">
                                                            <tr>
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Departement name</th>
                                                                <th scope="col">Action</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody id="table-bodyzz">
                                                            <?php
                                                            include 'config.php';
                                                            $sql12 = "SELECT * FROM departement";
                                                            $result12 = $db->query($sql12);
                                                            $sn = 1;

                                                            if ($result12->num_rows > 0) {
                                                                while ($row = $result12->fetch_assoc()) {
                                                                    echo "<tr>";
                                                                    echo "<th scope='row'>" . $sn . "</th>";
                                                                    echo "<td>" . $row["ndept"] . "</td>";
                                                                    echo "<td><button onclick='delete_depart(" . $row["did"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-company'>Delete</button></td>";
                                                                    echo "</tr>";
                                                                    $sn++;
                                                                }
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
       
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add Products</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <div class="card-body">
                        <div class="card-header bg-dark text-light">
                            Add the products
                        </div>
                        <blockquote class="blockquote mb-1">
                            <form id="insert_product"><!-------->

                               
                            <div class="row">
                            <div class="form-group row">
                                                <label for="producttypes" class="col-md-3 col-form-label">Product Type*</label>
                                               <div class="col-md-9">
                                                <input type="text" class="form-control btn-rounded" id="producttypes" name="producttype" aria-describedby="emailHelp" placeholder="Product Type" required>
                                                </div> </div>
                                                </div>
   
    <div class="row">
        <div class="form-group row">
            <label for="productnames" class="col-md-3 col-form-label">Product Name*</label>
            <div class="col-md-9">
            <input type="text" class="form-control btn-rounded" id="productnames" name="productname" aria-describedby="emailHelp" placeholder="Product Name" required>
        </div>
    </div>
</div>
                              
                                <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>

                            </form>



                    </div>
                    </blockqoute>


                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Products</h5> -->
                                        <div class="table-responsive">
                                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                            <thead class="table-dark ">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">product Name</th>
                                                                    <th scope="col">product_type</th>
                                                                    <th scope="col">Action</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody id="table-bodyss">
                                                                <?php
                                                                include 'config.php';
                                                                $sql2 = "SELECT * FROM products";
                                                                $result2 = $db->query($sql2);
                                                                $sn2 = 1;

                                                                if ($result2->num_rows > 0) {
                                                                    while ($row = $result2->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<th scope='row'>" . $sn2 . "</th>";
                                                                        echo "<td>" . $row["producttype"] . "</td>";
                                                                        echo "<td>" . $row["productname"] . "</td>";
                                                                        echo "<td><button onclick='delete_product(" . $row["pid"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-product'>Delete</button></td>";
                                                                        echo "</tr>";
                                                                        $sn2++;
                                                                    }
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>

        </div>
       
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add Room Number</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
                    <div class="card-body">
                        <div class="card-header bg-dark text-light">
                            Add the Rooms
                        </div>
                        <blockquote class="blockquote mb-1">
                            <form id="insert_room"><!---insert_room----->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row"><!---formm-2 insert_company--->
                                            <label for="vendor">Room_No*</label><div class="col-md-9">
                                            <input type="text" class="form-control btn-rounded" id="nroom" name="nroom" aria-describedby="emailHelp" placeholder="Room_no" required>
                                        </div></div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>

                            </form>



                    </div>
                    </blockqoute>


                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Products</h5> -->
                                        <div class="table-responsive">
                                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                            <thead class="table-dark ">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Room Name</th>
                                                                    <th scope="col">Action</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody id="table-bodyzzz">
                                                                <?php
                                                                include 'config.php';
                                                                $sql2 = "SELECT * FROM rooms";
                                                                $result2 = $db->query($sql2);
                                                                $sn2 = 1;

                                                                if ($result2->num_rows > 0) {
                                                                    while ($row = $result2->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<th scope='row'>" . $sn2 . "</th>";
                                                                        echo "<td>" . $row["nroom"] . "</td>";

                                                                        echo "<td><button onclick='delete_room(" . $row["rid"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-product'>Delete</button></td>";
                                                                        echo "</tr>";
                                                                        $sn2++;
                                                                    }
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>

        </div>
       
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add Block</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <div class="card-body">
                        <div class="card-header bg-dark text-light">
                            Add the blocks
                        </div>
                        <blockquote class="blockquote mb-1">
                            <form id="insert_block"><!---insert_block----->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row"><!---formm-2 insert_company--->
                                            <label for="vendor" >Block_Name*</label> 
                                            <div class="col-md-9">
                                            <input type="text" class="form-control btn-rounded" id="nblock" name="nblock" aria-describedby="emailHelp" placeholder="Block_name" required>
                                        </div>  </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-outline-danger btn-rounded">Save</button>

                            </form>

                    </div>
                    </blockqoute>


                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Products</h5> -->
                                        <div class="table-responsive">
                                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                            <thead class="table-dark ">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Block Name</th>
                                                                    <th scope="col">Action</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody id="table-bodyz"><!-----table_for_ the_block---->
                                                                <?php
                                                                include 'config.php';
                                                                $sql2 = "SELECT * FROM blocks";
                                                                $result2 = $db->query($sql2);
                                                                $sn2 = 1;

                                                                if ($result2->num_rows > 0) {
                                                                    while ($row = $result2->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<th scope='row'>" . $sn2 . "</th>";
                                                                        echo "<td>" . $row["nblock"] . "</td>";
                                                                        //delete block
                                                                        echo "<td><button onclick='delete_block(" . $row["bid"] . ")' type='button' class='btn btn-rounded btn-danger btn-sm delete-product'>Delete</button></td>";
                                                                        echo "</tr>";
                                                                        $sn2++;
                                                                    }
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                
        </div>
       
      </div>
    </div>
  </div>
  <style>
    /* Increase the height and width of the buttons */
  </style>
         <div class="container mt-4">
          <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                <button type="button" class="btn btn-primary color-button" id="myButton" data-toggle="modal" data-target="#myModal1" >Master Entry</button>
                <button type="button" class="btn btn-success color-button" id="myButton" data-toggle="modal" data-target="#myModal2">Add Company</button>
                <button type="button" class="btn btn-danger color-button" id="myButton" data-toggle="modal" data-target="#myModal3">Add Department</button>
          </div>
          <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                <button type="button" class="btn btn-warning color-button" id="myButton" data-toggle="modal" data-target="#myModal4">Add Products</button>
                <button type="button" class="btn btn-info color-button" id="myButton" data-toggle="modal" data-target="#myModal5">Add Room Number</button>
                <button type="button" class="btn btn-secondary color-button" id="myButton" data-toggle="modal" data-target="#myModal6">Add Block</button>
         </div>
         </div><br><br><br><br><br><br><br><br><br><br><br><br>
    
        </div>
    </div>

    <style>
    
    .color-button {
        margin-right: 10px; 
        margin-top: 40px; 
        padding: 10px; 
        width: 300px; 
        height: 100px;
        border-radius:20px;
    }
    .modal{
        padding:100px;
    }

    </style>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
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
    <script>
        $("#zero_config").DataTable();
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $("#zero_config").DataTable();

            $("#insert_master").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_master");

                $.ajax({
                    url: "insertmaster.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        var response = JSON.parse(data);
                        if (response.status === 200) {
                            $("#table-body").load(" #table-body > *");
                            swal("Success!", "master Placed Successfully!", "success").then(() => {
                                $("#insert_master")[0].reset();
                            });
                        } else if (response.status === 201) {
                            swal("Error!", response.message, "error");
                            $("#insert_master")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        $(document).ready(function() {
            ///////////insert the block
            $("#zero_config").DataTable();

            $("#insert_block").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_block");

                $.ajax({
                    url: "insertblock.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        var response = JSON.parse(data);
                        if (response.status === 200) {
                            $("#table-bodyz").load(" #table-bodyz > *");
                            swal("Success!", "block stored Successfully!", "success").then(() => {
                                $("#insert_block")[0].reset();
                            });
                        } else if (response.status === 201) {
                            swal("Error!", response.message, "error");
                            $("#insert_block")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        //insert the room
        $(document).ready(function() {
            // Initialize DataTable
            $("#zero_config").DataTable();
            $("#insert_room").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_room");

                $.ajax({
                    url: "insertroom.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        var response = JSON.parse(data);
                        if (response.status === 200) {
                            $("#table-bodyzzz").load(" #table-bodyzzz > *"); ///////table body id
                            swal("Success!", "room saved Successfully!", "success").then(() => {
                                $("#insert_room")[0].reset();
                            });
                        } else if (response.status === 201) { // Changed to 201
                            swal("Error!", response.message, "error");
                            $("#insert_room")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        //delete room

        function delete_room(rid) {
            // Ask the user if they are sure they want to delete the product
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "delete_rooms.php",
                        type: "POST", // Change the request type to POST
                        data: {
                            rid: rid
                        }, // Pass the pid as a POST parameter
                        success: function(result) {
                            result = JSON.parse(result);
                            // Check the response status
                            if (result.status === 200) {
                                // Reload the page or update the product list
                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-bodyzzz").load(" #table-bodyzzz > *");
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                            swal({
                                title: "Error!",
                                text: "An error occurred while deleting the Room.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                } else {
                    swal("The Room is safe!");
                }
            });
        }

        //////
        //insert the company

        $(document).ready(function() {
            // Initialize DataTable
            $("#zero_config").DataTable();

            $("#insert_company").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_company");

                $.ajax({
                    url: "insertmaster.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data); // Log the data received from the server
                        var response = JSON.parse(data);
                        if (response.status === 200) { // Changed to 200
                            $("#table-bodys").load(" #table-bodys > *"); ///////table body id
                            swal("Success!", "Company Placed Successfully!", "success").then(() => {
                                $("#insert_company")[0].reset();
                            });
                        } else if (response.status === 201) { // Changed to 201
                            swal("Error!", response.message, "error");
                            $("#insert_company")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        ///delete the company
        function delete_company(cid) {
            // Ask the user if they are sure they want to delete the company
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this company!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // Send a POST request to delete the company using a separate PHP file
                    $.ajax({
                        url: "delete_company.php", // Use the correct URL for delete_company.php
                        type: "POST",
                        data: {
                            cid: cid
                        }, // Pass the cid as a POST parameter
                        success: function(result) {
                            result = JSON.parse(result);
                            // Check the response status
                            if (result.status === 200) {
                                // Reload the page or update the company list
                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-bodys").load(" #table-bodys > *");
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                            swal({
                                title: "Error!",
                                text: "An error occurred while deleting the company.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                } else {
                    swal("The company is safe!");
                }
            });
        }

        function delete_order(id) {
            // ask the user if they are sure they want to delete the order
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this order!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "#",
                            type: "DELETE",
                            data: JSON.stringify({
                                id: id
                            }),
                            success: function(result) {
                                result = JSON.parse(result)
                                // reload the page
                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-body").load(" #table-body > *");
                                });
                            },
                            error: function(xhr, resp, text) {
                                console.log(xhr, resp, text);
                                swal({
                                    title: "Error!",
                                    text: "An error occurred while deleting the item.",
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        });
                    } else {
                        swal("The order is safe!");
                    }
                });
        }
        ////delete the product


        function delete_product(pid) {
            // Ask the user if they are sure they want to delete the product
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "delete_product.php",
                        type: "POST", // Change the request type to POST
                        data: {
                            pid: pid
                        }, // Pass the pid as a POST parameter
                        success: function(result) {
                            result = JSON.parse(result);
                            // Check the response status
                            if (result.status === 200) {
                                // Reload the page or update the product list
                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-bodyss").load(" #table-bodyss > *");
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                            swal({
                                title: "Error!",
                                text: "An error occurred while deleting the product.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                } else {
                    swal("The product is safe!");
                }
            });
        }

        //////

        $(document).ready(function() {
            // Initialize DataTable
            $("#zero_config").DataTable();

            $("#insert_product").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_product");

                $.ajax({
                    url: "insertmaster.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data); // Log the data received from the server
                        var response = JSON.parse(data);
                        if (response.status === 200) {
                            $("#table-bodyss").load(" #table-bodyss > *"); //alter the table for the reloading puropse
                            swal("Success!", "product Placed Successfully!", "success").then(() => {
                                $("#insert_product")[0].reset();
                            });
                        } else if (response.status === 201) {
                            swal("Error!", response.message, "error");
                            $("#insert_product")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        ////////adding the new departement
        $(document).ready(function() {
            // Initialize DataTable
            $("#zero_config").DataTable();

            $("#insert_departement").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("action", "insert_departement");

                $.ajax({
                    url: "insertdepartement.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data); // Log the data received from the server
                        var response = JSON.parse(data);
                        if (response.status === 200) {
                            $("#table-bodyzz").load(" #table-bodyzz > *"); //alter the table for the reloading puropse
                            swal("Success!", " Departement Saved Successfully!", "success").then(() => {
                                $("#insert_departement")[0].reset();
                            });
                        } else if (response.status === 201) {
                            swal("Error!", response.message, "error");
                            $("#insert_departement")[0].reset();
                        }
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            });
        });
        ////deleteing the departement
        function delete_depart(did) {
            // Ask the user if they are sure they want to delete the product
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "delete_departement.php",
                        type: "POST",
                        data: {
                            did: did
                        },
                        success: function(result) {
                            result = JSON.parse(result);
                            console.log(result);
                            if (result.status === 200) {

                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-bodyzz").load(" #table-bodyzz > *");
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                            swal({
                                title: "Error!",
                                text: "An error occurred while deleting the product.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                } else {
                    swal("The block is safe!");
                }
            });
        }


        /////delete the block
        function delete_block(bid) {
            // Ask the user if they are sure they want to delete the product
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "delete_block.php",
                        type: "POST",
                        data: {
                            bid: bid
                        },
                        success: function(result) {
                            result = JSON.parse(result);
                            console.log(result);
                            if (result.status === 200) {

                                swal({
                                    title: "Deleted!",
                                    text: result.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
                                    $("#table-bodyz").load(" #table-bodyz > *");
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(xhr, resp, text) {
                            console.log(xhr, resp, text);
                            swal({
                                title: "Error!",
                                text: "An error occurred while deleting the product.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                } else {
                    swal("The block is safe!");
                }
            });
        }
    </script>
</body>

</html>
