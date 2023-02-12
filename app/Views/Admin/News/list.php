<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>News <small>News List</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
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
                                <h3 class="box-title">News List</h3>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url('Admin/News/create')?>" class="btn btn-block btn-primary">Add</a>
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
                                <th>Type</th>
                                <th>News Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($news as $val){ ?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $val->news_title;?></td>
                                    <td><?php echo $val->news_type;?></td>
                                    <td><?php echo $val->news_description;?></td>
                                    <td>
                                        <?php echo image_view('uploads/news_img',$val->slug,'thum_'.$val->image,'thum_no_img.jpg','img-200'); ?>
                                    </td>
                                    <td width="120">
                                        <a href="<?php echo base_url('Admin/News/update/'.$val->news_id)?>" class="btn btn-warning btn-xs">Update</a>
                                        <a href="<?php echo base_url('Admin/News/delete/'.$val->news_id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
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