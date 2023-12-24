<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin-top: 10px; /* Adjust the value as needed */
    }

    #menu-header {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {
        #sidebar {
            width: 250px;
        }

        #content {
            margin-left: 250px;
        }
    }

    #sidebar {
        position: fixed;
        width: 0;
        height: 100vh;
        top: 0;
        left: 0;
        background-color: #111;
        z-index: 1;
        overflow-y: auto;
        transition: 0.5s;
    }

    #sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        transition: 0.3s;
        margin-top: 10px;
    }

    #sidebar a:hover {
        color: #f1f1f1;
    }

    #sidebar .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 36px;
        margin-left: 50px;
    }

    #sidebar .menu-items {
        padding-top: 50px;
    }

    #content-container {
        margin-top: 20px;
        border: 1px solid #dee2e6;
        background-color: white;
        border-radius: 10px;
        overflow: none;
        padding: 20px; /* Add padding to the content container */
    }

    .category-label {
        color: #007bff;
    }

    .card {
        transition: 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Add margin between cards */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        color: #6c757d;
    }

    .form-check-input {
        margin-top: 5px;
    }

    .editDishLink,
    .btn-danger {
        margin-top: 10px;
    }

    /* Search Styles */
    .search {
        position: absolute;
        top: 10px;
        right: 20px;
        z-index: 1002;
        transition: right 0.5s; /* Add transition for smooth movement */
    }

    /* Adjust search position when the sidebar is open */
    #sidebar.opened + .search {
        right: calc(310px + 20px); /* Adjust the value as needed */
    }

    .search input[type="text"] {
        width: 200px;
        padding: 10px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: whitesmoke;
    }

    /* Update your existing styles or style block */
    .custom-container {
        display: flex;
        flex-direction: column;
        margin: 0 10px 20px 10px; /* Adjust margins as needed */
        max-width: 400px;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        overflow: hidden;
    }

    /* Add a new style for hiding cards */
    .custom-container.hidden {
        display: none;
    }
</style>

</head>

