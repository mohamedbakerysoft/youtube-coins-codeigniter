# Youtube Coins 3.0.2

Youtube Coins is a CodeIgniter-based rewarded video platform. Users earn coins for watching videos, creators spend coins to boost their own content, and administrators manage campaigns, transactions, and payment approvals.

## Demo Accounts

- Member: `demo@youtubecoins.demo` / `123456`
- Admin: `admin@youtubecoins.demo` / `123456`

## Requirements

- PHP 7.4 with `mysqli`, `mbstring`, `curl`, `gd`, `json`, and `openssl`
- MariaDB/MySQL 5.7+
- Apache or Nginx with URL rewriting enabled
- Writable folders:
  - `application/cache`
  - `application/logs`
  - `assets/uploads`

## Installation

1. Upload the source code to your web root.
2. Import `assets/installer/youtubecoins.sql` into a new empty database.
3. Edit `application/config/config.php`:
   - Set `APP_BASE_URL` at the web server level or hardcode `$config['base_url']`
   - Keep clean URLs enabled with `$config['index_page'] = ''`
4. Edit `application/config/database.php` with your database credentials.
5. Set the environment to `production` through the `CI_ENV` server variable.
6. Confirm the site loads, then sign in with the demo credentials above.

## Local Docker Run

- Start services: `docker-compose up --build`
- App URL: `http://127.0.0.1:8085`
- phpMyAdmin: `http://127.0.0.1:8000`
- DB host: `mysql`
- DB name: `youtubecoins`
- DB user: `root`
- DB password: `root`

## Security note for new deployments

- Set a unique `APP_ENCRYPTION_KEY` environment variable of at least 32 characters **before first use**. The application retains its legacy built-in key when this variable is absent to avoid silently breaking existing installations; this fallback is **not secure for new production installations**.
- Do not rotate the key on an existing installation without a migration plan: sessions and previously encrypted values may become unreadable.
- Replace all demo credentials before exposing the application to the internet. The demo accounts listed above are publicly documented and must never be used in production.
- **Not yet cleared for marketplace resubmission:** the legacy PHP 7.4 / CodeIgniter version and other reviewer security findings still require code audit and remediation.

## Package Notes

- The repository intentionally excludes runtime cache, logs, and local database contents.
- Social login keys are blank by default.
- reCAPTCHA is disabled by default in the demo data and can be enabled later from the admin settings.
