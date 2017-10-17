# The Majesty of Vue.js 2

> Creating beautifully flexible social authentication that automatically works with any service with [Socialite](https://github.com/laravel/socialite).

## Build Setup

``` bash
# Clone repository
git clone git@github.com:cesaramirez/social-laravel.git

# install dependencies php
composer install

# install dependencies js, css
yarn install

# build for dev
yarn run dev

#migrate database
php artisan migrate

#set config variables in .env for social apps
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_REDIRECT_URL=

TWITTER_CLIENT_ID=
TWITTER_CLIENT_SECRET=
TWITTER_REDIRECT_URL=

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT_URL=
```

#### For create your social apps go to next links:
- [GitHub OAuth application](https://github.com/settings/applications/new)
- [Twitter Apps](https://apps.twitter.com)
- [Facebook Apps](https://developers.facebook.com/apps/)
