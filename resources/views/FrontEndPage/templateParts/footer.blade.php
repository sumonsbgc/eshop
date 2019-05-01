<div class="footer">

    <div class="footer-top">

        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <div class="footer-top-section text-center pt-5 pb-2">

                        <h4 class="mt-lg-5 mb-3">Get To Know Us</h4>
                        <a href="/about-us">About Us</a>
                        <a href="/privacy-policy">Privacy & Policy</a>
                        <a href="/terms-conditions">Terms & Condition</a>
                        <a href="/faq">FAQ</a>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="footer-top-section text-center pt-5 pb-2">
                        <h4 class="mt-lg-5 mb-3">Let Us Help You</h4>

                        <a href="/myaccount">Your Account</a>
                        <a href="/myaccount#tab-4">Your Order</a>
                        <a href="">Click & Collect</a>
                        <a href="">How To Place an Order</a>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="footer-top-section text-center pt-5 pb-2">

                        <h4 class="mt-lg-5 mb-3">Get In Touch With Us</h4>
                        <a href="/contact-us">Contact Us</a>
                        <a href="/dada-bangla-blog">Our Blog</a>
                        <a href="/admin">Sell On Our Page</a>
                        <a href="#">Our Club</a>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="footer-top-section text-center pt-5 pb-2">

                        <h4 class="mt-lg-5 mb-3">Dada Bangla Limited</h4>

                        <span><i class="icofont-location-pin"></i>House-01, Road-27/A, Rupnagar Commercial Area, Mirpur, Dhaka-1216 Dhaka, Bangladesh</span>
                        <span><i class="icofont-phone"></i> 01616408873</span>
                        <span><i class="fas fa-envelope"></i> info@dadabangla.com</span>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="border-top"></div>



                    <div class="row py-5">

                        <div class="col-lg-8 text-center">

                            <div class="subscription">

                                <form action="{{ url('/email_subscribe') }}" method="post" class="form-inline">
                                    @csrf
                                    <label>Sign Up For Newsletter</label>
                                    <input type="email" name="subscribe_mail" placeholder="Enter Your Email...." class="form-control">
                                    <button type="submit" class="subscription-btn">Subscribe</button>
                                </form>

                            </div>

                        </div>

                        <div class="col-lg-4 text-lg-right text-md-right text-sm-center text-center">

                            <div class="social-follow d-inline-block">

                                <span>Follow Us On </span>

                                <div class="social-links">

                                    <a href="https://www.facebook.com/dadabanglalimited/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://instagram.com" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="https://twitter.com" class="social-link"><i class="fab fa-twitter"></i></a>
                                    <a href="https://pinterest.com" class="social-link"><i class="fab fa-pinterest-p"></i></a>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <p>&copy; All Rights Reserved By Ecommerce</p>

                </div>

            </div>

        </div>

    </div>

</div>