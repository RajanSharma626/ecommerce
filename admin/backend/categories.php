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
    <title>Categories | Tift Point</title>

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