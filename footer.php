<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProfitIsle
 */

?>

<footer id="colophon" class="site-footer section-footer">
    <div class="container py-5">
        <div class="row align-items-center py-4 px-4 px-md-0">
            <div class="col-md-3">
                <?php
                the_custom_logo();
                ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 mt-4">
                <h5>Get in touch</h5>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="col-12 mb-2">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/address.svg" alt="">
                            <span><a href="#">Address</a></span>
                        </div>
                        <div class="col-12 mb-2">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/phone.svg" alt="">
                            <span><a href="#">Phone</a></span>
                        </div>
                        <div class="col-12 mb-2">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/mail.svg" alt="">
                            <span><a href="#">Mail</a></span>
                        </div>
                        <div class="col-12 mb-2">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/follow us.svg" alt="">
                            <span><a href="#">Follow us</a></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <h6>
                                <a href="#">27 13 Lowe Havan</a>
                            </h6>
                        </div>
                        <div class="col-12">
                            <h6>
                                <a href="#"> 111
                                    222 3333 444</a></h6>
                        </div>
                        <div class="col-12">
                            <h6>
                                <a href="#">Business@info.com</a>
                            </h6>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/fb.svg" alt=""></a>
                                </div>
                                <div class="col-3">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/linked in.svg" alt=""></a>
                                </div>
                                <div class="col-3">
                                    <a href="#"> <img src="<?php echo get_template_directory_uri() ?>/assets/twitter.svg" alt=""></a>
                                </div>
                                <div class="col-3">
                                    <a href="#"> <img src="<?php echo get_template_directory_uri() ?>/assets/youtube.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-6 col-md-2 mt-5 mt-md-0 ps-md-5">
                <div class="row">
                    <div class="col-12">
                        <h6>
                            <a href="#">HOME</a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">
                                ABOUT
                            </a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">
                                SOLUTIONS
                            </a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">RESOURCES</a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">CONTACT US</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mt-md-0 mt-5">
                <div class="row">
                    <div class="col-12">
                        <h6>
                            <a href="#">PRIVACY POLICY</a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">TERMS & CONDITIONS</a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#"> ENGAGEMENT AGREEMENT</a>
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6>
                            <a href="#">FAQ</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blue-container py-2 text-center">
        <h6>@Profit isle
            <script>
                document.write(/\d{4}/.exec(Date())[0])
            </script>
            .Privacy policy. Terms and conditions
        </h6>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
