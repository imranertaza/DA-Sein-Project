<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Block <small>Block update</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Block</li>
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
                                <h3 class="box-title">Block update</h3>
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
                        <form action="<?php echo $action; ?>" method="post" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="news_title">Title *</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $block->title;?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Page Type *</label>
                                        <select class="form-control" name="page_type" id="page_type" required>
                                            <option value="">Please select</option>
                                            <?php echo page_type($block->page_type)?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_title">Description *</label>
                                        <textarea class="form-control" name="description" id="description" required><?php echo $block->description;?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="block_id"  value="<?php echo $block->block_id;?>" required/>
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