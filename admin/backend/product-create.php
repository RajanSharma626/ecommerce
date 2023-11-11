<?php
include("includes/connection.php");
include("includes/function.php");

if (isset($_POST["addProduct"]) && $_POST["addProduct"] != '') {

    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['desc']);
    $category = htmlspecialchars($_POST['category']);
    $img = htmlspecialchars(serialize($_POST['img']));
    $stock = htmlspecialchars($_POST['stocks']);
    $price = htmlspecialchars($_POST['price']);
    $discountPrice = htmlspecialchars($_POST['title']);
    $color = htmlspecialchars(serialize($_POST['color']));
    $size = htmlspecialchars($_POST['size']);
    $shortDesc = htmlspecialchars($_POST['shortDesc']);
    $tags = htmlspecialchars($_POST['tags']);
    $publish ='';
    if($_POST['shortDesc'] == 'Public'){
        $publish = 1;
    }elseif($_POST['shortDesc'] == 'Private'){
        $publish = 0;
    }

    $add_sqlquery = mysqli_query($conn, "INSERT INTO `product`
    (`categories_id`, `name`, `mrp`, `price`, `qty`, `img`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `publish`) VALUES 
    ('$category','$title','$price','$discountPrice','$stock','$img','$shortDesc','$desc','$title','$shortDesc','$tags','$publish')");

    if($add_sqlquery){
        header("Location: product-list.html");
    }
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-body-image="none">
<head>

<?php include('includes/head.php') ?>
        <title>Create product | Trift Point</title>

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
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
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
                                <a href="index.html" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">Dashboard</span> <span class="badge badge-pill bg-danger-subtle text-danger " data-key="t-hot">Hot</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                    <i class="bi bi-box-seam"></i> <span data-key="t-products">Products</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProducts">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="product-list.html" class="nav-link" data-key="t-list-view">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="product-grid.html" class="nav-link" data-key="t-grid-view">Grid View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="product-overview.html" class="nav-link" data-key="t-overview">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="product-create.html" class="nav-link" data-key="t-create-product">Create Product</a>
                                        </li>
                                        <li class="nav-item">       
                                            <a href="categories.html" class="nav-link" data-key="t-categories">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sub-categories.html" class="nav-link" data-key="t-sub-categories">Sub Categories</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                    <i class="bi bi-cart4"></i> <span data-key="t-orders">Orders</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarOrders">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="orders-list-view.html" class="nav-link" data-key="t-list-view">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="orders-overview.html" class="nav-link" data-key="t-overview">Overview</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="calendar.html" class="nav-link menu-link"><i class="bi bi-calendar-week"></i> <span data-key="t-calendar">Calendar</span> </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarSellers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSellers">
                                    <i class="bi bi-binoculars"></i> <span data-key="t-sellers">Sellers</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSellers">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="sellers-list-view.html" class="nav-link" data-key="t-list-view">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sellers-grid-view.html" class="nav-link" data-key="t-grid-view">Grid View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="seller-overview.html" class="nav-link" data-key="t-overview">Overview</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarInvoice" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoice">
                                    <i class="bi bi-archive"></i> <span data-key="t-invoice">Invoice</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoice">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="invoices-list.html" class="nav-link" data-key="t-list-view">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="invoices-details.html" class="nav-link" data-key="t-overview">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="invoices-create.html" class="nav-link" data-key="t-create-invoice">Create Invoice</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="users-list.html" class="nav-link menu-link"> <i class="bi bi-person-bounding-box"></i> <span data-key="t-users-list">Users List</span> </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarShipping" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarShipping">
                                    <i class="bi bi-truck"></i> <span data-key="t-shipping">Shipping</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarShipping">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="shipping-list.html" class="nav-link" data-key="t-shipping-list">Shipping List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="shipments.html" class="nav-link" data-key="t-shipments">Shipments</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="coupons.html" class="nav-link menu-link"> <i class="bi bi-tag"></i> <span data-key="t-coupons">Coupons</span> </a>
                            </li>   
                            <li class="nav-item">
                                <a href="reviews-ratings.html" class="nav-link menu-link"><i class="bi bi-star"></i> <span data-key="t-reviews-ratings">Reviews & Ratings</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="brands.html" class="nav-link menu-link"><i class="bi bi-shop"></i> <span data-key="t-brands">Brands</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="statistics.html" class="nav-link menu-link"><i class="bi bi-pie-chart"></i> <span data-key="t-statistics">Statistics</span> </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarLocalization" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLocalization">
                                    <i class="bi bi-coin"></i> <span data-key="t-localization">Localization</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLocalization">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="transactions.html" class="nav-link" data-key="t-transactions">Transactions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="currency-rates.html" class="nav-link" data-key="t-currency-rates">Currency Rates</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarAccounts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccounts">
                                    <i class="bi bi-person-circle"></i> <span data-key="t-accounts">Accounts</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccounts">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="account.html" class="nav-link" data-key="t-my-account">My Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="account-settings.html" class="nav-link" data-key="t-settings">Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signup-basic.html" class="nav-link" data-key="t-sign-up">Sign Up</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-basic.html" class="nav-link" data-key="t-sign-in">Sign In</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-basic.html" class="nav-link" data-key="t-passowrd-reset">Password Reset</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-change-basic.html" class="nav-link" data-key="t-create-password">Password Create</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-success-msg-basic.html" class="nav-link" data-key="t-success-message">Success Message</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-twostep-basic.html" class="nav-link" data-key="t-two-step-verify">Two Step Verify</a>
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
                                            <a href="coming-soon.html" class="nav-link" data-key="t-coming-soon">Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="https://themesbrand.com/toner/html/components/index.html" target="_blank">
                                    <i class="bi bi-layers"></i> <span data-key="t-components">Components</span> <span class="badge badge-pill bg-secondary" data-key="t-v1.0">v1.0</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                                    <i class="bi bi-share"></i> <span data-key="t-multi-level">Multi Level</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                                                1.2
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarAccount">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level 2.2
                                                        </a>
                                                        <div class="collapse menu-dropdown" id="sidebarCrm">
                                                            <ul class="nav nav-sm flex-column">
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2
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
                                    <h4 class="mb-sm-0">Create product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                            <li class="breadcrumb-item active">Create product</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <form autocomplete="off" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                            <i class="bi bi-box-seam"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-1">Product Information</h5>
                                                    <p class="text-muted mb-0">Fill all information below.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Product title</label>
                                                <input type="text" class="form-control d-none" id="product-id-input">
                                                <input type="text" class="form-control" id="product-title-input" name="title" value="" placeholder="Enter product title" required>
                                                <div class="invalid-feedback">Please enter a product title.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Product description</label>
                                                <textarea name="desc" id="ckeditor-classic" >
                                                    
                                                </textarea>                                          
                                            </div>

                                            <div>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Product category</label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <select class="form-select" id="choices-category-input" name="category">
                                                        <option value="">Select product category</option>
                                                        <?php
                                                        $cat_sql = "SELECT * FROM `categories`";
                                                        $cat_result = mysqli_query($conn, $cat_sql);
                                                        while ($row = mysqli_fetch_array($cat_result)) {
                                                            ?>
                                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['categories'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="error-msg mt-1">Please select a product category.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                            <i class="bi bi-images"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-1">Product Gallery</h5>
                                                    <p class="text-muted mb-0">Add product gallery images.</p>
                                                </div>

                                                <div class="flex-grow-1 text-end">
                                                    <button type="button" class="btn btn-primary" onclick="addImageInput()">Add Images</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="imageInputsContainer">
                                        <label class="form-label">Image</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="img[]" required>
                                        </div>
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                            <i class="bi bi-list-ul"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-1">General Information</h5>
                                                    <p class="text-muted mb-0">Fill all information below.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- <div class="row ">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-name-input">Manufacturer Name</label>
                                                        <input type="text" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-brand-input">Manufacturer Brand</label>
                                                        <input type="text" class="form-control" id="manufacturer-brand-input" placeholder="Enter manufacturer brand">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="stocks-input">Stocks</label>
                                                        <input type="text" class="form-control" id="stocks-input" name="stocks" placeholder="Stocks" required>
                                                        <div class="invalid-feedback">Please enter a product stocks.</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-price-input">Price</label>
                                                        <div class="input-group has-validation mb-3">
                                                            <span class="input-group-text" id="product-price-addon">$</span>
                                                            <input type="text" class="form-control" id="product-price-input" name="price"  placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                            <div class="invalid-feedback">Please enter a product price.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-discount-input">Discount Price</label>
                                                        <div class="input-group has-validation mb-3">
                                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                                            <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon" required>
                                                            <div class="invalid-feedback">Please enter a product discount.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="orders-input">Orders</label>
                                                        <input type="text" class="form-control" id="orders-input" placeholder="Orders" required>
                                                        <div class="invalid-feedback">Please enter a product orders.</div>
                                                    </div>
                                                </div> -->
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label">Colors</label>
                                                        <ul class="clothe-colors list-unstyled hstack gap-2 mb-0 flex-wrap">
                                                            <li>
                                                                <input type="checkbox" value="success" id="color-1" name="color[]">
                                                                <label class="avatar-xs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-1"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="info" id="color-2" name="color[]">
                                                                <label class="avatar-xs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-2"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="warning" id="color-3" name="color[]">
                                                                <label class="avatar-xs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-3"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="danger" id="color-4" name="color[]">
                                                                <label class="avatar-xs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-4"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="primary" id="color-5" name="color[]">
                                                                <label class="avatar-xs btn btn-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-5"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="secondary" id="color-6" name="color[]">
                                                                <label class="avatar-xs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-6"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="dark" id="color-7" name="color[]">
                                                                <label class="avatar-xs btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-7"></label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="light" id="color-8" name="color[]">
                                                                <label class="avatar-xs btn btn-light p-0 d-flex align-items-center justify-content-center rounded-circle" for="color-8"></label>
                                                            </li>
                                                        </ul>
                                                        <div class="error-msg mt-1">Please select a product colors.</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3 mt-lg-0">
                                                        <label class="form-label">Sizes</label>
                                                        <ul class="clothe-size list-unstyled hstack gap-2 mb-0 flex-wrap" id="size-filter">
                                                            <li>
                                                                <input type="checkbox" value="xs" id="sizeXs" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="sizeXs">XS</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="s" id="sizeS" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="sizeS">S</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="m" id="sizeM" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="sizeM">M</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="l" id="sizeL" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="sizeL">L</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="xl" id="sizeXl" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="sizeXl">XL</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="2xl" id="size2xl" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="size2xl">2XL</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="3xl" id="size3xl" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="size3xl">3XL</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="40" id="size40" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="size40">40</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="41" id="size41" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="size41">41</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="42" id="size42" name="size[]">
                                                                <label class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle" for="size42">42</label>
                                                            </li>
                                                        </ul>
                                                        <div class="error-msg mt-1">Please select a product sizes.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                    <div class="text-end mb-3">
                                        <button type="submit" name="addProduct" class="btn btn-success w-sm">Submit</button>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Publish</h5>
                                        </div>
                                        <div class="card-body">

                                            <div>
                                                <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                                <select class="form-select" id="choices-publish-visibility-input" name="publish" data-choices data-choices-search-false>
                                                    <option value="Public" selected>Public</option>
                                                    <option value="Private">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Product Short Description</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted mb-2">Add short description for product</p>
                                            <textarea class="form-control" name="shortDesc" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Product Tags</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="hstack gap-3 align-items-start">
                                                <div class="flex-grow-1">
                                                    <input class="form-control" name="tags" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text" value="Cotton">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                    <!-- End Page-content -->

                    <?php include('includes/footer.php') ?>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->
        </div>
        

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

            <!-- ckeditor -->
            <script src="../assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

            <!-- dropzone js -->
            <script src="../assets/libs/dropzone/dropzone-min.js"></script>
            <!-- create-product -->
            <script src="../assets/js/backend/create-product.init.js"></script>

            <!-- App js -->
            <script src="../assets/js/app.js"></script>
    </body>

</html>