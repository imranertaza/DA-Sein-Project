<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Awards <small>Awards List</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Awards</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Awards Slider</h3>
                        <div class="col-lg-12" style="margin-top: 20px;">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo image_view('uploads/awards/banner', '', $slider->value, 'no_img.jpg', 'img-100-p'); ?>
                            </div>
                            <div class="col-md-6">
                                <form method="post" action="<?php echo base_url() ?>/Admin/Awards/slider_update"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="photo">Image update *</label>
                                        <input type="file" class="form-control" name="photo"/>
                                        <span>size:1500x840</span>
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
                                <h3 class="box-title">Awards List</h3>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url('Admin/Awards/create') ?>"
                                   class="btn btn-block btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped text-capitalize">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Award Title</th>
                                <th>Short Title</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($awards as $val) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $val->award_title; ?></td>
                                    <td><?php echo $val->short_title; ?></td>
                                    <td><?php echo $val->year; ?></td>
                                    <td><?php echo statusView($val->status); ?></td>
                                    <td width="180">
                                        <a href="<?php echo base_url('Admin/Awards/update/' . $val->award_id) ?>"
                                           class="btn btn-warning btn-xs">Update</a>
                                        <a href="<?php echo base_url('Admin/Awards/delete/' . $val->award_id) ?>"
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