<?php
include("includes/connection.php");
include("includes/function.php");

$title = "";
$desc = "";
$category = "";
$img = "";
$product_imgs = [];
$stock = "";
$price = "";
$discountPrice = "";
// $selectedColors = array();
// $selectedSizes = array();
$shortDesc = "";
$publish = "";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET["id"];
    $sql = "SELECT * FROM `product` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    if ($numrow > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['name'];
        $desc = $row['description'];
        $category = $row['categories_id'];
        $img = $row['img'];
        $stock = $row['qty'];
        $price = $row['mrp'];
        $discountPrice = $row['price'];
        $selectedColors = is_array(unserialize($row['color'])) ? unserialize($row['color']) : array();
        $selectedSizes = is_array(unserialize($row['size'])) ? unserialize($row['size']) : array();
        ;
        $shortDesc = $row['short_desc'];
        $publish = $row['publish'];

        $resProductImages = mysqli_query($conn, "SELECT `id`,`img` FROM `product_img` WHERE `product_id` = '$id'");
        if (mysqli_num_rows($resProductImages) > 0) {
            $j = 0;
            while ($row = mysqli_fetch_assoc($resProductImages)) {
                $product_imgs[$j]['product_imgs'] = $row['img'];
                $product_imgs[$j]['imgs_id'] = $row['id'];
                $j++;
            }
        }
    }
}


if (isset($_POST["addProduct"]) && $_POST["addProduct"] != '') {

    $title = get_safe_value($conn, $_POST['title']);
    $desc = get_safe_value($conn, $_POST['desc']);
    $category = get_safe_value($conn, $_POST['category']);
    $img = rand(11111, 99999) . '_' . $_FILES['img']['name'];
    $stock = get_safe_value($conn, $_POST['stocks']);
    $price = get_safe_value($conn, $_POST['price']);
    $discountPrice = get_safe_value($conn, $_POST['discount']);
    $color = get_safe_value($conn, serialize($_POST['color']));
    $size = get_safe_value($conn, serialize($_POST['size']));
    $shortDesc = get_safe_value($conn, $_POST['shortDesc']);
    $publish = '';
    if ($_POST['publish'] == 'Public') {
        $publish = 1;
    } elseif ($_POST['publish'] == 'Private') {
        $publish = 0;
    }


    // Check if files were uploaded
    if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
        $tmpName = $_FILES['img']['tmp_name'];
        $targetFileName = '../assets/images/products/' . $img;
        move_uploaded_file($tmpName, $targetFileName);
    }

    $add_sqlquery = mysqli_query($conn, "INSERT INTO `product` (`categories_id`, `name`, `mrp`, `price`, `qty`, `img`,`color`,`size`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `publish`) VALUES 
    ('$category','$title','$price','$discountPrice','$stock','$img','$color','$size','$shortDesc','$desc','$title','$shortDesc','$tags','$publish')");

    $products_id = mysqli_insert_id($conn);

    if (isset($_FILES['product_img']) && !empty($_FILES['product_img']['name'])) {
        $fileCount = count($_FILES['product_img']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $product_img = rand(11111, 99999) . '_' . $_FILES['product_img']['name'][$i];
            $tmpName = $_FILES['product_img']['tmp_name'][$i];
            $targetFileName = '../assets/images/products/' . $product_img;

            // Check if the file was successfully uploaded
            if (move_uploaded_file($tmpName, $targetFileName)) {
                // Assuming $products_id is defined elsewhere in your code
                mysqli_query($conn, "INSERT INTO `product_img`(`product_id`, `img`) VALUES ('$products_id','$product_img')");
            } else {
                // echo "Failed to move the uploaded file.";
            }
        }
    }

    if ($add_sqlquery) {
        header("Location: product-list.php");
    }
}

