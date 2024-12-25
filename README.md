# Bulk User Add Plugin for WordPress

## Overview

The **Bulk User Add Plugin** for WordPress allows administrators to bulk import users from a CSV file into their WordPress site. The CSV file should contain the following data for each user:

- **Username**
- **Email**
- **Role** (optional, default is `author`)

This plugin makes it easy to add multiple users at once, saving time and reducing manual input.

---

## Features

- Bulk import users via CSV file.
- Support for custom user roles (if specified in the CSV file).
- Default role is set to **author** if no role is specified.
- Easy to use, user-friendly interface within the WordPress admin panel.

---

## Requirements

- WordPress 4.0 or higher.
- PHP 7.0 or higher.

---

## Installation

1. Download the `bulk-user-add.zip` file.
2. Log in to your WordPress admin panel.
3. Navigate to **Plugins** > **Add New**.
4. Click **Upload Plugin**, then choose the `bulk-user-add.zip` file.
5. Click **Install Now**.
6. After installation, click **Activate Plugin**.

---

## How to Use

1. Once activated, navigate to **Users** > **Bulk User Add**.
2. You’ll see a file upload field where you can upload your CSV file.
3. The CSV file should contain the following columns:
   - `username`
   - `email`
   - `role` (optional)

   Example CSV:

   username,email,role user1,user1@example.com,author user2,user2@example.com,editor user3,user3@example.com


In the example above, `user3` will be assigned the default role of `author` since no role is provided.

4. Click **Upload CSV** to start the user import process.
5. The users will be added to your WordPress site, and a confirmation message will appear when the process is complete.

---

## CSV File Format

- The CSV file should have the following headers:
- `username`: The username for the new user.
- `email`: The email address of the new user.
- `role` (optional): The role for the new user. If no role is specified, **author** will be the default.

---

## Changelog

### 1.0.0
- Initial release of the Bulk User Add Plugin.

---

## Support

If you encounter any issues, please reach out via the plugin's support page or open an issue on the GitHub repository.

---

## License

This plugin is licensed under the GPLv2 (or later) license. You can freely use, modify, and distribute the plugin.
