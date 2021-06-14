# LaraVueSpa
> A Laravel Vue Single Page Application starter kit.

## Features
[x] Laravel 8
[x] Vue + VueRouter
[x] Pages with dynamic import
[x] Login Page
[x] Laravel Sanctum
[x] Token Based Authentication
[x] Tailwind V2 Integration
[ ] Socialite integration
[ ] Vuex

## Installation
- `composer create-project --prefer-dist laravel/laravel projectname`
- `composer require laravel/sanctum laravel/ui`
- `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
- Edit `.env` and set your database connection details
- `php artisan migrate`
- Open `app/Http/Kernel.php` & update the following

    - ```php
        'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],

- Open `App\Models\User` & update the following

    - ```php
        use Laravel\Sanctum\HasApiTokens;
        class User extends Authenticatable {
            use HasApiTokens, HasFactory, Notifiable;
        }

- On Login, Use the following code to generate token for a user

    - ```php
        use Illuminate\Http\Request;
        Route::post('/tokens/create', function (Request $request) {
            $token = $request->user()->createToken($request->token_name);

            return ['token' => $token->plainTextToken];
        });

- On Logout, Use the following

    - ```php
        $request->user()->currentAccessToken()->delete();

- To Logout from all devices, Use the following

    - ```php
        $user->tokens()->delete();
        
- `npm install`
- `php artisan serve`

## Usage
#### Development
```bash
# Build and watch
npm run watch

# Serve with hot reloading
npm run hot
```
#### Production
```bash
npm run production
```