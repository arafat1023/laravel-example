**Blade Templating Engine**
---

### **1. What is Blade?**
Blade is Laravel’s powerful templating engine that allows embedding PHP code within views. It provides a clean syntax for generating dynamic HTML and encourages template reuse through inheritance.

#### **Key Features**
- Blade templates are compiled into plain PHP code for optimal performance.
- Supports template inheritance and sections for better organization.
- Provides built-in directives for control structures (e.g., `@if`, `@foreach`).
- Enables integration of dynamic data into views.

---

### **2. Setting Up a Blade Template**

#### **Basic Blade Template**
1. Create a Blade file in the `resources/views` directory, e.g., `welcome.blade.php`:
   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>Welcome Page</title>
   </head>
   <body>
       <h1>Welcome to Laravel!</h1>
   </body>
   </html>
   ```

2. Return the view from a route:
   ```php
   Route::get('/', function () {
       return view('welcome');
   });
   ```

---

### **3. Displaying Data in Blade**

#### **Passing Data to Views**
1. Pass data to a view using the `view` function:
   ```php
   Route::get('/greet', function () {
       return view('greet', ['name' => 'John']);
   });
   ```

2. Display the data in the Blade file (`greet.blade.php`):
   ```html
   <h1>Hello, {{ $name }}!</h1>
   ```

#### **Escaping Output**
- To prevent XSS attacks, Blade escapes output by default:
  ```html
  {{ $variable }}
  ```
- To render unescaped data, use:
  ```html
  {!! $variable !!}
  ```

---

### **4. Blade Directives**

#### **Control Structures**
1. **Conditional Statements**:
   ```php
   @if($user->isAdmin())
       <p>Welcome, Admin!</p>
   @else
       <p>Welcome, User!</p>
   @endif
   ```

2. **Loops**:
   ```php
   @foreach($users as $user)
       <p>{{ $user->name }}</p>
   @endforeach
   ```

3. **Switch Statements**:
   ```php
   @switch($role)
       @case('admin')
           <p>Admin Panel</p>
           @break
       @default
           <p>User Panel</p>
   @endswitch
   ```

#### **Including Partials**
Use `@include` to embed partial views:
```php
@include('partials.header')
```

---

### **5. Template Inheritance**
Blade supports template inheritance to promote code reuse and maintainability.

#### **Defining a Layout**
1. Create a base layout (`layouts/app.blade.php`):
   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>@yield('title')</title>
   </head>
   <body>
       @yield('content')
   </body>
   </html>
   ```

2. Extend the layout in another template (`home.blade.php`):
   ```php
   @extends('layouts.app')

   @section('title', 'Home Page')

   @section('content')
       <h1>Welcome to the Home Page!</h1>
   @endsection
   ```

---

### **6. Passing Data to Views**

#### **Using Compact Method**
```php
Route::get('/profile', function () {
    $name = 'John';
    return view('profile', compact('name'));
});
```

#### **Sharing Data Across Views**
Use view composers to share data across multiple views:
```php
View::composer(['profile', 'dashboard'], function ($view) {
    $view->with('appName', 'Laravel App');
});
```

---

### **References for Further Reading**
1. Laravel Official Documentation: [Blade Templates](https://laravel.com/docs/11.x/blade)
---
