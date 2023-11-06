<?php
include("includes/connection.php");
include("includes/function.php");

// ================== Update Status and Delete =============
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($conn, $_GET['operation']);
        $id = get_safe_value($conn, $_GET['id']);

        if ($operation == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }

        $update_status = "UPDATE `categories` SET `status` = '$status' WHERE `categories`.`id` = '$id'";
        $update = mysqli_query($conn, "$update_status");
        if ($update) {
            header("Location: categories.php");
        }
    }

    if ($type == 'delete') {
        $id = get_safe_value($conn, $_GET['id']);
        $delete = "DELETE FROM `categories` WHERE `id`='$id'";
        $res = mysqli_query($conn, "$delete");
        if ($res) {
            header("Location: categories.php");
        }
    }
}

// =============== Add Category ======================

if (isset($_POST['add']) && $_POST['add'] != '') {
    $category = $_POST['categoryTitle'];
    $slug = $_POST['slug'];

    $addCat_sql = "INSERT INTO `categories`(`categories`, `slug`) VALUES ('$category','$slug')";

    $addcategory = mysqli_query($conn, $addCat_sql);

    if ($addcategory) {
        header("Location: categories.php");
    }
}

//================ Update Categories ===================
if (isset($_POST["update"]) && $_POST["update"] !=''){
    $id = $_POST['updateID'];
    $updateTitle = $_POST['updateTitle'];
    $updateSlug = $_POST['updateSlug'];
    $updateCat_sql = "UPDATE `categories` SET `categories`='$updateTitle',`slug`='$updateSlug' WHERE `id` = '$id'";
    $update = mysqli_query($conn, $updateCat_sql);
    if ($update) {
        header("Location: categories.php");
    }
}

//================ Fetch Categories ===================
$sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
$query = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-body-image="none">

