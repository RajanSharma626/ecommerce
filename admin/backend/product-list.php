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

        $update_status = "UPDATE `product` SET `publish` = '$status' WHERE `product`.`id` = '$id'";
        $update = mysqli_query($conn, "$update_status");
        if ($update) {
            header("Location: product-list.php");
        }
    }

    if ($type == 'delete') {
        $id = get_safe_value($conn, $_GET['id']);
        $delete = "DELETE FROM `product` WHERE `id`='$id'";
        $res = mysqli_query($conn, "$delete");
        if ($res) {
            header("Location: product-list.php");
        }
    }
}

//================ Fetch Categories ===================
$sql = "SELECT * FROM `product` ORDER BY `id` DESC";
$query = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-body-image="none">

<head>

    <?php include('includes/head.php') ?>
    <title>Product List | Trift Point</title>

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include("includes/top.php"); ?>
        <!-- ========== App Menu ========== -->
        <?php include("includes/sidebar.php") ?>
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
                                <h4 class="mb-sm-0">Product List</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                        <li class="breadcrumb-item active">Product List</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- end col -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="row g-4 mb-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="product-create.php" class="btn btn-success" id="addproduct-btn"><i
                                                class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control" autocomplete="off"
                                                id="searchProductList" placeholder="Search Products...">
                                            <i class="bi bi-search  search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="product-list" class="gridjs-border-none mb-4">
                                <table class="table">
                                    <thead>
                                        <th>
                                            Sno.
                                        </th>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                            Stock
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Publish
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sno = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $sno; ?>
                                                </td>
                                                <td>#564</td>
                                                <td>
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-2">
                                                            <img src="../assets/images/products/img-1.png" alt=""
                                                                class="img-fluid" width="50px" height="50px">
                                                        </div>
                                                        <div class="col-10">
                                                            <span class="fs-5 fw-bold">
                                                                <?php echo $row['name'] ?>
                                                            </span> <br>
                                                            <?php
                                                            $cat_id = $row['categories_id'];
                                                            $cat_query = mysqli_query($conn, "SELECT * FROM `categories` WHERE `id` = '$cat_id'");
                                                            $catRow = mysqli_fetch_assoc($cat_query);
                                                            ?>
                                                            <span>Category:
                                                                <?php echo $catRow['categories'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $row['qty'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['price'] . "₹" ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['publish'] == 1) {
                                                        echo '<a href="?type=status&operation=deactive&id=' . $row['id'] . '" class="badge bg-success-subtle text-success ">Public</a>';
                                                    } else {
                                                        echo '<a href="?type=status&operation=active&id=' . $row['id'] . '" class="badge bg-danger-subtle text-danger">Private</a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <ul class="hstack gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a href="product-create.php?id=<?php echo $row['id'] ?>"
                                                                class="badge bg-success-subtle text-success">Edit</a>
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
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include('includes/footer.php') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="close-removeproductModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4 fs-15">
                            <h4 class="mb-1">Are you sure ?</h4>
                            <p class="text-muted mx-3 fs-16 mb-0">Are you sure you want to remove this product item ?
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover" id="remove-product">Yes, Delete
                            It!</button>
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

    <!-- nouisliderribute js -->
    <script src="../assets/libs/nouislider/nouislider.min.js"></script>
    <script src="../assets/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <!-- <script src="../assets/libs/gridjs/gridjs.umd.js"></script> -->
    <!-- App js -->
    <script src="../assets/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/toner/html/backend/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 16:32:58 GMT -->

</html>