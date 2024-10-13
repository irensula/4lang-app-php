<?php require '../public/partials/header.php' ;?>

<h2>Register</h2>

<form action="/register" method='POST'>
    <label for="fName">First name:</label>
    <input type="text" id="fName" name="fName">

    <label for="lName">Last name:</label>
    <input type="text" id="lName" name="lName">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <button type="submit">Submit</button>
</form>

<?php require '../public/partials/footer.php' ;?>