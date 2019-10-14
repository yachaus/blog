<?php if (isset($errors)) {
    foreach ($errors as $error) : ?>
        <div class="alert alert-danger">
            <?= $error->getMessage() ?>
        </div>
    <?php endforeach;
}; ?>
<h2 style="margin: 0 80px;">
    Post # <?= $post->id ?>
</h2>
<div class="card p-3">
    <blockquote class="blockquote mb-0 card-body">
        <p><?= $post->text ?></p>
        <footer class="blockquote-footer">
            <?= $post->author ?>
            <p class="date"><?= $post->date ?></p>
        </footer>
    </blockquote>
</div>
<div class="card p-3">
    <form method="post" action="/Blog/AddComment/?id=<?= $post->id ?>">
        <h3>Add Comment</h3>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger p-1" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="author"
                   placeholder="Enter your name"
                <?php if (isset($data['author'])) : ?>
                    value="<?= $data['author'] ?>"
                <?php endif; ?>
                   required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Comment</label>
            <textarea class="form-control" name="text" rows="3"
                      placeholder="Type your comment here..." required><?= isset($data['text']) ? $data['text'] : ''?></textarea>
        </div>
        <input type="hidden" name="post_id" value="<?= $post->id ?>">
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
<?php if (($post->comments)) : ?>
<h3 style="margin: 0 80px;">Comments:</h3>
<?php foreach ($post->comments as $comment) : ?>
        <div class="card">
            <div class="card-body">
                <p><?= $comment->text ?></p>
                <footer class="blockquote-footer">
                    <?= $comment->author ?>
                    <p class="date"><?= $comment->date ?></p>
                </footer>
            </div>
        </div>
    <?php
    endforeach;
endif;
?>

