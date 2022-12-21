<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Profile <small>Profile Update</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Profile Update</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                            <!-- Nav tabs -->
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="<?php echo (!empty($_GET) && ($_GET['active'] == 'general'))?'active':'';?> <?php echo(empty($_GET))?'active':'';?> "><a href="#home" aria-controls="home"
                                                                                                                                                                                            role="tab" data-toggle="tab">General</a></li>
                                    <li role="presentation" class="<?php echo(!empty($_GET) && ($_GET['active'] == 'personal'))?'active':'';?>"><a href="#profile" aria-controls="profile" role="tab"
                                                                                                                                                   data-toggle="tab">Personal</a></li>
                                    <li role="presentation" class="<?php echo(!empty($_GET) && ($_GET['active'] == 'photo'))?'active':'';?>"><a href="#messages" aria-controls="messages" role="tab"
                                                                                                                                                data-toggle="tab">Photo</a></li>

                                </ul>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content " style="margin-top: 60px;">
                                <div role="tabpanel" class="tab-pane <?php echo (!empty($_GET) && ($_GET['active'] == 'general'))?'active':'';?> <?php echo(empty($_GET))?'active':'';?>" id="home">
                                    <div class="col-lg-6 ">
                                        <form action="<?php echo base_url('Admin/Settings/general_update'); ?>" method="post">
                                            <div class="form-group">
                                                <label for="varchar">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo $settings->name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $settings->email; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="longtext">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label for="longtext">Confirm Password</label>
                                                <input type="password" class="form-control" name="con_password" id="password" placeholder="Confirm Password" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label for="enum">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <?php print globalStatus($settings->status); ?>
                                                </select>
                                            </div>

                                            <input type="hidden" name="user_id" value="<?php echo $settings->user_id; ?>" />
                                            <button type="submit" class="btn btn-primary"> Update </button>
                                            <a href="<?php echo site_url('Admin/Settings') ?>" class="btn btn-default">Cancel</a>

                                        </form>
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>

                                <div role="tabpanel" class="tab-pane <?php echo (!empty($_GET) && ($_GET['active'] == 'personal'))?'active':'';?>" id="profile">
                                    <div class="col-lg-6">
                                        <form action="<?php echo base_url('Admin/Settings/personal_update'); ?>" method="post">

                                            <div class="form-group">
                                                <label for="varchar">Companey Name</label>
                                                <input type="text" class="form-control" name="ComName" id="ComName" placeholder="Companey Name" value="<?php echo $settings->comName; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Country</label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $settings->country; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Mobile</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $settings->mobile; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="varchar">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $settings->address; ?>" />
                                            </div>

                                            <input type="hidden" name="user_id" value="<?php echo $settings->user_id; ?>" />
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?php echo site_url('Admin/Settings') ?>" class="btn btn-default">Cancel</a>
                                        </form>
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>

                                <div role="tabpanel" class="tab-pane <?php echo(!empty($_GET) && ($_GET['active'] == 'photo'))?'active':'';?>" id="messages">
                                    <div class="col-lg-6">
                                        <form action="<?php echo base_url('Admin/Settings/photo_update'); ?>" method="post" enctype="multipart/form-data" >

                                            <div class="form-group">
                                                <label for="longtext">Profile Image</label>
                                                <input type="file" class="form-control" name="pic" id="pic" />
                                                <span class="help-block"><b>Max. file size 1024KB and (width=160px) x (height=160px)</b></span>
                                            </div>

                                            <input type="hidden" name="user_id" value="<?php echo $settings->user_id; ?>" />
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?php echo site_url('Admin/Settings') ?>" class="btn btn-default">Cancel</a>
                                        </form>
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>


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