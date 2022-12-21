<main id="main">
    <div class="container-fluid">
        <div class="gallery-list">
            <?php foreach ($works as $val){ ?>
            <div class="gallery-item">
                <a href="<?php echo base_url()?>/Home/work_view/<?php echo $val->work_id;?>">
                    <?php $img = get_data_by_id('image', 'work_gallary', 'work_id', $val->work_id); ?>
                    <?php echo image_view('uploads/work_img',$val->slug,'thum_'.$img,'thum_no_img.jpg','img-fluid'); ?>
                    <div class="item-meta-wrapper">
                        <div class="item-meta">
                            <div class="item-title"><?php echo $val->project_name;?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</main>