if (isset($_POST["UpdateProduct"]) && $_POST["UpdateProduct"] != '') {
    $id = $_POST['id'];
    $title = get_safe_value($conn, $_POST['title']);
    $desc = get_safe_value($conn, $_POST['desc']);
    $category = get_safe_value($conn, $_POST['category']);
    $img = rand(11111, 99999) . '_' . $_FILES['img']['name'];
    $stock = get_safe_value($conn, $_POST['stocks']);
    $price = get_safe_value($conn, $_POST['price']);
    $discountPrice = get_safe_value($conn, $_POST['discount']);
    $color = get_safe_value($conn, serialize($_POST['color']));
    $size = get_safe_value($conn, serialize($_POST['size']));
    $shortDesc = get_safe_value($conn, $_POST['shortDesc']);
    $publish = '';
    if ($_POST['publish'] == 'Public') {
        $publish = 1;
    } elseif ($_POST['publish'] == 'Private') {
        $publish = 0;
    }

    if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
        $tmpName = $_FILES['img']['tmp_name'];
        $targetFileName = '../assets/images/products/' . $img;
        move_uploaded_file($tmpName, $targetFileName);

        $update_sqlquery = mysqli_query($conn, "UPDATE `product` SET 
        `categories_id`='$category',
        `name`='$title',
        `mrp`='$price',
        `price`='$discountPrice',
        `qty`='$stock',
        `img`='$img',
        `color`='$color',
        `size`='$size',
        `short_desc`='$shortDesc',
        `description`='$desc',
        `meta_title`='$title',
        `meta_desc`='$shortDesc',
        `publish`='$publish' WHERE `id` = '$id'");

        if ($update_sqlquery) {
            header("Location: product-list.php");
        }
    } else {

        $update_sqlquery = mysqli_query($conn, "UPDATE `product` SET 
        `categories_id`='$category',
        `name`='$title',
        `mrp`='$price',
        `price`='$discountPrice',
        `qty`='$stock',
        `color`='$color',
        `size`='$size',
        `short_desc`='$shortDesc',
        `description`='$desc',
        `meta_title`='$title',
        `meta_desc`='$shortDesc',
        `publish`='$publish' WHERE `id` = '$id'");


        foreach ($_FILES['product_img']['name'] as $key => $val) {
            if ($_FILES['product_img']['name'][$key] != '') {
                $image = rand(111111111, 999999999) . '_' . $_FILES['product_img']['name'][$key];
                move_uploaded_file($_FILES['product_img']['tmp_name'][$key], '../assets/images/products/' . $image);

                if (isset($_POST['imgs_id'][$key])) {
                    mysqli_query($conn, "UPDATE product_img SET img='$image' where id='" . $_POST['imgs_id'][$key] . "'");
                } else {
                    mysqli_query($conn, "INSERT INTO product_img(product_id, img) VALUES('$id', '$image')");
                }
            }
        }



        if ($update_sqlquery) {
            header("Location: product-list.php");
        }

    }
}


if (isset($_GET['removeimg']) && !empty($_GET['removeimg'])) {
    $imgRemoveId = $_GET['removeimg'];
    $deleteImg = mysqli_query($conn, "DELETE FROM `product_img` WHERE `id` = '$imgRemoveId'");

}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-body-image="none">

<head>

    <?php include('includes/head.php') ?>
    <title>Create product | Trift Point</title>

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
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary fs-20">
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
                                            <input type="text" class="form-control d-none" id="product-id-input"
                                                name="id" value="<?php echo $id ?>">
                                            <input type="text" class="form-control" id="product-title-input"
                                                name="title" value="<?php echo $title ?>"
                                                placeholder="Enter product title" required>
                                            <div class="invalid-feedback">Please enter a product title.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product description</label>
                                            <textarea name="desc" id="ckeditor-classic" required>
                                                    <?php echo $desc ?>
                                                </textarea>
                                        </div>

                                        <div>
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Product category</label>
                                                </div>
                                            </div>
                                            <div>
                                                <select class="form-select" id="choices-category-input" name="category"
                                                    required>
                                                    <option value="">Select product category</option>
                                                    <?php
                                                    $cat_sql = "SELECT * FROM `categories`";
                                                    $cat_result = mysqli_query($conn, $cat_sql);
                                                    while ($row = mysqli_fetch_array($cat_result)) {
                                                        ?>
                                                        <option value="<?php echo $row['id'] ?>" <?php if ($row['id'] == $category) {
                                                               echo "Selected";
                                                           } ?>><?php echo $row['categories'] ?>
                                                        </option>
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
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                        <i class="bi bi-images"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="card-title mb-1">Product Gallery</h5>
                                                <p class="text-muted mb-0">Add product gallery images.</p>
                                            </div>

                                            <div class="flex-grow-1 text-end">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="addImageInput()">Add Images</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body" id="imageInputsContainer">
                                        <label class="form-label">Cover Image</label>

                                        <input class="form-control mb-2" type="file" id="formFile" name="img">
                                        <?php if (isset($_GET['id'])) { ?>
                                            <img src='../assets/images/products/<?php echo $img ?>' alt=''
                                                class='img-fluid mb-2' width='150px'>
                                        <?php }

                                        if (isset($product_imgs[0])) {
                                            foreach ($product_imgs as $imgList) {
                                                echo "
                                                <div class='image-container'>
                                                    <input class='form-control' type='file' id='formFile' name='product_img[]'>
                                                    <img src='../assets/images/products/" . $imgList['product_imgs'] . "' alt='' class='img-fluid mb-2' width='150px'>
                                                    <a href='?id=" . $_GET['id'] . "&removeimg=" . $imgList['imgs_id'] . "' class='remove-button btn btn-danger' onclick='removeElements(this)'>Remove</a>
                                                    <input class='form-control' type='text' name='imgs_id[]' value='" . $imgList['imgs_id'] . "' hidden>
                                                </div>";
                                            }
                                        }

                                        // JavaScript code to handle the button click and remove the elements
                                        echo "
                                                <script>
                                                    function removeElements(button) {
                                                        // Get the parent container and remove its children (img and input)
                                                        var container = button.parentNode;
                                                        while (container.firstChild) {
                                                            container.removeChild(container.firstChild);
                                                        }
                                                    }
                                                </script>
";

                                        ?>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm">
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary fs-20">
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
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="stocks-input">Stocks</label>
                                                    <input type="text" class="form-control" id="stocks-input"
                                                        name="stocks" value="<?php echo $stock ?>" placeholder="Stocks"
                                                        required>
                                                    <div class="invalid-feedback">Please enter a product stocks.</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-price-input">Price</label>
                                                    <div class="input-group has-validation mb-3">
                                                        <span class="input-group-text" id="product-price-addon">$</span>
                                                        <input type="text" class="form-control" id="product-price-input"
                                                            name="price" value="<?php echo $price ?>"
                                                            placeholder="Enter price" aria-label="Price"
                                                            aria-describedby="product-price-addon" required>
                                                        <div class="invalid-feedback">Please enter a product price.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-discount-input">Discount
                                                        Price</label>
                                                    <div class="input-group has-validation mb-3">
                                                        <span class="input-group-text"
                                                            id="product-discount-addon">%</span>
                                                        <input type="text" class="form-control" name="discount"
                                                            id="product-discount-input"
                                                            value="<?php echo $discountPrice ?>"
                                                            placeholder="Enter discount" aria-label="discount"
                                                            aria-describedby="product-discount-addon" required>
                                                        <div class="invalid-feedback">Please enter a product discount.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label class="form-label">Colors</label>
                                                    <ul class="clothe-colors list-unstyled hstack gap-2 mb-0 flex-wrap">
                                                        <?php
                                                        // Define an array of all possible colors
                                                        $allColors = array("success", "info", "warning", "danger", "primary", "secondary", "dark", "light");

                                                        // Loop through all colors and create checkboxes
                                                        foreach ($allColors as $color) {
                                                            $isChecked = in_array($color, $selectedColors) ? 'checked' : '';
                                                            ?>
                                                            <li>
                                                                <input type="checkbox" value="<?php echo $color; ?>"
                                                                    id="color-<?php echo $color; ?>" name="color[]" <?php echo $isChecked; ?>>
                                                                <label
                                                                    class="avatar-xs btn btn-<?php echo $color; ?> p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                    for="color-<?php echo $color; ?>"></label>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>

                                                    <div class="error-msg mt-1">Please select a product colors.</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <label class="form-label">Sizes</label>

                                                    <ul class="clothe-size list-unstyled hstack gap-2 mb-0 flex-wrap"
                                                        id="size-filter">
                                                        <?php
                                                        // Define an array of all possible sizes
                                                        $allSizes = array("xs", "s", "m", "l", "xl", "2xl", "3xl", "40", "41", "42");

                                                        // Loop through all sizes and create checkboxes
                                                        foreach ($allSizes as $size) {
                                                            $isChecked = in_array($size, $selectedSizes) ? 'checked' : '';
                                                            ?>
                                                            <li>
                                                                <input type="checkbox" value="<?php echo $size; ?>"
                                                                    id="size<?php echo ucfirst($size); ?>" name="size[]"
                                                                    <?php echo $isChecked; ?>>
                                                                <label
                                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                    for="size<?php echo ucfirst($size); ?>">
                                                                    <?php echo strtoupper($size); ?>
                                                                </label>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>

                                                    <div class="error-msg mt-1">Please select a product sizes.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="text-end mb-3">
                                    <?php
                                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                                        ?>
                                        <input type="submit" name="UpdateProduct" class="btn btn-success w-sm"
                                            value="Update">
                                    <?php } else { ?>
                                        <input type="submit" name="addProduct" class="btn btn-success w-sm" value="Submit">
                                    <?php } ?>
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
                                            <label for="choices-publish-visibility-input"
                                                class="form-label">Visibility</label>
                                            <select class="form-select" id="choices-publish-visibility-input"
                                                name="publish" data-choices data-choices-search-false>
                                                <option value="Public" <?php if ($publish == 1) {
                                                    echo "Selected";
                                                } ?>>Public</option>
                                                <option value="Private" <?php if ($publish == 0) {
                                                    echo "Selected";
                                                } ?>>Private</option>
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
                                        <textarea class="form-control" name="shortDesc"
                                            placeholder="Must enter minimum of a 100 characters" rows="3"
                                            required> <?php echo $shortDesc ?></textarea>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

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