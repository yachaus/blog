<div class="accordion" id="accordionExample">
    <div class="slider">
        <h2 class="mb-0">
            <button class="btn btn-block btn-warning" type="button" data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne">
                Top-5 Posts
            </button>
        </h2>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="card toggle">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($charts as $chart) : ?>
                            <li class="list-group-item">
                                <a href="/Blog/Post/?id=<?= $chart->id ?>">
                                    #<?= $chart->id ?>
                                    <?= \App\Classes\Method::cutByWords(100, $chart->text) ?>
                                </a>
                                <footer class="blockquote-footer">
                                    <?= $chart->author ?>
                                    <p class="date"><?= $chart->date ?></p>
                                </footer>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card p-3">
    <form method="post" action="/Blog/AddPost">
        <h3>Add Post</h3>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger p-1" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="author" placeholder="Enter your name"
                   pattern=".{2,}"
                <?php if (isset($data['author'])) : ?>
                    value="<?= $data['author'] ?>"
                <?php endif; ?>
                   required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post</label>
            <textarea class="form-control" name="text" rows="3" placeholder="Type your blog here..."
                      required
                      style="margin-top: 0px; margin-bottom: 0px; height: 86px;
"><?= isset($data['text']) ? $data['text'] : '' ?>
</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
<?php
foreach ($posts as $post) :
    ?>
    <div class="card p-3">
        <blockquote class="blockquote mb-0 card-body">
            <a href="/Blog/Post/?id=<?= $post->id ?>">
                <p>#<?= $post->id ?> <?= \App\Classes\Method::cutByWords(100, $post->text) ?></p>
            </a>
            <footer class="blockquote-footer">
                <?= $post->author ?>
                <p class="date"><?= $post->date ?></p>
            </footer>
        </blockquote>
    </div>
<?php endforeach; ?>
<ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $total; $i++) : ?>
        <?php if ($page == $i) : ?>
            <li class="page-item active" aria-current="page">
      <span class="page-link">
        <?= $i ?>
        <span class="sr-only">(current)</span>
      </span>
            </li>
        <?php else : ?>
            <li class="page-item"><a class="page-link" href="/Blog/?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>
</ul>