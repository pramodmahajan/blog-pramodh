 laravel new test
- cd test
- composer require laravel/ui
- composer require cviebrock/eloquent-sluggable
- npm install vue-router
- npm install
- npm i element-ui -S
- npm install tailwindcss
Configure
- valet link
- subl .
- .env DB name change
- php artisan ui vue --auth
- php artisan make:model -crm Post
- php artisan make:request PostRequest
- php artisan make:resource Post
- migrations
- vue-router
    * app.js
    * routes.js
- Element UI
    * app.js
- api_token
    * RegisterController
    * HomeController
    * User Model
    * app.blade
    * bootstrap.js
- Layout
    * create new component
    * <router-view></router-view>
    * home.blade
    * app.js
- API routes
    * api.php
- write request rules
- configure sluggable

import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';