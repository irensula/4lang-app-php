<?php require '../public/partials/header.php' ;?>

<h2>Login</h2>

<form action="/login" method='POST'>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="password">Email:</label>
    <input type="password" id="password" name="password">

    <button type="submit">Submit</button>
</form>

<?php require '../public/partials/footer.php' ;?>