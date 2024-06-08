<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equid="X-UA_Compatible" content="ie=edge">
    <title>Login</title>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tautan ke jQuery (diperlukan oleh Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Tautan ke Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/calories.css">

</head>
<body> 
    <!-- Section Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-5">
            <img class="navbar-brand" src="/image/brand.png" alt="Brand Image">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="/Home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Recipes">RECIPES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UploadRecipe">CREATE YOUR RECIPE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/Calories">CALORIES</a>
                    </li>
                    <!-- Baru Ditambahin -->
                    <li class="nav-item">
                        <!-- Dropdown dengan ikon profil -->
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/image/picProfil.png" alt="Profile Icon"> <!-- Ganti picProfil.png dengan gambar ikon profil Anda -->
                                <span id="profileText">Hi, {{ Auth::user()->username }}<span id="usernamePlaceholder"></span></span>
                            </a>
                            <div class="dropdown-content" aria-labelledby="navbarDropdown">
                                <!-- Isi dropdown menu dengan gambar ikon -->
                                <a class="dropdown-item" href="/Profil">
                                    <img src="/image/picMyAcc.png" alt="My Account Icon"> My Account
                                </a>
                                <a class="dropdown-item" href="/MyRecipe">
                                    <img src="/image/picMyRecipe.png" alt="My Recipe Icon"> My Recipe
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <img src="/image/picLogOut.png" alt="Log Out Icon"> Log Out
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Modal Logout Start -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content shadow-lg">
                                <div class="modal-header bg-gray-200">
                                    <img src="/image/picLogout2.png" alt="Log Out 2 Icon">
                                    <h5 class="modal-title text-xm font-weight-bold" id="logoutModalLabel">LOGOUT!</h5>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to logout? </br>
                                    Once you logout you need to login again. Are you Ok?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-cancle shadow-lg waves-effect" data-bs-dismiss="modal">
                                        <i class="fas"></i> Cancel
                                    </button>
                                    <button type="button" class="btn btn-logout shadow-lg waves-effect" onclick="logout()">
                                        <i class="fas"></i> Yes, Logout!
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Logout End -->

                    <script>

                        function logout() {
                            window.location.href = "/logout";
                        }
                    </script>

                    <!-- Section Script profil -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Mendapatkan nama pengguna dari data yang telah disimpan saat registrasi
                            var username = localStorage.getItem("username"); // Anda harus mengatur "username" setelah proses registrasi
                        
                            // Memperbarui teks nama pengguna di profil jika nama pengguna tersedia
                            if (username) {
                                var usernamePlaceholder = document.getElementById("usernamePlaceholder");
                                usernamePlaceholder.textContent = username;
                            }
                        });
                    </script>
                    <!-- End Section Script profil -->
                </ul>
            </div>
                        
        
    </nav>
    <!-- End Section Navbar -->

    <!-- Section direktori-->
    <div class="container direktori">
        <div class="row">
            <div class="col">
                <a href="/Home">Home</a> / <a href="/Calories">Calories</a>
            </div>
        </div>
    </div>
    <!-- End Section direktori-->

        <!-- Section Form Up Recipe -->
        <div class="container">
        <div class="row">
            <div class="col">
                <div class="imgUpRecipe text-center">
                    <p style="font-size: 30px;"><strong>Calorie Calculator</strong></p>
                    <img style="width: 10%;" src="/image/calories.png" alt="calories"> 
                    <p style="margin: 0;">Calculate your current daily calorie needs accurately and efficiently</p>
                    <p style="margin: 0;">to help you achieve your health goals effectively.</p>
                </div>
                <form id="bmrForm" style="padding-left: 20%; padding-top: 2%;">
                    <!-- Add CSRF Token -->
                    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

                    <!-- Gender -->
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Laki-laki">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>

                    <!-- Body Weight -->
                    <div class="mb-3">
                        <label for="bodyweight" class="form-label">Body weight</label>
                        <input type="number" class="form-control" id="bodyweight" name="berat_badan" placeholder="Enter bodyweight" style="width: 700px;">
                    </div>
                    <!-- Height -->
                    <div class="mb-3">
                        <label for="Height" class="form-label">Height</label>
                        <input type="number" class="form-control" id="Height" name="tinggi_badan" placeholder="Enter Height" style="width: 700px;">
                    </div>
                    <!-- Age -->
                    <div class="mb-3">
                        <label for="Age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="Age" name="umur" placeholder="Enter Age" style="width: 700px;">
                    </div>

                    <!-- Submit Button -->
                    <button type="button" class="btn btn-done" id="calculateBtn">Calculate Now</button>

                    <!-- Result -->
                    <div style="padding-top: 1%;" class="mb-3">
                        <label for="result" class="form-label">Result</label>
                        <textarea class="form-control" id="result" rows="" placeholder="Your Result" style="overflow-y: auto; width: 700px;"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calculateBtn').click(function() {
                var formData = {
                    '_token': $('#csrf-token').val(),
                    'umur': $('#Age').val(),
                    'jenis_kelamin': $('input[name="gender"]:checked').val(),
                    'berat_badan': $('#bodyweight').val(),
                    'tinggi_badan': $('#Height').val()
                };

                $.ajax({
                    url: '/api/v1/hitung-bmr',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#result').val('Your BMR is: ' + response.bmr.toString());
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
        <!-- Section Form Up Recipe -->

    <!-- Section Footer-->
    <footer>
        <div class="container-fluid mt-5" style="background-color: #6C7E46; padding: 20px;">
                <div class="row mb-4">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="footer-text">
                            <div class="brandFooter">
                                <img src="/image/logoFooter.png" alt="Brand" style="width: 40%;">
                            </div>
                                <div class="captionfooter mt-3">
                                    <p class="card-text" style="margin: 0; line-height: 1.2; color: white;">Unlock a World of Wellness: </p>
                                    <p class="card-text" style="margin: 0; line-height: 1.2; color: white;">Explore Our Bounty of Nutritious Recipes,</p>
                                    <p class="card-text" style="margin: 0; line-height: 1.2; color: white;">Crafting Health and Flavor in Every Bite</p>
                                </div>
                            <div class="social mt-2 mb-3"> 
                                <i class="fa fa-instagram fa-lg"></i> 
                                <i class="fa fa-twitter fa-lg"></i> 
                                <i class="fa fa-linkedin-square fa-lg"></i> 
                                <i class="fa fa-facebook"></i> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4"></div>
                    
                    <div class="Feature col-md-2 col-sm-2 col-xs-2 mt-4">
                        <h5 class="heading">Feature</h5>
                        <ul class="card-text">
                            <li>Recipes</li>
                            <li>Create Your Recipe</li>
                        </ul>
                    </div>
                    <div class="Company col-md-2 col-sm-2 col-xs-2 mt-4">
                        <h5 class="heading">Company</h5>
                        <ul class="card-text">
                            <li>About Us</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>

                <div class="divider mb-4"> </div>
                
                <div class="row" style="font-size:10px; margin-left: 30px;">
                    <div class="col-md-4 col-sm-4 col-xs-4"  style="color: white;">
                        <div class="pull-left">
                            <p><i class="fa fa-copyright"></i> 2024 thezpdesign</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4"></div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="pull-right mr-4 d-flex policy" style="color: white;">
                            <div>Terms of Use</div>
                            <div>Privacy Policy</div>
                            <div>Cookie Policy</div>
                        </div>
                    </div>
                </div>
        </div>            
    </footer>
    <!-- End Section Footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>