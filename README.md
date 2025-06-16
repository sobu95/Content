# Content Application

This project requires a few sensitive values that should not be committed to version control.  
Provide them either as environment variables or by creating a `config.local.php` file in the project root which defines the constants used in `config.php`.

## Required variables

- `DB_HOST` – database hostname
- `DB_NAME` – database name
- `DB_USER` – database user
- `DB_PASS` – database password
- `GEMINI_API_KEY` – API key used for requests to the Google Gemini API

Example `config.local.php`:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_db');
define('DB_USER', 'my_user');
define('DB_PASS', 'secret');
define('GEMINI_API_KEY', 'your-api-key');
```

This file should **not** be committed to version control.
