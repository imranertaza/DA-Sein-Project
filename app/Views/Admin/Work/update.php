<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Work <small>Work Update</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Work</li>
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
                                <h3 class="box-title">Work Update</h3>
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
                                        <label for="news_title">Project Name *</label>
                                        <input type="text" class="form-control" name="project_name" id="project_name"
                                               placeholder="Project Name" value="<?php echo $work->project_name; ?>"
                                               required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Category</label>
                                        <select class="form-control" name="cat_id" required>
                                            <option value="">Please select</option>
                                            <?php echo getAllListInOptionWithStatus($work->cat_id, 'cat_id', 'name', 'category','cat_id'); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Description *</label>
                                        <textarea class="form-control" rows="6" name="news_description"
                                                  id="news_description"
                                                  required><?php echo $work->news_description; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Typology </label>
                                        <input type="text" class="form-control" name="typology" id="typology"
                                               placeholder="typology" value="<?php echo $work->typology; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" name="location" id="location"
                                               placeholder="Location" value="<?php echo $work->location; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Year</label>
                                        <input type="text" class="form-control" name="year" id="year"
                                               placeholder="Year" value="<?php echo $work->year; ?>"/>
                                    </div>


                                    <div class="form-group">
                                        <label for="location">Status</label>
                                        <select class="form-control" name="status">
                                            <?php echo globalStatus($work->status); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Client</label>
                                        <input type="text" class="form-control" name="client" id="client"
                                               placeholder="Client" value="<?php echo $work->client; ?>"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="news_title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                               placeholder="Meta Title" value="<?php echo $work->meta_title; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"
                                               placeholder="Meta Keyword" value="<?php echo $work->meta_keyword; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Meta Description</label>
                                        <textarea class="form-control" rows="2" name="meta_description"
                                                  id="meta_description"><?php echo $work->meta_description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Project Status</label>
                                        <input type="text" class="form-control" name="project_status"
                                               id="project_status"
                                               placeholder="Project Status"
                                               value="<?php echo $work->project_status; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Size</label>
                                        <input type="text" class="form-control" name="size" id="size"
                                               placeholder="Size" value="<?php echo $work->size; ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Collaborators</label>
                                        <input type="text" class="form-control" name="collaborators" id="collaborators"
                                               placeholder="Collaborators" value="<?php echo $work->collaborators; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Design Team</label>
                                        <input type="text" class="form-control" name="design_team" id="design_team"
                                               placeholder="Design Team" value="<?php echo $work->design_team; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="work_id" id="work_id"
                                               value="<?php echo $work->work_id; ?>"/>
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
                            <?php $i=1; $j=1; foreach ($work_image as $val) { ?>
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <form action="<?php echo base_url() ?>/Admin/Work/update_image" method="post"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <?php echo image_view('uploads/work_img', $work->slug, 'thum_' . $val->image, 'thum_no_img.jpg', $class = 'short_img') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="work_gallary_id"
                                                   value="<?php echo $val->work_gallary_id; ?>">
                                            <input type="hidden" name="work_id" value="<?php echo $val->work_id; ?>">
                                            <input type="file" name="image" >

                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control ">
                                                <input type="checkbox"  <?php echo ($val->protected == 1)?'checked':''; ?>  name="permissions_image" onclick="image_parmetion()" class="custom-control-input" id="per_<?php echo $i++;?>">
                                                <label class="custom-control-label" for="per_<?php echo $j++;?>">Image Protected</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?php echo base_url() ?>/Admin/Work/delete_image/<?php echo $val->work_gallary_id; ?>"
                                               onclick="return confirm('Are you sure you want to Delete?')"
                                               class="btn btn-danger">Delete</a>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <form action="<?php echo base_url() ?>/Admin/Work/add_image" method="post"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="news_title">Add New Image</label>
                                        <div id="multi_image_picker" class="row"></div>
                                        <span>size:1500x840</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="work_id" id="work_id"
                                               value="<?php echo $work->work_id; ?>"/>
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