<section class="contact-contact-form">
    <div class="contact-contact-form__container">
        <div class="contact-contact-form__grid">
            <div class="contact-contact-form__info">
                <h2 class="contact-contact-form__title">
                    <?php echo esc_html(get_theme_mod('contact_title', 'Get In Touch')); ?>
                </h2>
                <div class="contact-contact-form__methods">
                    <div class="contact-contact-form__method">
                        <div class="contact-contact-form__icon">📧</div>
                        <div class="contact-contact-form__details">
                            <h4>Email</h4>
                            <p>support@missiongranted.com</p>
                        </div>
                    </div>
                    <div class="contact-contact-form__method">
                        <div class="contact-contact-form__icon">📞</div>
                        <div class="contact-contact-form__details">
                            <h4>Phone</h4>
                            <p>1-800-MISSION</p>
                        </div>
                    </div>
                    <div class="contact-contact-form__method">
                        <div class="contact-contact-form__icon">📍</div>
                        <div class="contact-contact-form__details">
                            <h4>Office</h4>
                            <p>123 Grant Street<br>San Francisco, CA 94102</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-contact-form__form">
                <form class="contact-form" id="contact-form" data-ajax-form="contact">
                    <div class="form-field">
                        <label for="contact-name">Name <span class="required">*</span></label>
                        <input type="text" id="contact-name" name="name" required>
                    </div>
                    <div class="form-field">
                        <label for="contact-email">Email <span class="required">*</span></label>
                        <input type="email" id="contact-email" name="email" required>
                    </div>
                    <div class="form-field">
                        <label for="contact-subject">Subject <span class="required">*</span></label>
                        <input type="text" id="contact-subject" name="subject" required>
                    </div>
                    <div class="form-field">
                        <label for="contact-message">Message <span class="required">*</span></label>
                        <textarea id="contact-message" name="message" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
