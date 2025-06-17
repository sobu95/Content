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

## Managing language models

Administrators can define multiple API endpoints for text generation. Use **Ustawienia** in the admin panel to add, edit or delete models in the *Modele językowe* section. Each model defines the endpoint URL and generation configuration parameters (temperature, topK, topP, max tokens).

When creating a task, choose one of the configured models from the model selector. The queue processor will call the selected endpoint with its configuration.
