<?php require '../public/partials/header.php' ;?>

<h2>Your profile</h2>

<?php if (isset($errorMessage)): ?>
    <div class="error"><?php echo htmlspecialchars($errorMessage); ?></div>
<?php endif; ?>

<?php require '../public/partials/footer.php' ;?>