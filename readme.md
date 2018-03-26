# 1 - Install Project Locally

### Default commands

```
git clone <link> cacula-api
cd cacula-api
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:generate

```

### Change database connection information in .env

Change the fields DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD and use the env variables for facebook informed in Trello.

```
php artisan migrate
php artisan db:seed
```

# 2 - Reset and Update Password from API

### API Endpoint

```
protocol:://api/password/email
```

### API Headers

```
Accept  application/json
```

### API Method

```
POST
```

### API Parameters

```
email [your-email-address]
```

### API Response

```json
{
  "data": {
    "token": "770f6138f62a5da086881a4bf8799e7d7fc3fc60d30e6f35ad58e4f9496fd597"
  },
  "message": ""
}
```

## Update Password

### API Endpoint

```
protocol:://api/password/reset
```

### API Headers

```
Accept  application/json
```

### API Method

```
POST
```

### API Parameters

```
email [your-email-address]
password [new-password]
password_confirmation [retype-new-password]
token [the-token-you-get-from-previous-one]
```

### API Response

```json
{
  "data": null,
  "message": "Your password has been reset!"
}
```