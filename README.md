# Content Application

This project requires a few sensitive values that should not be committed to version control.  
Provide them either as environment variables or by creating a `config.local.php` file in the project root which defines the constants used in `config.php`.

## Required variables

- `DB_HOST` – database hostname
- `DB_NAME` – database name
- `DB_USER` – database user
- `DB_PASS` – database password
- `GEMINI_API_KEY` – API key used for requests to the Google Gemini API
- `ANTHROPIC_API_KEY` – API key used for Anthropic Claude
- `CURL_VERIFY_SSL` – optional flag to disable SSL certificate verification when set to `false` (defaults to `true`)

Example `config.local.php`:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_db');
define('DB_USER', 'my_user');
define('DB_PASS', 'secret');
define('GEMINI_API_KEY', 'your-api-key');
define('ANTHROPIC_API_KEY', 'your-anthropic-key');
// Optional: disable SSL certificate verification for debugging
define('CURL_VERIFY_SSL', false);
```

This file should **not** be committed to version control.

## PHP extensions

The application requires several standard PHP extensions. The admin settings
page checks for the following at runtime:

- `pdo`
- `curl`
- `zip` *(required for the DOCX export feature)*
- `json`

Additionally the code relies on these common extensions:

- `dom`
- `mbstring`
- `openssl`

## Managing language models

Administrators can define multiple API endpoints for text generation. Use **Ustawienia** in the admin panel to add, edit or delete models in the *Modele językowe* section. Each model defines the endpoint URL and generation configuration parameters (temperature, topK, topP, max tokens).

When creating a task, choose one of the configured models from the model selector. The queue processor will call the selected endpoint with its configuration.

To quickly verify your setup, open `test_api.php` in the admin area and pick a model to send a sample request.
