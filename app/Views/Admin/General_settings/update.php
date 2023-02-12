<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> General Settings <small>General Settings Update</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">General Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">General Settings Update</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                            <div class="col-lg-6">
                                <form action="<?php echo $action; ?>" method="post">

<!--                                    <div class="form-group">-->
<!--                                        <label for="label">Label</label>-->
<!--                                        <input type="text" class="form-control" name="title" id="title" placeholder="label" value="--><?php //echo $settings->title; ?><!--" required>-->
<!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="value" class="text-capitalize" ><?php echo str_replace('_',' ',$settings->title); ?></label>
                                        <input type="text" class="form-control" name="value" id="value" placeholder="value" value="<?php echo $settings->value; ?>" required>
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $settings->id; ?>" required>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?php echo site_url('Admin/General_settings') ?>" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                            <div class="col-lg-6"></div>
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