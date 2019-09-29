# Notes

## Homestead
cd ~/Homestead
vagrant up
vagrant ssh
atom Homestead.yaml
vagrant provision
vagrant halt

## Artisan
php artisan serve
php artisan make:controller PostController
php artisan make:controller --resource PostsController
php artisan route:list
php artisan make:migration create_posts_table --create="posts"
php artisan migrate
php artisan make:migration add_is_admin_column_to_posts_tables --table=posts
php artisan migrate:rollback
php artisan migrate:status
php artisan make:migration rename_body_to_content_in_posts_table --table=posts
php artisan make:model Post
php artisan make:migration add_deleted_at_column_to_posts_table --table=posts
php artisan migrate:fresh
php artisan make:model Role -m
php artisan make:migration create_users_roles_table --create=role_user
php artisan make:model Country -m
php artisan make:migration add_country_id_column_to_users --table=users
php artisan make:model Photo -m
php artisan make:model Video -m
php artisan make:model Tag -m
php artisan make:model Taggable -m

## Laravel
laravel new demo


## Tinker
php artisan tinker
$post = App\Post::create(['title'=>'PHP from Tinker', 'content'=>'PHP TINKER CONTENT WOOHOO']);
$post = new App\Post;
$post->title = 'New Tinker Title';
$post->content = 'New Tinker Content';
$post
$post->save();
$post = App\Post::find(5);
$post = App\Post::find(5)->first();
