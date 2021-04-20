<?php   foreach ($notes as $note)
        {   ?>
        <div>
            <form class="title" action="/notes/update/<?= $note['id'] ?>" method="post">
                <input type="hidden" name="description" value="<?= $note['description'] ?>">
                <input type="text" name="title" value="<?= $note['title'] ?>" readonly>
            </form>
            <form class="delete" action="/notes/destroy/<?= $note['id'] ?>" method="post">
                <input type="submit" value="X">
            </form>
            <form class="description" action="/notes/update/<?= $note['id'] ?>" method="post">
                <input type="hidden" name="title" value="<?= $note['title'] ?>">
                <textarea type="text" name="description" rows="10" readonly><?= $note['description'] ?></textarea>
            </form>
        </div>
<?php   }   ?>