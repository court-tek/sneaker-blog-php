    <?php $arrayOfThemes = [ 1 => 'fashion', 2 => 'footwear', 3 => "art"] ?>
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
                            <h2 class="pageheader-title">Form Validations </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
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
                    </div>
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Basic Form</h5>
                                <div class="card-body">
                                    <form method="POST" action="/admin/dash" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" name="title" data-parsley-trigger="change" required="" placeholder="" value="<?= $article['title'] ?? '' ?>" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="img_url">Image Url</label>
                                            <input id="img_url" type="text" name="img_url" data-parsley-trigger="change" required="" placeholder="" value="<?= $article['img_url'] ?? '' ?>" autocomplete="off" class="form-control">
                                        </div>  
                                        <div class="form-group">
                                            <label for="category_id">Category Id</label>
                                            <select name="category_id" value="<?= $article['category_id'] ?? '' ?>" class="form-control">
                                                <?php foreach($arrayOfThemes as $theme) : ?>
                                                    <option><?= $theme ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                          
                                        <div class="form-group">
                                            <label for="author">Author</label>
                                            <input id="author" type="text" name="author" data-parsley-trigger="change" required="" placeholder="" value="<?= $article['author'] ?? '' ?>" autocomplete="off" class="form-control">
                                        </div>                            
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea required="" name="content" class="form-control"><?= $article['content'] ?? '' ?></textarea>
                                        </div>                            
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="hidden" name="featured" value="0" class="custom-control-input"></span>
                                                    <input type="checkbox" name="featured" value="<?= $article['featured'] ?? "" ?>" class="custom-control-input"><span class="custom-control-label">Featured</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
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
                    <div class="row">
                        
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