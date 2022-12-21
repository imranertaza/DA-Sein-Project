<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Job Application <small>Job Application View</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Job Application</li>
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
                                <h3 class="box-title">Job Application View</h3>
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
                                        <td><b>Position Applied</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('applied_position_name','applied_position','applied_position_id',$job->applied_position_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Last Name</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->last_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>First Name</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->first_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->phone; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Address</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->address; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Zip Code</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->zip_code; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>City</b> </td>
                                        <td>-</td>
                                        <td><?php echo $job->city; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Country</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('country_name','country','country_id',$job->country_id); ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Citizenship</b></td>
                                        <td>-</td>
                                        <td><?php $citiz = json_decode($job->citizenship_ids);
                                            foreach ($citiz as $ci){
                                                $citiName = get_data_by_id('citizenship_name','citizenship','citizenship_id',$ci);
                                                echo '<span>'.$citiName.'</span>, ';
                                            }
                                            ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>LinkedIn Profile URL</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->linkedin; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Spoken Languages</b></td>
                                        <td>-</td>
                                        <td><?php
                                            $language = json_decode($job->language_ids);
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
                                            $softw = json_decode($job->software_ids);
                                            foreach ($softw as $so){
                                                $softName = get_data_by_id('software_name','software_knowledge','software_id',$so);
                                                echo '<span>'.$softName.'</span>, ';
                                            }
                                            ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Countries in which I have professional work experience</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php
                                            $joCon = json_decode($job->experience_country_id);
                                            foreach ($joCon as $joCo){
                                                $joCoName = get_data_by_id('country_name','country','country_id',$joCo);
                                                echo '<span>'.$joCoName.'</span>, ';
                                            }

                                            ?>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped text-capitalize">
                                    <tr>
                                        <td><b>Years of experience</b></td>
                                        <td>-</td>
                                        <td><?php echo years_of_experience_view($job->years_of_experience); ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Graduating University</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->university; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Graduation Date</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->graduation_date; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Degree Title</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->degree_title; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Educational level</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('education_name','education','education_id',$job->education_id); ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>How did you hear about the position</b></td>
                                        <td>-</td>
                                        <td><?php echo get_data_by_id('how_you_hear_name','how_you_hear','how_you_hear_id',$job->how_you_hear_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Salary Expectations</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->salary_expectations; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>First available start date</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->available_start_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Additional notes</b></td>
                                        <td>-</td>
                                        <td><?php echo $job->additional_notes; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Review Process</b></td>
                                        <td>-</td>
                                        <td><?php echo review_process_view($job->review_process); ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Resume</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($job->cv)){ ?>
                                                <a download="job_CV" href="<?php echo base_url()?>/uploads/job_application/<?php echo $job->cv; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
                                            <?php }?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Portfolio</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($job->portfolio)){ ?>
                                                <a download="job_portfolio" href="<?php echo base_url()?>/uploads/job_application/<?php echo $job->portfolio; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
                                            <?php }?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Additional Documents</b></td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($job->additional_documents)){ ?>
                                                <a download="job_Additional_Documents" href="<?php echo base_url()?>/uploads/job_application/<?php echo $job->additional_documents; ?>" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Download</a>
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