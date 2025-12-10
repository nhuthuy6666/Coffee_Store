<div class="contact-form">
    <div class="contact-form-container">
        <div class="contact-input">
            <h2>Reserve your spot!</h2>
            <p>Walk-ins are always welcome, but we recommend reserving a table in advance during peak hours.</p>
            <div class="form-row">
                <div class="form-field">
                    <p>Name</p>
                    <input type="text" placeholder="Jane Smith">
                </div>
                <div class="form-field">
                    <p>Phone</p>
                    <input type="text" placeholder="(000)-00-00">
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <p>Reservation Date</p>
                    <input type="date">
                </div>
                <div class="form-field">
                    <p>Reservation Time</p>
                    <input type="time">
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <p>Number of Guests</p>
                    <input type="number" placeholder="2">
                </div>
                <div class="form-field">
                    <p>Location</p>
                    <input type="text" placeholder="Main Floor">
                </div>
            </div>
            <div class="form-field-full">
                <p>Notes</p>
                <textarea placeholder="Any special requests?"></textarea>
            </div>
            <button class="form-submit">Reserve Now</button>
        </div>
        <div class="contact-image-panel" style="background-image: url('<?php echo esc_url($data->contact_form_img['url']); ?>');">
            <button class="contact-info-btn">
                <p class="contact-info-label">Phone</p>
                <?php if ($data->contact_form_phone) : ?>
                <p class="contact-info-value"><?php echo esc_html($data->contact_form_phone); ?></p>
                <?php endif; ?>
            </button>
            <button class="contact-info-btn">
                <p class="contact-info-label">Email</p>
                <?php if ($data->contact_form_email) : ?>
                <p class="contact-info-value"><?php echo esc_html($data->contact_form_email); ?></p>
                <?php endif; ?>
            </button>
        </div>
    </div>
</div>