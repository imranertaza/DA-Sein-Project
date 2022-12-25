<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Slider <small>Slider update</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slider</li>
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
                                <h3 class="box-title">Slider update</h3>
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
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Title *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="News Title" value="<?php echo $slider->name;?>" required/>
                                    </div>



                                    <div class="form-group">
                                        <label for="news_title">Status</label>
                                        <select class="form-control" name="status">
                                            <?php echo globalStatus($slider->status);?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Image </label>
                                        <input type="file" class="form-control" name="image" id="image"
                                               placeholder="image" />
                                        <span>size:1500x840</span>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="sl_id" id="sl_id" value="<?php echo $slider->sl_id;?>" required/>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="<?php echo base_url()?>/uploads/slider_img/<?php echo $slider->image;?>" width="200">
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