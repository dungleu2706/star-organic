<?php
if ($user['userRole'] != 1) {
    require "accessdenied.html"; exit(); 
    } else { ?>
    <div class="content">
        <h2>Category Management</h2>
        <div class="cat list row">
            <div class="col title" style="padding-bottom:10px;">
                <h4>Category list</h4>
            </div>
            <div class="col">
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPanel">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    New Category
                </button>
            </div>
            <div class="col">
                <form action="" method="get" class="src-form form-group">
                    <div class="search-bar input-group">
                        <input name="searchvalue" type="search" id="searchbar" class="form-control src" placeholder="Search" />
                        <button class="btn btn-outline-success" type="submit" name="search" id='src-submit'>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="display">
                <!-- display category list from database -->
                <?php
                admin_displayCategory();
                ?>
            </div>
        </div>
        <!-- Add Category -->
        <form id='add-cat' action='AddCategory.php' method='post'>
            <div class="modal fade" id="editPanel" tabindex="-1" aria-labelledby="editPanelLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="editPanelLabel">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                Create new Category
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="category-add">
                            <div class="input-group mb-3">
                                <span class='input-group-text'>Category name:</span>
                                <input type="text" name="cname" id="" class='form-control'>
                                <span class='input-group-text'>Unit:</span>
                                <input type="text" name="cunit" id="" class='form-control'>
                            </div>
                            <div class="input-group mb-3">
                                <span class='input-group-text'>Description:</span>
                                <textarea type="text" name="detail" id="" class='form-control'></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" value="Create" name="create" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Edit -->
        <form id='edit-cat' action='updateCategory.php' method='post'>
            <div class="modal fade" id="editCtg" tabindex="-1" aria-labelledby="editCtgLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="editCtgLabel">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                Edit Category
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="ctg-detail">
                            <!-- data fetch here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" value="Save" name="save" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
<?php } ?>

<?php
if (isset($_SESSION['errUpdate'])) {
    echo "<script>alert('Operation FAILED! Please check the following error(s):\\n";
    foreach ($_SESSION['errUpdate'] as $value) {
        echo " - " . $value . "\\n";
    }
    echo "')</script>";
    unset($_SESSION['errUpdate']);
}

if (isset($_SESSION['success'])) {
    echo "<script>alert('{$_SESSION['success']}')</script>";
    unset($_SESSION['success']);
}
?>