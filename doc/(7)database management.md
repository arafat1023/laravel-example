**Database Management in Laravel**
---

### **1. Setting Up Migrations**

#### **What are Migrations?**
Migrations are version control for your database, allowing you to define and modify database structures over time.

#### **Creating Migrations**
Use Artisan to create a new migration:
```bash
php artisan make:migration create_users_table
```
This generates a file in `database/migrations/` with the current timestamp.

#### **Defining a Migration**
Edit the generated migration file to define the database schema:
```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

#### **Running Migrations**
Apply migrations to the database:
```bash
php artisan migrate
```

---

### **2. Seeding the Database**

#### **What is Seeding?**
Seeding populates the database with initial or test data using pre-defined classes.

#### **Creating a Seeder**
Use Artisan to create a new seeder:
```bash
php artisan make:seeder UserSeeder
```
This generates a file in `database/seeders/`.

#### **Defining a Seeder**
Edit the seeder to insert data:
```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
```

#### **Running Seeders**
Run the seeder using:
```bash
php artisan db:seed --class=UserSeeder
```
Alternatively, run all seeders defined in `DatabaseSeeder`:
```bash
php artisan db:seed
```

---

### **3. Using Factories and Faker**

#### **What are Factories?**
Factories automate the creation of test data using Faker for realistic values.

#### **Creating a Factory**
Use Artisan to create a new factory:
```bash
php artisan make:factory UserFactory
```
This generates a file in `database/factories/`.

#### **Defining a Factory**
Edit the factory to define fake data:
```php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
        ];
    }
}
```

#### **Using Factories with Seeders**
Use a factory in a seeder to create multiple records:
```php
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
```

---

### **4. Running Migrations and Rollbacks**

#### **Rolling Back Migrations**
Rollback the last batch of migrations:
```bash
php artisan migrate:rollback
```

#### **Resetting Migrations**
Rollback all migrations:
```bash
php artisan migrate:reset
```

#### **Re-running Migrations**
Reset and re-run all migrations:
```bash
php artisan migrate:refresh
```

---

---

### **References for Further Reading**
1. Laravel Official Documentation: [Migrations](https://laravel.com/docs/11.x/migrations)
