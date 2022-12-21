<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>People <small>People Update</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">People</li>
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
                                <h3 class="box-title">People Update</h3>
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
                                               placeholder="Name" value="<?php echo $people->name;?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="email" value="<?php echo $people->email;?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">post *</label>
                                        <textarea class="form-control" rows="2" name="post"
                                                  id="post" required><?php echo $people->post;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <?php echo globalStatus($people->status);?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">Image *</label>
                                        <input type="file" class="form-control" name="photo"  />
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="people_id" id="people_id" value="<?php echo $people->people_id;?>" required />
                                        <button class="btn btn-primary">Update</button>
                                        <a href="<?php echo base_url()?>/Admin/People" class="btn btn-warning">Cancel</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Image </label><br>
                                        <?php echo image_view('uploads/people','',$people->photo,'no_img.jpg','img-200');?>
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