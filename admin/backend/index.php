<?php include("includes/connection.php");?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-body-image="none">

<head>
    <?php include('includes/head.php') ?>
    <meta charset="utf-8">
    <title>Dashboard | Trift Point</title>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Header Section -->
        <?php include("includes/top.php"); ?>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-4"></i>
                            </div>
                            <div class="mt-4 fs-15">
                                <h4 class="mb-1">Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <?php include('includes/sidebar.php') ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- <div class="row">
                        <div class="col-xxl-12 col-lg-6 order-first"> -->
                    <div class="row row-cols-xxl-4 row-cols-2">
                        <div class="col">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="vr rounded bg-secondary opacity-50" style="width: 4px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">
                                                Total Earnings</p>
                                            <h4 class="fs-22 fw-semibold mb-3">$<span class="counter-value"
                                                    data-target="98851.35">0</span></h4>
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="badge bg-success-subtle text-success  mb-0">
                                                    <i class="ri-arrow-right-up-line align-bottom"></i> +18.30 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-secondary-subtle text-secondary rounded fs-3">
                                                <i class="ph-wallet"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="vr rounded bg-info opacity-50" style="width: 4px;"></div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">
                                                Orders</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="65802">0</span> </h4>
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="badge bg-danger-subtle text-danger  mb-0">
                                                    <i class="ri-arrow-right-down-line align-bottom"></i> -2.74
                                                    %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded fs-3">
                                                <i class="ph-storefront"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="vr rounded bg-warning opacity-50" style="width: 4px;"></div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">
                                                Customers</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="79958">0</span> </h4>
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="badge bg-success-subtle text-success  mb-0">
                                                    <i class="ri-arrow-right-up-line align-bottom"></i> +29.08 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle text-warning rounded fs-3">
                                                <i class="ph-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="vr rounded bg-primary opacity-50" style="width: 4px;"></div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">
                                                Products</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="36758">0</span> </h4>
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="badge bg-success-subtle text-success  mb-0">
                                                    <i class="ri-arrow-right-up-line align-bottom"></i> +1.67 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle text-primary rounded fs-3">
                                                <i class="ph-sketch-logo"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    <!-- </div> -->
                    <!-- </div> -->

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="fw-semibold text-uppercase fs-12">Sort by:
                                                </span><span class="text-muted">Today<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last 7 Days</a>
                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                <a class="dropdown-item" href="#">This Month</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-centered align-middle table-nowrap mb-0"
                                            id="customerTable">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col" data-sort="orderId">Order ID</th>
                                                    <th scope="col" data-sort="product_name">Product Name</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Delivery Date</th>
                                                    <th scope="col">Vendor</th>
                                                    <th scope="col">Ratings</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010331</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Macbook
                                                            Pro</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-2.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Terry White</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $658.00
                                                    </td>
                                                    <td>17 Dec, 2022</td>
                                                    <td>26 Jan, 2023</td>
                                                    <td>Brazil</td>
                                                    <td>4.5 <i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span class="badge bg-info-subtle text-info ">New</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010332</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Borosil Paper
                                                            Cup</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-4.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Daniel Gonzalez</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $345.00
                                                    </td>
                                                    <td>02 Jan, 2023</td>
                                                    <td>26 Jan, 2023</td>
                                                    <td>Namibia</td>
                                                    <td>4.8<i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger ">Out Of
                                                            Delivery</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010333</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Stillbird
                                                            Helmet</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-3.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Stephen Bird</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $80.00
                                                    </td>
                                                    <td>20 Dec, 2022</td>
                                                    <td>29 Dec, 2022</td>
                                                    <td>USA</td>
                                                    <td>4.3 <i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-success-subtle text-success ">Delivered</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010334</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Bentwood
                                                            Chair</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-10.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Ashley Silva</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $349.99
                                                    </td>
                                                    <td>31 Nov, 2022</td>
                                                    <td>13 Dec, 2022</td>
                                                    <td>Argentina</td>
                                                    <td>3.9 <i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-warning-subtle text-warning ">Pending</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010335</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Apple
                                                            Headphone</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-9.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Scott Wilson</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $264.37
                                                    </td>
                                                    <td>23 Nov, 2022</td>
                                                    <td>03 Dec, 2022</td>
                                                    <td>Jersey</td>
                                                    <td>4.7 <i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-primary-subtle text-primary ">Shipping</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="orders-overview.html"
                                                            class="fw-medium link-primary">#TB010336</a>
                                                    </td>
                                                    <td>
                                                        <a href="product-overview.html" class="text-reset">Smart Watch
                                                            for Man's</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/users/avatar-8.jpg" alt=""
                                                                    class="avatar-xxs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">Heather Jimenez</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $741.98
                                                    </td>
                                                    <td>02 Nov, 2022</td>
                                                    <td>12 Nov, 2022</td>
                                                    <td>Spain</td>
                                                    <td>4.4 <i class="bi bi-star-half ms-1 text-warning fs-12"></i></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-success-subtle text-success ">Delivered</span>
                                                    </td>
                                                </tr><!-- end tr -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-muted">
                                                Showing <span class="fw-semibold">6</span> of <span
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
                        </div>
                    </div>

                    <div class="row widget-responsive-fullscreen">
                        <div class="col-xxl-9">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Stock Report</h4>
                                    <div class="flex-shrink-0">
                                        <a href="statistics.html" class="btn btn-soft-info btn-sm">
                                            <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                        </a>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table
                                            class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">Product ID</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Updated Date</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Stock Status</th>
                                                    <th scope="col">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#00541</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-1.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">Rockerz Ear Bluetooth
                                                                    Headphones</a></div>
                                                        </div>
                                                    </td>
                                                    <td>16 Aug, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$658.00</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success ">In
                                                            Stock</span>
                                                    </td>
                                                    <td>15 PCS</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#07484</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-5.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">United Colors Of Benetton</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>05 Sep, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$145.00</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning-subtle text-warning ">Low
                                                            Stock</span>
                                                    </td>
                                                    <td>05 PCS</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#01641</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-4.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">Striped Baseball Cap</a></div>
                                                        </div>
                                                    </td>
                                                    <td>28 Sep, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$215.00</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger ">Out of
                                                            Stock</span>
                                                    </td>
                                                    <td>0 PCS</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#00065</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-3.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">350 ml Glass Grocery
                                                                    Container</a></div>
                                                        </div>
                                                    </td>
                                                    <td>02 Oct, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$79.99</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success ">In
                                                            Stock</span>
                                                    </td>
                                                    <td>37 PCS</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#00156</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-2.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">One Seater Sofa</a></div>
                                                        </div>
                                                    </td>
                                                    <td>11 Oct, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$264.99</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success ">In
                                                            Stock</span>
                                                    </td>
                                                    <td>23 PCS</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td>
                                                        <a href="product-overview.html"
                                                            class="fw-medium link-primary">#09102</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="../assets/images/products/img-8.png" alt=""
                                                                    class="avatar-xs rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1"><a href="product-overview.html"
                                                                    class="text-reset">Men's Running Shoes Active
                                                                    Grip</a></div>
                                                        </div>
                                                    </td>
                                                    <td>19 Nov, 2022</td>
                                                    <td>
                                                        <span class="text-secondary">$264.99</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning-subtle text-warning ">Low
                                                            Stock</span>
                                                    </td>
                                                    <td>23 PCS</td>
                                                </tr><!-- end tr -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                </div>
                            </div> <!-- .card-->
                        </div> <!-- .col-->
                        <div class="col-xxl-12 col-lg-12">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">New Customers</h4>
                                    <a href="users-list.html" class="flex-shrink-0">View All <i
                                            class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                </div><!-- end card header -->

                                <div data-simplebar style="max-height: 445px;">
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-2.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Tommy Carey</h6>
                                                <p class="fs-13 text-muted mb-0">02 Jan, 2023</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:careytommy@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-1.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Cassius Brock</h6>
                                                <p class="fs-13 text-muted mb-0">24 Nov, 2022</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:brock@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-3.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Gabrielle Holden</h6>
                                                <p class="fs-13 text-muted mb-0">17 Nav, 2022</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:gabrielle@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-5.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Alfred Hurst</h6>
                                                <p class="fs-13 text-muted mb-0">18 Dec, 2021</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:" class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-6.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Kristina Hooper</h6>
                                                <p class="fs-13 text-muted mb-0">04 Oct, 2022</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:alfredH@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-8.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Jacques Leon</h6>
                                                <p class="fs-13 text-muted mb-0">02 Jan, 2023</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:jacques@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-7.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Edward Rogers</h6>
                                                <p class="fs-13 mb-0">25 Nov, 2022</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:edwardro@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom border-bottom-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/users/avatar-10.jpg" alt=""
                                                    class="rounded dash-avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Alina Holland</h6>
                                                <p class="fs-13 mb-0">11 Jan, 2023</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="mailto:hollandalina@toner.com"
                                                    class="btn btn-icon btn-sm btn-soft-danger"><i
                                                        class="ph-envelope"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .card-->
                        </div> <!-- .col-->
                    </div> <!-- end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include('includes/footer.php') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


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
    <?php include('includes/foot.php') ?>

    <script>
        //  Line chart datalabel
        var linechartDatalabelColors = getChartColorsArray("line_chart_datalabel");
        if (linechartDatalabelColors) {
            var options = {
                chart: {
                    height: 405,
                    zoom: {
                        enabled: true
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: linechartDatalabelColors,
                markers: {
                    size: 0,
                    colors: "#ffffff",
                    strokeColors: linechartDatalabelColors,
                    strokeWidth: 1,
                    strokeOpacity: 0.9,
                    fillOpacity: 1,
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: [2, 2, 2],
                    curve: 'smooth'
                },
                series: [{
                    name: "Orders",
                    type: 'line',
                    data: [180, 274, 346, 290, 370, 420, 490, 542, 510, 580, 636, 745]
                },
                {
                    name: "Refunds",
                    type: 'area',
                    data: [100, 154, 302, 411, 300, 284, 273, 232, 187, 174, 152, 122]
                },
                {
                    name: "Earnings",
                    type: 'line',
                    data: [260, 360, 320, 345, 436, 527, 641, 715, 832, 794, 865, 933]
                }
                ],
                fill: {
                    type: ['solid', 'gradient', 'solid'],
                    gradient: {
                        shadeIntensity: 1,
                        type: "vertical",
                        inverseColors: false,
                        opacityFrom: 0.3,
                        opacityTo: 0.0,
                        stops: [20, 80, 100, 100]
                    },
                },
                grid: {
                    row: {
                        colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.2
                    },
                    borderColor: '#f1f1f1'
                },
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            toolbar: {
                                show: false
                            }
                        },
                        legend: {
                            show: false
                        },
                    }
                }]
            }

            var chart = new ApexCharts(
                document.querySelector("#line_chart_datalabel"),
                options
            );
            chart.render();
        }

        // world map with line & markers
        var vectorMapWorldLineColors = getChartColorsArray("world-map-line-markers");
        if (vectorMapWorldLineColors)
            var worldlinemap = new jsVectorMap({
                map: "world_merc",
                selector: "#world-map-line-markers",
                zoomOnScroll: false,
                zoomButtons: false,
                markers: [{
                    name: "Greenland",
                    coords: [71.7069, 42.6043],
                    style: {
                        image: "../assets/images/flags/gl.svg",
                    }
                },
                {
                    name: "Canada",
                    coords: [56.1304, -106.3468],
                    style: {
                        image: "../assets/images/flags/ca.svg",
                    }
                },
                {
                    name: "Brazil",
                    coords: [-14.2350, -51.9253],
                    style: {
                        image: "../assets/images/flags/br.svg",
                    }
                },
                {
                    name: "Serbia",
                    coords: [44.0165, 21.0059],
                    style: {
                        image: "../assets/images/flags/rs.svg",
                    }
                },
                {
                    name: "Russia",
                    coords: [61, 105],
                    style: {
                        image: "../assets/images/flags/ru.svg",
                    }
                },
                {
                    name: "US",
                    coords: [37.0902, -95.7129],
                    style: {
                        image: "../assets/images/flags/us.svg",
                    }
                },
                {
                    name: "Australia",
                    coords: [25.2744, 133.7751],
                    style: {
                        image: "../assets/images/flags/au.svg",
                    }
                },
                ],
                lines: [{
                    from: "Canada",
                    to: "Serbia",
                },
                {
                    from: "Russia",
                    to: "Serbia"
                },
                {
                    from: "Greenland",
                    to: "Serbia"
                },
                {
                    from: "Brazil",
                    to: "Serbia"
                },
                {
                    from: "US",
                    to: "Serbia"
                },
                {
                    from: "Australia",
                    to: "Serbia"
                },
                ],
                regionStyle: {
                    initial: {
                        stroke: "#9599ad",
                        strokeWidth: 0.25,
                        fill: vectorMapWorldLineColors,
                        fillOpacity: 1,
                    },
                },
                labels: {
                    markers: {
                        render(marker, index) {
                            return marker.name || marker.labelName || 'Not available'
                        }
                    }
                },
                lineStyle: {
                    animation: true,
                    strokeDasharray: "6 3 6",
                },
            });


        // Multi-Radial Bar
        var chartRadialbarMultipleColors = getChartColorsArray("multiple_radialbar");
        if (chartRadialbarMultipleColors) {
            var options = {
                series: [85, 69, 45, 78],
                chart: {
                    height: 300,
                    type: 'radialBar',
                },
                sparkline: {
                    enabled: true
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Sales',
                                formatter: function (w) {
                                    return 2922
                                }
                            }
                        }
                    }
                },
                labels: ['Fashion', 'Electronics', 'Groceries', 'Others'],
                colors: chartRadialbarMultipleColors,
                legend: {
                    show: false,
                    fontSize: '16px',
                    position: 'bottom',
                    labels: {
                        useSeriesColors: true,
                    },
                    markers: {
                        size: 0
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#multiple_radialbar"), options);
            chart.render();
        }


        //  Spline Area Charts
        var areachartSplineColors = getChartColorsArray("area_chart_spline");
        if (areachartSplineColors) {
            var options = {
                series: [{
                    name: 'This Month',
                    data: [49, 54, 48, 54, 67, 88, 96]
                }, {
                    name: 'Last Month',
                    data: [57, 66, 74, 63, 55, 70, 85]
                }],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                fill: {
                    type: ['gradient', 'gradient'],
                    gradient: {
                        shadeIntensity: 1,
                        type: "vertical",
                        inverseColors: false,
                        opacityFrom: 0.3,
                        opacityTo: 0.0,
                        stops: [50, 70, 100, 100]
                    },
                },
                markers: {
                    size: 4,
                    colors: "#ffffff",
                    strokeColors: areachartSplineColors,
                    strokeWidth: 1,
                    strokeOpacity: 0.9,
                    fillOpacity: 1,
                    hover: {
                        size: 6,
                    }
                },
                grid: {
                    show: false,
                    padding: {
                        top: -35,
                        right: 0,
                        bottom: 0,
                        left: -6,
                    },
                },
                legend: {
                    show: false,
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [2, 2],
                    curve: 'smooth'
                },
                colors: areachartSplineColors,
                xaxis: {
                    labels: {
                        show: false,
                    }
                },
                yaxis: {
                    labels: {
                        show: false,
                    }
                },
            };

            var chart = new ApexCharts(document.querySelector("#area_chart_spline"), options);
            chart.render();
        }

    </script>
</body>


<!-- Mirrored from themesbrand.com/toner/html/backend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 16:32:50 GMT -->

</html>