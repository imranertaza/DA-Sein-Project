<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Awards <small>Awards Update</small></h1>
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
                                <h3 class="box-title">Awards Update</h3>
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
                                        <input type="text" class="form-control" name="award_title" id="award_title" placeholder="Award Title" value="<?php echo $awards->award_title;?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Award Title Url*</label>
                                        <input type="text" class="form-control" name="award_title_url" id="award_title_url" placeholder="Award Title Url" value="<?php echo $awards->award_title_url;?>" required/>
                                    </div>


                                    <div class="form-group">
                                        <label for="news_title">Short Title *</label>
                                        <input type="text" class="form-control" name="short_title" id="short_title" placeholder="Short Title" value="<?php echo $awards->short_title;?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Short Title Url *</label>
                                        <input type="text" class="form-control" name="short_title_url" id="short_title_url" placeholder="Short Title Url" value="<?php echo $awards->short_title_url;?>" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Years *</label>
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                            <?php $firstYear = (int)date('Y') - 21;
                                            $lastYear = $firstYear + 60;
                                            for($i=$firstYear;$i<=$lastYear;$i++)
                                            {
                                                $sel = ($awards->year == $i)?'selected':'';
                                                echo '<option value='.$i.' '.$sel.'>'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <?php echo globalStatus($awards->status);?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="award_id" value="<?php echo $awards->award_id;?>" required/>
                                        <button class="btn btn-primary">Update</button>
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