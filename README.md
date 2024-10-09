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

![c24ff86d2d4818c14216a20204a2805858040c8c 1](https://github.com/user-attachments/assets/43240448-957a-4736-a4d2-083b5c397617)

the `factory(10)` is to indicate there will be 10 new data insertedd in the database. By then, the data inserted will be able to be displayed in the blog page.

![c1f99a32780145c46ea7a79a206b8421e36f9536 1](https://github.com/user-attachments/assets/5399c8b5-c5f8-419c-879f-55b79af849f3)

### eloquent relationship
just like the name, this part of the objective is to relate on table to another, in our case the relations are `one to many`. One way to do it based on the tutorial is to assign a `foreign key` in within the migration of the many table and to call the the one factory in the many factory of the designated attribute. There is also a new migration made namely `create_categories_table` where it handles the category of each posts.

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
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'post_category_id'
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
            'category_id' => Category::factory(),

            ...
        ];
    }
    ```
    *the other attributes of the entity remains the same

![35c139c1220459fac55156e21c92e8a19e9fa934 1](https://github.com/user-attachments/assets/d77f6e72-af62-46b8-922f-144d1dfb6115)

Then to make the relations much visible is to implement the 'real' `eloquent relation` library using the `BelongsTo` and `HasMany` functions in the model files.

- [post.php](/app/Models/post.php)
    ```php
    class post extends Model {
        ...

        public function author(): BelongsTo {
            return $this->belongsTo(User::class);
        }

        public function category(): BelongsTo {
            return $this->belongsTo(Category::class);
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
- [category.php](/app/Models/Category.php)
    ```php
    class Category extends Model {
        ...

        public function posts(): HasMany {
            return $this->hasMany(post::class, 'category_id');
        }
    }
    ```
to insert the data, will per usual call within the `tinker`. However, the difference will be by assigning one user to many posts, we will utilize the `recycle` command in the tinker.

```
App\Models\Post::factory(100)->recycle([User::factory(5)->create(), Category::factory(3)->create()])->create();
```
*this means that for 100 posts, there will be 5 random author distributed in writing it and 3 random categories classifying it.

![dd9e2797e87539a12725b9926403e9080fa774e9 2](https://github.com/user-attachments/assets/8c68e198-e472-4894-8ce8-43ff23e7c7e3)

the functions `BelongsTo` and `HasMany` also has the privilage of calling the a data from one table from the other table in tinker.

![9357af0c4eca1d5ae2674ab54f5b565fca60e446 1](https://github.com/user-attachments/assets/c4ccebb2-e106-47b8-8dbf-48dd81a526e6)

and vice versa

![eb5445cd2cb6e08c140e34d562926818f7f265fc 1](https://github.com/user-attachments/assets/fce9a9bb-dda5-43be-b1a9-1752e42cf49f)

**note: we will also need to make slight changes in the blade, replacing `{{ $post['author'] }}` to `{{ $post->author->name }}`**

Also a slight change in the UI will be that we are able to display the author's writing in a single author page.

![564ee0f8a90f552f0ec6c84b1e4a6b1dbb0a1597 1](https://github.com/user-attachments/assets/993c464b-1bdf-449b-9710-e928cc62f49c)

that includes when calling posts from a certain category

![89aa72bd6063fa3398f8184dc29edb63e35772bb 1](https://github.com/user-attachments/assets/043345ad-49b7-46d8-bf5e-31ecefb35329)

changes will absolutely involve the route
```php
Route::get('/authors/{user}', function (User $user) {
    return view('posts', ['title' => 'articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => ' articles in ' . $category->name, 'posts' => $category->posts]);
});

```
and slight changes in the `href` of the posts and post blades by adding `authors/{{ $post->author->username }}` and `categories/{{ $post->author->slug }}`

### seeder
The functionality of seeder is actually fill in data in the tables without having to use `tinker`. In default of a laravel package, there is already a [databaseseeder.php](/database/seeders/DatabaseSeeder.php) ready to use, all we need is just to adjust and utilize the existing file.

```
php artisan make:seeder
```
*name of the seeder may be adjusted to personal use.

To ensure the neat structure of the files in this project, the seed of `category` and `user` is seperated. apart from the structure, seperating both seeds also gives clearence, take it as for every table on the one end in a one to many table relationship is to be separated.

- [userSeeder.php](/database/seeders/userSeeder.php)
    ```php
    class userSeeder extends Seeder {
        public function run(): void {
            User::factory(5)->create();
        }
    }
    ```
    this will create (per usual), 5 random authors

- [categorySeeder.php](/database/seeders/categorySeeder.php)
    ```php
    class categorySeeder extends Seeder {
        public function run(): void {
            Category::create([
                'name' => 'aretia, navarre',
                'slug' => "aretia-navarre"
            ]);

            Category::create([
                'name' => 'velaris, phyrrian',
                'slug' => "velaris-phyrrian"
            ]);

            Category::create([
                'name' => 'soberone, shifters',
                'slug' => "soberone-shifters"
            ]);

            Category::create([
                'name' => 'void, the aurora',
                'slug' => "void-the-aurora"
            ]);
        }
    }
    ```
    this will create 4 category of `aretia`, `velaris`, `soberone`, and `void` respectively. This data was made manually and will be generated as it is.

and to generate data as whole is to configure the [DatabaseSeeder.php](/database/seeders/DatabaseSeeder.php) this act like the 'center' table of the whole database. the many end in a one to many relationship

```php
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([categorySeeder::class, userSeeder::class]);
        post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
```
per-usual, this public function run is actually an adaptation of the usual command in the tinker. To finally utilize the seeder is to run the command `php artisan migrate:fresh --seed`. tho, take note that the `migrate:fresh` also enables dropping all data already stored in the tables.

![759880d97c38214a75d462721831b70f14d429f4 1](https://github.com/user-attachments/assets/a7b5342d-2aa7-4e8a-a24d-94b4bd870a24)

and automatically, the display in the blog shall be with proper category:

![image](https://github.com/user-attachments/assets/047310a0-6079-4e1e-8343-8d7a22a86c28)

That is all for this week's update, thank you ೄྀ࿐ ˊˎ-

## Week 5
This week, our objectives are:

- solving the n+1 problem
- redesigning the web UI and how to manage it
- perform searching
- implement pagination

### n+1 problem
the n+1 problem is actually a back end query related problem. as of for every data displayed within the website, the queries happened in behind the scene is a 2-times-of-the-data query. To check this howmany-query-calling problem is by installing a `laravel debug bar`

```php
composer require barryvdh/laravel-debugbar --dev
```

then the feature will appear once we reload the website page. the query number displayed in the `sql logo`, a good (too many) 205 query call.

![1ddbfb49add3d142d113cd388dc3b7d4611c124f 1](https://github.com/user-attachments/assets/df688d3f-3a13-4cf6-a783-48ce2d791199)

to solve this problem is to simply optimize the query call using `$with` calling it within the `route` as well as adding an additional feature of blocking any lazy loading query calling in the `provider` section.

- [web.php](/routes/web.php)
    ```php
    Route::get('/posts', function () {
    $posts=Post::latest()->get();
    return view('posts', ['title' => 'blog', 'posts' => $posts]);
    });
    ```
- [appserviceprovider.php](/app/Providers/AppServiceProvider.php)
    ```php
    class AppServiceProvider extends ServiceProvider {
        ...

        public function boot(): void {
            Model::preventLazyLoading();
        }
    }
    ```

and after implementing this method, reloding the page, the query will reduce to a good 6 query call.

![e5a28a43770a23a7c71f6d575a8a42277330338f 1](https://github.com/user-attachments/assets/af03a3bc-8d06-43de-8276-8d33280719a4)

### redesign UI
not all UI is redesigned. just the blog to an event better UI. 

![6a2d20bb14433fa007d5ec08e87c62b00530be06 1](https://github.com/user-attachments/assets/fa7ca8fb-168c-4057-af7a-3a647e2d36b1)

![6d7aa2649a76e49d74ec326f80b6365c5fdf88f7 1](https://github.com/user-attachments/assets/6f477cf4-f4fa-46ec-a76d-699d03f2992f)

most changes happens only in the posts and post `blade`. Also, this time we used `flowbite`, another `css tailwind` friend that provide free template.

- [posts.blade.php](/resources/views/posts.blade.php)
    ```php
    @foreach ($posts as $post)                
        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <span class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L3 20H21L12 2Z" fill="currentColor"/>
                        <path d="M8 16L12 10L16 16H8Z" fill="white"/>
                        <path d="M2 20H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </span>
                <span class="text-sm">{{ $post->created_at->format('j F Y') }}</span>
            </div>
            <a href="/posts/{{ $post->slug }}" class="hover:underline">
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post['title'] }}</h2>
            </a>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['content'], 75) }}</p>
            <div class="flex justify-between items-center">
                <a href="/authors/{{ $post->author->username }}" class="flex items-center space-x-4">
                    <img class="w-7 h-7 rounded-full" src="{{ asset('img/snopi.jpeg') }}" alt="snopi ava" />
                    <span class="font-medium dark:text-white">
                        {{ $post->author->name }}
                    </span>
                </a>
                <a href="/posts/{{ $post['slug'] }}" class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">
                    Read more &raquo;
                </a>
            </div>
        </article>          
    @endforeach
    ```
- [post.blade.php](/resources/views/post.blade.php)
    ```php
    <article class="max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
        <header class="mb-4 lg:mb-6 not-format">
            <a href="/posts" class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">                            
                &laquo; Back to all posts
            </a>
            <address class="flex items-center my-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/snopi.jpeg') }}" alt="{{ $post->author->name }}">
                    <div>
                        <a href="/authors/{{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                        <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->format('j F Y') }}</p>
                        <span class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L3 20H21L12 2Z" fill="currentColor"/>
                                <path d="M8 16L12 10L16 16H8Z" fill="white"/>
                                <path d="M2 20H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                        </span>
                    </div>
                </div>
            </address>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
        </header>
        <p>{{ $post->content }}</p>
    </article>
    ```

these changes are all templates from the flowbite website, all we need to do is just to adjust to the title, content, and etc. as well as installing several needed packages to use the flowbite seamlessly.

