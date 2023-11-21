1 => git clone git@github.com:nijwel/role-management.git
<br>
2 => npm install
<br>
3 => composer install
<br>
4 => Setup .env file (To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env)
<br>
5 => Setup Database

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=role-management
    DB_USERNAME=root
    DB_PASSWORD=
<br>
6 => npm run dev
<br>
7 => php artisan key:generate
<br>
8 => php artisan migrate
<br>
9 => php artisan db:seed --class=CreateUserSeeder
<br>
10 => php artisan server

<h2>Project description:</h2>
<p>Please login as a admin. After login  You will see a navber where hade some menu you can access this.</p>
<p>You can create, edit , delete form here. also manage user role permission from create and update option. if you want user access any function just checked on checkbox and update.</p>

<p>Thank you.</p>
