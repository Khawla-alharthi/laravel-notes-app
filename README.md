# 📋 Branch 01: Laravel Routing

## 🎯 Overview
This branch covers Laravel routing fundamentals for our Notes Application. Routes define how your application responds to different URL requests and act as the entry point for all user interactions.

## 🔑 Key Concepts Covered

### 1. 🛣️ Route Definition
Routes are defined in `routes/web.php` and map URLs to controller actions:

```php
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
```

### 2. 🌐 HTTP Methods
- **`GET`** - Retrieve data (show forms, list items)
- **`POST`** - Submit data (create new items)
- **`PUT/PATCH`** - Update existing data
- **`DELETE`** - Remove data

### 3. 🎯 Route Parameters
```php
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
```

### 4. 🏷️ Route Names
Named routes allow you to reference routes in views and controllers:
```php
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

// In views: route('notes.index')
// In controllers: redirect()->route('notes.index')
```

### 5. 📦 Route Groups
Group routes with common attributes:
```php
Route::middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class);
});
```

## 🗺️ Our Application Routes

### 🌍 Public Routes (No Authentication Required)
| Route | Purpose | Description |
|-------|---------|-------------|
| `/` | Home page | Redirects to login |
| `/login` | Show login form | User authentication entry point |
| `/register` | Show registration form | New user registration |

### 🔐 Authentication Routes
| Method | Route | Purpose |
|--------|-------|---------|
| `POST` | `/login` | Handle login submission |
| `POST` | `/register` | Handle registration submission |
| `POST` | `/logout` | Handle logout |

### 🛡️ Protected Routes (Authentication Required)
| Method | Route | Purpose |
|--------|-------|---------|
| `GET` | `/dashboard` | User dashboard (redirects to notes) |
| `GET` | `/notes` | List all user notes |
| `GET` | `/notes/create` | Show create note form |
| `GET` | `/notes/{note}` | Show specific note |
| `GET` | `/notes/{note}/edit` | Show edit note form |
| `POST` | `/notes` | Store new note |
| `PUT` | `/notes/{note}` | Update existing note |
| `DELETE` | `/notes/{note}` | Delete note |

## 🔒 Route Middleware

### 👤 Guest Middleware
Ensures users are **NOT** logged in:
```php
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
});
```

### 🔐 Auth Middleware
Ensures users **ARE** logged in:
```php
Route::middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class);
});
```

## ⚡ Resource Routes
Laravel provides a convenient way to define CRUD routes:
```php
Route::resource('notes', NoteController::class);
```

This creates:
| Method | URI | Action | Route Name |
|--------|-----|--------|------------|
| `GET` | `/notes` | `index()` | `notes.index` |
| `GET` | `/notes/create` | `create()` | `notes.create` |
| `POST` | `/notes` | `store()` | `notes.store` |
| `GET` | `/notes/{note}` | `show()` | `notes.show` |
| `GET` | `/notes/{note}/edit` | `edit()` | `notes.edit` |
| `PUT` | `/notes/{note}` | `update()` | `notes.update` |
| `DELETE` | `/notes/{note}` | `destroy()` | `notes.destroy` |

## 🎯 Route Model Binding
Laravel automatically resolves route parameters to model instances:
```php
Route::get('/notes/{note}', [NoteController::class, 'show']);

// In controller:
public function show(Note $note)
{
    // $note is automatically loaded from database
}
```

## 🧪 Testing Routes
You can test routes using Laravel's built-in tools:

```bash
# List all routes
php artisan route:list

# Test specific route
php artisan route:list --name=notes

# Show routes with middleware
php artisan route:list --verbose
```

## 📁 File Structure
```
routes/
├── web.php          # Main web routes
├── auth.php         # Authentication routes (optional organization)
└── api.php          # API routes (not used in this project)
```

## 🚀 Next Steps
In the next branch (02-controllers), we'll create the controllers that handle these routes and implement the actual functionality.

---

## 🎨 Common Route Patterns in Our App

### 🔄 Redirects
```php
Route::get('/', function () {
    return redirect()->route('login');
});
```

### 🎭 Closure Routes (for simple logic)
```php
Route::get('/dashboard', function () {
    return redirect()->route('notes.index');
})->middleware('auth');
```

### 🏗️ Named Route Groups
```php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/notes', [AdminController::class, 'notes'])->name('notes');
    // Creates route named 'admin.notes'
});
```

## ⚡ Route Caching
For production, you can cache routes for better performance:

```bash
# Cache routes for production
php artisan route:cache
```

Remember to clear cache when routes change:
```bash
# Clear route cache
php artisan route:clear
```

---

## 💡 Pro Tips

### 🔧 Route Debugging
```bash
# See all registered routes
php artisan route:list

# Filter by name
php artisan route:list --name=notes

# Filter by method
php artisan route:list --method=GET

# Show route middleware
php artisan route:list --verbose
```

### 🎯 Route Optimization
```php
// Group routes efficiently
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::resource('notes', NoteController::class);
    Route::resource('categories', CategoryController::class);
});
```

### 🛡️ Security Best Practices
```php
// Always use named routes for better maintainability
Route::get('/notes/{note}', [NoteController::class, 'show'])
    ->name('notes.show')
    ->middleware('auth');

// Use route constraints for better security
Route::get('/notes/{note}', [NoteController::class, 'show'])
    ->where('note', '[0-9]+');
```

---

## 📚 Additional Resources

- [Laravel Routing Documentation](https://laravel.com/docs/routing)
- [Route Model Binding](https://laravel.com/docs/routing#route-model-binding)
- [Middleware](https://laravel.com/docs/middleware)
- [Resource Controllers](https://laravel.com/docs/controllers#resource-controllers)
