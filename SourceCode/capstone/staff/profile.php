<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-header">
            <h2 class="text-center fw-bold" style="font-family: 'Poppins',sans-serif;">User Profile Update</h2>
        </div>
        <div class="card-body">

            <form action="php/profile/staffProf.php" method="post" enctype="multipart/form-data" class="row g-3" autocomplete="off">

                <!-- Profile Picture (on the left) -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="profile-picture" class="form-label">Profile Picture:</label>
                        <img id="preview-image" src="assets/img/profile/<?php echo $_SESSION['profile']; ?>" alt="Profile Picture" class="img-fluid mb-3">
                        <input type="file" id="profile" name="profile" accept="image/*" value="<?php echo $_SESSION['profile']; ?>" class="form-control" onchange="previewImage(this);" required>
                    </div>
                </div>

                <!-- User Details (on the right) -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="full-name" class="form-label">User Name:</label>
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $_SESSION['id']; ?>" required>
                        <input type="text" id="uname" name="uname" class="form-control" value="<?php echo $_SESSION['uname']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="full-name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="full-name" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?php echo $_SESSION['address']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="full-name" class="form-label">Contact Number:</label>
                        <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $_SESSION['contact']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="full-name" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-success" style="float: right;">Update Profile</button>
                </div>

            </form>

        </div>
    </div>
</div>


    <script>
        // Function to preview the selected image before uploading
        function previewImage(input) {
            var preview = document.getElementById('preview-image');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "default_image.jpg";
            }
        }
    </script>