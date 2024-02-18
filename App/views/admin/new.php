    <?php loadPartial('head.admin') ?>
        <!-- ============================================================== -->
	    <!-- navbar -->
	    <!-- ============================================================== -->
	    <?php loadPartial('navigation.admin') ?>
	    <!-- ============================================================== -->
	    <!-- end navbar -->
	    <!-- ============================================================== -->
        <!-- ============================================================== -->
	    <!-- left sidebar -->
	    <!-- ============================================================== -->
	    <?php loadPartial('leftSideBar.admin') ?>
	    <!-- ============================================================== -->
	    <!-- end left sidebar -->
	    <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add New Post</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="http://localhost:8080/admin/dash" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create Post</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <?php if (isset($errors)) : ?>
                            <?php foreach($errors as $error) : ?>
                                <div class="danger-message">
                                    <?= $error ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Create Post</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="inputUserName">Title</label>
                                            <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="" value="<?= $article['title'] ?>" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image url">Image URL</label>
                                            <input id="image_url" type="text" name="image url" data-parsley-trigger="change" required="" placeholder="" value="<?= $article['image_url'] ?>" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Author</label>
                                            <input id="inputPassword" type="text" placeholder="" value="<?= $article['author'] ?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputRepeatPassword">Catergory</label>
                                            <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="number" required="" placeholder="" value="<?= $article['category_id'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea required="" class="form-control"><?= $article['content'] ?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- ============================================================== -->
                    </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php loadPartial('footer1.admin') ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    <?php loadPartial('footer2.admin') ?>