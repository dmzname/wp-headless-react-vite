<?php

add_action('rest_api_init', 'wp_rest_user_endpoints');


/**
 * Register a new user
 *
 * @param  WP_REST_Request $request Full details about the request.
 * @return array $args.
 **/

function wp_rest_user_endpoints() {
    register_rest_route('wp/v2', 'users/register', array(
        'methods' => 'POST',
        'callback' => 'create_user_handler',
    ));
}


function create_user_handler($request) {

    $response = array();
    $parameters = $request->get_json_params();
    var_dump($parameters);
    $username = sanitize_text_field($parameters['username']);
    $email = sanitize_text_field($parameters['email']);
    $password = sanitize_text_field($parameters['password']);

    $error = new WP_Error();

    if (empty($username)) {
        $error->add(400, __("Username field 'username' is required.", 'dmz_wp_api'), array('status' => 400));
        return $error;
    }

    if (empty($email)) {
        $error->add(401, __("Email field 'email' is required.", 'dmz_wp_api'), array('status' => 400));
        return $error;
    }

    if (empty($password)) {
        $error->add(404, __("Password field 'password' is required.", 'dmz_wp_api'), array('status' => 400));
        return $error;
    }

    $user_id = username_exists($username);

    if (!$user_id && email_exists($email) == false) {

        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // Ger User Meta Data (Sensitive, Password included. DO NOT pass to front end.)
            $user = get_user_by('id', $user_id);
            // $user->set_role($role);
            $user->set_role('subscriber');
            // WooCommerce specific code
            if (class_exists('WooCommerce')) {
                $user->set_role('customer');
            }
            // Ger User Data (Non-Sensitive, Pass to front end.)
            $response['code'] = 201;
            $response['message'] = __("User '" . $username . "' Registration was Successful", "dmz_wp_api");
        } else {
            return $user_id;
        }
    } else {
        $error->add(406, __("Email already exists, please try 'Reset Password'", 'dmz_wp_api'), array('status' => 400));
        return $error;
    }

  return new WP_REST_Response($response);
}

/* TODO: 
 * Проверить кодируется ли пароль
 */ 