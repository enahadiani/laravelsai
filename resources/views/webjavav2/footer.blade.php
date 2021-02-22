<footer id="footer" class="footer-background">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 m-b-30">
                            <address>
                                <strong>Workshop & Engineering Office</strong><br>
                                    De Primaterra Industrial Estate<br>
                                    C2A-6<br>
                                    Jalan Raya Sapan, Tegal Luar,<br>
                                    Bojongsoang, Bandung 40288<br>
                                    West Java - Indonesia<br>
                                    Phone/Fax: +62 22 87306036<br>
                                    Email: marketing@javaturbine.co.id
                            </address>
                        </div>
                    </div>
                </div>    
                   {{-- Mobile --}}
                        <div class="col-lg-5 col-mobile">
                            <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="upper" for="phone">Phone</label>
                                        <input type="text" class="form-control required" name="widget-contact-form-phone" placeholder="Enter phone" aria-required="true">
                                    </div>

                                    {{-- <div class="form-group col-lg-6">
                                        <label>Products</label>
                                        <select name="widget-contact-form-services">
                                            <option value="">Select product</option>
                                            <option value="REC">Renewable Energy Consultation</option>
                                            <option value="FS">Feasibility Study</option>
                                            <option value="DED">Detail Engineering Design</option>
                                            <option value="FBR">Fabrication</option>
                                            <option value="FBR">Fabrication</option>
                                        </select>

                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" rows="8" class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light" type="submit" id="form-submit">Send email</button>
                                </div>
                            </form>

                        </div>
                        {{-- Dekstop --}}
                        <div class="col-lg-5 offset-1 col-dekstop">
                            <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="upper" for="phone">Phone</label>
                                        <input type="text" class="form-control required" name="widget-contact-form-phone" placeholder="Enter phone" aria-required="true">
                                    </div>

                                    {{-- <div class="form-group col-lg-6">
                                        <label>Services</label>
                                        <select name="widget-contact-form-services">
                                            <option value="">Select service</option>
                                            <option value="Wordpress">Wordpress</option>
                                            <option value="PHP / MySQL">PHP / MySQL</option>
                                            <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                            <option value="Graphic Design">Graphic Design</option>
                                        </select>

                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" rows="8" class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light" type="submit" id="form-submit">Send email</button>
                                </div>
                            </form>

                        </div>        
             </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center">&copy; {{ date('Y') }} Java Turbine a member of Imaji group</div>
        </div>
    </div>
</footer>