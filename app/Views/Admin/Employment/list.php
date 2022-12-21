<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Employment <small>Employment List</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employment</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employment Slider</h3>
                        <div class="col-lg-12" style="margin-top: 20px;">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo image_view('uploads/employment', '', $slider->value, 'no_img.jpg', 'img-100-p'); ?>
                            </div>
                            <div class="col-md-6">
                                <form method="post" action="<?php echo base_url() ?>/Admin/Employment/slider_update"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="photo">Image update *</label>
                                        <input type="file" class="form-control" name="photo"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="<?php echo $slider->id; ?>"
                                               required/>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3 class="box-title">Employment List</h3>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url('Admin/Employment/create') ?>"
                                   class="btn btn-block btn-primary">Add</a>
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped text-capitalize">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($employment as $val) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $val->title; ?></td>
                                    <td width="160"><?php echo $val->description; ?></td>
                                    <td width="180">
                                        <a href="<?php echo base_url('Admin/Employment/update/' . $val->block_id) ?>"
                                           class="btn btn-warning btn-xs">Update</a>
                                        <a href="<?php echo base_url('Admin/Employment/delete/' . $val->block_id) ?>"
                                           class="btn btn-danger btn-xs"
                                           onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tfoot>
                        </table>
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