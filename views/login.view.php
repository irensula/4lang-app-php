<?php require '../public/partials/header.php' ;?>

<h2>Login</h2>

<?php if (isset($errorMessage)): ?>
    <div class="error"><?php echo htmlspecialchars($errorMessage); ?></div>
<?php endif; ?>

<form action="/login" method='POST'>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Submit</button>
</form>

<?php require '../public/partials/footer.php' ;?>