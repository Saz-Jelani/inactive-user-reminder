# Reminder System for Inactive Users (Laravel)

## Project Overview

This Laravel application automatically detects inactive users and queues a job to send them reminders.

A user is considered **inactive if they have not logged in for a configured number of days** (default: 7 days).
A scheduled command is executed every day. The job simulates sending a reminder and records the event in a log/database.

---

# Features

* Identify users who have not been active for a set amount of time.
* uses the Laravel Scheduler (Cron) to run automatically.
* For every inactive user, queued jobs are dispatched.
* keeps the same user from being processed more than once every day.
* records the sending of reminders.

---

# The Tech Stack

* Laravel and MySQL
 * Laravel Queue
  * Scheduler for Laravel

---

# Configuring a Database

The default  **users table** in Laravel is used with one extra column:



```
last_login_at (timestamp, nullable)
```

Example of migration:

```php
$table->timestamp('last_login_at')->nullable();
```

A log table is also used to keep track of sending reminders.

table of Example :

```
inactive_user_logs
```

Fields:

* id
* user_id
* email
* sent_at
* status
* message
* created_at
* updated_at

---

# user_id email sent_at status message created_at updated_at Installation 1

###  Clone Repository

```
git clone https://github.com/Saz-Jelani/inactive-user-reminder.git
cd inactive-user-reminder
```

### 2 Set Up Dependencies

```
  composer install
```

### 3 Setting Up the Environment

```
cp .env.example .env
```

Change database configuration inside `.env`.

### 4 Generate App Key

```
php artisan key:generate
```

### 5 Run Migrations

```
php artisan migrate
```

(Optional: seed users)

```
php artisan db:seed
```

---

# Configuration

You can set the length of the inactivity configured in `.env`

```
INACTIVE_DAYS=7
```

---

# How to Run the Scheduler

Cron must run the Laravel scheduler.

Put this cron job on your server:

```
* * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1
```

The scheduled command:

```
php artisan users:check-inactive
```

This command runs every day and sends jobs to users who aren't active.

---

# Starting the Queue Worker

Start the queue worker:

```
php artisan queue:work
```
The worker will do queued jobs and pretend to send reminders.

---

# How It Works

1. The scheduler runs every day.
2. Command checks for users who haven't been active for the set amount of time
3. A job is queued for each inactive user.
4. The job acts like sending a reminder.
5. The database keeps track of the action.
---

# Testing the Command by Hand/Manually

You can run the command   by Hand/manually:

```
php artisan users:check-inactive
```

---

# Author : 
Sazzad Jelani


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).