<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>People <small>People List</small></h1>
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
                        <h3 class="box-title">People Slider</h3>
                        <div class="col-lg-12" style="margin-top: 20px;">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo image_view('uploads/people/banner', '', $slider->value, 'no_img.jpg', 'img-100-p'); ?>
                            </div>
                            <div class="col-md-6">
                                <form method="post" action="<?php echo base_url() ?>/Admin/People/slider_update"
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
                                <h3 class="box-title">People List</h3>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url('Admin/People/create') ?>"
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
                                <th>Name</th>
                                <th>Post</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($people as $val) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $val->name; ?></td>
                                    <td><?php echo $val->post; ?></td>
                                    <td><?php echo $val->email; ?></td>
                                    <td><?php echo image_view('uploads/people', '', $val->photo, 'no_img.jpg', 'img-150'); ?></td>
                                    <td><?php echo statusView($val->status); ?></td>
                                    <td width="180">
                                        <!--                                        <a href="-->
                                        <?php //echo base_url('Admin/People/view/'.$val->people_id)?><!--" class="btn btn-primary btn-xs">View</a>-->
                                        <a href="<?php echo base_url('Admin/People/update/' . $val->people_id) ?>"
                                           class="btn btn-warning btn-xs">Update</a>
                                        <a href="<?php echo base_url('Admin/People/delete/' . $val->people_id) ?>"
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