# Social Laravel

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

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URL=

LINKEDIN_CLIENT_ID=
LINKEDIN_CLIENT_SECRET=
LINKEDIN_REDIRECT_URL=

BITBUCKET_CLIENT_ID=
BITBUCKET_CLIENT_SECRET=
BITBUCKET_REDIRECT_URL=

GITLAB_CLIENT_ID=
GITLAB_CLIENT_SECRET=
GITLAB_REDIRECT_URL=
```

#### For create your social apps go to next links:
- [GitHub OAuth application](https://github.com/settings/applications/new)
- [Twitter Apps](https://apps.twitter.com)
- [Facebook Apps](https://developers.facebook.com/apps/)
- [Google Console Apps](https://console.developers.google.com/)
- [LinkedIn Apps](https://www.linkedin.com/developer/apps)
- [Bitbucket Apps](https://bitbucket.org/account/user/{user}/api)
- [GitLab Apps](https://gitlab.com/profile/applications)
