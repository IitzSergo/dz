<h1 class="text-center"><?= $title ?></h1>

<?php foreach ($articles as $article) : ?>
  <article class="mt-4">
    <h2>  <a href="/articles/<?= $article->id ?>">  <?= $article->title ?>   </a>    </h2>
    <div><?= $article->content ?></div>
  </article>
<?php endforeach ?>