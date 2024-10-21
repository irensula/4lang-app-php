<?php require '../public/partials/header.php' ;?>

<h2>All Lessons</h2>

<?php foreach ($lessons as $lesson) { ?>
    <p>Number <?=$lesson[number]?></p>
<?php } ?>

<?php require '../public/partials/footer.php' ;?>