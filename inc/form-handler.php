<?php
add_action( 'init', function() {
    if ( ! session_id() ) {
        session_start();
    }

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['msc_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['msc_nonce'], 'msc_form_action' ) ) {
            $_SESSION['msc_notice'] = 'Błąd zabezpieczeń — odśwież stronę.';
            return;
        }

        $template_id = intval( $_POST['msc_demo_template'] );
        $slug        = sanitize_title( $_POST['msc_slug'] );
        $title       = sanitize_text_field( $_POST['msc_title'] );
        $email       = sanitize_email( $_POST['msc_admin_email'] );

        // Poprawne sprawdzenie, czy subsite o slug'u już istnieje
        $domain = $_SERVER['HTTP_HOST'];
        $path   = '/' . trim( $slug, '/' ) . '/';
        if ( get_site_by_path( $domain, $path ) ) {
            $_SESSION['msc_notice'] = 'Slug zajęty — wybierz inny.';
            return;
        }

        if ( email_exists( $email ) ) {
            $_SESSION['msc_notice'] = 'Ten email już istnieje w systemie.';
            return;
        }

        $_SESSION['msc_form_data'] = compact( 'template_id', 'slug', 'title', 'email' );
        msc_create_site_with_user();
    }
});