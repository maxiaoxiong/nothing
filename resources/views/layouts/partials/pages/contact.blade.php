<div id="primary" class="eight columns">

    <section>

        <h1>Hello. Let's talk.</h1>

        <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
            nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
            cursus a sit amet mauris. Morbi accumsan ipsum velit. </p>

        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
            nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
            cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
            ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

        <div id="contact-form">

            <!-- form -->
            <form name="contactForm" id="contactForm" method="post" action="">
                <fieldset>

                    <div class="half">
                        <label for="contactName">Name <span class="required">*</span></label>
                        <input name="contactName" type="text" id="contactName" size="35" value="" />
                    </div>

                    <div class="half pull-right">
                        <label for="contactEmail">Email <span class="required">*</span></label>
                        <input name="contactEmail" type="text" id="contactEmail" size="35" value="" />
                    </div>

                    <div>
                        <label for="contactSubject">Subject</label>
                        <input name="contactSubject" type="text" id="contactSubject" size="35" value="" />
                    </div>

                    <div>
                        <label  for="contactMessage">Message <span class="required">*</span></label>
                        <textarea name="contactMessage"  id="contactMessage" rows="15" cols="50" ></textarea>
                    </div>

                    <div>
                        <button class="submit">Submit</button>
                           <span id="image-loader">
                              <img src="images/loader.gif" alt="" />
                           </span>
                    </div>

                </fieldset>
            </form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"></div>
            <!-- contact-success -->
            <div id="message-success">
                <i class="icon-ok"></i>Your message was sent, thank you!<br />
            </div>

        </div>

    </section> <!-- section end -->

</div>
