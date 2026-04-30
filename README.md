# 🧠 Smart Notes App with Advanced Admin Dashboard

A complete **Smart Notes Management System** built with **Laravel & MySQL**, featuring an intuitive user experience, powerful organization tools, and a fully functional **Admin Dashboard** for monitoring and control.

---

## 📌 🔗 Demo

🎥 **Watch Full Project Demo:**  
👉 https://youtu.be/5vjn0xql4mw

---

## ✨ Key Features

### 👤 User Panel

* 🔐 Secure Authentication (Register, Login, Logout)
* 📝 Create, Edit, Delete Notes (CRUD)
* 📌 Pin important notes
* ❤️ Mark notes as favorites
* 🎨 Color-coded notes
* 🗑️ Trash system (Soft delete & restore)
* 📂 Category management (Many-to-Many)
* 🏷️ Tag system for flexible organization
* 🔍 Advanced search (title & content)
* 🎯 Smart filtering (Pinned, Favorites, Categories, Tags)
* 🔄 Sorting (Newest, Oldest, Alphabetical)
* ✍️ Rich Text Editor (bold, lists, headings)
* 📊 Live word count
* 📤 Export notes as PDF & TXT
* 🌙 Dark / Light mode toggle
* 👤 Profile management

---

### 🛠️ Admin Panel

* 🔐 Separate Admin Authentication
* 📊 Dashboard with system insights
* 👥 Manage all users
* 🚫 Block / Unblock users
* ❌ Delete user accounts
* 📝 View all user notes
* 🛡️ Content moderation (delete inappropriate notes)
* 🏷️ Manage categories & tags
* 📈 Platform analytics:
  * Total Users 👥
  * Total Notes 📝
  * Activity tracking 📊

---

## 📸 Screenshots

### 👤 User Panel

![Dashboard](assets/user-dashboard.png)
![Light Mode](assets/user-dashboard-light.png)
![Login](assets/user-login.png)
![Register](assets/user-register.png)
![Notes](assets/notes.png)
![Categories](assets/categories.png)
![Tags](assets/tags.png)
![Trash](assets/trash.png)
![Profile](assets/profile-setting.png)

---

### 🔐 Admin Panel

![Admin Dashboard](assets/admin-dashboard.png)
![Admin Dashboard Light](assets/admin-dashboard-light.png)
![Admin Login](assets/admin-login.png)
![Admin Register](assets/admin-register.png)
![Users](assets/users.png)

---

## 🛠️ Tech Stack

* 💻 Frontend: Blade, HTML, CSS, JavaScript
* ⚙️ Backend: Laravel (PHP)
* 🗄️ Database: MySQL
* 🎨 Styling: Tailwind CSS
* 📦 Build Tool: Vite

---

## 📂 Project Structure

```bash
project-root/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   ├── Auth/
│   │   │   └── ...
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
│
├── assets/              # README screenshots
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
│
├── routes/
├── storage/
├── tests/
│
├── artisan
├── composer.json
├── package.json
└── README.md
````

---

## ⚙️ Setup Instructions

### 1️⃣ Clone Repository

```bash
git clone https://github.com/your-username/smart-notes-app.git
cd smart-notes-app
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Configure Database

Update `.env` file with your database credentials.

### 5️⃣ Run Migrations

```bash
php artisan migrate
```

### 6️⃣ Start Application

```bash
php artisan serve
npm run dev
```

---

## 🔐 Admin Access

```
/admin/login
```

---

## 🧩 Database Relationships

* Users → Notes (One-to-Many)
* Users → Categories (One-to-Many)
* Notes ↔ Categories (Many-to-Many)
* Notes ↔ Tags (Many-to-Many)

---

## 💡 Highlights

* ⚡ Clean and scalable Laravel architecture
* 🎯 Advanced filtering & search system
* 🔐 Role-based authentication (User/Admin)
* 📊 Real-world dashboard implementation
* 🧩 Optimized database relationships
* 🎨 Modern UI/UX design

---

## 🚀 Future Enhancements

* 📱 Mobile app version
* 🔔 Notification system
* 🤝 Real-time collaboration
* 🤖 AI-powered smart notes

---

## 👩‍💻 Author

*Riha Shehzadi & Laiba Ijaz* 
Software Engineer | Frontend & Backend Developer

## 🤝 Collaboration

This project was developed as a collaborative effort.

- 👩‍💻 *Riha Shahzadi*  
  GitHub: https://github.com/codingwithriha  

- 👩‍💻 *Laiba Ijaz*
  
  GitHub: https://github.com/CodingWithLaiba
  
---

## ⭐ Credits

This project reflects strong expertise in:

* Full Stack Development (Laravel)
* UI/UX Design
* Database Design & Optimization
* Real-world Application Architecture

---

## ⭐ Show Your Support

If you like this project:

* ⭐ Star the repository
* 🍴 Fork it
* 📢 Share it

---

## 📬 Contact

Let’s connect and collaborate 🚀
