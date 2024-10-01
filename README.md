<div align=center>

# Framework Base Programming <br> Laravel Assignment
Fayza Aqila Bachtiar - 5025221087

</div>

### Overview
The assignment requires us to work on a website programmed using laravel framework and a development environment. For this assignment, I choose to use `laravel herd` as my development environment.

## Week 1
In this first week, our objectives are:

- installing the development environment
- directories structure (getting familiar with the framework's structure)
- using blade and their components

From the tutorial video(s) that we are given, there are 4 main webpages: `homepage`, `about`, `blog`, and `contact`.  As a 'report' form of the assignment, these are the four UI pages from my website:

![image](https://github.com/user-attachments/assets/5f1e44bf-1e0b-4e25-b6c1-d1d687035fc9)
![image-1](https://github.com/user-attachments/assets/d73b1c3a-cbf2-420f-90b6-62896ba8b472)
![image-2](https://github.com/user-attachments/assets/61fc481a-1414-4111-a67b-0e3c9af9b4ef)
![image-3](https://github.com/user-attachments/assets/67c2cc1d-ef0a-4261-bad4-4b80709bdfe5)

The main attractives from this page is all basically a free `css tailwind` template all straight from the tutorial. There are no big difference (yet) from all pages. To narrow explanation, it will be best by describing the main 3 parts of the web.

### navigation bar (navbar)
![image-4](https://github.com/user-attachments/assets/2bf2a46f-134f-4812-b9fe-4e84fa31eccb)

The navbar contains 6 objectives: a logo, 4 navigation links (to other pages) and a profile. In my navbar, I made small changes beside the video, that is changing the navbar's color (previously `bg-gray-800` to now a cheerful `bg-yellow-100`), then adding my own logo and profile image.

![image-5](https://github.com/user-attachments/assets/4b2023d9-ddbb-4dd0-a5ba-b14b9e9178e0)

in adding those local images, is to first make a `img` directory in the `public` directory. Then calling them as dir paths in the code `src="img/logo.png"` and `src="img/snopi.jpeg"`. 

When using the laravel framework, there are these 'shortcuts' to make programming the website easier, that is by making the codes as 'templates'.

For example, visualize each webpage as a 'usual' `blade` code, where there are seperately 4 blades and later on 4 different contents in 4 different pages. However, for all 'template' views in all pages, we utilize the blade files that became `components` using the command `php artisan make:component <component_name>`. 

![image-6](https://github.com/user-attachments/assets/0686e054-d663-4637-95ed-fbef38289efb)

The navbar uses 2 components: [navbar.blade.php](/resources/views/components/navbar.blade.php) and [navlink.blade.php](/resources/views/components/navlink.blade.php) both located in `resources/views/components` dir. 
- The `navlink` component is to help navigate the user of which active page they are on. Like for instance, if they are in the homepage, then the homepage section shall in be colored as grey in the navbar, whereas the other sections are just plain yellow background. 
- the `navbar` component itself had the original tailwind code of the navbar with the `navlink` component called using `<x-navlink>`: 
    ```html
    <div class="ml-10 flex items-baseline space-x-4">
        <x-navlink href="/" :active="request() -> is('/')">home</x-navlink>
        <x-navlink href="/about" :active="request() -> is('about')">about</x-navlink>
        <x-navlink href="/blog" :active="request() -> is('blog')">blog</x-navlink>
        <x-navlink href="/contact" :active="request() -> is('contact')">contact</x-navlink>
    </div> 
    ```

Then there is another 'unactive' feature in the navbar. That is when we click on the `profile` picture, there shall be a small pop up of `your profile`, `settings` and `sign out`. Which codes are also a part of the tailwind original code.

![image-7](https://github.com/user-attachments/assets/1323b339-7f2a-46d4-8c75-eb4cef71b141)
```html
<div x-show="isOpen"
    x-transition:enter="transition ease-out duration-100 transform"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1
    ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" 
    aria-labelledby="user-menu-button" tabindex="-1">
    <!-- Active: "bg-gray-100", Not Active: "" -->
    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
</div>
```

and last from the navbar is the `mobile` version. Where the website was made responsive from the tailwind template. So when the web window was minimized, it shows a simple responsive view.
<img width="1440" alt="Untitled design (9)" src="https://github.com/user-attachments/assets/fcd60312-5e5b-4701-963f-8e1644236eec">

when minimized, the navbar only contains the logo and a simple three line icon on the upper left. When the icon is clicked, it will preview the previous navigation menus and profile menus. 

### header
![image-8](https://github.com/user-attachments/assets/5c6020c0-e55f-4bb4-aae2-66768c812858)

Quite different from the navbar, the header had a lot simple code structure, with only one blade component [header.blade.php](/resources/views/components/header.blade.php). However, to determine each text shown in each page, is to first add an `associative array` in the [web.php](/routes/web.php), just beside the page that connnect each web page.

```php
Route::get('/', function () {
    return view('home', ['title' => 'homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'blog']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});
```
the `title` stated each page where later will be shown in the header. But instead of putting it in the exact header component file, we will call it later in the [home.blade.php](/resources/views/home.blade.php). So it will appear as this:

- `header.blade.php`
    ```html
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
        </div>
    </header>
    ```
- `home.blade.php`
    ```html
    <x-slot:title>{{ $title }}</x-slot:title>
    ```

Since the associative array in the route is connected to each web page blade, it is not possible to directly call them from the header component. So, within the header component, it will still be filled with the `slot` variable, then later on in the home blade we use `x-slot:title` and call the `title` variable in it. From there all three files are connected.

### page content
![image-9](https://github.com/user-attachments/assets/9a07ae0c-da52-479c-915e-34ffb90b5cb5)
Before filling in content, there is a need to explain one more component, the [layout.blade.php](/resources/views/components/layout.blade.php). Since every html file had a certain structure, so instead of repeating it all the time, the `layout` component came in handy. Within the component, is the basic html code, from `doctype` to the end `</html>` and in the `<body> </body>` is where the navbar and header component is called using `<x-navbar>` and `<x-header>` and in the `<main>`, is a usual layouting code and a `$slot` variable for the real page content later filled in each page blades, using `<x-layout>`.

- `layout.blade.php`
    ```html
    <body class="h-full">
        <div class="min-h-full">
            <x-navbar></x-navbar>
    
            <x-header>{{ $title }}</x-header>

            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>  
    </body>
    ```
- `home.blade.php` - for example
    ```html
    <x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>

        <h3>this is homepage! :)</h3>
    </x-layout>
    ```

Those are all necessary UI changes made from the first-four tutorial videos in the first week. Thank you >.<

<br>

## Week 2
In this week, our objectives are:

- making a view-concept for article data
- understanding the model concept
- implementing of both the view and model concept

### view
The goal of the view is quite simple, displaying articles in the blog page and articles datas are accessed from the route (this is actually an easier way to understand of the view and model concept later on).

![Screenshot (359)](https://github.com/user-attachments/assets/3988e9b7-45ac-4446-b5f9-4fc5972f8211)

There will be 4 components of the article showed in the blog page. `title`, `author details`, `content` and finally `read-more button`. Why having a read more button? because the goal of the page is just to display all the available ariticles, not the whole content of all articles. Also, due to this need, where there will be am article communal page and an individual page, the blades `blog.blade.php` will be renamed [posts.blade.php](/resources/views/posts.blade.php) as the communal page and adding [post.blade.php](/resources/views/post.blade.php) as each individual article page.

To implement the article to a view concept, we use an associative array in the route, named `posts` with `title`, `author` and `content`.

```php
Route::get('/posts', function () {
    return view('posts', ['title' => 'blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'velaris-city-of-starlight',
            'title' => 'velaris; city of starlight',
            'author' => 'not skye',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Nam, hic eum. Magni fugiat necessitatibus quia, ipsa voluptates et. 
            Quod aliquam facere iure obcaecati quisquam voluptates nisi asperiores, 
            cupiditate deserunt dignissimos.'
        ],
        [
            'id' => 2,
            'slug' => 'aretia-city-from-the-fallen',
            'title' => 'aretia; city from the fallen',
            'author' => 'not skye',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Repellendus, totam culpa? Commodi autem veritatis, itaque quia dolorem quidem ducimus, 
            laudantium recusandae consequatur assumenda quas molestiae amet vero impedit ex delectus?'
        ],
        [
            'id' => 3,
            'slug' => 'soberone-city-of-no-city',
            'title' => 'soberone; city of no city',
            'author' => 'himmelya',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Esse, iste provident cupiditate ratione vitae repellat aut vero quidem quasi, 
            sapiente magni consequuntur sint sit numquam adipisci. Commodi, molestiae facilis! Neque.'
        ]
    ]]);
});
```

NOTE: the `id` and `slug` is to ease when trying to find the chosen article to be displayed

in the posts blade page, all that is needed to be diplayed utilizes the `{{ $post[title/author/content] }}` expression and to simplify all that will be 'printed' in the blog page, we used directives `@foreach` and `@endforeach`. Other small details include a shortage of contents displayed using `Str` func and a use of pagination `&raquo` (right angle quote) in the read more button.

the `href` to link of the communal page to each individual page, is based on the id/slug assigned (as mentioned before). Difference of both indicators is just `id` uses numbers and `slug` uses words but both were passed using string data type.

```html
@foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
    <a href="/posts/{{ $post['slug'] }}">
        <h3 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h3>
    </a>
    <div class="text-base text-gray-500">
        <a href="#">{{ $post['author'] }}</a> | 14 April 2023
    </div>
    <p class="my-4 font-light">{{ Str::limit($post['content'], 175) }}</p>
    <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">read more &raquo;</a>
</article>
@endforeach
```

each individual article page, is almost the same as the communal page, with 3 difference:

- without a `for` directive
- without a string limitation
- the button became a back to post button using a `&laquo;` pagination.

```html
<article class="py-8 max-w-screen-md">
    <h3 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h3>
    <div class="text-base text-gray-500">
        <a href="#">{{ $post['author'] }}</a> | 14 April 2023
    </div>
    <p class="my-4 font-light">{{ $post['content'] }}</p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; back to posts</a>
</article>
```

![Screenshot (360)](https://github.com/user-attachments/assets/886026d0-b2dd-46b4-83c8-3ed6eca02554)

to display the individual page, the route will also be added and due to of article data still need to accessed, the individual article route (post) had the exact same associative array with the communal article route (posts).

However to link, there is a need to add several other function. Using the `Arr::first` function (library need to be imported first), the page will access only the set of article data based on the 'truth test' of slug passed in the argument. 

```php
Route::get('/posts/{slug}', function ($slug) {
    $posts =[
        ...
        ...
    ];

    $post = Arr::first($posts, function($post) use($slug) {
        return $post['slug'] == $slug;
    });

    ...
});
```
only then, will the view is appropriate to be return.
```php
Route::get('/posts/{slug}', function ($slug) {
    ...
    ...

    return view('post', ['title' => 'post', 'post' => $post]);
});
```
### model
the model concept changes nothing of the UI appearance. However, it does change of how the article data is managed. First, is (obv) changing the repeated article data stored in the route (in posts and post route) to a seperate class named `post` in a model [post.php](/app/Models/post.php) and setting a `namesapce` for it so it doesn't get mixed up with other functions in the future. 

```php
class post {
    public static function all() {
        return [
            [
                'id' => 1,
                'slug' => 'velaris-city-of-starlight',
                'title' => 'velaris; city of starlight',
                'author' => 'not skye',
                'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Nam, hic eum. Magni fugiat necessitatibus quia, ipsa voluptates et. 
                Quod aliquam facere iure obcaecati quisquam voluptates nisi asperiores, 
                cupiditate deserunt dignissimos.'
            ],
            [
                'id' => 2,
                'slug' => 'aretia-city-from-the-fallen',
                'title' => 'aretia; city from the fallen',
                'author' => 'not skye',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Repellendus, totam culpa? Commodi autem veritatis, itaque quia dolorem quidem ducimus, 
                laudantium recusandae consequatur assumenda quas molestiae amet vero impedit ex delectus?'
            ],
            [
                'id' => 3,
                'slug' => 'soberone-city-of-no-city',
                'title' => 'soberone; city of no city',
                'author' => 'himmelya',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Esse, iste provident cupiditate ratione vitae repellat aut vero quidem quasi, 
                sapiente magni consequuntur sint sit numquam adipisci. Commodi, molestiae facilis! Neque.'
            ]
        ];
    }

    public static function find($slug) {
        ...
        ...
    }
}
```
in the class there will be two static functions, `all()` and `find()`. Already displayed, the all function consists of the article data. Where later on, in the route will simply called as an imported model `use App\Models\post;` and a `post::all()` to call the function.

the function find on the other hand, is to help manage the single article data when called. There are two ways to build the function, using a `callback function` or an `arrow function`:

- callback function
    ```php
    $post = Arr::first(static::all(), function($post) use($slug) {
            return $post['slug'] == $slug;
        });
    ```
- arrow function
    ```php
    $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
    ```
NOTE: `static` function is actually `post` function, but written as so beacuse it's calling a function inside a function of a same class

both function had no difference on to operate, just the way on writing down the code is that arrow function had a much more simple structure. This function is actually a replica of the previous code on how to connect a communal page to each of the individual page.

lastly, to make the webpage more user-friendly, is to add a `404 not found` page when the slug entered is none of the respective slugs. To do so, is to use the variable `$post` as a branch argument.

```php
if(!$post){
    abort(404);
} else { return $post; }
```
the `abort` func, esp the `404` is a laravel function of the not found page.

Those are all necessary UI changes made from tutorial video 6 and 7 done in the second week. thanl you :)

## Week 3
This week, our objectives are:

- making a database migration 
- displaying data directly from database
- using tinker in inserting the data to the database

There are no UI changes at all in this week session. All that is different is the code structure in managing the data later be displayed. All changes happened in the backend.

### database
before all process, is to firstly connect the project with a database. This where we need `SQLite` as the rdbms to manage the data and with the help of `tableplus` to connect them. When already connected, only then we can use the database.

![image](https://github.com/user-attachments/assets/ea3f6060-ec74-4e8f-805c-b433378820d6)

### migration
This process allows anyone who take part in building up the laravel project to have the exact same database scheme. So, to add a database that may connect through out all the project, is to first make the `migration`. 

`php artisan make:migration`

Also, the naming format of a migration is quite unique. last week, there is this form named model, then migration is like an "extension" of the model where it manages the database (database later will manage the data). If a model is named after `post`, then the migration will be named as `create_posts_table` where the database table will be automatically named `posts` with an `s`.

To stabilize this form, the previous made model will be made anew and adding a migration corresponding to it respectively.

`php artisan make:model post -m`

the `-m` is to make the migration of the designated model. this command produce the [post.php](/app/Models/post.php) model and the [create_posts_table.php](/database/migrations/2024_09_23_113721_create_posts_table.php) migration.

migrations also have many commands, one of them is the `migrate:fresh` where for an already migrated local will endure the tables all be dropped and migrate anew, old and new migrations file be migrated together. However, when running this command in a developed env, there are no precautious questions, so the process will be done once excetued and all the previous data will be refreshed back to start.

in the `create_posts_table` migration file, we will fill in with the entities needed in the table, later when running the migration will this table be constructed.

```php
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->text('content');
            $table->timestamps();
        });
    }

    ...
    ...
};
```

### tinker
previously, data was added in the form of arrays in the route [web.php](/routes/web.php). Now, as we already had the database connected from our project, we need to add data into it. Instead of adding data manually from the rdbms, we can use tinker in inserting the data. 

![image](https://github.com/user-attachments/assets/bd64414e-5237-4a93-8ac5-944bbf1eb2d4)

The tinker has a multiline mode, where we can add multiple lines and execute it as a single command. from the image, we insert each of the entity with a value using the `=>` symbol and an enabling it from the model [post.php](/app/Models/post.php) adding a `fillable` function, where all entity that can be filled is entered within.

```php
class post extends Model {
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'content'];
}
```

That is all for this week's update, thank you  𓆝⋆｡˚ 𓇼

## Week 4
This week, our objectives are:

- understanding model factories
- using the relation to data using eloquent
- database seeder

Similar to last week, there are only slight UI changes in this week session. Mostly that is different is the code structure in managing the data later be displayed. Those changes happened in the backend.

### model factories
model factories is actually a part of database manage-tool of the model itself. To easily understand how a factory work, is to implement the usage step by step (although many would change in the upcoming videos).

to generate a factory is to ... and within a factory of a model is the scheme of the entity table later on in the database. (almost like calling an `insert` sql query but using php codes in the php files).

```php
public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'slug' => Str::slug(fake()->sentence()),
            'content' => fake()->text(),
        ];
    }
```

in this project we use a `faker` laravel function to generate  data in within each attribute. As for the slug, to generate the slug-format is to use the string library calling the `slug` function itself, `'slug' => Str::slug(fake()->sentence())`.

```
APP_FAKER_LOCALE=ko_KR
```

Also another configure in the `.env` file is to arrange the `locale` of the project. personally, this project is set to use the korean origin locale.

When implementing the model factory concept is done, to call the data will be by using `tinker` with the command:

```
App\Models\Post::factory(10)->create();
```

[tinker factory create img]

the `factory(10)` is to indicate there will be 10 new data insertedd in the database.

### eloquent relationship
just like the name, this part of the objective is to relate on table to another, in our case the relation that we 'create' is `one to many`. One way to do it based on the tutorial is to assign a `foreign key` in within the migration of the many table and to call the the one factory in the many factory of the designated attribute.

- [create_posts_table](/database/migrations/2024_09_23_113721_create_posts_table.php) migration
    ```php
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            ...

            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'post_author_id'
            );
            
            ...
        });
    }
    ```
    *the other attributes of the entity remains the same

- [postFactory](/database/factories/postFactory.php)
    ```php
    public function definition(): array
    {
        return [
            ...
            
            'author_id' => User::factory(),

            ...
        ];
    }
    ```
    *the other attributes of the entity remains the same

[structure of posts table img]

Then to make the relations much visible is to implement the 'real' `eloquent relation` library using the `BelongsTo` and `HasMany` functions in the model files.

- [post.php](/app/Models/post.php)
    ```php
    class post extends Model {
        ...

        public function author(): BelongsTo {
            return $this->belongsTo(User::class);
        }
    }
    ```
- [user.php](/app/Models/User.php)
    ```php
    class User extends Authenticatable {
        ...

        public function posts(): HasMany {
            return $this->hasMany(post::class, 'author_id');
        }
    }
    ```
to insert the data, will per usual call within the `tinker`. However, the difference will be by assigning one user to many posts, we will utilize the `recycle` command in the tinker.

```
App\Models\Post::factory(100)->recycle(User::factory(5)->create())->create();
```
*this means that for 100 posts, there will be 5 random author distributed in writing it

[tinker call 100 posts to 5 user img]

the functions `BelongsTo` and `HasMany` also has the privilage of calling the author of the post in a post tinker.

[$post->author img]

and vice versa, what posts has an author written

[$user->posts img]

**note: we will also need to make slight changes in the blade, replacing `{{ $post['author'] }}` to `{{ $post->author-> name }}`**

Also a slight change in the UI will be that we are able to display the author's writing in a single author page.

[single author page img]

first changes will absolutely involve the route
```php
Route::get('/authors/{user}', function (User $user) {
    return view('posts', ['title' => 'articles by ' . $user->name, 'posts' => $user->posts]);
});
```
and slight changes in the `href` of the posts and post blades by adding `authors/{{ $post->author->id }}`
