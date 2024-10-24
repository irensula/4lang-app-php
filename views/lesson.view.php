<?php require '../public/partials/header.php' ;?>

<?php foreach ($lesson as $l) { ?>
    <h2>Lesson</h2>
    <p>Number <?=$l[number]?></p>
<?php } ?>

<?php require '../public/partials/footer.php' ;?>