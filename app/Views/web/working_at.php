<main class="site-content ready" role="main" data-content-field="main-content" style="margin-top: 81px;">
    <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1644575700209"
         id="page-61b1dbecc553062e997b0079">
        <div class="row sqs-row">
            <div class="col sqs-col-12 span-12">
                <div class="row sqs-row">
                    <div class="col sqs-col-2 span-2">
                        <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                             id="block-yui_3_17_2_1_1639046132765_21781">
                            <div class="sqs-block-content">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col sqs-col-8 span-8">
                        <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                             id="block-61b1dbecc553062e997b007a">
                            <div class="sqs-block-content">

                                <h2 style="white-space:pre-wrap;">Working at DA-SEIN</h2>


                            </div>
                        </div>
                        <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                             id="block-yui_3_17_2_1_1639046132765_2378">
                            <div class="sqs-block-content">&nbsp;</div>
                        </div>
                        <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                             id="block-yui_3_17_2_1_1639046132765_20983">
                            <div class="sqs-block-content">

                                <h1 style="white-space:pre-wrap;">Frequently asked questions</h1>


                            </div>
                        </div>
                        <div class="sqs-block accordion-block sqs-block-accordion" data-block-type="69"
                             id="block-yui_3_17_2_1_1639046132765_9674">
                            <div class="sqs-block-content">
                                <?php $faq = get_all_data_array_by_table_name('faq'); ?>

                                <ul class="accordion-items-container" data-should-allow-multiple-open-items="" data-is-divider-enabled="true" data-is-first-divider-visible="true" data-is-last-divider-visible="true" data-is-expanded-first-item="" data-accordion-title-alignment="left" data-accordion-description-alignment="left" data-accordion-description-placement="left" data-accordion-icon-placement="right">
                                    <?php foreach ($faq as $val){ ?>
                                    <li class="accordion-item">


                                        <div class="accordion-divider accordion-divider--top" aria-hidden="true" style=" height: 3px; opacity: 1; "></div>


                                        <h4 class="accordion-item__title-wrapper" role="heading" aria-level="3">
                                            <button class="accordion-item__click-target" aria-expanded="false" style="padding-top: 30px;padding-bottom: 30px;padding-left: 22px;padding-right: 22px;" id="button-block-yui_3_17_2_1_1639046132765_9674-0" aria-controls="dropdown-block-yui_3_17_2_1_1639046132765_9674-0">
                                              <span class="accordion-item__title" style="padding-right: 22px;"><?php echo $val->title;?></span>

                                                <div class="accordion-icon-container" data-is-open="false"aria-hidden="true" style="height: 22px;width: 22px;">
                                                    <div class="plus">
                                                        <div class="plus__horizontal-line" style="height: 3px"></div>
                                                        <div class="plus__vertical-line" style="height: 3px"></div>
                                                    </div>
                                                </div>
                                            </button>
                                        </h4>
                                        <div class="accordion-item__dropdown" role="region" id="dropdown-block-yui_3_17_2_1_1639046132765_9674-0" aria-labelledby="button-block-yui_3_17_2_1_1639046132765_9674-0">
                                            <div class="accordion-item__description" style="padding-top: 0px;padding-bottom: 30px;padding-left: 0px;padding-right: 0px;min-width: 70%;max-width: 300px;">
                                                <?php echo $val->description;?>
                                            </div>
                                        </div>

                                        <div class="accordion-divider" aria-hidden="true" style="height: 3px;opacity: 1;"></div>

                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col sqs-col-2 span-2">
                        <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                             id="block-yui_3_17_2_1_1639046132765_23155">
                            <div class="sqs-block-content">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                     id="block-yui_3_17_2_1_1639046132765_21397">
                    <div class="sqs-block-content">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</main>