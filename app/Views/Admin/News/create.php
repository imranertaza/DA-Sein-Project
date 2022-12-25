<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>News <small>News Create</small></h1>
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
                                <h3 class="box-title">News Create</h3>
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
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Title *</label>
                                        <input type="text" class="form-control" name="news_title" id="news_title"
                                               placeholder="News Title" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">News Type *</label>
                                        <input type="text" class="form-control" name="news_type" id="news_type"
                                               placeholder="News Type" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Short Description</label>
                                        <textarea class="form-control" name="short_des" id="short_des"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Description *</label>
                                        <textarea class="form-control" rows="6" name="news_description" id="news_description" required ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Years *</label>
                                        <select class="form-control" name="years" id="years">
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
                                        <label for="news_title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                               placeholder="Meta Title" />
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"
                                               placeholder="Meta Keyword" />
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Image *</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                               placeholder="image" required/>
                                        <span>size:1500x840</span>
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