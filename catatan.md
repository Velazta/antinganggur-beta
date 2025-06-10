.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Admin                 <-- FOLDER BARU
│   │   │   │   ├── Auth
│   │   │   │   │   └── LoginController.php  <-- Controller login khusus admin
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JobVacancyController.php
│   │   │   │   └── JobSeekerController.php
│   │   │   ├── AuthController.php      <-- Untuk Job Seeker
│   │   │   └── ProfileController.php   <-- Untuk Job Seeker
│   │   └── Middleware
│   │       └── AuthenticateAdmin.php   <-- Middleware yang kita buat
│   ├── Models
│   │   ├── Admin.php                 <-- Model Admin
│   │   ├── User.php                  <-- Model Job Seeker
│   │   └── ...
├── resources
│   └── views
│       ├── admin                     <-- FOLDER BARU
│       │   ├── auth
│       │   │   └── login.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── layouts
│       │   │   └── app.blade.php       <-- Layout khusus admin
│       │   └── ...
│       ├── auth                      <-- View untuk Job Seeker
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── layouts                   <-- Layout untuk Job Seeker
│       └── ...
└── routes
    ├── web.php                     <-- Tempat kita mendefinisikan route group
    └── ...

    # berikut adalah susunan untuk membuat fungsi dari si admin nantinya. On Progress
