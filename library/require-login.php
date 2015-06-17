<?php
// register_uninstall_hook(__FILE__, 'rl_uninstall');
register_activation_hook(__FILE__, 'rl_activate');

function rl_uninstall() {
  delete_option('require_login');
  delete_option('require_login_first_notice');
}

function rl_activate() {
  add_option('require_login', '0');
  add_option('require_login_first_notice', '1');
}

function rl_post_install() {
  if (get_option('require_login_first_notice') == '1') {
    echo '<div class="updated"><p>Click <a href="'.get_admin_url(null, 'options-general.php?page=require_login').'">here</a> to turn on Require Login.</p></div>';
    delete_option('require_login_first_notice');
  }
}

add_action('admin_notices', 'rl_post_install');
add_action('admin_menu', 'rl_menu');

function rl_menu() {
  add_options_page('Require Login', 'Require Login', 'manage_options', 'require_login', 'require_login');
}

function require_login() {
  ?>
  <div>
    <h2><?php print __('Require Login', 'require_login'); ?></h2>
    <form method="post" action="options.php">
      <?php settings_fields('require_login'); ?>
      <?php do_settings_sections('require_login'); ?>

      <input type="submit" name="Submit" value="<?php _e('Update Options ?') ?>" />
    </form>
  </div>

  <?php
}

// add the admin settings and such
add_action('admin_init', 'plugin_admin_init');

function plugin_admin_init() {
  register_setting('require_login', 'require_login', 'plugin_options_validate');
  //register_setting('require_login', 'require_login');
  add_settings_section('rl_main', 'Main Options', 'rl_section_text', 'require_login');
  add_settings_field('require_login', 'Enabled?', 'rl_setting_string', 'require_login', 'rl_main');
}

function rl_section_text() {
  echo '<p>Settings for the Require Login Plugin. This option to require a login for the site is currently <b>';
  if (get_option('require_login') != '1') {
    print 'off';
  } else {
    print 'on';
  }
  print '</b>.</p>';
}

function rl_setting_string() {
  ?><input name="require_login" id="rl_require_login" type="checkbox" value="1" class="code" <?php print checked(1, get_option('require_login'), false); ?> /><?php
}

// validate our options
function plugin_options_validate($input) {

  $newinput = trim($input);
  if (!preg_match('/^[0-1]{1}$/i', $newinput)) {
    $newinput = '0';
  }
  return $newinput;
}

add_action( 'parse_request', 'dmk_redirect_to_login_if_not_logged_in', 1 );
/**
 * Redirects a user to the login page if not logged in.
 *
 * @author Daan Kortenbach
 */
function dmk_redirect_to_login_if_not_logged_in() {
  is_user_logged_in() || auth_redirect();
}


add_filter( 'login_url', 'dmk_strip_loggedout', 1, 1 );
/**
 * Strips '?loggedout=true' from redirect url after login.
 *
 * @author Daan Kortenbach
 *
 * @param  string $login_url
 * @return string $login_url
 */
function dmk_strip_loggedout( $login_url ) {
  return str_replace( '%3Floggedout%3Dtrue', '', $login_url );
}

 ?>