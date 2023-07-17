<div class="container py-5">
    <table class="table table-bordered text-center" style="color: black;">
        <?php
        include_once 'php/dbconn.php';
        $result = mysqli_query($conn, "SELECT * FROM accounts");
        if (mysqli_num_rows($result) > 0) {
            ?>
            <thead>
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Account Type</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row["fname"]; ?></td>
                        <td><?php echo $row["lname"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td>
                            <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal<?php echo $row["user_id"]; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal<?php echo $row["user_id"]; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm_<?php echo $row["user_id"]; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>">
                                        <div class="form-group">
                                            <label for="editFirstName">First Name</label>
                                            <input type="text" class="form-control" id="editFirstName" name="editFirstName" value="<?php echo $row["fname"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editLastName">Last Name</label>
                                            <input type="text" class="form-control" id="editLastName" name="editLastName" value="<?php echo $row["lname"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editEmail">Email</label>
                                            <input type="email" class="form-control" id="editEmail" name="editEmail" value="<?php echo $row["email"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editAccountType">Account Type</label>
                                            <select type="text" class="form-control" id="editAccountType" name="editAccountType" value="<?php echo $row["type"]; ?>" required>
                                                <option value=""></option>
                                                <option value="admin">Admin</option>
                                                <option value="patron">Patron</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary" onclick="editUser(<?php echo $row["user_id"]; ?>)">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteUser(<?php echo $row["user_id"]; ?>)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
            <?php
        } else {
            echo "No result found";
        }
        ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Edit User AJAX Function
    function editUser(userId) {
        var formData = $('#editForm_' + userId).serialize();

        $.ajax({
            url: 'php/user/edit.php?user_id=' + userId,
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                alert('User updated successfully');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('An error occurred while updating the user.');
            }
        });
    }

    // Delete User AJAX Function
    function deleteUser(userId) {
        $.ajax({
            url: 'php/user/delete.php?user_id=' + userId,
            type: 'GET',
            success: function(response) {
                // Handle success response
                alert('User deleted successfully');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('An error occurred while deleting the user.');
            }
        });
    }
</script>
