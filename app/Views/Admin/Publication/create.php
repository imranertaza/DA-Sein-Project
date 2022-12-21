<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Publication <small>Publication Create</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Publication</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3 class="box-title">Publication Create</h3>
                            </div>
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Title *</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                               placeholder="Title" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Author *</label>
                                        <input type="text" class="form-control" name="author" id="author"
                                               placeholder="Author" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Publisher *</label>
                                        <input type="text" class="form-control" name="publisher" id="publisher"
                                               placeholder="Publisher" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">Image *</label>
                                        <input type="file" class="form-control" name="photo" required />
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Create</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Published *</label>
                                        <input type="text" class="form-control" name="published" id="published"
                                               placeholder="Published" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Language *</label>
                                        <input type="text" class="form-control" name="language" id="language"
                                               placeholder="Language" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Format *</label>
                                        <input type="text" class="form-control" name="format" id="format"
                                               placeholder="Format" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Binding *</label>
                                        <input type="text" class="form-control" name="binding" id="binding"
                                               placeholder="Binding" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Page Count *</label>
                                        <input type="text" class="form-control" name="page_count" id="page_count"
                                               placeholder="Page Count" required/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>