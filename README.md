🎓 CGPA Calculator Web Application
Project Overview
The CGPA (Cumulative Grade Point Average) Calculator is a web-based application designed to help students calculate their academic performance metrics. This project was developed as part of my Internet Programming Laboratory coursework, combining front-end design with back-end functionality to create a practical tool for academic grade management.
🌟 Features

User Registration System

Personal information collection
Educational background tracking
Secure data storage

CGPA Calculation

Support for multiple courses
Automatic grade calculation
GPA conversion based on standard grading system
Detailed result visualization

User Interface

Clean and intuitive design
Responsive navigation
Dark theme for reduced eye strain
Interactive form elements

💻 Technologies Used

Frontend

HTML5
Tailwind CSS
JavaScript (planned for future enhancement)

Backend

PHP
MySQL Database

Development Tools

XAMPP/WAMP Server
Visual Studio Code
Git for version control

🚀 Installation Guide

Prerequisites

XAMPP/WAMP server installed
Web browser
Text editor

Setup Steps
bashCopy# Clone the repository
git clone https://github.com/czmamun/CSE-3108-Lab-Project-ID-20222046010-.git

# Move to htdocs folder

mv cgpa-calculator /path/to/xampp/htdocs/

# Start Apache and MySQL services

# Import database

- Open phpMyAdmin
- Create new database named 'students'
- Database tables will be created automatically

Access Application

Open browser and navigate to http://localhost/cgpaCalculator

📊 Database Structure
Table: student_info

id (Primary Key)
username
useremail
usermobile
userdob
gender
religion
paddress
comment

Table: student_result

id (Primary Key)
student_info_id (Foreign Key)
course
mark
grade
grade_point

📝 Grading System
Mark RangeGradeGrade Point80-100A+4.0075-79A3.7570-74A-3.5065-69B+3.2560-64B3.0055-59B-2.7550-54C+2.5045-49C2.2540-44D2.000-39F0.00
🔄 Future Enhancements

Implementation of JavaScript form validation
Addition of semester-wise CGPA tracking
Export functionality for results (PDF/Excel)
User authentication system
Mobile responsive design improvements
Course credit hour consideration
Result history tracking

🛠️ Known Issues

Form validation needs improvement
SQL injection vulnerability needs to be addressed
Mobile responsiveness requires enhancement
Error handling needs implementation
Database security needs strengthening

👥 Contributing
Feel free to fork this project and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.
📜 License
This project is licensed under the MIT License - see the LICENSE file for details.
🙏 Acknowledgments

My course instructor for guidance
Tailwind CSS community for UI components
Stack Overflow community for troubleshooting help
Fellow students for testing and feedback

📧 Contact
For any queries or suggestions, please reach out to:
Name: Abdullah Al-Mamun
ID: 20222046010 (A2)
Email: aalmamun18800@gmail.com
GitHub: czmamun
