<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Works <small>Works View</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Works</li>
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
                                <h3 class="box-title">Works View</h3>
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
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped text-capitalize">
                                    <tbody>
                                    <tr>
                                        <td>Project Name</td>
                                        <td><?php echo $work->project_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $work->news_description; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Meta Title</td>
                                        <td><?php echo $work->meta_title; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Meta Keyword</td>
                                        <td><?php echo $work->meta_keyword; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Meta Description</td>
                                        <td><?php echo $work->meta_description; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Typology</td>
                                        <td><?php echo $work->typology; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><?php echo $work->location; ?></td>
                                    </tr>


                                    <tr>
                                        <td>Year</td>
                                        <td><?php echo $work->year; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Project Status</td>
                                        <td><?php echo $work->project_status; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td><?php echo $work->size; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Client</td>
                                        <td><?php echo $work->client; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Design Team</td>
                                        <td><?php echo $work->design_team; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Collaborators</td>
                                        <td><?php echo $work->collaborators; ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <a href="<?php echo base_url() ?>/Admin/Work/"
                                               class="btn btn-warning ">Back</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <label>Image</label>
                                <?php foreach (work_all_image($work->work_id) as $val){  ?>
                                <div class="form-group">
                                    <?php echo image_view('uploads/work_img',$work->slug,'thum_'.$val->image,'thum_no_img.jpg',$class='short_img')?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
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