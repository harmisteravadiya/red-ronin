# Red Ronin

## Overview
Red Ronin is a dynamic and interactive application built with Laravel. This project incorporates modern development practices and technologies to ensure efficiency, scalability, and maintainability. Whether you are exploring the app as a user or contributing to its development, Red Ronin offers a robust and well-structured codebase.

## Setup Instructions
To set up and run Red Ronin locally, follow these steps:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/harmisteravadiya/red-ronin.git
   cd red-ronin
   ```

2. **Install Dependencies**
   Ensure you have PHP and Composer installed, then run:
   ```bash
   composer install
   ```

3. **Set Up Environment Variables**
   Copy the example environment file and update configurations:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Import Database**
   The project includes an exported database file from XAMPP. Import it into your MySQL database:
   - Open phpMyAdmin.
   - Create a new database.
   - Import the provided SQL file (`database.sql`).
   - Update `.env` with your database credentials.

5. **Run Migrations (If Required)**
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://localhost:8000/`.

## Key Features
- **Modern UI/UX** – A responsive and visually appealing interface.
- **Fast and Scalable** – Optimized for performance and efficiency.
- **Authentication & Security** – Secure login and user authentication.
- **Customizable Components** – Modular design for easy customization.
- **State Management** – Efficient data flow and state handling.
- **Complete Dashboard** – A fully functional admin/user dashboard.
- **Notifications through Mailer** – Email notifications for user interactions.
- **Invoice through Mail in PDF** – Generate and send invoices as PDF attachments via email.
- **Report Generation** – Generate detailed reports for analysis.
- **Rating & Review** – Users can leave ratings and reviews.
- **Cart System** – Add-to-cart functionality for seamless shopping experience.

## Tech Stack
- **Framework**: Laravel
- **Frontend**: Blade, Bootstrap CSS
- **Backend**: PHP, Laravel
- **Database**: MySQL
- **Other Tools**: XAMPP for local development

---
For any queries or issues, please refer to the repository's [Issues](https://github.com/harmisteravadiya/red-ronin/issues) section.

