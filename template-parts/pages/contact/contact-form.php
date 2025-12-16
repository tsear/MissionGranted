<section class="contact-section">
    <div class="contact-section__container">
        <div class="contact-section__grid">
            <div class="contact-section__info">
                <h2 class="contact-section__title">
                    <?php echo esc_html(get_theme_mod('contact_title', 'Get In Touch')); ?>
                </h2>
                <div class="contact-section__methods">
                    <div class="contact-section__method">
                        <div class="contact-section__icon">📧</div>
                        <div class="contact-section__details">
                            <h4>Email</h4>
                            <p>support@missiongranted.com</p>
                        </div>
                    </div>
                    <div class="contact-section__method">
                        <div class="contact-section__icon">📞</div>
                        <div class="contact-section__details">
                            <h4>Phone</h4>
                            <p>1-800-MISSION</p>
                        </div>
                    </div>
                    <div class="contact-section__method">
                        <div class="contact-section__icon">📍</div>
                        <div class="contact-section__details">
                            <h4>Office</h4>
                            <p>123 Grant Street<br>San Francisco, CA 94102</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-section__form">
                <form class="contact-form" method="post">
                    <div class="contact-form__field">
                        <label for="contact-name">Name</label>
                        <input type="text" id="contact-name" name="name" required>
                    </div>
                    <div class="contact-form__field">
                        <label for="contact-email">Email</label>
                        <input type="email" id="contact-email" name="email" required>
                    </div>
                    <div class="contact-form__field">
                        <label for="contact-subject">Subject</label>
                        <input type="text" id="contact-subject" name="subject" required>
                    </div>
                    <div class="contact-form__field">
                        <label for="contact-message">Message</label>
                        <textarea id="contact-message" name="message" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
