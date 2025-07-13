<?php
function msc_get_demo_sites() {
    // Wpisz ręcznie ID podstron używanych jako demo
    return [
        2 => 'Demo Sklep',
        3 => 'Demo Blog',
        4 => 'Demo Portfolio'
    ];
}

function msc_render_form_shortcode() {
    ob_start();
    include MSC_SC_DIR . 'templates/form.php';
    return ob_get_clean();
}