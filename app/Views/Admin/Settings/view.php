<div class="content-wrapper" id="viewpage">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Settings <small>Settings View</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
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
                                <h3 class="box-title">Settings View</h3>
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
                            <div class="col-md-12">
                                <table  class="table table-bordered table-striped text-capitalize">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $settings->name;?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $settings->email;?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $settings->mobile;?></td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td><?php echo $settings->comName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php echo $settings->country;?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo $settings->address;?></td>
                                        </tr>
                                        <tr>
                                            <td>Photo</td>
                                            <td><?php echo $settings->pic;?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="<?php echo base_url()?>/Admin/Settings/"   class="btn btn-warning ">Back</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
