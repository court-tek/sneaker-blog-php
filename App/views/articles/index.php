<?php loadPartial('head') ?>
<?php loadPartial('top-banner-index') ?>
<?php loadPartial('navigation') ?>
  <!-- Main -->
  <div id="main">
    
    <!-- Featured Post -->
    <article class="post featured">
      <header class="major">
        <span class="date">April 25, 2017</span>
        <h2><a href="#">And this is a dick<br />
        massive headline</a></h2>
        <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
        facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
        amet nullam sed etiam veroeros.</p>
      </header>
      <a href="#" class="image main"><img src="../images/adidasstop.avif" alt="" /></a>
      <ul class="actions">
        <li><a href="#" class="button big">Full Story</a></li>
      </ul>
    </article>

    <!-- Posts -->
    <section class="posts">
      <?php foreach ($articles as $article) : ?>
      <article>
        <header>
          <span class="date"><?= $article['date'] ?></span>
          <h2><a href="#"><br /><?= $article['title'] ?></a></h2>
        </header>
        <a href="#" class="image fit"><img src="<?= $article['image'] ?>" alt="" /></a>
        <p><?= $article['content'] ?></p>
        <ul class="actions">
          <li><a href="#" class="button">Full Story</a></li>
        </ul>
      </article>
      <?php endforeach; ?>
    </section>
    <?php loadPartial('pagination') ?>
  </div>
<?php loadPartial('footer') ?>