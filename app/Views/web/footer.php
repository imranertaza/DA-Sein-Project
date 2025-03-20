<div class="to-top hide">
    <a href="#" class="to-top-btn" uk-totop uk-scroll>
        <svg class="to-top-icon" viewBox="0 0 10 17" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
                <path class="fill" d="M4.86426.93135L9.5272 5.4216H.2013"/>
                <path class="stroke" d="M5 16V3.48078M1 16h8" stroke-width="2" stroke-linecap="square"/>
            </g>
        </svg>
    </a>
</div>
<div class="message_session" >
    <?php $message = isset($_SESSION['message']) ? $_SESSION['message'] : 0; if($message){ ?> <?php print $message; ?> <?php } ?>
</div>



<footer class="site-footer">
    <div class="footer-content">
        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Footer" data-type="block-field"
             data-updated-on="1645519027616" id="footer">
            <div class="row sqs-row">

                <div class="col sqs-col-12 span-12">
                    <?php if (isset($codeSub)){ ?>
                    <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2"
                         data-block-type="54" id="block-yui_3_17_2_80_1508967373173_6221">
                        <div class="sqs-block-content">
                    <?php if (!isset(newSession()->image_protect)) { ?>
                        <div class="form-protect-image" style="border-top: 1px sloid !important; ">
                            <form class="example" action="<?php echo base_url() ?>/Home/image_protect" method="post">
                                <div class="form-group protect-image">
                                <input type="text" class="form-code-inp" name="code" placeholder="Code" required>
                                <button class="next" type="submit"><img src="<?php echo base_url() ?>/uploads/arr.png" alt=""></button>

                            </form>
                        </div>
                    <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-04f6434df3a15da7abb7">
                        <div class="">
                            <p style="text-align:center;white-space:pre-wrap;" class="">Copyright © 2022&nbsp; | &nbsp;All rights reserved &nbsp;|&nbsp; <a
                                        href="<?php echo base_url()?>/Home/privacy_policy">Privacy Policy</a></p>
                        </div>
                    </div>
                    <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2"
                         data-block-type="54" id="block-yui_3_17_2_80_1508967373173_6221">
                        <div class="sqs-block-content">
                            <div class="sqs-svg-icon--outer social-icon-alignment-center social-icons-color-black social-icons-size-small social-icons-style-regular ">
                                <style>
                                    #block-yui_3_17_2_80_1508967373173_6221 .social-icons-style-border .sqs-svg-icon--wrapper {
                                        box-shadow: 0 0 0 2px inset;
                                        border: none;
                                    }
                                </style>
                                <nav class="sqs-svg-icon--list">
                                    <a href="http://www.linkedin.com/company/DA-SEIN" target="_blank"
                                       class="sqs-svg-icon--wrapper linkedin" aria-label="Mikkel Bøgh">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#linkedin-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#linkedin-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://www.facebook.com/DA-SEIN" target="_blank"
                                           class="sqs-svg-icon--wrapper facebook" aria-label="DA-SEIN">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#facebook-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#facebook-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="https://twitter.com/DA-SEIN" target="_blank"
                                           class="sqs-svg-icon--wrapper twitter" aria-label="DA-SEIN Architects">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#twitter-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#twitter-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://instagram.com/DA-SEINarchitects" target="_blank"
                                           class="sqs-svg-icon--wrapper instagram-unauth" aria-label="Instagram">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#instagram-unauth-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#instagram-unauth-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://pinterest.com/DA-SEINarchitects" target="_blank"
                                           class="sqs-svg-icon--wrapper pinterest-unauth" aria-label="Pinterest">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#pinterest-unauth-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#pinterest-unauth-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://vimeo.com/DA-SEINarchitects" target="_blank"
                                           class="sqs-svg-icon--wrapper vimeo-unauth" aria-label="Vimeo">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#vimeo-unauth-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#vimeo-unauth-mask"></use>
                                            </svg>
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url() ?>/npm/uikit_3.3.0/dist/js/uikit.min.js"></script>
<script src="<?php echo base_url() ?>/static/ta/51819b9fe4b03000ce6f03ea/100/scripts/site.js"
        type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--<script src="https://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>-->
<!--<link rel="stylesheet" href="https://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">-->
<link rel="stylesheet" href="<?php echo base_url() ?>/css/100/choices.min.css">
<script src="<?php echo base_url() ?>/css/100/choices.min.js"></script>


<!-- Start: Video Banners for blog posts -->
<script>
    var videoPosts = ["item-6090f220b6e26846edb37391", "item-611dfd9566cfc352e5d8f5d6", "item-615af1aa9b5b826baf13b17e", "item-615ea6fd252b1a0e6e5fc310"];
    videoPosts.includes(document.body.id) && Y.on("available", function () {
        var a = document.querySelector(".post-banner .img-wrap"), b = document.querySelector(".video-block iframe"),
            c = b && b.closest(".video-block");
        a && b && (a.innerHTML = "", a.appendChild(b), c.remove())
    }, ".video-block iframe");

    function show_gallery() {
        document.getElementById("map_area").style.display = "none";
        document.getElementById("gallery_list").style.display = "block";
        $(".checkbox").prop("checked", false);
        form_submit();
    }

    function show_map() {
        $(".checkbox").prop("checked", false);
        document.getElementById("map_area").style.display = "block";
        document.getElementById("gallery_list").style.display = "none";
    }

    function form_submit() {
        var form = $("#category-form");
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: form.serialize(),
            dataType: "text",
            success: function (response) {
                document.getElementById("map_area").style.display = "none";
                document.getElementById("gallery_list").style.display = "block";
                // alert(response);
                $("#data-gall").html(response);
            }
        });
    }

    $(document).ready(function(){
        setTimeout(function(){
            $('.message_session').html('');
        },2500);
    });

    // $('select[multiple]').multiselect();

    $(document).ready(function(){

        var multipleCancelButton = new Choices('#choices_language', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
        });

        var multipleCancelButton = new Choices('#software_ids', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
        });

        var multipleCancelButton = new Choices('#experience_country_id', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
        });

    });

    function hide_modal(){
        $('.home-modal').hide();
    }

    // $("#sub_form").on('submit', (function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: "POST",
    //         data: new FormData(this),
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         success: function(response) {
    //             // $("#form").trigger("reset"); // to reset form input fields
    //             $('.home-modal').hide();
    //         },
    //         error: function(e) {
    //             console.log(e);
    //         }
    //     });
    // }));

</script>
<!-- End: Video Banners for blog posts -->
<script data-sqs-type="imageloader-bootstrapper">if (window.ImageLoader) window.ImageLoader.bootstrap({}, document);</script>
<script>Squarespace.afterBodyLoad(Y);</script>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none" data-usage="social-icons-svg">
    <symbol id="linkedin-icon" viewBox="0 0 64 64">
        <path d="M20.4,44h5.4V26.6h-5.4V44z M23.1,18c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1 c1.7,0,3.1-1.4,3.1-3.1C26.2,19.4,24.8,18,23.1,18z M39.5,26.2c-2.6,0-4.4,1.4-5.1,2.8h-0.1v-2.4h-5.2V44h5.4v-8.6 c0-2.3,0.4-4.5,3.2-4.5c2.8,0,2.8,2.6,2.8,4.6V44H46v-9.5C46,29.8,45,26.2,39.5,26.2z"/>
    </symbol>
    <symbol id="linkedin-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M25.8,44h-5.4V26.6h5.4V44z M23.1,24.3c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,1.4-3.1,3.1-3.1 c1.7,0,3.1,1.4,3.1,3.1C26.2,22.9,24.8,24.3,23.1,24.3z M46,44h-5.4v-8.4c0-2,0-4.6-2.8-4.6c-2.8,0-3.2,2.2-3.2,4.5V44h-5.4V26.6 h5.2V29h0.1c0.7-1.4,2.5-2.8,5.1-2.8c5.5,0,6.5,3.6,6.5,8.3V44z"/>
    </symbol>
    <symbol id="facebook-icon" viewBox="0 0 64 64">
        <path d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z"/>
    </symbol>
    <symbol id="facebook-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M39.6,22l-2.8,0c-2.2,0-2.6,1.1-2.6,2.6V28h5.3l-0.7,5.3h-4.6V47h-5.5V33.3H24V28h4.6V24 c0-4.6,2.8-7,6.9-7c2,0,3.6,0.1,4.1,0.2V22z"/>
    </symbol>
    <symbol id="twitter-icon" viewBox="0 0 64 64">
        <path d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z"/>
    </symbol>
    <symbol id="twitter-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M44.7,25.5c0,0.3,0,0.6,0,0.8C44.7,35,38.1,45,26.1,45c-3.7,0-7.2-1.1-10.1-2.9 c0.5,0.1,1,0.1,1.6,0.1c3.1,0,5.9-1,8.2-2.8c-2.9-0.1-5.3-2-6.1-4.6c0.4,0.1,0.8,0.1,1.2,0.1c0.6,0,1.2-0.1,1.7-0.2 c-3-0.6-5.3-3.3-5.3-6.4c0,0,0-0.1,0-0.1c0.9,0.5,1.9,0.8,3,0.8c-1.8-1.2-2.9-3.2-2.9-5.5c0-1.2,0.3-2.3,0.9-3.3 c3.2,4,8.1,6.6,13.5,6.9c-0.1-0.5-0.2-1-0.2-1.5c0-3.6,2.9-6.6,6.6-6.6c1.9,0,3.6,0.8,4.8,2.1c1.5-0.3,2.9-0.8,4.2-1.6 c-0.5,1.5-1.5,2.8-2.9,3.6c1.3-0.2,2.6-0.5,3.8-1C47.1,23.4,46,24.5,44.7,25.5z"/>
    </symbol>
    <symbol id="instagram-unauth-icon" viewBox="0 0 64 64">
        <path d="M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z"/>
    </symbol>
    <symbol id="instagram-unauth-mask" viewBox="0 0 64 64">
        <path d="M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z"/>
    </symbol>
    <symbol id="pinterest-unauth-icon" viewBox="0 0 64 64">
        <path d="M32,16c-8.8,0-16,7.2-16,16c0,6.6,3.9,12.2,9.6,14.7c0-1.1,0-2.5,0.3-3.7 c0.3-1.3,2.1-8.7,2.1-8.7s-0.5-1-0.5-2.5c0-2.4,1.4-4.1,3.1-4.1c1.5,0,2.2,1.1,2.2,2.4c0,1.5-0.9,3.7-1.4,5.7 c-0.4,1.7,0.9,3.1,2.5,3.1c3,0,5.1-3.9,5.1-8.5c0-3.5-2.4-6.1-6.7-6.1c-4.9,0-7.9,3.6-7.9,7.7c0,1.4,0.4,2.4,1.1,3.1 c0.3,0.3,0.3,0.5,0.2,0.9c-0.1,0.3-0.3,1-0.3,1.3c-0.1,0.4-0.4,0.6-0.8,0.4c-2.2-0.9-3.3-3.4-3.3-6.1c0-4.5,3.8-10,11.4-10 c6.1,0,10.1,4.4,10.1,9.2c0,6.3-3.5,11-8.6,11c-1.7,0-3.4-0.9-3.9-2c0,0-0.9,3.7-1.1,4.4c-0.3,1.2-1,2.5-1.6,3.4 c1.4,0.4,3,0.7,4.5,0.7c8.8,0,16-7.2,16-16C48,23.2,40.8,16,32,16z"/>
    </symbol>
    <symbol id="pinterest-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M32,48c-1.6,0-3.1-0.2-4.5-0.7c0.6-1,1.3-2.2,1.6-3.4c0.2-0.7,1.1-4.4,1.1-4.4 c0.6,1.1,2.2,2,3.9,2c5.1,0,8.6-4.7,8.6-11c0-4.7-4-9.2-10.1-9.2c-7.6,0-11.4,5.5-11.4,10c0,2.8,1,5.2,3.3,6.1 c0.4,0.1,0.7,0,0.8-0.4c0.1-0.3,0.2-1,0.3-1.3c0.1-0.4,0.1-0.5-0.2-0.9c-0.6-0.8-1.1-1.7-1.1-3.1c0-4,3-7.7,7.9-7.7 c4.3,0,6.7,2.6,6.7,6.1c0,4.6-2,8.5-5.1,8.5c-1.7,0-2.9-1.4-2.5-3.1c0.5-2,1.4-4.2,1.4-5.7c0-1.3-0.7-2.4-2.2-2.4 c-1.7,0-3.1,1.8-3.1,4.1c0,1.5,0.5,2.5,0.5,2.5s-1.8,7.4-2.1,8.7c-0.3,1.2-0.3,2.6-0.3,3.7C19.9,44.2,16,38.6,16,32 c0-8.8,7.2-16,16-16c8.8,0,16,7.2,16,16C48,40.8,40.8,48,32,48z"/>
    </symbol>
    <symbol id="vimeo-unauth-icon" viewBox="0 0 64 64">
        <path d="M47,25c-0.1,2.9-2.2,6.9-6.1,12c-4.1,5.3-7.5,8-10.4,8c-1.7,0-3.2-1.6-4.4-4.8 c-0.8-3-1.6-5.9-2.4-8.9c-0.9-3.2-1.9-4.8-2.9-4.8c-0.2,0-1,0.5-2.4,1.4L17,26c1.5-1.3,2.9-2.6,4.4-3.9c2-1.7,3.5-2.6,4.4-2.7 c2.3-0.2,3.8,1.4,4.3,4.8c0.6,3.7,1,6,1.2,6.9c0.7,3.1,1.4,4.6,2.2,4.6c0.6,0,1.6-1,2.8-3c1.3-2,1.9-3.5,2-4.5 c0.2-1.7-0.5-2.6-2-2.6c-0.7,0-1.5,0.2-2.2,0.5c1.5-4.8,4.3-7.2,8.4-7C45.7,19.1,47.2,21.1,47,25z"/>
    </symbol>
    <symbol id="vimeo-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M40.9,37c-4.1,5.3-7.5,8-10.4,8c-1.7,0-3.2-1.6-4.4-4.8c-0.8-3-1.6-5.9-2.4-8.9 c-0.9-3.2-1.9-4.8-2.9-4.8c-0.2,0-1,0.5-2.4,1.4L17,26c1.5-1.3,2.9-2.6,4.4-3.9c2-1.7,3.5-2.6,4.4-2.7c2.3-0.2,3.8,1.4,4.3,4.8 c0.6,3.7,1,6,1.2,6.9c0.7,3.1,1.4,4.6,2.2,4.6c0.6,0,1.6-1,2.8-3c1.3-2,1.9-3.5,2-4.5c0.2-1.7-0.5-2.6-2-2.6c-0.7,0-1.5,0.2-2.2,0.5 c1.5-4.8,4.3-7.2,8.4-7c3.1,0.1,4.5,2.1,4.4,6C46.9,27.9,44.8,31.9,40.9,37z"/>
    </symbol>
</svg>
</body>
</html>