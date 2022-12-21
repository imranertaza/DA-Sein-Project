<main class="site-content" role="main" data-content-field="main-content">
    <section id="profile" class="index-page" data-collection-id="59f08bf99f07f5510958fb4b"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1617877407940"
             id="page-59f08bf99f07f5510958fb4b">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                         data-block-type="5" id="block-33d80b8bbea1961ffc8c">
                        <div class="sqs-block-content">
                            <figure class=" sqs-block-image-figure image-block-outer-wrapper image-block-v2 design-layout-poster combination-animation-fade-in individual-animation-none individual-text-animation-none image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper" >

                                <div class="intrinsic">
                                    <div class=" image-inset" data-animation-role="image" data-description="" data-animation-override >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio " style="
              position: relative;
              overflow: hidden;

                padding-bottom:42.934783935546875%;

            ">

                                            <?php $slider_profile = title_by_global_settings_value('profile_banner'); ?>
                                            <?php echo image_view('uploads/profile', '', $slider_profile, 'no_img.jpg', ''); ?>

                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>
                                    </div>
                                </div>

                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">
                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text" data-animation-override ><p class="" >Profile</p></div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>

                        </div>
                    </div>

                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615402927641_76384">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_3_1509109870318_86563">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1617876662719_47973">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <?php foreach ($profile as $key => $val){ ?>
                    <div class="row sqs-row">
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1615402927641_41123">
                                <div class="sqs-block-content">
                                    <?php echo ($key % 2 == 0) ? $val->description : '&nbsp;';?>
                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="21"
                                 id="block-yui_3_17_2_1_1615402927641_42202">
                                <div class="sqs-block-content"><?php echo ($key % 2 !== 0) ? $val->description : '&nbsp;';?></div>
                            </div>
                        </div>
                    </div>

                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615402927641_90901">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>

    </section>


    <section id="contact" class="index-page" data-collection-id="59f727388e7b0f7a605c0d28"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1649856573120"
             id="page-59f727388e7b0f7a605c0d28">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.648037258815705"
                         data-block-type="5" id="block-yui_3_17_2_1_1615402927641_167403">
                        <div class="sqs-block-content">


                            <figure class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-fade-in
            individual-animation-none
            individual-text-animation-none
            image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper">

                                <div class="intrinsic">

                                    <div

                                            class="  image-inset" data-animation-role="image"
                                            data-description=""

                                            data-animation-override

                                    >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio "
                                             style="
              position: relative;
              overflow: hidden;

                padding-bottom:42.64803695678711%;

            ">
                                            <noscript><img class="sqs-image-min-height"
                                                           src="../images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1615449373658-HSF4H8CMBUJMUA3LUUOO/Office.jpg"
                                                           alt="Office.jpg" loading="lazy"/></noscript>

                                            <?php $slider_contact = title_by_global_settings_value('contact_banner'); ?>
                                            <?php echo image_view('uploads/contact', '', $slider_contact, 'no_img.jpg', ''); ?>

                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">


                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text"

                                                 data-animation-override
                                            ><p class="" >Contact</p></div>
                                        </div>


                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>


                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615402927641_175954">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>

                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-8">
                            <div class="row sqs-row">
                                <?php foreach ($contact as $con){ ?>
                                <div class="sqs-col-4 span-4">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1614011592878_70371">
                                        <div class="sqs-block-content">

                                            <h3 ><?php echo $con->title;?></h3>
                                            <?php echo $con->description;?>


                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>


    <section id="employment" class="index-page" data-collection-id="6206669327b3d43ba736244f"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1666687119489"
             id="page-6206669327b3d43ba736244f">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                         data-block-type="5" id="block-eb0711a6ef2b9276fc09">
                        <div class="sqs-block-content">


                            <figure
                                    class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                    data-scrolled
                                    data-test="image-block-v2-outer-wrapper"
                            >

                                <div class="intrinsic">

                                    <div

                                            class="

                image-inset"
                                            data-animation-role="image"
                                            data-description=""


                                    >
                                        <div class="sqs-image-shape-container-element

                content-fill has-aspect-ratio

            " style="
              position: relative;
              overflow: hidden;

                padding-bottom:42.934783935546875%;

            ">
                                            <noscript></noscript>
                                            <?php $slider_employment = title_by_global_settings_value('employment_banner'); ?>
                                            <?php echo image_view('uploads/employment', '', $slider_employment, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">


                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text"


                                            ><p class="" >Employment</p></div>
                                        </div>


                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>

                    <div class="row sqs-row">
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-64aa1dd592c31c7c1565">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_1_1646056040324_30858">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class="row sqs-row">
                        <?php foreach ($employment as $emp){ ?>
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1646056040324_47012">
                                <div class="sqs-block-content">

                                    <h1 ><?php echo $emp->title;?></h1>
                                    <?php echo $emp->description;?>


                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block button-block sqs-block-button" data-block-type="53"
                                 id="block-ff500b7760fa743d9e0b">
                                <div class="sqs-block-content">

                                    <div
                                            class="sqs-block-button-container sqs-block-button-container--left"
                                            data-animation-role="button"
                                            data-alignment="left"
                                            data-button-size="medium"
                                            data-button-type="primary"
                                    >
                                        <a href="<?php echo base_url()?>/Home/working_at" class="sqs-block-button-element--medium sqs-button-element--primary sqs-block-button-element" > Working at DA-SEIN </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block button-block sqs-block-button" data-block-type="53"
                                 id="block-yui_3_17_2_1_1645537044891_8934">
                                <div class="sqs-block-content">

                                    <div class="sqs-block-button-container sqs-block-button-container--left" data-animation-role="button" data-alignment="left" data-button-size="medium" data-button-type="primary" >
                                        <a href="<?php echo base_url()?>/Home/internship_application" class="sqs-block-button-element--medium sqs-button-element--primary sqs-block-button-element" > Apply for Internship </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-0 span-0"></div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1645519048237_15312">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-yui_3_17_2_1_1645521452189_5009">
                        <div class="sqs-block-content">

                            <h1 >Current vacancies</h1>


                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1645521452189_5803">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block accordion-block sqs-block-accordion" data-block-type="69"
                         id="block-yui_3_17_2_1_1644586700457_5882">
                        <div class="sqs-block-content">


                            <ul
                                    class="accordion-items-container"
                                    data-should-allow-multiple-open-items=""
                                    data-is-divider-enabled="true"
                                    data-is-first-divider-visible="true"
                                    data-is-last-divider-visible="true"
                                    data-is-expanded-first-item=""
                                    data-accordion-title-alignment="left"
                                    data-accordion-description-alignment="left"
                                    data-accordion-description-placement="left"
                                    data-accordion-icon-placement="right"
                            >

                                <li class="accordion-item">


                                    <div
                                            class="accordion-divider accordion-divider--top"
                                            aria-hidden="true"
                                            style="
              height: 3px;
              opacity: 1;
            "
                                    ></div>


                                    <h3 class="accordion-item__title-wrapper" role="heading" aria-level="3" >
                                        <button class="accordion-item__click-target" aria-expanded="false" style="
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;
          " >
          <span class="accordion-item__title" style="



                padding-right: 24px;

            " >
            Business Development Manager
          </span>
                                            <div class="accordion-icon-container" data-is-open="false" aria-hidden="true" style="
              height: 24px;
              width: 24px;
            " >

                                                <div class="plus">
                                                    <div class="plus__horizontal-line" style="height: 5px" ></div>
                                                    <div class="plus__vertical-line" style="height: 5px" ></div>
                                                </div>

                                            </div>
                                        </button>
                                    </h3>
                                    <div class="accordion-item__dropdown" role="region">
                                        <div class="accordion-item__description" style="
            padding-top: 0px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;



            min-width: 70%;
            max-width: 300px;
          " >
                                            <p class="" >DA-SEIN is seeking an ambitious and experienced Business Development Manager for our team in Copenhagen. <br><br>The position will be an integral part of a dedicated team tasked with securing new and exciting opportunities for our growing practice. We are therefore looking for a person with a keen interest in the business side of design and architecture, who thrives working with a broad range of tasks and appreciates a lively, social, &amp; creative work environment. <br><br>The applications will be reviewed on a continual basis.<br><br><a href="<?php echo base_url()?>/Home/job_application">APPLY NOW</a></p>
                                        </div>
                                    </div>


                                    <div class="accordion-divider" aria-hidden="true" style="
            height: 3px;
            opacity: 1;
          " ></div>


                                </li>

                                <li class="accordion-item">


                                    <h3 class="accordion-item__title-wrapper " role="heading" aria-level="3" >
                                        <button class="accordion-item__click-target" aria-expanded="false" style="
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;
          " >
          <span class="accordion-item__title" style="



                padding-right: 24px;

            " >
            Constructing Architect, 5+ years experience
          </span>
                                            <div class="accordion-icon-container" data-is-open="false" aria-hidden="true" style="
              height: 24px;
              width: 24px;
            " >

                                                <div class="plus">
                                                    <div class="plus__horizontal-line" style="height: 5px" ></div>
                                                    <div class="plus__vertical-line" style="height: 5px" ></div>
                                                </div>

                                            </div>
                                        </button>
                                    </h3>
                                    <div class="accordion-item__dropdown" role="region">
                                        <div class=" accordion-item__description " style="
            padding-top: 0px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;



            min-width: 70%;
            max-width: 300px;
          " >
                                            <p class="" >Bygningskonstruktører med 5+ års erfaring til dynamisk og internationalt team </p>
                                            <p class="" >DA-SEIN søger konstruktører med minimum 5 års erfaring i projektering til at indgå i vores team af arkitekter, planlæggere, landskabsarkitekter og konstruktører. De væsentligste opgaver er skitsering og projektering af nye projekter i størrelsesordnen 500-50.000 m2 med fokus på høj arkitektonisk og bymæssig kvalitet. Vi søger kandidater, der taler og skriver flydende dansk og engelsk og har indgående kendskab til Revit og BIM og IKT. Vi kan tilbyde både projektansættelse og fastansættelse(afhængigt af ansøgers profil). </p>
                                            <p class="" >Vi behandler ansøgninger løbende, men ansøgningsfristen er 30. september 2022.</p>
                                            <p class="" ><a href="#"><em>Link til jobopslag som .pdf</em></a></p>
                                            <p class="" ><a href="<?php echo base_url()?>/Home/job_application">APPLY NOW</a></p>
                                        </div>
                                    </div>


                                    <div class="accordion-divider" aria-hidden="true" style="
            height: 3px;
            opacity: 1;
          " ></div>


                                </li>

                                <li class="accordion-item">


                                    <h3 class="accordion-item__title-wrapper" role="heading" aria-level="3" >
                                        <button
                                                class="accordion-item__click-target"
                                                aria-expanded="false"
                                                style="
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;
          "
                                        >
          <span
                  class="accordion-item__title"
                  style="



                padding-right: 24px;

            "
          >
            Unsolicited Application
          </span>
                                            <div
                                                    class="accordion-icon-container"
                                                    data-is-open="false"
                                                    aria-hidden="true"
                                                    style="
              height: 24px;
              width: 24px;
            "
                                            >

                                                <div class="plus">
                                                    <div
                                                            class="plus__horizontal-line"
                                                            style="height: 5px"
                                                    ></div>
                                                    <div
                                                            class="plus__vertical-line"
                                                            style="height: 5px"
                                                    ></div>
                                                </div>

                                            </div>
                                        </button>
                                    </h3>
                                    <div class="accordion-item__dropdown" role="region">
                                        <div class=" accordion-item__description " style="
            padding-top: 0px;
            padding-bottom: 30px;
            padding-left: 0px;
            padding-right: 0px;



            min-width: 70%;
            max-width: 300px;
          " >
                                            <p class="" ><a href="<?php echo base_url()?>/Home/job_application">APPLY NOW</a></p>
                                        </div>
                                    </div>


                                    <div class="accordion-divider" aria-hidden="true" style="
            height: 3px;
            opacity: 1;
          " ></div>


                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="people" class="index-page" data-collection-id="59f08863914e6be5ad88318e"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1666876099996"
             id="page-59f08863914e6be5ad88318e">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                         data-block-type="5" id="block-yui_3_17_2_12_1508967373173_98504">
                        <div class="sqs-block-content">
                            <figure class=" sqs-block-image-figure image-block-outer-wrapper image-block-v2 design-layout-poster combination-animation-none individual-animation-none individual-text-animation-none image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper" >

                                <div class="intrinsic">
                                    <div class="image-inset" data-animation-role="image" data-description="" >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio " style="
              position: relative;
              overflow: hidden;

                padding-bottom:42.934783935546875%;

            ">

                                            <?php $slider_people = title_by_global_settings_value('people_banner'); ?>
                                            <?php echo image_view('uploads/people/banner', '', $slider_people, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>
                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">
                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text" ><p class="" >People</p></div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1548929908065_1149503">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>

                    <div class="row sqs-row">
                        <?php foreach ($people as $peo){ ?>
                        <div class="col sqs-col-4 span-4">
                            <div class="sqs-block image-block sqs-block-image" data-block-type="5"
                                 id="block-yui_3_17_2_1_1660296944904_51593">
                                <div class="sqs-block-content">
                                    <div class=" image-block-outer-wrapper layout-caption-below design-layout-inline combination-animation-none individual-animation-none individual-text-animation-none" data-test="image-block-inline-outer-wrapper" >
                                        <figure class=" sqs-block-image-figure intrinsic " style="max-width:2978px;" >
                                            <div class="image-block-wrapper" data-animation-role="image" >
                                                <div class="sqs-image-shape-container-element has-aspect-ratio " style="
                position: relative;

                  padding-bottom:66.65547180175781%;

                overflow: hidden;
              " >
                                                    <?php echo image_view('uploads/people', '', $peo->photo, 'no_img.jpg', ''); ?>
                                                </div>
                                            </div>
                                            <figcaption class="image-caption-wrapper">
                                                <div class="image-caption"><p class="" ><strong><?php echo $peo->name; ?></strong><br><?php echo $peo->post; ?><br><a href="mailto:<?php echo $peo->email; ?>" target="_blank"><?php echo $peo->email; ?></a> </p></div>
                                            </figcaption>


                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1628691973182_117148">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="publications" class="index-page" data-collection-id="6049ff908fc4a171adfb932e"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1615465541681"
             id="page-6049ff908fc4a171adfb932e">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="51.1643379906853"
                         data-block-type="5" id="block-yui_3_17_2_1_1615462325713_6611">
                        <div class="sqs-block-content">


                            <figure
                                    class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                    data-scrolled
                                    data-test="image-block-v2-outer-wrapper"
                            >

                                <div class="intrinsic">

                                    <div class="set"data-animation-role="image"data-description="">
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio " style="
              position: relative;
              overflow: hidden;

                padding-bottom:51.164337158203125%;

            ">
                                            <?php $slider_publication = title_by_global_settings_value('publication_banner'); ?>
                                            <?php echo image_view('uploads/publication/banner', '', $slider_publication, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">

                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text"><p class="" >Publications</p></div>
                                        </div>
                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615462938338_287585">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615462325713_9630">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>



                    <?php foreach ($publication as $val){ ?>
                    <div class="row sqs-row">
                        <div class="col sqs-col-6 span-6">
                            <div class="sqs-block image-block sqs-block-image" data-block-type="5" id="block-yui_3_17_2_1_1615462938338_166789">
                                <div class="sqs-block-content">
                                    <div class=" image-block-outer-wrapper layout-caption-below design-layout-inline combination-animation-none individual-animation-none individual-text-animation-none" data-test="image-block-inline-outer-wrapper" >
                                        <figure class=" sqs-block-image-figure intrinsic " style="max-width:1080px;" >
                                            <a class=" sqs-block-image-link " href="#" >
                                                <div class="image-block-wrapper" data-animation-role="image" >
                                                    <div class="sqs-image-shape-container-element has-aspect-ratio" style="position: relative;padding-bottom:100%;overflow: hidden;" >
                                                        <?php echo image_view('uploads/publication', '', $val->image, 'no_img.jpg', ''); ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col sqs-col-1 span-1">
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_1_1615462938338_263932">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                        </div>

                        <div class="col sqs-col-5 span-5">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1615462938338_249519">
                                <div class="sqs-block-content">
                                    <h1 ><?php echo $val->name;?></h1>
                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_1_1615462938338_224688">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            <div class="row sqs-row">
                                <div class="col sqs-col-2 span-2">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1615462938338_49895">
                                        <div class="sqs-block-content">
                                            <p class="" ><strong>Title</strong></p>
                                            <p class="" ><strong>Author</strong></p>
                                            <p class="" ><strong>Publisher</strong></p>
                                            <p class="" ><strong>Published</strong></p>
                                            <p class="" > <strong>Language</strong></p>
                                            <p class="" ><strong> Format</strong></p>
                                            <p class="" ><strong>Binding </strong></p>
                                            <p class="" ><strong>Page count</strong></p>
                                            <p class="" data-rte-preserve-empty="true" ></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col sqs-col-3 span-3">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1615462325713_12857">
                                        <div class="sqs-block-content">
                                            <p class="" ><?php echo $val->title;?></p>
                                            <p class="" ><?php echo $val->author;?></p>
                                            <p class="" ><?php echo $val->publisher;?></p>
                                            <p class="" ><?php echo $val->published;?></p>
                                            <p class="" ><?php echo $val->language;?></p>
                                            <p class="" ><?php echo $val->format;?></p>
                                            <p class="" ><?php echo $val->binding;?></p>
                                            <p class="" ><?php echo $val->page_count;?></p>
                                            <p class="" data-rte-preserve-empty="true" ></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>



                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1615462938338_73364">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>


<!--                    <div class="row sqs-row">-->
<!--                        <div class="col sqs-col-1 span-1">-->
<!--                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"-->
<!--                                 id="block-yui_3_17_2_1_1615462938338_279859">-->
<!--                                <div class="sqs-block-content">&nbsp;</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col sqs-col-5 span-5">-->
<!--                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"-->
<!--                                 id="block-yui_3_17_2_1_1615462938338_247287">-->
<!--                                <div class="sqs-block-content">-->
<!---->
<!--                                    <h1 >Co-creating Architecture</h1>-->
<!---->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"-->
<!--                                 id="block-yui_3_17_2_1_1615462938338_237235">-->
<!--                                <div class="sqs-block-content">&nbsp;</div>-->
<!--                            </div>-->
<!--                            <div class="row sqs-row">-->
<!--                                <div class="col sqs-col-2 span-2">-->
<!--                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"-->
<!--                                         id="block-yui_3_17_2_1_1615462938338_100855">-->
<!--                                        <div class="sqs-block-content">-->
<!---->
<!--                                            <p class="" ><strong>Title</strong></p>-->
<!--                                            <p class="" ><strong>Author</strong></p>-->
<!--                                            <p class="" ><strong>Publisher</strong></p>-->
<!--                                            <p class="" ><strong>Published</strong></p>-->
<!--                                            <p class="" ><strong>Language</strong></p>-->
<!--                                            <p class="" ><strong>Format</strong></p>-->
<!--                                            <p class="" ><strong>Binding </strong></p>-->
<!--                                            <p class="" ><strong>Page count</strong></p>-->
<!--                                            <p class="" ><strong>ISBN</strong></p>-->
<!--                                            <p class="" data-rte-preserve-empty="true" ></p>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col sqs-col-3 span-3">-->
<!--                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"-->
<!--                                         id="block-yui_3_17_2_1_1615462938338_105860">-->
<!--                                        <div class="sqs-block-content">-->
<!---->
<!--                                            <p class="" >Co-creating Architecture - DA-SEIN</p>-->
<!--                                            <p class="" >Birgitte Kleis, Boris Brorman Jensen</p>-->
<!--                                            <p class="" >10 GD&amp;F</p>-->
<!--                                            <p class="" >March 2020</p>-->
<!--                                            <p class="" >English</p>-->
<!--                                            <p class="" >15 x 24 cm</p>-->
<!--                                            <p class="" >Hardcover</p>-->
<!--                                            <p class="" >104</p>-->
<!--                                            <p class="" >978-87-93341-02-9</p>-->
<!--                                            <p class="" data-rte-preserve-empty="true"-->
<!--                                               ></p>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col sqs-col-6 span-6">-->
<!--                            <div class="sqs-block image-block sqs-block-image" data-block-type="5"-->
<!--                                 id="block-yui_3_17_2_1_1615462938338_169481">-->
<!--                                <div class="sqs-block-content">-->
<!---->
<!---->
<!--                                    <div-->
<!--                                            class="-->
<!--          image-block-outer-wrapper-->
<!--          layout-caption-below-->
<!--          design-layout-inline-->
<!--          combination-animation-none-->
<!--          individual-animation-none-->
<!--          individual-text-animation-none-->
<!--        "-->
<!--                                            data-test="image-block-inline-outer-wrapper"-->
<!--                                    >-->
<!---->
<!---->
<!--                                        <figure-->
<!--                                                class="-->
<!--              sqs-block-image-figure-->
<!--              intrinsic-->
<!--            "-->
<!--                                                style="max-width:1080px;"-->
<!--                                        >-->
<!---->
<!---->
<!--                                            <a-->
<!--                                                    class="-->
<!--                sqs-block-image-link-->
<!---->
<!---->
<!---->
<!--              "-->
<!--                                                    href="#"-->
<!---->
<!--                                            >-->
<!---->
<!--                                                <div-->
<!---->
<!---->
<!--                                                        class="image-block-wrapper"-->
<!--                                                        data-animation-role="image"-->
<!---->
<!---->
<!--                                                >-->
<!--                                                    <div class="sqs-image-shape-container-element-->
<!---->
<!---->
<!---->
<!--              has-aspect-ratio-->
<!--            " style="-->
<!--                position: relative;-->
<!---->
<!--                  padding-bottom:100%;-->
<!---->
<!--                overflow: hidden;-->
<!--              "-->
<!--                                                    >-->
<!--                                                        <noscript><img src="../images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1615465144508-AIL1VB601JQR08YM5ZNB/Web_CoCreation.jpg"-->
<!--                                                                    alt="Web_CoCreation.jpg"/></noscript>-->
<!--                                                        <img class="thumb-image" src="--><?php //echo base_url()?><!--/images/image/Web_CoCreation.jpg" data-type="image"/>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </a>-->
<!---->
<!---->
<!--                                        </figure>-->
<!---->
<!---->
<!--                                    </div>-->
<!---->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-6049ff908fc4a171adfb932f">
                        <div class="sqs-block-content">

                            <p class="" >&nbsp;</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="clients" class="index-page" data-collection-id="59f08d0418b27d403f5de6bd" uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1509294554992" id="page-59f08d0418b27d403f5de6bd">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="41.048824593128394"
                         data-block-type="5" id="block-yui_3_17_2_3_1509109870318_62352">
                        <div class="sqs-block-content">
                            <figure class=" sqs-block-image-figure image-block-outer-wrapper image-block-v2 design-layout-poster image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper" >

                                <div class="intrinsic">
                                    <div class=" image-inset" data-animation-role="image" data-description="" data-animation-override >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio " style="
              position: relative;
              overflow: hidden;

                padding-bottom:41.048824310302734%;

            ">
                                            <?php $slider_client = title_by_global_settings_value('client_banner'); ?>
                                            <?php echo image_view('uploads/client/banner', '', $slider_client, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>
                                    </div>
                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">
                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text" data-animation-override
                                            ><p>Clients</p></div>
                                        </div>
                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_3_1509109870318_75202">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block gallery-block sqs-block-gallery"
                         data-block-json="&#123;&quot;show-meta-only-title&quot;:false,&quot;methodOption&quot;:&quot;existing&quot;,&quot;existingGallery&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;newWindow&quot;:false,&quot;design&quot;:&quot;grid&quot;,&quot;aspectRatio&quot;:null,&quot;auto-crop&quot;:true,&quot;square-thumbs&quot;:false,&quot;aspect-ratio&quot;:&quot;standard&quot;,&quot;show-meta&quot;:true,&quot;thumbnails-per-row&quot;:5,&quot;padding&quot;:0,&quot;lightbox&quot;:false,&quot;collectionId&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;existingGalleryId&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;vSize&quot;:null&#125;"
                         data-block-type="8" id="block-6d6b8f13922937a7002c">
                        <div class="sqs-block-content">
                            <div class=" sqs-gallery-container sqs-gallery-block-grid sqs-gallery-aspect-ratio-standard sqs-gallery-thumbnails-per-row-5 clear" >
                                <div class="sqs-gallery">
                                    <?php foreach ($client as $cl){ ?>
                                    <div class="slide" data-type="image" data-animation-role="image">
                                        <div class="margin-wrapper">
                                            <a  href="<?php echo $cl->url;?>" class=" image-slide-anchor content-fit " >
                                                <?php echo image_view('uploads/client', '', $cl->logo, 'no_img.jpg', ''); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <style type="text/css" id="design-grid-css">
                                #block-6d6b8f13922937a7002c .sqs-gallery-block-grid .sqs-gallery-design-grid {
                                    margin-right: -0px;
                                } #block-6d6b8f13922937a7002c .sqs-gallery-block-grid .sqs-gallery-design-grid-slide .margin-wrapper {
                                    margin-right: 0px;
                                    margin-bottom: 0px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="events" class="index-page" data-collection-id="614ae2dd4e92bd0f3a9e664b"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1665669032258"
             id="page-614ae2dd4e92bd0f3a9e664b">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.98070525615436"
                         data-block-type="5" id="block-yui_3_17_2_1_1632297701782_89855">
                        <div class="sqs-block-content">


                            <figure class=" sqs-block-image-figure image-block-outer-wrapper image-block-v2 design-layout-poster combination-animation-none individual-animation-none individual-text-animation-none image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper">

                                <div class="intrinsic">
                                    <div class=" image-inset" data-animation-role="image" data-description="" >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio" style="
              position: relative;
              overflow: hidden;

                padding-bottom:42.98070526123047%;

            ">
                                            <?php $slider_event = title_by_global_settings_value('event_banner'); ?>
                                            <?php echo image_view('uploads/event/banner', '', $slider_event, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">
                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text" ><p class="" >Events</p></div>
                                        </div>
                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-yui_3_17_2_1_1642596519420_42276">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>

                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1648047577354_29084">
                        <div class="sqs-block-content">
                            <h1 >Upcoming</h1>
                        </div>
                    </div>
                    <div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47"
                         id="block-yui_3_17_2_1_1651222972423_161701">
                        <div class="sqs-block-content">
                            <hr/>
                        </div>
                    </div>

                    <?php foreach ($event as $eve) { if ($eve->event_date > date('Y-m-d')){ ?>
                    <div class="row sqs-row">
                        <div class="col sqs-col-2 span-2">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1664968676678_49041">
                                <div class="sqs-block-content">

                                    <h3 ><?php echo date('M d', strtotime($eve->event_date));  ?></h3>


                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-10 span-10">
                            <div class="row sqs-row">
                                <div class="col sqs-col-2 span-2">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1664968676678_66013">
                                        <div class="sqs-block-content">

                                            <p class="" ><?php echo $eve->short_details;?></p>


                                        </div>
                                    </div>
                                </div>

                                <div class="col sqs-col-4 span-4">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1664968676678_90174">
                                        <div class="sqs-block-content">

                                            <p class="" ><a href="<?php echo $eve->url;?>"><strong><?php echo $eve->event_name;?></strong></a></p>


                                        </div>
                                    </div>
                                </div>

                                <div class="col sqs-col-4 span-4">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-yui_3_17_2_1_1664968676678_120004">
                                        <div class="sqs-block-content">

                                            <p class="" ><?php echo $eve->location;?></p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47"
                         id="block-yui_3_17_2_1_1664273930623_421729">
                        <div class="sqs-block-content">
                            <hr/>
                        </div>
                    </div>

                    <?php } } ?>

                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-yui_3_17_2_1_1654782409220_384653">
                        <div class="sqs-block-content">

                            <h1 >Previous</h1>


                        </div>
                    </div>
                    <div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47"
                         id="block-yui_3_17_2_1_1664962515653_118214">
                        <div class="sqs-block-content">
                            <hr/>
                        </div>
                    </div>

                    <?php foreach ($event as $eve) { if ($eve->event_date < date('Y-m-d')){ ?>
                    <div class="row sqs-row">
                        <div class="col sqs-col-2 span-2">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1654782409220_374883">
                                <div class="sqs-block-content">

                                    <h3 ><?php echo date('M d', strtotime($eve->event_date));  ?></h3>


                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-2 span-2">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1654782409220_394776">
                                <div class="sqs-block-content">
                                    <p class="" ><?php echo $eve->short_details;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col sqs-col-8 span-8">
                            <div class="sqs-block html-block sqs-block-html sqs-col-4 span-4 float float-right"
                                 data-block-type="2" id="block-yui_3_17_2_1_1654782409220_433707">
                                <div class="sqs-block-content">
                                    <p class="" ><?php echo $eve->location;?></p>
                                </div>
                            </div>
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1654782409220_411955">
                                <div class="sqs-block-content">

                                    <p class="" ><a href="<?php echo $eve->url;?>"><strong><?php echo $eve->event_name;?></strong></a></p>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47"
                         id="block-yui_3_17_2_1_1664273930623_418691">
                        <div class="sqs-block-content">
                            <hr/>
                        </div>
                    </div>
                    <?php } } ?>




                </div>
            </div>
        </div>

    </section>


    <section id="podcasts" class="index-page" data-collection-id="614db692fa8c770ee288924d"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1665496430425"
             id="page-614db692fa8c770ee288924d">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block image-block sqs-block-image" data-block-type="5"
                         id="block-yui_3_17_2_1_1632482970372_5671">
                        <div class="sqs-block-content">


                            <figure
                                    class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                    data-scrolled
                                    data-test="image-block-v2-outer-wrapper"
                            >

                                <div class="intrinsic">

                                    <div

                                            class="

                image-inset"
                                            data-animation-role="image"
                                            data-description=""


                                    >
                                        <div class="sqs-image-shape-container-element

                content-fill has-aspect-ratio

            " style="
              position: relative;
              overflow: hidden;

                padding-bottom:40%;

            ">
                                            <noscript></noscript>
                                            <?php $slider_podcasts = title_by_global_settings_value('podcasts_banner'); ?>
                                            <?php echo image_view('uploads/podcasts', '', $slider_podcasts, 'no_img.jpg', ''); ?>

                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">


                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text"


                                            ><p class="" >Podcasts</p></div>
                                        </div>


                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer" data-aspect-ratio="2.2621423819028608"
                         data-block-type="21" id="block-yui_3_17_2_1_1632482970372_7203">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <?php foreach ($podcasts as $pod){ ?>
                    <div class="sqs-block embed-block sqs-block-embed">
                        <div class="sqs-block-content">
                            <iframe width="100%" height="509" src="https://www.youtube.com/embed/<?php echo $pod->youtube_url;?>" title="Messi Doing Impossible Things" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </section>


    <section id="awards" class="index-page" data-collection-id="6149ae6aa1a1c2375c884130"
             uk-scrollspy="cls:uk-animation-fade">

        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1667491966715"
             id="page-6149ae6aa1a1c2375c884130">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">

                    <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="43.37990685296075"
                         data-block-type="5" id="block-yui_3_17_2_1_1632232008229_12929">
                        <div class="sqs-block-content">


                            <figure class="sqs-block-image-figure image-block-outer-wrapper image-block-v2 design-layout-poster combination-animation-none individual-animation-none individual-text-animation-none image-position-left " data-scrolled data-test="image-block-v2-outer-wrapper">

                                <div class="intrinsic">

                                    <div class=" image-inset" data-animation-role="image" data-description="" >
                                        <div class="sqs-image-shape-container-element content-fill has-aspect-ratio " style="
              position: relative;
              overflow: hidden;

                padding-bottom:43.379905700683594%;

            ">

                                            <?php $slider_awards = title_by_global_settings_value('awards_banner'); ?>
                                            <?php echo image_view('uploads/awards/banner', '', $slider_awards, 'no_img.jpg', ''); ?>
                                            <div class="image-overlay" style="overflow: hidden;"></div>
                                        </div>

                                    </div>


                                </div>


                                <figcaption class="image-card-wrapper" data-width-ratio>
                                    <div class="image-card sqs-dynamic-text-container">
                                        <div class="image-title-wrapper">
                                            <div class="image-title sqs-dynamic-text" ><p class="" >Awards</p></div>
                                        </div>
                                    </div>
                                </figcaption>


                            </figure>


                        </div>
                    </div>

                    <div class="row sqs-row">
                        <?php foreach ($awards as $awar){ ?>
                        <div class="col sqs-col-3 span-3">
                            <div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47"
                                 id="block-yui_3_17_2_1_1632218740773_2169">
                                <div class="sqs-block-content">
                                    <hr/>
                                </div>
                            </div>
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                 id="block-yui_3_17_2_1_1632218740773_8583">
                                <div class="sqs-block-content">
                                    <h3><?php echo $awar->year?></h3>
                                    <p>
                                        <a href="<?php echo $awar->award_title_url;?>" target=""><strong><?php echo $awar->award_title;?></strong></a>
                                        <strong> <br></strong>
                                        <a href="<?php echo $awar->short_title_url;?>" target=""><?php echo $awar->short_title;?></a><br>
                                    </p>


                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>

    </section>
</main>