<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Work <small>Work Create</small></h1>
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
                                <h3 class="box-title">Work Create </h3>
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
                                               placeholder="Project Name" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Category</label>
                                        <select class="form-control" name="cat_id" required>
                                            <option value="">Please select</option>
                                            <?php echo getAllListInOptionWithStatus('', 'cat_id', 'name', 'category','cat_id'); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Description *</label>
                                        <textarea class="form-control" rows="6" name="news_description"
                                                  id="news_description" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Typology </label>
                                        <input type="text" class="form-control" name="typology" id="typology"
                                               placeholder="typology" />
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" name="location" id="location"
                                               placeholder="Location" />
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Year</label>
                                        <input type="text" class="form-control" name="year" id="year"
                                               placeholder="Year" />
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Client</label>
                                        <input type="text" class="form-control" name="client" id="client"
                                               placeholder="Client" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                               placeholder="Meta Title"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"
                                               placeholder="Meta Keyword"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Meta Description</label>
                                        <textarea class="form-control" rows="2" name="meta_description"
                                                  id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Project Status</label>
                                        <input type="text" class="form-control" name="project_status"
                                               id="project_status"
                                               placeholder="Project Status"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Size</label>
                                        <input type="text" class="form-control" name="size" id="size"
                                               placeholder="Size"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="news_title">Collaborators</label>
                                        <input type="text" class="form-control" name="collaborators" id="collaborators"
                                               placeholder="Collaborators"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Design Team</label>
                                        <input type="text" class="form-control" name="design_team" id="design_team"
                                               placeholder="Design Team" />
                                    </div>




                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="news_title">Image *</label>
                                        <div id="multi_image_picker" class="row"></div>
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