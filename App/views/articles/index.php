<?php loadPartial('head') ?>
<?php loadPartial('top-banner-index') ?>
<?php loadPartial('navigation') ?>
  <!-- Main -->
  <div id="main">
    
    <!-- Featured Post -->
    <?php foreach ($articles as $article) : ?>
      <?php if ($article->featured) : ?>
        <article class="post featured">
          <header class="major">
            <span class="date"><?= date("F jS, Y", $created_at) ?></span>
            <h2><a href="#"><?= $article->title ?></a></h2>
            <p>by <?= $article->author ?> /<span>7 hrs ago</span></p>
          </header>
          <a href="#" class="image main"><img src="<?= $article->img_url ?>" alt="" /></a>
          <ul class="actions">
            <li><a href="#" class="button big">Full Story</a></li>
          </ul>
        </article>
      <?php endif; ?>
    <?php endforeach;?>

    <!-- Posts -->
    <section class="posts">
      <?php foreach ($articles as $article) : ?>
        <?php if (!$article->featured) : ?>
          <article>
            <header>
              <span class="date"><?= date("F jS, Y", $created_at) ?></span>
              <h2><a href="#"><br /><?= $article->title ?></a></h2>
            </header>
            <a href="#" class="image fit"><img src="<?= $article->img_url ?>" alt="" /></a>
            <p>by <?= $article->author ?> /<span>7 hrs ago</span></p>
            <ul class="actions">
              <li><a href="#" class="button">Full Story</a></li>
            </ul>
          </article>
        <?php endif; ?>
      <?php endforeach; ?>
    </section>
    <?php loadPartial('pagination') ?>
  </div>
<?php loadPartial('footer') ?>