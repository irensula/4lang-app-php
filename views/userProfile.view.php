<?php require '../public/partials/header.php' ;?>

<h2>Your profile</h2>

<?php if (isset($errorMessage)): ?>
    <div class="error"><?php echo htmlspecialchars($errorMessage); ?></div>
<?php endif; ?>

<div>
    <h2>Tietosi</h2>
    <div>
        <p id="fName"><span class="bold">First name: </span><?=$userInfo["fName"]?></p> 
        <p id="fName"><span class="bold">First name: </span><?=$userInfo["fName"]?></p>
        <p id="email"><span class="bold">Sähköposti: </span><?=$userInfo["email"]?></p>
        <p id="fName"><span class="bold">Password: </span><?=$userInfo["password"]?></p>         
    </div>
                            
    <a href='/update_userInfo?id=<?=$userID?>'>Update</a>

    <form>
        <p id="fName"><span class="bold">First name: </span><?=$userInfo["fName"]?></p> 
        <p id="fName"><span class="bold">First name: </span><?=$userInfo["fName"]?></p>
        <p id="email"><span class="bold">Sähköposti: </span><?=$userInfo["email"]?></p>
        <p id="fName"><span class="bold">Password: </span><?=$userInfo["password"]?></p>         
</form>
</div>

<?php require '../public/partials/footer.php' ;?>


<!-- Editable div where the information is displayed -->
<div id="user-info">
        <!-- This content will be fetched and updated via PHP -->
        <p id="bio-text">Loading bio...</p>
        <button id="edit-btn">Edit</button>
    </div>

    <!-- Form that appears when you want to edit the content -->
    <div id="edit-form" style="display:none;">
        <textarea id="bio-input" rows="4" cols="50"></textarea>
        <button id="save-btn">Save</button>
    </div>
<script>
        $(document).ready(function () {
            // Fetch current bio from the database on page load
            fetchBio();

            // Toggle edit form when the 'Edit' button is clicked
            $('#edit-btn').click(function () {
                $('#user-info').hide();
                $('#edit-form').show();
            });

            // Save the edited bio
            $('#save-btn').click(function () {
                var bio = $('#bio-input').val();
                $.ajax({
                    url: 'update_bio.php',
                    method: 'POST',
                    data: { bio: bio },
                    success: function (response) {
                        $('#bio-text').text(bio); // Update the displayed bio
                        $('#user-info').show();
                        $('#edit-form').hide();
                    },
                    error: function () {
                        alert('Error updating bio.');
                    }
                });
            });

            // Fetch current bio from the database
            function fetchBio() {
                $.ajax({
                    url: 'fetch_bio.php',
                    method: 'GET',
                    success: function (data) {
                        $('#bio-text').text(data);
                    },
                    error: function () {
                        alert('Error fetching bio.');
                    }
                });
            }
        });
    </script>