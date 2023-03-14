<main class="site-content" role="main" data-content-field="main-content">
    <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1645536978530"
         id="page-6214e6477a5a6202fd42ecf7">
        <div class="row sqs-row">
            <div class="col sqs-col-3 span-3">&nbsp;</div>
            <div class="col sqs-col-6 span-6">

                <div class="relative width-full height-full">
                    <div class="sharedForm overflow-auto webkit-touch-scroll">
                        <main class="form reactForm">
                            <div class="formContent">
                                <header>
                                    <div class="formCoverImageContainer col-12 background-cover background-center"></div>
                                    <div class="formHeader mx-auto max-width-2 lg-rounded-big md-rounded-big sm-rounded-big white">
                                        <div class="formLogoImageContainer" style="margin-top: 70px;">
                                            <img src="<?php echo base_url()?>/uploads/logo.png" alt="" width="150" >
                                        </div>
                                        <h1 class="formName" style="margin-top: 70px;">DA-SEIN Application Form</h1>
<!--                                        <p class="formDescription break-word">Please note: If you have completed a Master's degree from a University within the EU, you are not eligible for an internship. This is regardless of any post-graduate scholarship (Erasmus+, Leonardo, etc.)</p></div>-->
                                </header>

                                <form action="<?php echo base_url()?>/Home/job_application_action" method="post" enctype="multipart/form-data">
                                    <div class="formFieldAndSubmitContainer px3 py1">
                                    <div class="formFieldContainer mx-auto max-width-2">

                                        <div class="sharedFormField required">
                                            <div class="cursor-default title"
                                                 id="label-b4334a4becb84656ce62b02e8b6166dc">Position Applied <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div id="description-a6ef6417811357f84eb24041684434f1" class="description" style="margin-top: 20px;margin-bottom: 20px;">
                                                Select all that apply. Positions marked with * currently do no have vacancies, but we still do receive unsolicited applications.
                                            </div>
                                            <div class="cellContainer">
                                                <?php
                                                $a = 1;
                                                $b = 1;
                                                $applied_position = get_all_data_array_by_table_name('applied_position');
                                                foreach ($applied_position as $posi){
                                                    ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="applied_position_id" id="position_<?php echo $a++;?>" <?php echo ($a == 2)?'checked':''; ?> value="<?php echo $posi->applied_position_id;?>">
                                                        <label class="form-check-label" for="position_<?php echo $b++;?>"><?php echo $posi->applied_position_name;?></label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>




                                        <div class="sharedFormField required">
                                            <label for="73d202bcccc472b762aa7c76157fcc18" class="title">E-mail <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax">
                                                        <input type="email" class="input-class" name="email" value=""
                                                               style="padding: 6px;" aria-required="true" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="de4ab275fda4f6308cbd4f7fcfbc0921" class="title">Last Name <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax">
                                                        <input type="text" class="input-class" name="last_name" value="" style="padding: 6px;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="44e3d0b76d774470a284018303de7b74" class="title">First Name
                                                <span class="text-red" aria-hidden="true"
                                                      role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax"><input type="text"
                                                                                              class="input-class"
                                                                                              name="first_name" value=""
                                                                                              style="padding: 6px;"
                                                                                              required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="56980cf1c9446ac0e549403364ffdfbf" class="title">Phone <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="phone">
                                                    <div class="flex-auto flex baymax">
                                                        <input type="number" class="input-class" name="phone" value=""
                                                               style="padding: 6px;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="12fe4a524666365e15402af321c9fdcd" class="title">Address <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax"><input type="text"
                                                                                              class="input-class"
                                                                                              name="address"
                                                                                              style="padding: 6px;"
                                                                                              required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="41de8a96f3f00dbc6b2699963af2526b" class="title">Zip Code <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax"><input type="number"
                                                                                              class="input-class"
                                                                                              name="zip_code"
                                                                                              style="padding: 6px;"
                                                                                              required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required"><label
                                                    for="231a2ed217c90c0bb1d27d0838385e30" class="title">City <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span></label>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax">
                                                        <input type="text" class="input-class" name="city"
                                                               style="padding: 6px;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required">
                                            <div class="title">Country <span class="text-red" aria-hidden="true" role="presentation">*</span></div>
                                            <div class="cellContainer">
                                                <div class="flex-auto flex baymax">
                                                    <?php $country = get_all_data_array_by_table_name('country'); ?>
                                                    <select  class="input-class" name="country_id" style="padding: 6px;" required>
                                                        <option value="">Please select</option>
                                                        <?php foreach ($country as $coun){ ?>
                                                            <option value="<?php echo $coun->country_id;?>"><?php echo $coun->country_name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required">
                                            <div class="cursor-default title"
                                                 id="label-2723bf4f71fd7a7531dc327c4031012a">Citizenship <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div class="cellContainer">
                                                <?php
                                                    $k=1;$l=1;
                                                    $citizenship = get_all_data_array_by_table_name('citizenship');
                                                    foreach ($citizenship as $citi){
                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="citizenship_ids[]"
                                                           id="citizenship_<?php echo $k++;?>" <?php echo ($k == 2)?'checked':''; ?> value="<?php echo $citi->citizenship_id?>">
                                                    <label class="form-check-label" for="citizenship_<?php echo $l++;?>"><?php echo $citi->citizenship_name?></label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="sharedFormField required">
                                            <div class="title">Spoken Languages <span class="text-red" aria-hidden="true" role="presentation">*</span></div>
                                            <div id="description-48f3dba0b513823e03d1f65d92e74216" class="description">
                                                (Mother tongue or advanced proficiency only)
                                            </div>
                                            <div class="cellContainer">

                                                <?php $language = get_all_data_array_by_table_name('language'); ?>
                                                <select name="language_ids[]" multiple style="padding: 6px;" id="choices_language" placeholder="select an option" required>
                                                    <?php foreach ($language as $lang){ ?>
                                                    <option value="<?php echo $lang->language_id ?>"><?php echo $lang->language_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required">
                                            <div class="title">Software Knowledge <span class="text-red" aria-hidden="true" role="presentation">*</span> </div>
                                            <div id="description-5617f0e499c481465789762905e6a25a" class="description">
                                                (Intermediate or Advanced user only)
                                            </div>
                                            <div class="cellContainer">
                                                <?php $software_knowledge = get_all_data_array_by_table_name('software_knowledge'); ?>
                                                <select name="software_ids[]" style="padding: 6px;" multiple id="software_ids" placeholder="select an option" required>

                                                    <?php foreach ($software_knowledge as $soft){ ?>
                                                        <option value="<?php echo $soft->software_id ?>"><?php echo $soft->software_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="sharedFormField required">
                                            <label for="46dd0369c73355f0e35462486e06387a" class="title">Countries in which I have professional work experience <span class="text-red" aria-hidden="true"
                                                                   role="presentation">*</span></label>
                                            <div id="description-05c9cded4e64f75a80333f72b064de2c" class="description">
                                                (Post graduation only)
                                            </div>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax">
                                                        <?php $country2 = get_all_data_array_by_table_name('country'); ?>
                                                        <select  class="input-class" name="experience_country_id[]" multiple id="experience_country_id" placeholder="select an option" style="padding: 6px;" required>
                                                            <option value="">Please select</option>
                                                            <?php foreach ($country2 as $coun2){ ?>
                                                                <option value="<?php echo $coun2->country_id;?>"><?php echo $coun2->country_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sharedFormField required">
                                            <div class="cursor-default title" id="label-2723bf4f71fd7a7531dc327c4031012a">Years of experience (Post Graduation) <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div class="cellContainer">
                                                <div class="flex-auto flex baymax">
                                                    <select class="input-class" name="years_of_experience" style="padding: 6px;" required>
                                                        <option value=""> </option>
                                                        <?php echo years_of_experience('');?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="sharedFormField required">
                                            <div class="cursor-default title" id="label-2723bf4f71fd7a7531dc327c4031012a">Graduating University (or Institution) <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div class="cellContainer">
                                                <div class="flex-auto flex baymax">
                                                    <input class="input-class" name="university" style="padding: 6px;" required>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <label for="586dee2dea8e2baf7c46053e34db9649" class="title">Graduation Date </label>
                                            <div class="cellContainer">
                                                <input type="date" class="input-class" name="graduation_date" style="padding: 6px;" >
                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <label for="586dee2dea8e2baf7c46053e34db9649" class="title">Degree Title </label>
                                            <div class="cellContainer">
                                                <input type="text" class="input-class" name="degree_title" style="padding: 6px;" >
                                            </div>
                                        </div>

                                        <div class="sharedFormField required">
                                            <div class="cursor-default title"
                                                 id="label-9e32c75c8f7957cb189cb11e5e169cd9">Educational level <span
                                                        class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div id="description-61c074668f7e723683cdfd2bfbf44ea6" class="description"> </div>
                                            <div class="cellContainer">
                                                <?php $education = get_all_data_array_by_table_name('education'); ?>
                                                <select class="input-class" name="education_id" style="padding: 6px;" required>
                                                    <option value=""></option>
                                                    <?php foreach ($education as $edu){?>
                                                    <option value="<?php echo $edu->education_id?>"><?php echo $edu->education_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sharedFormField required">
                                            <div class="title">Resume <span class="text-red" aria-hidden="true" role="presentation">*</span> </div>
                                            <div id="description-61c074668f7e723683cdfd2bfbf44ea6" class="description">
                                                Please attach your resume as .pdf file
                                            </div>
                                            <div class="cellContainer">
                                                <input type="file" class="input-class" accept=".pdf" name="cv" style="padding: 6px;" required>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required">
                                            <div class="title">Portfolio </div>
                                            <div id="description-61c074668f7e723683cdfd2bfbf44ea6" class="description">
                                                Please attach your portfolio as .pdf file
                                            </div>
                                            <div class="cellContainer">
                                                <input type="file" class="input-class" accept=".pdf" name="portfolio" style="padding: 6px;" >
                                            </div>
                                        </div>
                                        <div class="sharedFormField">
                                            <div class="title">Additional Documents </div>
                                            <div id="description-61c074668f7e723683cdfd2bfbf44ea6" class="description">
                                            Please attach any additional documents as .pdf files
                                            </div>
                                            <div class="cellContainer">
                                                <input type="file" class="input-class" accept=".pdf" name="additional_documents" style="padding: 6px;" >
                                            </div>
                                        </div>
                                        <div class="sharedFormField">
                                            <label for="6967a1827094599b0c79bd61c7d27900" class="title">LinkedIn Profile URL </label>
                                            <div id="description-c80145f4d4e123d7f410319a2e862791" class="description">
                                                (optional)
                                            </div>
                                            <div class="cellContainer">
                                                <div data-testid="cell-editor" aria-readonly="false"
                                                     class="cell formCell" data-columntype="text">
                                                    <div class="flex-auto flex baymax">
                                                        <input type="url" class="input-class" name="linkedin" style="padding: 6px;" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sharedFormField required">
                                            <div class="title">How did you hear about the position <span class="text-red" aria-hidden="true" role="presentation">*</span>
                                            </div>
                                            <div class="cellContainer">
                                                <?php $how_you_hear = get_all_data_array_by_table_name('how_you_hear'); ?>
                                                <select  name="how_you_hear_id" class="input-class" style="padding: 6px;" required>
                                                    <option value="">Please select</option>
                                                    <?php foreach ($how_you_hear as $hear){ ?>
                                                        <option value="<?php echo $hear->how_you_hear_id ?>"><?php echo $hear->how_you_hear_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <div class="title">Salary Expectations </div>
                                            <div id="description-61c074668f7e723683cdfd2bfbf44ea6" class="description">
                                                TK / Month
                                            </div>
                                            <div class="cellContainer">
                                                <input type="text" class="input-class" name="salary_expectations" style="padding: 6px;" >
                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <div class="title">First available start date <span class="text-red" aria-hidden="true" role="presentation">*</span></div>
                                            <div class="cellContainer">
                                                <input type="date" class="input-class" name="available_start_date" style="padding: 6px;" required>
                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <div class="cursor-default title"
                                                 id="label-b2842fab48fda5fd5df1413b945492c2">Additional notes
                                            </div>
                                            <div class="cellContainer">
                                                <textarea class="input-class" name="additional_notes"> </textarea>
                                            </div>
                                        </div>

                                        <div class="sharedFormField">
                                            <div class="title">Review Process </div>
                                            <div class="cellContainer">
                                                <select class="input-class" name="review_process" style="padding: 6px;">
                                                    <option value=""></option>
                                                    <?php echo review_process('');?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="my3 mx-auto pt2-and-half pb2-and-half max-width-2 baymax px3" style="margin-top: 20px;">-->
<!--                                        <div tabindex="0" class="flex items-center max-width-2 baymax focus-visible"-->
<!--                                             role="checkbox" aria-checked="false"-->
<!--                                             aria-labelledby="emailMeACopyOfMyResponses">-->
<!---->
<!--                                            <div class="form-check">-->
<!--                                                <input class="form-check-input" type="checkbox" name="responses" id="responses1">-->
<!--                                                <label class="form-check-label" for="responses1">Email me a copy of my responses.</label>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="formSubmit mx-auto max-width-2 baymax" style="margin-top: 40px; margin-bottom: 40px;">
                                        <div id="formValidationMessage" class="formValidationMessage focus-visible"
                                             tabindex="-1"><p></p></div>
                                        <button type="submit" class="btn-subm" >Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
            <div class="col sqs-col-3 span-3">&nbsp;</div>
        </div>
    </div>
</main>