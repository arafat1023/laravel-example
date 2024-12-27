**Laravel Query Builder**

### **Objective**
To understand how to use Laravel’s Query Builder for constructing database queries, optimizing performance with eager loading, and utilizing helper functions for clean and efficient queries.

---

### **1. Introduction to Query Builder**
The Query Builder in Laravel provides a convenient, fluent interface to interact with the database. It supports all database operations without requiring raw SQL.

#### **Basic Usage**
```php
use Illuminate\Support\Facades\DB;

$users = DB::table('users')->get();
```
This retrieves all rows from the `users` table as a collection of objects.

---

### **2. Writing Complex Queries**

#### **Select Statements**
- Retrieve specific columns:
  ```php
  $users = DB::table('users')->select('name', 'email')->get();
  ```

- Add raw expressions:
  ```php
  $users = DB::table('users')
      ->select(DB::raw('count(*) as user_count, status'))
      ->groupBy('status')
      ->get();
  ```

#### **Where Clauses**
- Basic where clause:
  ```php
  $users = DB::table('users')->where('status', 'active')->get();
  ```

- Multiple conditions:
  ```php
  $users = DB::table('users')
      ->where('status', 'active')
      ->where('age', '>', 18)
      ->get();
  ```

- Using OR conditions:
  ```php
  $users = DB::table('users')
      ->where('status', 'active')
      ->orWhere('role', 'admin')
      ->get();
  ```

#### **Joins**
- Perform an inner join:
  ```php
  $users = DB::table('users')
      ->join('posts', 'users.id', '=', 'posts.user_id')
      ->select('users.name', 'posts.title')
      ->get();
  ```

- Left join:
  ```php
  $users = DB::table('users')
      ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
      ->get();
  ```

#### **Ordering and Grouping**
- Order by:
  ```php
  $users = DB::table('users')->orderBy('name', 'asc')->get();
  ```

- Group by:
  ```php
  $users = DB::table('users')->groupBy('role')->get();
  ```

#### **Pagination**
- Paginate results:
  ```php
  $users = DB::table('users')->paginate(10);
  ```

---

### **3. Eager Loading for Performance Optimization**
Eager loading reduces the number of queries by loading relationships upfront.

#### **Example**
- Load related posts for each user:
  ```php
  $users = User::with('posts')->get();
  ```

#### **Nested Relationships**
- Load comments for posts along with users:
  ```php
  $users = User::with('posts.comments')->get();
  ```

#### **Filtering with Eager Loading**
- Apply filters to related data:
  ```php
  $users = User::with(['posts' => function ($query) {
      $query->where('published', true);
  }])->get();
  ```

---

### **4. Using Helper Functions for Cleaner Queries**

#### **Pluck**
Retrieve a single column as an array:
```php
$names = DB::table('users')->pluck('name');
```

#### **Exists**
Check if a record exists:
```php
$exists = DB::table('users')->where('email', 'john@example.com')->exists();
```

#### **Aggregate Functions**
- Count:
  ```php
  $count = DB::table('users')->count();
  ```
- Sum:
  ```php
  $total = DB::table('orders')->sum('amount');
  ```

#### **Insert, Update, and Delete**
- Insert a record:
  ```php
  DB::table('users')->insert([
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'password' => bcrypt('password')
  ]);
  ```

- Update records:
  ```php
  DB::table('users')->where('id', 1)->update(['status' => 'active']);
  ```

- Delete records:
  ```php
  DB::table('users')->where('id', 1)->delete();
  ```

---
---

### **References for Further Reading**
1. [Laravel Documentation: Query Builder](https://laravel.com/docs/11.x/queries)

---
