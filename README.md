# 📧 MyMail - A Simplified Gmail Clone using PHP and MySQL

MyMail is a web-based email system built using **PHP**, **MySQL**, **HTML**, **CSS**, and **Bootstrap**. It provides core email functionalities like user registration, login, composing mails, inbox view, and sent messages—designed for learning and academic purposes.

---

## 📁 Features

✅ User Registration  
✅ User Login & Logout  
✅ Compose and Send Messages  
✅ View Inbox (Received Mails)  
✅ View Sent Mails  
✅ Responsive UI using Bootstrap  
✅ Clean Folder Structure (Header, Sidebar, Footer)  

---

## 🚀 Technologies Used

- **Frontend**: HTML, CSS, Bootstrap  
- **Backend**: PHP (Procedural)  
- **Database**: MySQL  
- **Server**: XAMPP / WAMP / LAMP  

---

## 📂 Folder Structure

mymail/
│
├── auth/
│ ├── login.php
│ ├── register.php
│ └── logout.php
│
├── db/
│ └── db.php
│
├── includes/
│ ├── header.php
│ ├── footer.php
│ └── sidebar.php
│
├── dashboard.php
├── compose.php
├── inbox.php
├── sent.php
├── profile.php
├── style.css
└── README.md


---

## ⚙️ Installation Steps

1. Clone the repository:

git clone https://github.com/lopalopa/mymail.git
Move the folder into your XAMPP htdocs or WAMP www directory:

C:/xampp/htdocs/mymail
Create the database in phpMyAdmin:

CREATE DATABASE mymail;
Import the provided SQL file (if available) into the mymail database.

Update the database connection in db/db.php:
$conn = mysqli_connect("localhost", "root", "", "mymail");
Start Apache and MySQL from XAMPP/WAMP.

Run the app in the browser:

http://localhost/mymail/
🧑‍💻 Project Flow
User Registration → register.php

Login → login.php

Dashboard → dashboard.php

Compose Message → compose.php

View Inbox → inbox.php

View Sent Mails → sent.php

User Profile → profile.php

📸 Screenshots
(Add your screenshots here by uploading them or linking externally)

📚 Blog
Check the full step-by-step tutorial on how this project was developed:
🔗 Read the blog 
https://developerrashmi101.blogspot.com/2025/08/from-scratch-to-inbox-develop-gmail.html
youtube: https://youtu.be/NtAwMTiLSEM
💡 Use Cases
Academic Mini Projects

Learning PHP + MySQL CRUD Operations

Understanding Login System

Practice for Bootstrap UI design

🙌 Author
Developed by Rashmi Prava Mishra
🔗 [LinkedIn](https://www.linkedin.com/in/rashmi-mishra-187734106/)
🔗 [GitHub](https://github.com/lopalopa/]
🔗 [Blog](https://developerrashmi101.blogspot.com/2025/08/from-scratch-to-inbox-develop-gmail.html)
