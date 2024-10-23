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

</div>

<?php require '../public/partials/footer.php' ;?>