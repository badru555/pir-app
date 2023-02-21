# PIR Management System with Laravel 

Post Implementation Review: to collect user survey toward implemented applications


## Features

- Survey Collecting
- Pivotable
- PIR Doc Creation
- PDF Report Generator


## Run Locally

Clone the project

```bash
  git clone https://github.com/badru555/pir-app.git
```
or download zip file

Go to the project directory

```bash
  cd pir-app
```

Laravel instruction command: 

Rebuild database and seeder*

```bash
  php artisan migrate:fresh --seeder
```
*after doing database configuration at /pir-app/.env

Start the server

```bash
  php artisan serve
```

