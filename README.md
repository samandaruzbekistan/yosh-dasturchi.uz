# Yosh Dasturchi UZ - Educational Platform

A comprehensive Laravel-based educational platform designed for teaching programming to young students in Uzbekistan. This platform provides an interactive learning experience with lessons, quizzes, and progress tracking.

## 🚀 Features

### For Students
- **Interactive Learning**: Access lessons with rich content including videos and text
- **Quiz System**: Take quizzes after each lesson to test knowledge
- **Progress Tracking**: Monitor learning progress and quiz results
- **Regional Support**: Location-based content with region, district, and quarter support
- **User Profiles**: Personal profiles with learning history

### For Administrators
- **Content Management**: Create and manage sections and lessons
- **Quiz Management**: Create and edit quizzes for lessons
- **User Management**: View and manage student accounts
- **Analytics**: Track student progress and quiz results
- **Media Support**: Upload images and videos for lessons

## 🛠 Technology Stack

- **Backend**: Laravel 9.x (PHP 8.0+)
- **Frontend**: Blade templates with Bootstrap
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum
- **Asset Compilation**: Laravel Mix
- **Styling**: Bootstrap, Custom CSS

## 📋 Prerequisites

Before running this application, make sure you have the following installed:

- PHP >= 8.0
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Web server (Apache/Nginx) or Laravel's built-in server

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd yosh-dasturchi
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit `.env` file and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=yosh_dasturchi
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Compile assets**
   ```bash
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## 📁 Project Structure

```
yosh-dasturchi/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   ├── Repositories/        # Data access layer
│   └── Middleware/          # Custom middleware
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   └── views/              # Blade templates
├── public/                 # Public assets
└── routes/                 # Application routes
```

## 🔐 Authentication

The application uses two types of authentication:

- **User Authentication**: For students accessing lessons and quizzes
- **Admin Authentication**: For administrators managing content

## 📊 Database Schema

### Core Models
- **Users**: Student accounts with regional information
- **Admins**: Administrator accounts
- **Sections**: Learning categories
- **Lessons**: Individual learning content
- **Quizzes**: Assessment questions
- **QuizResults**: Student quiz performance
- **Regions/Districts/Quarters**: Geographic hierarchy

## 🎯 Key Features Implementation

### Learning Management
- Sections contain multiple lessons
- Lessons can include text content, videos, and images
- Quiz system with multiple choice questions
- Progress tracking for students

### Regional Support
- Hierarchical geographic structure (Region → District → Quarter)
- Location-based content filtering
- User registration with regional information

### Admin Panel
- Content creation and management
- User analytics and progress monitoring
- Quiz creation and management
- Media upload capabilities

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

## 📦 Deployment

1. **Production build**
   ```bash
   npm run production
   ```

2. **Optimize for production**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Set up web server** (Apache/Nginx) pointing to the `public/` directory

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

For support and questions, please contact the development team or create an issue in the repository.

## 🔄 Version History

- **v1.0.0**: Initial release with basic learning management features
- **v1.1.0**: Added quiz system and progress tracking
- **v1.2.0**: Enhanced admin panel and regional support

---

**Yosh Dasturchi UZ** - Empowering young programmers in Uzbekistan through interactive learning.

### Developer: Samandar Sariboyev
- [Telegram](https://t.me/Samandar_developer)
- [Email](samandarsariboyev@gmail.com)
- [LinkedIn](https://www.linkedin.com/in/samandar-sariboyev-1420b7213/)
- [YouTube](https://www.youtube.com/@samandar_sariboyev)
