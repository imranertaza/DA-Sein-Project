<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Client <small>Client Update</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Client</li>
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
                                <h3 class="box-title">Client Update</h3>
                            </div>
                            <div class="col-lg-3">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">URL *</label>
                                        <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $client->url?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <?php echo globalStatus($client->status);?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">Logo *</label>
                                        <input type="file" class="form-control" name="logo"  />
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="client_id" value="<?php echo $client->client_id?>" required/>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <?php echo image_view('uploads/client', '', $client->logo, 'no_img.jpg', 'img-200'); ?>
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