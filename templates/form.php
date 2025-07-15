
<?php
if ( ! session_id() ) session_start();
if ( empty( $_SESSION['msc_captcha_a'] ) || empty( $_SESSION['msc_captcha_b'] ) ) {
    $_SESSION['msc_captcha_a'] = rand( 1, 9 );
    $_SESSION['msc_captcha_b'] = rand( 1, 9 );
}
$msc_captcha_a = $_SESSION['msc_captcha_a'];
$msc_captcha_b = $_SESSION['msc_captcha_b'];
if ( isset( $_SESSION['msc_notice'] ) ) {
    echo '<div class="msc-notice">' . esc_html( $_SESSION['msc_notice'] ) . '</div>';
    unset( $_SESSION['msc_notice'] );
}
?>

<form method="post" class="msc-site-creator-form">
    <label>Wybierz demo:</label>
    <select name="msc_demo_template">
        <?php foreach ( msc_get_demo_sites() as $id => $title ) : ?>
            <option value="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></option>
        <?php endforeach; ?>
    </select>

    <label>Slug (np. moja-strona):</label>
    <input type="text" name="msc_slug" required>

    <label>Tytuł strony:</label>
    <input type="text" name="msc_title" required>

    <label>Email administratora:</label>
    <input type="email" name="msc_admin_email" required>

    <label>Anty-spam: ile to jest <?php echo $msc_captcha_a; ?> + <?php echo $msc_captcha_b; ?>?</label>
    <input type="number" name="msc_captcha_answer" required>

    <?php wp_nonce_field( 'msc_form_action', 'msc_nonce' ); ?>
    <button type="submit">Utwórz stronę</button>
</form>