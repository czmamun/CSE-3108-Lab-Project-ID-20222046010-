<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";


// Create connection
$conn = new mysqli($servername, $db_username, $db_password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database 
$sqlDB = "CREATE DATABASE IF NOT EXISTS students";
$conn->query($sqlDB);


$conn->select_db("students");

// Create table 
$sqlTable = "CREATE TABLE IF NOT EXISTS student_info (
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(45),
    useremail VARCHAR(45),
    usermobile VARCHAR(15),
    userdob DATE,
    gender VARCHAR(10),
    religion VARCHAR(20),
    paddress VARCHAR(255),
    comment TEXT
)";
$conn->query($sqlTable);

// Insert data if form is submitted
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $usermobile = $_POST['usermobile'];
    $userdob = $_POST['userdob'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $paddress = $_POST['parmaddress'];
    $comment = $_POST['comment'];

    $sqlInsert = "INSERT INTO student_info (username, useremail, usermobile, userdob, gender, religion, paddress, comment) VALUES ('$username', '$useremail', '$usermobile', '$userdob', '$gender', '$religion', '$paddress', '$comment')";

    $conn->query($sqlInsert);
}

// Fetch data
$sqlFetch = "SELECT * FROM student_info ORDER BY id DESC LIMIT 1";
$result = $conn->query($sqlFetch);
$data = $result->fetch_assoc();

// Close 
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Information</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>

<body class="bg-slate-800 text-white m-5">
    <header>
        <nav class="bg-gradient-to-r from-indigo-500 to-indigo-800 flex justify-between items-center border border-indigo-900 rounded-md px-4">
            <div class="flex space-x-5 items-center">
                <div class="text-white text-center font-bold cursor-pointer">
                    <p class="text-xl">CGPA</p>
                    <p class="text-sm">Calculator</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-indigo-300">Home</a>
                    <a href="#" class="text-white hover:text-indigo-300">Calculators</a>
                    <a href="#" class="text-white hover:text-indigo-300">Guide</a>
                    <a href="#" class="text-white hover:text-indigo-300">About</a>
                    <a href="#" class="text-white hover:text-indigo-300">More</a>
                    <a href="#" class="text-white hover:text-indigo-300">Blog</a>
                    <a href="#" class="text-white hover:text-indigo-300">Contact</a>
                </div>
            </div>
            <div>
                <button class="m-2 px-4 py-2 bg-indigo-700 hover:bg-indigo-600 border rounded-md text-white">Login</button>
                <button class="m-2 px-4 py-2 bg-indigo-700 hover:bg-indigo-600 border rounded-md text-white">Sign Up</button>
            </div>
        </nav>
    </header>

    <main>
        <section class="my-4 text-center">
            <p class="text-xl text-white font-semibold">Sign Up completed. Information submitted successfully...</p>
        </section>

        <section class="flex flex-col items-center">
            <p class="text-lg text-white font-semibold mb-4">Your Submitted Information</p>
            <table class="shadow-lg w-full text-white bg-slate-700 rounded-md overflow-hidden border border-slate-500 border-collapse">
                <thead>
                    <tr class="bg-indigo-900 text-white text-center border border-slate-500">
                        <th class="px-4 py-1 border border-slate-500">Input Field</th>
                        <th class="px-4 py-1 border border-slate-500">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Name</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['username']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Email</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['useremail']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Mobile Number</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['usermobile']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Date of Birth</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['userdob']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Gender</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['gender']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Religion</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['religion']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Permanent Address</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['paddress']; ?></td>
                    </tr>
                    <tr class="text-left border border-slate-500 hover:bg-indigo-800">
                        <th class="px-4 py-1 border border-slate-500">Your Comment</th>
                        <td class="px-4 py-1 border border-slate-500"><?php echo $data['comment']; ?></td>
                    </tr>
                </tbody>
            </table>

            <p class="mt-3">
                To update your information, please Click
                <a href="index.html" class="text-indigo-400 underline hover:text-indigo-600">Here</a>.
            </p>
        </section>


        <section class="flex flex-col mt-4 items-center">
            <p class="font-bold text-lg text-white">Signed Up Successfully</p>
            <p class="font-extrabold text-3xl text-indigo-700">
                Click
                <a href="calculator.html" class="text-white underline hover:text-indigo-300">here</a>
                to use the CGPA Calculator
            </p>
        </section>
    </main>

</body>

</html>