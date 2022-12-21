<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Internship Application <small>Internship Application View</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Internship Application</li>
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
                                <h3 class="box-title">Internship Application View</h3>
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
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped text-capitalize">
                                    <tr>
                                        <td><b>Internship semester</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('intern_sem_name','intern_sem','intern_sem_id',$internship->intern_sem_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Last Name</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->last_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>First Name</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->first_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->phone; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Address</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->address; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Zip Code</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->zip_code; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>City</b> </td>
                                        <td>-</td>
                                        <td><?php echo $internship->city; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Country</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('country_name','country','country_id',$internship->country_id); ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Citizenship</b></td>
                                        <td>-</td>
                                        <td><?php $citiz = json_decode($internship->citizenship_ids);
                                            foreach ($citiz as $ci){
                                                $citiName = get_data_by_id('citizenship_name','citizenship','citizenship_id',$ci);
                                                echo '<span>'.$citiName.'</span>, ';
                                            }
                                            ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>LinkedIn Profile URL</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->linkedin; ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped text-capitalize">

                                    <tr>
                                        <td><b>Spoken Languages</b></td>
                                        <td>-</td>
                                        <td><?php
                                                $language = json_decode($internship->language_ids);
                                                foreach ($language as $la){
                                                    $lagName = get_data_by_id('language_name','language','language_id',$la);
                                                    echo '<span>'.$lagName.'</span>, ';
                                                }
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Software Knowledge</b></td>
                                        <td>-</td>
                                        <td><?php
                                            $softw = json_decode($internship->software_ids);
                                            foreach ($softw as $so){
                                                $softName = get_data_by_id('software_name','software_knowledge','software_id',$so);
                                                echo '<span>'.$softName.'</span>, ';
                                            }
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>University</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->university; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Educational level</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('education_name','education','education_id',$internship->education_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Planned Graduation Date</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->graduation_date; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>How did you hear about the position</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('how_you_hear_name','how_you_hear','how_you_hear_id',$internship->how_you_hear_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Additional notes</b></td>
                                        <td>-</td>
                                        <td><?php echo $internship->additional_notes; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>CV</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($internship->cv)){ ?>
                                            <a download="CV" href="<?php echo base_url()?>/uploads/internship/<?php echo $internship->cv; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
                                            <?php }?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Portfolio</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($internship->portfolio)){ ?>
                                                <a download="portfolio" href="<?php echo base_url()?>/uploads/internship/<?php echo $internship->portfolio; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
                                            <?php }?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Additional Documents</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($internship->additional_documents)){ ?>
                                                <a download="Additional Documents" href="<?php echo base_url()?>/uploads/internship/<?php echo $internship->additional_documents; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
                                            <?php }?>
                                        </td>
                                    </tr>
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