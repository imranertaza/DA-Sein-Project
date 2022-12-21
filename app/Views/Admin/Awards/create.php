<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Awards <small>Awards Create</small></h1>
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
                        <div class="row">
                            <div class="col-lg-9">
                                <h3 class="box-title">Awards Create</h3>
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
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Award Title *</label>
                                        <input type="text" class="form-control" name="award_title" id="award_title" placeholder="Award Title" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Award Title Url*</label>
                                        <input type="text" class="form-control" name="award_title_url" id="award_title_url" placeholder="Award Title Url" required/>
                                    </div>


                                    <div class="form-group">
                                        <label for="news_title">Short Title *</label>
                                        <input type="text" class="form-control" name="short_title" id="short_title" placeholder="Short Title" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Short Title Url *</label>
                                        <input type="text" class="form-control" name="short_title_url" id="short_title_url" placeholder="Short Title Url" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Years *</label>
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                            <?php $firstYear = (int)date('Y') - 21;
                                            $lastYear = $firstYear + 60;
                                            for($i=$firstYear;$i<=$lastYear;$i++)
                                            {
                                                echo '<option value='.$i.'>'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Create</button>
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