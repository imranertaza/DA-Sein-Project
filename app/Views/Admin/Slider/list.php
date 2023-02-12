<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Slider <small>Slider List</small> </h1>
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
                                <h3 class="box-title">Slider List</h3>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url('Admin/Slider/create')?>" class="btn btn-block btn-primary">Add</a>
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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($slider as $val){ ?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $val->name;?></td>
                                    <td>
                                        <?php echo slider_image('uploads/slider_img',$val->image,'no_img.jpg','img-200'); ?>
                                    </td>
                                    <td><?php echo statusView($val->status);?></td>
                                    <td width="120">
                                        <a href="<?php echo base_url('Admin/Slider/update/'.$val->sl_id)?>" class="btn btn-warning btn-xs">Update</a>
                                        <a href="<?php echo base_url('Admin/Slider/delete/'.$val->sl_id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                                    </td>
                                </tr>
                            <?php }?>

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