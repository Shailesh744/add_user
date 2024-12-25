<?php
/*
Plugin Name: Bulk User Adder
Description: Add users in bulk as authors or editors from a CSV file.
Version: 1.0
Author: Your Name
*/

// Add a menu in the WordPress admin
define('BULK_USER_ADDER_PLUGIN_DIR', plugin_dir_path(__FILE__));

add_action('admin_menu', function() {
    add_menu_page('Bulk User Adder', 'Bulk User Adder', 'manage_options', 'bulk-user-adder', 'bulk_user_adder_page', 'dashicons-groups');
});

function bulk_user_adder_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    echo '<div class="wrap">
            <h1>Bulk User Adder</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="bulk_user_csv" accept=".csv" required />
                <input type="submit" name="upload_csv" class="button button-primary" value="Upload and Add Users" />
            </form>
          </div>';

    if (isset($_POST['upload_csv']) && isset($_FILES['bulk_user_csv'])) {
        $file = $_FILES['bulk_user_csv']['tmp_name'];
        if (($handle = fopen($file, 'r')) !== false) {
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Skip the header row
                if ($row++ == 0) continue;

                $username = sanitize_text_field($data[0]);
                $email = sanitize_email($data[1]);
                $password = wp_generate_password(12, true, true); // 12-character password with strong randomness

                $role = 'author'; // Set author role explicitly


                if (!email_exists($email) && !username_exists($username)) {
                    $user_id = wp_create_user($username, $password, $email);

                    if (!is_wp_error($user_id)) {
                        $user_data = get_userdata($user_id);
                        wp_new_user_notification($user_id, null, 'user'); // Notify the user with their login credentials
                    }
                    
                     else {
                        echo '<div class="notice notice-error"><p>Error creating user: ' . $username . '</p></div>';
                    }
                } else {
                    echo '<div class="notice notice-warning"><p>User already exists: ' . $username . '</p></div>';
                }
            }
            fclose($handle);

            echo '<div class="notice notice-success"><p>Users added successfully!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Failed to open the uploaded file.</p></div>';
        }
    }
}

?>