<body>
        <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar">
                <a href="#" class="close-btn" onclick="closeNav()">&times;</a>
                <div class="menu-items">
                    <ul class="nav flex-column">
                        <!-- Profile Picture -->
                        <div class="form-group d-flex justify-content-center">
                            <label for="profileImage" class="profile-img-container">
                                <img src="https://via.placeholder.com/150" alt="Profile" class="profile-img mx-auto d-block">
                                <div class="overlay"></div>
                            </label>
                            <input type="file" class="form-control-file" id="profileImage" name="profileImage" accept="image/*" style="display: none;">
                        </div>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                List Of Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#categoryCollapse">
                                Category <span class="collapse-icon">&#9662;</span>
                            </a>
                            <ul class="nav flex-column ml-3 collapse" id="categoryCollapse">
                                <li class="nav-item">
                                    <a class="nav-link" href="main_course_dish.php">
                                        Main Course
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="appetizer_dish.php">
                                        Appetizer
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="desserts.php">
                                        Dessert
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="drinks.php">
                                        Drinks
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="openAddProductModal()">
                                Add Dishes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/login_form.php">
                                Logout
                            </a>
                        </li>
                        <!--link to owner_account.php -->
                        <li class="nav-item">
                            <a class="nav-link" href="owner_account.php">
                                Owner Account
                            </a>
                        </li>
                        <!-- Add more sidebar options as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Toggle Button for Sidebar -->
            <button class="btn btn-dark" id="sidebarCollapse" onclick="toggleNav()">
                <span class="burger-icon">
                    <div></div>
                    <div></div>
                    <div></div>
                </span>
            </button>



            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="flex: 1; overflow-y: auto;">
                <div id="content-container" class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <h1 class="mb-4">Menu</h1>

                            <!-- Search -->
                            <div class="search">
                                <input type="text" id="searchInput" placeholder="Search..." oninput="filterDishes()">
                            </div>
                        </div>
                    </div>
                    <div class="row">


                    <?php
                    include '../include/db_connection.php';

                    // Fetch distinct categories from the 'dishes' table
                    $categoryQuery = "SELECT DISTINCT category FROM dishes ORDER BY CASE WHEN category = 'Main Course' THEN 1 ELSE 2 END, category";
                    $categoryResult = mysqli_query($conn, $categoryQuery);

                    if ($categoryResult) {
                        while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                            $currentCategory = ucwords($categoryRow['category']); // Capitalize each word

                            // Display category label with centered text
                            echo '<div class="col-12 text-center">';
                            echo '<h2 class="category-label mb-3">' . $currentCategory . '</h2>';
                            echo '</div>';

                            // Fetch dishes for the current category
                            $query = "SELECT * FROM dishes WHERE category = '$currentCategory'";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                while ($dish = mysqli_fetch_assoc($result)) {
                                    ?>
                                   <div class="row">
                                   <div class="custom-container ml-5" style="max-width: 400px; border: 1px solid #dee2e6; border-radius: 10px; overflow: hidden; margin-bottom: 20px;">
                                            <img src="<?= $dish['image'] ?>" class="img-fluid" alt="<?= $dish['name'] ?>">
                                            <div class="custom-container-body p-3">
                                                <h5 class="card-title"><?= $dish['name'] ?></h5>
                                                <p class="card-text"><?= $dish['description'] ?></p>
                                                <p class="card-text"><strong>Price:</strong> ₱<?= $dish['price'] ?></p>
                                                <p class="card-text"><strong>Category:</strong> <?= $dish['category'] ?></p>
                                                <p class="card-text"><strong>Time Added:</strong> <?= date('F j, Y, g:i a', strtotime($dish['timestamp_column'])) ?></p>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="availabilityCheck<?= $dish['id'] ?>"
                                                        <?= isset($dish['is_available']) ? ($dish['is_available'] ? 'checked' : '') : 'checked' ?>>
                                                    <label class="form-check-label" for="availabilityCheck<?= $dish['id'] ?>">Available for Menu</label>
                                                </div>
                                                <div class="text-right mt-3">
                                                    <a href="javascript:void(0)" class="btn btn-primary editDishLink" data-dish-id="<?= $dish['id'] ?>" onclick="openEditDishModal(<?= $dish['id'] ?>)">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger" onclick="openDeleteConfirmationModal(<?= $dish['id'] ?>)">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteConfirmationModal<?= $dish['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this dish?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Form for delete confirmation -->
                                                    <form method="post" action="delete_dish.php?id=<?= $dish['id'] ?>" class="w-100">
                                                        <input type="hidden" name="deleteConfirmed" value="1">
                                                        <button type="submit" class="btn btn-danger float-left">Yes</button>
                                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Edit Dish Modal -->
                                    <div class="modal editDishModal" id="editDishModal<?= $dish['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Dish</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <!-- Form for editing a dish -->
                                                    <form action="process_edit_dish.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $dish['id'] ?>">

                                                        <div class="form-group">
                                                            <label for="editName<?= $dish['id'] ?>">Dish Name:</label>
                                                            <input type="text" class="form-control" id="editName<?= $dish['id'] ?>" name="name" value="<?= $dish['name'] ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="editPrice<?= $dish['id'] ?>">Price:</label>
                                                            <input type="number" class="form-control" id="editPrice<?= $dish['id'] ?>" name="price" value="<?= $dish['price'] ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="editDescription<?= $dish['id'] ?>">Description:</label>
                                                            <textarea class="form-control" id="editDescription<?= $dish['id'] ?>" name="description" required><?= $dish['description'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="editCategory<?= $dish['id'] ?>">Category:</label>
                                                            <input type="text" class="form-control" id="editCategory<?= $dish['id'] ?>" name="category" value="<?= $dish['category'] ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="editImage<?= $dish['id'] ?>">Change Image:</label>
                                                            <input type="file" class="form-control-file" id="editImage<?= $dish['id'] ?>" name="image" accept="image/*">
                                                        </div>

                                                        <button type="submit" class="btn btn-primary btn-block">Update Dish</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    
                                }
                            } else {
                                echo "Error fetching dishes: " . mysqli_error($conn);
                            }
                        }
                    } else {
                        echo "Error fetching categories: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    ?>
                    
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Script for Modals -->
<script>
    // Function to open the Add Dish Modal
    function openAddDishModal() {
        $('#addDishModal').modal('show');
    }

    // Function to open the Edit Dish Modal
    function openEditDishModal(dishId) {
        $('#editDishModal' + dishId).modal('show');
    }

    // Function to open the Delete Confirmation Modal
    function openDeleteConfirmationModal(dishId) {
        $('#deleteConfirmationModal' + dishId).modal('show');
    }

  // Your JavaScript code with adjustments
function openNav() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.add("opened");
    sidebar.style.width = "250px";
    document.getElementById("content").style.marginLeft = "250px";
}

function closeNav() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.remove("opened");
    sidebar.style.width = "0";
    document.getElementById("content").style.marginLeft = "0";
    document.getElementById("sidebarCollapse").style.display = "block";
}

function toggleNav() {
    var sidebar = document.getElementById("sidebar");
    if (sidebar.classList.contains("opened")) {
        closeNav();
    } else {
        openNav();
    }
}

function filterDishes() {
    console.log('Filtering dishes...');
    var input, filter, cards, card, title, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName("custom-container");

    for (i = 0; i < cards.length; i++) {
        card = cards[i];
        title = card.querySelector(".card-title");
        txtValue = title.textContent || title.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            card.classList.remove("hidden");
        } else {
            card.classList.add("hidden");
        }
    }
}
</script>

</body>

</html>
