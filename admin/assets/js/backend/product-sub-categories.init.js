

// removeItem event
function removeItem(elem) {
    var getid = elem;
    document.getElementById("remove-category").addEventListener("click", function () {
        function arrayRemove(arr, value) {
            return arr.filter(function (ele) {
                return ele.id != value;
            });
        }
        var filtered = arrayRemove(subCategoriesData, getid);

        subCategoriesData = filtered;
        categoryList.updateConfig({
            data: subCategoriesData
        }).forceRender();

        document.getElementById("close-removecategoryModal").click();
    });
}


function clearVal() {
    document.getElementById("addCategoryLabel").innerHTML = "Create Sub Categories";
    document.getElementById("addNewCategory").innerHTML = "Add Sub Category";
    document.getElementById('SubcategoryTitle').value = "";
    document.getElementById("descriptionInput").value = "";
    categoryInput.removeActiveItems();
    categoryInput.setChoiceByValue("");
}