<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Owner Account Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        nav.navbar {
            background-color: #007bff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav.navbar a {
            color: #ffffff;
        }

        nav.navbar i {
            font-size: 20px;
        }

        #sidebar {
            background-color: #343a40;
            color: #ffffff;
            height: 100vh;
            transition: all 0.3s;
            position: fixed;
            z-index: 1;
            overflow: hidden;
            margin-top: 56px;
            width: 250px;
        }

        #sidebar a {
            padding: 10px;
            font-size: 18px;
            transition: 0.3s;
            color: #ffffff;
        }

        #sidebar a:hover {
            color: #007bff;
            background: rgba(255, 255, 255, 0.1);
        }

        #sidebar .active {
            background-color: #007bff;
        }

        #sidebarCollapse {
            cursor: pointer;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .profile-img-container {
            position: relative;
            cursor: pointer;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .profile-img-container:hover .overlay {
            display: flex;
        }

        #profilePreview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        #accountProfileForm label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
        }

        @media (min-width: 576px) {
            #accountProfileForm label {
                width: 150px;
            }
        }

        #accountProfileForm .form-group.row {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        #accountProfileForm .form-group.row label {
            margin-bottom: 5px;
        }

        #sidebar a:first-child,
        #settingsCollapse .settings-submenu a {
            margin-top: 0;
        }

        #sidebar a.nav-link-account-profile {
            margin-top: 20px;
        }

        .wider-form {
            width: 100%; /* Make the form 100% wide */
            max-width: 800px; /* Set a maximum width for better readability */
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <button id="sidebarCollapse" class="btn btn-link text-white">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#">Owner Dashboard</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Account Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-settings" data-toggle="collapse" href="#settingsCollapse">
                                <i class="fas fa-cogs"></i> Settings <span class="collapse-icon">&#9662;</span>
                            </a>
                            <ul class="nav flex-column ml-3 collapse settings-submenu" id="settingsCollapse">
                                <li class="nav-item">
                                    <a class="nav-link nav-link-settings" id="changePasswordLink">
                                        <i class="fas fa-lock"></i> Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#changeTheme">
                                        <i class="fas fa-paint-brush"></i> Change Theme
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-settings" id="addPaymentMethodLink">
                                        <i class="fas fa-credit-card"></i> Add Payment Method
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container" id="content">
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Account Profile</h5>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <label for="profileImage" class="profile-img-container">
                                        <img id="profilePreview" src="https://via.placeholder.com/150" alt="Profile"
                                            class="profile-img mx-auto d-block rounded-circle">
                                        <div class="overlay">Click to Upload</div>
                                    </label>
                                    <input type="file" class="form-control-file" id="profileImage" name="profileImage"
                                        accept="image/*" onchange="previewProfileImage(this)" style="display: none;">
                                </div>

                                <form id="accountProfileForm" class="wider-form">
                                    <div class="container">
                                        <!-- Basic Information -->
                                        <div class="form-group row">
                                            <label for="restaurantName"
                                                class="col-sm-15 col-md-15 col-form-label ml-3">Restaurant Name:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="restaurantName"
                                                    name="restaurantName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ownerName" class="col-sm-12 col-form-label">Owner Name:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="ownerName" name="ownerName"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-12 col-form-label">Email:</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-12 col-form-label">Phone No:</label>
                                            <div class="col-sm-12">
                                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Clustered Information -->
                                    <div class="container">
                                        <div class="form-group row">
                                            <label for="zipCode" class="col-sm-12 col-form-label">Zip Code:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="zipCode" name="zipCode"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="barangay" class="col-sm-12 col-form-label">Barangay:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="barangay" name="barangay"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="municipality"
                                                class="col-sm-12 col-form-label">Municipality:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="municipality"
                                                    name="municipality" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="province" class="col-sm-12 col-form-label">Province:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="province" name="province"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Centered Button -->
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center mt-4">
                                            <button type="button" class="btn btn-primary"
                                                onclick="saveProfile()">Save Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Change Password -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your change password form fields here -->
                            <div class="form-group">
                                <label for="currentPassword">Current Password:</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="savePasswordChanges()">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Add Payment Method -->
            <div class="modal fade" id="addPaymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentMethodModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPaymentMethodModalLabel">Add Payment Method</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to add new payment method -->
                            <div class="form-group">
                                <label for="bankName">Bank Name:</label>
                                <input type="text" class="form-control" id="bankName" name="bankName" required>
                            </div>
                            <div class="form-group">
                                <label for="accountNumber">Account Number:</label>
                                <input type="text" class="form-control" id="accountNumber" name="accountNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="eWallet">E-Wallet (e.g., GCash):</label>
                                <input type="text" class="form-control" id="eWallet" name="eWallet" required>
                            </div>

                            <!-- List of added payment methods with checkboxes -->
                            <h6>Added Payment Methods:</h6>
                            <ul class="list-group" id="paymentMethodList">
                                <!-- List items will be dynamically added here -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="savePaymentMethod()">Save Payment Method</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bootstrap Scripts -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

            <script>
                document.getElementById("sidebarCollapse").addEventListener("click", function () {
                    var sidebar = document.getElementById("sidebar");

                    sidebar.style.marginLeft = (sidebar.style.marginLeft === "-250px") ? "0" : "-250px";
                });

                document.getElementById("changePasswordLink").addEventListener("click", function () {
                    $("#changePasswordModal").modal("show");
                });

                function savePasswordChanges() {
                    // Add logic to save password changes here
                    // You can use AJAX to send the data to the server
                    // After saving, you may want to close the modal
                    $("#changePasswordModal").modal("hide");
                }
                document.getElementById("addPaymentMethodLink").addEventListener("click", function () {
                    $("#addPaymentMethodModal").modal("show");
                    // Call a function to fetch and display the list of added payment methods
                    displayPaymentMethodList();
                });

                function savePaymentMethod() {
                    // Add logic to save payment method details here
                    // After saving, call the function to update the list
                    displayPaymentMethodList();
                    // You may also want to clear the form fields
                    clearPaymentMethodForm();
                }

                function displayPaymentMethodList() {
                    // Fetch and display the list of added payment methods dynamically
                    // For example, you can use AJAX to fetch data from the server
                    // and then update the content of the 'paymentMethodList' ul element.
                    // For now, let's assume you have an array of payment methods:
                    var paymentMethods = ["Bank A", "Bank B", "GCash", "PayPal"];

                    var listContainer = document.getElementById("paymentMethodList");
                    listContainer.innerHTML = ""; // Clear existing content

                    paymentMethods.forEach(function (method) {
                        var listItem = document.createElement("li");
                        listItem.className = "list-group-item";
                        listItem.innerHTML = `
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="paymentMethodCheck${method}" name="paymentMethod" value="${method}">
                                <label class="form-check-label" for="paymentMethodCheck${method}">${method}</label>
                            </div>`;
                        listContainer.appendChild(listItem);
                    });
                }

                function clearPaymentMethodForm() {
                    // Clear the form fields after saving
                    document.getElementById("bankName").value = "";
                    document.getElementById("accountNumber").value = "";
                    document.getElementById("eWallet").value = "";
                }
            </script>
        </div>
    </div>
</body>

</html>