<head>

    <?php include('includes/head.php') ?>
    <meta charset="utf-8">
    <title>Categories | Tift Point</title>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include("includes/top.php"); ?>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="" height="26">
                    </span>
                </a>
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                                    data-key="t-dashboard">Dashboard</span> <span
                                    class="badge badge-pill bg-danger-subtle text-danger "
                                    data-key="t-hot">Hot</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                <i class="bi bi-box-seam"></i> <span data-key="t-products">Products</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProducts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="product-list.html" class="nav-link" data-key="t-list-view">List
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product-grid.html" class="nav-link" data-key="t-grid-view">Grid
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product-overview.html" class="nav-link"
                                            data-key="t-overview">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product-create.html" class="nav-link"
                                            data-key="t-create-product">Create Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="categories.html" class="nav-link"
                                            data-key="t-categories">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="sub-categories.html" class="nav-link" data-key="t-sub-categories">Sub
                                            Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarOrders">
                                <i class="bi bi-cart4"></i> <span data-key="t-orders">Orders</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarOrders">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="orders-list-view.html" class="nav-link" data-key="t-list-view">List
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="orders-overview.html" class="nav-link"
                                            data-key="t-overview">Overview</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="calendar.html" class="nav-link menu-link"><i class="bi bi-calendar-week"></i> <span
                                    data-key="t-calendar">Calendar</span> </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarSellers" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarSellers">
                                <i class="bi bi-binoculars"></i> <span data-key="t-sellers">Sellers</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarSellers">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="sellers-list-view.html" class="nav-link" data-key="t-list-view">List
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="sellers-grid-view.html" class="nav-link" data-key="t-grid-view">Grid
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="seller-overview.html" class="nav-link"
                                            data-key="t-overview">Overview</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarInvoice" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarInvoice">
                                <i class="bi bi-archive"></i> <span data-key="t-invoice">Invoice</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarInvoice">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="invoices-list.html" class="nav-link" data-key="t-list-view">List
                                            View</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="invoices-details.html" class="nav-link"
                                            data-key="t-overview">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="invoices-create.html" class="nav-link"
                                            data-key="t-create-invoice">Create Invoice</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="users-list.html" class="nav-link menu-link"> <i
                                    class="bi bi-person-bounding-box"></i> <span data-key="t-users-list">Users
                                    List</span> </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarShipping" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarShipping">
                                <i class="bi bi-truck"></i> <span data-key="t-shipping">Shipping</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarShipping">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="shipping-list.html" class="nav-link"
                                            data-key="t-shipping-list">Shipping List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="shipments.html" class="nav-link" data-key="t-shipments">Shipments</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="coupons.html" class="nav-link menu-link"> <i class="bi bi-tag"></i> <span
                                    data-key="t-coupons">Coupons</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="reviews-ratings.html" class="nav-link menu-link"><i class="bi bi-star"></i> <span
                                    data-key="t-reviews-ratings">Reviews & Ratings</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="brands.html" class="nav-link menu-link"><i class="bi bi-shop"></i> <span
                                    data-key="t-brands">Brands</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="statistics.html" class="nav-link menu-link"><i class="bi bi-pie-chart"></i> <span
                                    data-key="t-statistics">Statistics</span> </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLocalization" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarLocalization">
                                <i class="bi bi-coin"></i> <span data-key="t-localization">Localization</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLocalization">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="transactions.html" class="nav-link"
                                            data-key="t-transactions">Transactions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="currency-rates.html" class="nav-link"
                                            data-key="t-currency-rates">Currency Rates</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAccounts" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarAccounts">
                                <i class="bi bi-person-circle"></i> <span data-key="t-accounts">Accounts</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAccounts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="account.html" class="nav-link" data-key="t-my-account">My Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="account-settings.html" class="nav-link"
                                            data-key="t-settings">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-signup-basic.html" class="nav-link" data-key="t-sign-up">Sign
                                            Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-signin-basic.html" class="nav-link" data-key="t-sign-in">Sign
                                            In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-pass-reset-basic.html" class="nav-link"
                                            data-key="t-passowrd-reset">Password Reset</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-pass-change-basic.html" class="nav-link"
                                            data-key="t-create-password">Password Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-success-msg-basic.html" class="nav-link"
                                            data-key="t-success-message">Success Message</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-twostep-basic.html" class="nav-link"
                                            data-key="t-two-step-verify">Two Step Verify</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-logout-basic.html" class="nav-link" data-key="t-logout">Logout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-404.html" class="nav-link" data-key="t-error-404">Error 404</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-500.html" class="nav-link" data-key="t-error-500">Error 500</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="coming-soon.html" class="nav-link" data-key="t-coming-soon">Coming
                                            Soon</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link"
                                href="https://themesbrand.com/toner/html/components/index.html" target="_blank">
                                <i class="bi bi-layers"></i> <span data-key="t-components">Components</span> <span
                                    class="badge badge-pill bg-secondary" data-key="t-v1.0">v1.0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                                <i class="bi bi-share"></i> <span data-key="t-multi-level">Multi Level</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarAccount"
                                            data-key="t-level-1.2"> Level
                                            1.2
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarAccount">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"
                                                        role="button" aria-expanded="false" aria-controls="sidebarCrm"
                                                        data-key="t-level-2.2"> Level 2.2
                                                    </a>
                                                    <div class="collapse menu-dropdown" id="sidebarCrm">
                                                        <ul class="nav nav-sm flex-column">
                                                            <li class="nav-item">
                                                                <a href="#" class="nav-link" data-key="t-level-3.1">
                                                                    Level 3.1
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#" class="nav-link" data-key="t-level-3.2">
                                                                    Level 3.2
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Categories</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                        <li class="breadcrumb-item active">Categories</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="text-end py-3">
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addcat">Add Category</button>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-xxl-9">
                            <div class="card">
                                <div class="card-body">
                                    <div id="product-sub-categories" class="table-card"></div>

                                    <div class="table-responsive table-card">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sno</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sno = 1;
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo $sno ?>
                                                        </th>
                                                        <td>
                                                            <?php echo $row['categories'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['slug'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 1) {
                                                                echo '<a href="?type=status&operation=deactive&id=' . $row['id'] . '" class="badge bg-success-subtle text-success ">Active</a>';
                                                            } else {
                                                                echo '<a href="?type=status&operation=active&id=' . $row['id'] . '" class="badge bg-danger-subtle text-danger">Deactive</a>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <ul class="hstack gap-2 list-unstyled mb-0">
                                                                <li>
                                                                    <a href=""
                                                                        class="badge bg-success-subtle text-success editcat editcat-button"
                                                                        data-bs-toggle="modal" data-bs-target="#updatecat"
                                                                        dataid="<?php echo $row['id'] ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="?type=delete&id=<?php echo $row['id'] ?>"
                                                                        class="badge bg-danger-subtle text-danger">Delete</a>

                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php $sno++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <div class="flex-shrink-0">
                                            <div class="text-muted">
                                                Showing <span class="fw-semibold">12</span> of <span
                                                    class="fw-semibold">25</span> Results
                                            </div>
                                        </div>
                                        <ul class="pagination pagination-separated pagination-sm mb-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">←</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">→</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include('includes/footer.php') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- AddCategoriesModal -->
    <div id="addcat" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Categories</h5><button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="card-body">
                        <form method="post" class="createCategory-form">
                            <div class="row">
                                <div class="col-xxl-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="categoryTitle" class="form-label">Category Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="categoryTitle"
                                            placeholder="Enter title" name="categoryTitle" required>
                                        <div class="invalid-feedback">Please enter a category title.</div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="slugInput" class="form-label">Slug <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="slugInput" name="slug"
                                            placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="text-end">
                                        <button type="button" class="btn w-sm btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success" name="add" value="Add Category">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- UpdateCategoriesModal -->
    <div id="updatecat" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Updated Categories</h5><button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="card-body">
                        <form method="post" class="createCategory-form">
                            <div class="row">
                                <div class="col-xxl-12 col-lg-6">
                                <input type="text" class="form-control" id="updateID"
                                            placeholder="Enter title" name="updateID" hidden>
                                    <div class="mb-3">
                                        <label for="categoryTitle" class="form-label">Category Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="updateTitle"
                                            placeholder="Enter title" name="updateTitle" required>
                                        <div class="invalid-feedback">Please enter a category title.</div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="slugInput" class="form-label">Slug <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="updateSlug" name="updateSlug"
                                            placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="text-end">
                                        <button type="button" class="btn w-sm btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success" name="update" value="Update Category">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-info btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.js"></script><!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all elements with the class 'editcat-button'
            const editButtons = document.querySelectorAll('.editcat-button');

            // Modal input fields
            const updateTitleInput = document.getElementById('updateTitle');
            const updateSlugInput = document.getElementById('updateSlug');
            const updateID = document.getElementById('updateID');

            // Add a click event listener to each button
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Get the 'dataid' attribute value from the clicked button
                    const dataId = this.getAttribute('dataid');
                    console.log(dataId);
                    // Use the Fetch API to make an AJAX request
                    fetch(`backend.php?dataId=${dataId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate modal input fields with the fetched data
                            updateID.value = data.id;
                            updateTitle.value = data.categories;
                            updateSlug.value = data.slug;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });

    </script>

</body>


</html>