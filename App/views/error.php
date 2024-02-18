<?php loadPartial('head') ?>
<?php loadPartial('navigation') ?>
    <!-- 404 error -->
    <section>
      <div class="">
         <div class=""><?= $status ?></div>
         <p class="">
            <?= $message ?>
         </p>
      </div>
      </section>
    <!-- end 404 error -->
<?php loadPartial('footer') ?>