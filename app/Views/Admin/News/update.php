<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>News <small>News Update</small></h1>
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
                                <h3 class="box-title">News Update</h3>
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
                                               placeholder="News Title" value="<?php echo $news->news_title;?>" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">News Type *</label>
                                        <input type="text" class="form-control" name="news_type" id="news_type"
                                               placeholder="News Type" value="<?php echo $news->news_type;?>" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Short Description</label>
                                        <textarea class="form-control" name="short_des" id="short_des"><?php echo $news->short_des;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Description *</label>
                                        <textarea class="form-control" rows="12" name="news_description" id="news_description" required ><?php echo $news->news_description;?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Years *</label>
                                        <select class="form-control" name="years" id="years">
                                            <?php $firstYear = (int)date('Y') - 21;
                                            $lastYear = $firstYear + 60;
                                            for($i=$firstYear;$i<=$lastYear;$i++)
                                            {
                                                $sel = ($news->years == $i)?'selected':'';

                                                echo '<option value='.$i.' '.$sel.'>'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Publish Date *</label>
                                        <input type="date" class="form-control" name="publish_date" id="publish_date" value="<?php echo  $news->publish_date;?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                               placeholder="Meta Title" value="<?php echo $news->meta_title;?>"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"
                                               placeholder="Meta Keyword" value="<?php echo $news->meta_keyword;?>"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description"><?php echo $news->meta_description;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" >
                                            <?php echo globalStatus($news->status)?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="news_id" id="news_id"
                                               placeholder="news_id" value="<?php echo $news->news_id;?>">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Image Update</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <?php $i=1; $j=1; foreach ($news_image as $val) { ?>
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <form action="<?php echo base_url() ?>/Admin/News/update_image" method="post"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <?php echo image_view('uploads/news_img', $val->news_id, 'thum_' . $val->image, 'thum_no_img.jpg', $class = 'short_img') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="news_gallary_id"
                                                   value="<?php echo $val->news_gallary_id; ?>">
                                            <input type="hidden" name="news_id" value="<?php echo $val->news_id; ?>">
                                            <input type="file" name="image" >

                                        </div>
                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?php echo base_url() ?>/Admin/News/delete_image/<?php echo $val->news_gallary_id; ?>"
                                               onclick="return confirm('Are you sure you want to Delete?')"
                                               class="btn btn-danger">Delete</a>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <form action="<?php echo base_url() ?>/Admin/News/add_image" method="post"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="news_title">Add New Image</label>
                                        <div id="multi_image_picker" class="row"></div>
                                        <span>size:1500x840</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="news_id" id="news_id"
                                               value="<?php echo $news->news_id; ?>"/>
                                        <button class="btn btn-primary">Add New Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>