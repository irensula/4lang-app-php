<?php require '../public/partials/header.php' ;?>

<h2>Admin dashboard</h2>

<?php if (isset($errorMessage)): ?>
    <div class="error"><?php echo htmlspecialchars($errorMessage); ?></div>
<?php endif; ?>

<div>
    <h2>Add a Lesson</h2>
    <form action="/dashboard" method="POST"> 
        <label for="newLesson">Lesson's Topic</label>    
        <input type="text" name="newLesson" id="newLesson">
        <button type="submit">Submit</button>
    </form>

    <h2>Add New Words</h2>
    <form action="/dashboard" method="POST">

        <label for="lesson">Choose a Lesson</label>
        <select name="lesson" id="lesson">
            <option value="lesson_1">Lesson 1</option>
        </select>

        <label for="word">Word</label>    
        <input type="text" name="word" id="word">

        <label for="translation">translation</label>    
        <input type="text" name="translation" id="translation">

        <button type="submit">Submit</button>
    </form>

    <h2>Add An Exercise</h2>
    <form action="/dashboard" method="POST"> 
        <label for="lesson">Choose a Lesson</label>
        <select name="lesson" id="lesson">
            <option value="lesson_1">Lesson 1</option>
        </select>

        <!-- add exercise -->

        <button type="submit">Submit</button>
    </form>

    <h2>Add A Text</h2>
    <form action="/dashboard" method="POST"> 
        <label for="lesson">Choose a Lesson</label>
        <select name="lesson" id="lesson">
            <option value="lesson_1">Lesson 1</option>
        </select>

        <label for="textTitle">Text title</label>    
        <input type="text" name="textTitle" id="textTitle">

        <label for="newText">Text</label>    
        <textarea name="newText" id="newText">Write here the text</textarea>

        <button type="submit">Submit</button>
    </form>
</div>

<?php require '../public/partials/footer.php' ;?>