<?php
function msc_create_site_with_user() {
    if ( ! function_exists( 'ns_cloner_perform_clone' ) ) {
        $_SESSION['msc_notice'] = 'Wtyczka NS Cloner nie jest aktywna lub zbyt stara.';
        return;
    }

    $data     = $_SESSION['msc_form_data'];
    $password = wp_generate_password( 12, true );

    $user_id = wp_create_user( $data['email'], $password, $data['email'] );
    if ( is_wp_error( $user_id ) ) {
        $_SESSION['msc_notice'] = 'Błąd tworzenia użytkownika: ' . $user_id->get_error_message();
        return;
    }

    $response = ns_cloner_perform_clone( array(
        'source_id'    => $data['template_id'],
        'target_name'  => $data['slug'],
        'target_title' => $data['title'],
        'user_id'      => $user_id,
    ) );

    if ( is_wp_error( $response ) ) {
        $_SESSION['msc_notice'] = 'Błąd klonowania: ' . $response->get_error_message();
        return;
    }

    // Próbujemy odczytać ID nowo utworzonej strony z odpowiedzi (jeśli Cloner je zwraca)
    $clone_id = get_blog_id_from_url( network_home_url( $data['slug'] . '/' ) );

    if ( $clone_id ) {
        add_user_to_blog( $clone_id, $user_id, 'administrator' );
    }

    $url = network_home_url( $data['slug'] . '/' );
    $_SESSION['msc_notice'] = "✅ Podstrona utworzona: <a href='$url'>$url</a><br>Email: {$data['email']}<br>Hasło: $password";

    unset( $_SESSION['msc_form_data'] );
}