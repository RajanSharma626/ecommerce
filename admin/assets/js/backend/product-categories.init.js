/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: product category init File
*/




// Search product list
var searchInputList = document.getElementById("searchInputList");
searchInputList.addEventListener("keyup", function () {
    var inputVal = searchInputList.value.toLowerCase();
    function filterItems(arr, query) {
        return arr.filter(function (el) {
            return el.categoryTitle.toLowerCase().indexOf(query.toLowerCase()) !== -1
        })
    }
    var filterData = filterItems(categoryListData, inputVal);
    searchResult(filterData);
    loadcategoryList(filterData, currentPage);
});

var editlist = false;

// category image
document.querySelector("#category-image-input").addEventListener("change", function () {
    var preview = document.querySelector("#category-img");
    var file = document.querySelector("#category-image-input").files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () { 
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
});


var createCategoryForm = document.querySelectorAll('.createCategory-form')
Array.prototype.slice.call(createCategoryForm).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        } else {
            event.preventDefault();
            var inputTitle = document.getElementById('categoryTitle').value;
            var categoryImg = document.getElementById("category-img").src;
            var categoryDesc = document.getElementById("descriptionInput").value;

            var imgArray = window.location.href.split("#");

            if (inputTitle !== "" && categoryImg !== imgArray[0] && !editlist) {
                var newCategoryId = findNextId();
                var newCategory = {
                    'id': newCategoryId,
                    "categoryImg": categoryImg,
                    "categoryTitle": inputTitle,
                    "subCategory": null,
                    "description": categoryDesc,
                };
                
                categoryListData.push(newCategory);
                searchResult(categoryListData);
                loadcategoryList(categoryListData, currentPage);
                clearVal();
                form.classList.remove('was-validated');

            } else if (inputTitle !== "" && categoryImg !== imgArray[0] && editlist) {
                getEditid = document.getElementById("categoryid-input").value;
                categoryListData = categoryListData.map(function (item) {
                    if (item.id == getEditid) {
                        var editObj = {
                            'id': getEditid,
                            "categoryImg": categoryImg,
                            "categoryTitle": inputTitle,
                            "subCategory": item.subCategory,
                            "description": categoryDesc,
                        }
                        return editObj;
                    }
                    return item;
                });

                searchResult(categoryListData);
                loadcategoryList(categoryListData, currentPage);
                clearVal();
                form.classList.remove('was-validated');

                editlist = false;

            } else {
                form.classList.add('was-validated');
            }
            
            sortElementsById();
        }
    }, false)
});

function searchResult(data) {
    if (data.length == 0) {
        document.getElementById("pagination-element").style.display = "none";
        // document.getElementById("search-result-elem").classList.remove("d-none");
    } else {
        document.getElementById("pagination-element").style.display = "flex";
        // document.getElementById("search-result-elem").classList.add("d-none");
    }

    var pageNumber = document.getElementById('page-num');
    pageNumber.innerHTML = "";
    var dataPageNum = Math.ceil(data.length / itemsPerPage)
    // for each page
    for (var i = 1; i < dataPageNum + 1; i++) {
        pageNumber.innerHTML += "<div class='page-item'><a class='page-link clickPageNumber' href='javascript:void(0);'>" + i + "</a></div>";
    }
}


function fetchIdFromObj(category) {
    return parseInt(category.id);
}

function findNextId() {
    if (categoryListData.length === 0) {
        return 0;
    }
    var lastElementId = fetchIdFromObj(categoryListData[categoryListData.length - 1]),
        firstElementId = fetchIdFromObj(categoryListData[0]);
    return (firstElementId >= lastElementId) ? (firstElementId + 1) : (lastElementId + 1);
}

function sortElementsById() {
    var manyCategory = categoryListData.sort(function (a, b) {
        var x = fetchIdFromObj(a);
        var y = fetchIdFromObj(b);

        if (x > y) {
            return -1;
        }
        if (x < y) {
            return 1;
        }
        return 0;
    })
    loadcategoryList(manyCategory, currentPage);
}
sortElementsById();

// editCategoryList
function editCategoryList() {
    var getEditid = 0;
    Array.from(document.querySelectorAll(".edit-list")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getEditid = elem.getAttribute('data-edit-id');
            categoryListData = categoryListData.map(function (item) {
                if (item.id == getEditid) {
                    editlist = true;
                    document.getElementById("categoryid-input").value = item.id;
                    document.getElementById('categoryTitle').value = item.categoryTitle;
                    document.getElementById("category-img").src = item.categoryImg;
                    document.getElementById("descriptionInput").value = item.description;
                }
                return item;
            });
        });
    });
}

// overViewList
function overViewList() {
    var getViewid = 0;
    Array.from(document.querySelectorAll(".overview-btn")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getViewid = elem.getAttribute('data-view-id');
            categoryListData = categoryListData.map(function (item) {
                if (item.id == getViewid) {
                    document.querySelector('#overviewOffcanvas .overview-id').innerHTML = item.id;
                    document.querySelector('#overviewOffcanvas .overview-img').src = item.categoryImg;
                    document.querySelector('#overviewOffcanvas .overview-title').innerHTML = item.categoryTitle;
                    document.querySelector('#overviewOffcanvas .overview-desc').innerHTML = item.description;
                    document.querySelector('#overviewOffcanvas .subCategory').innerHTML = "";
                    item.subCategory.map(function(subItem){
                        document.querySelector('#overviewOffcanvas .subCategory').innerHTML += '<li><a href="#!" class="text-reset">'+subItem+'</a></li>'
                    });

                    document.querySelector('#overviewOffcanvas .edit-list').setAttribute("data-edit-id", getViewid);
                    document.querySelector('#overviewOffcanvas .remove-list').setAttribute("data-remove-id", getViewid);
                }

                return item;
            });
        });
    });
}

// removeItem
function removeItem() {
    var getid = 0;
    Array.from(document.querySelectorAll(".remove-list")).forEach(function (item) {
        item.addEventListener('click', function (event) {
            getid = item.getAttribute('data-remove-id');
            document.getElementById("remove-category").addEventListener("click", function () {
                function arrayRemove(arr, value) {
                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }
                var filtered = arrayRemove(categoryListData, getid);
                categoryListData = filtered;
                searchResult(categoryListData);
                loadcategoryList(categoryListData, currentPage);
                document.getElementById("close-removecategoryModal").click();
            });
        });
    });
}

function clearVal() {
    document.getElementById('categoryTitle').value = "";
    document.getElementById("category-img").src = "";
    document.getElementById("slugInput").value = "";
    document.getElementById("descriptionInput").value = "";
    document.getElementById("category-image-input").value = "";
}