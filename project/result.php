<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "students";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Create student_info table
$sqlCreateFormDataTable = "CREATE TABLE IF NOT EXISTS student_info (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL
)";
$conn->query($sqlCreateFormDataTable);

// Create student_result table
$sqlCreateResultTable = "CREATE TABLE IF NOT EXISTS student_result (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    student_info_id INT(5),
    course VARCHAR(30),
    mark INT(3),
    grade VARCHAR(5),
    grade_point DECIMAL(4,2),
    FOREIGN KEY (student_info_id) REFERENCES student_info(id) ON DELETE CASCADE
)";
$conn->query($sqlCreateResultTable);

// Capture form data
$student_name = $_POST['student_name'];
$courses = [$_POST['sub1'], $_POST['sub2'], $_POST['sub3'], $_POST['sub4'], $_POST['sub5'], $_POST['sub6']];
$marks = [$_POST['sub1mark'], $_POST['sub2mark'], $_POST['sub3mark'], $_POST['sub4mark'], $_POST['sub5mark'], $_POST['sub6mark']];

// Function to calculate grade
function calculateGrade($mark)
{
    if ($mark >= 80) return "A+";
    elseif ($mark >= 75) return "A";
    elseif ($mark >= 70) return "A-";
    elseif ($mark >= 65) return "B+";
    elseif ($mark >= 60) return "B";
    elseif ($mark >= 55) return "B-";
    elseif ($mark >= 50) return "C+";
    elseif ($mark >= 45) return "C";
    elseif ($mark >= 40) return "D";
    else return "F";
}

// Function to get grade points
function getGradePoint($grade)
{
    $grade_points = [
        "A+" => 4.00,
        "A" => 3.75,
        "A-" => 3.50,
        "B+" => 3.25,
        "B" => 3.00,
        "B-" => 2.75,
        "C+" => 2.50,
        "C" => 2.25,
        "D" => 2.00,
        "F" => 0.00
    ];
    return $grade_points[$grade] ?? 0.00;
}

// Insert student data
$sqlInsertFormData = "INSERT INTO student_info (student_name) VALUES ('$student_name')";
$conn->query($sqlInsertFormData);
$student_info_id = $conn->insert_id;

$totalPoints = 0;
foreach ($marks as $index => $mark) {
    $grade = calculateGrade($mark);
    $grade_point = getGradePoint($grade);
    $totalPoints += $grade_point;
    $sqlInsertResult = "INSERT INTO student_result (student_info_id, course, mark, grade, grade_point) VALUES ('$student_info_id', '{$courses[$index]}', '$mark', '$grade', '$grade_point')";
    $conn->query($sqlInsertResult);
}
$gpa = $totalPoints / count($marks);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CGPA Calculator</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>

<body class="bg-slate-800 text-white m-5">
    <header>
        <nav class="bg-gradient-to-r from-indigo-500 to-indigo-800 flex justify-between items-center px-4 border rounded-md">
            <div class="text-white font-bold text-xl">CGPA Calculator</div>
        </nav>
    </header>
    <main>
        <section class="text-center my-4">
            <p class="text-lg font-semibold">Information Submitted Successfully</p>
        </section>
        <section class="flex flex-col items-center">
            <table class="w-full text-white bg-slate-700 border border-slate-500">
                <thead>
                    <tr class="bg-indigo-900 text-white text-center">
                        <th class="px-4 py-2">Course Title</th>
                        <th class="px-4 py-2">Mark</th>
                        <th class="px-4 py-2">Grade</th>
                        <th class="px-4 py-2">Grade Point</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="border border-slate-500 text-center">
                            <td class="px-4 py-2"> <?php echo $row['course']; ?> </td>
                            <td class="px-4 py-2"> <?php echo $row['mark']; ?> </td>
                            <td class="px-4 py-2"> <?php echo $row['grade']; ?> </td>
                            <td class="px-4 py-2"> <?php echo $row['grade_point']; ?> </td>
                        </tr>
                    <?php } ?>
                    <tr class="border border-slate-500 text-center font-bold">
                        <td colspan="3" class="px-4 py-2">CGPA</td>
                        <td class="px-4 py-2"> <?php echo number_format($gpa, 2); ?> </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <footer class="bg-indigo-500 text-white text-center p-2 mt-4">
        <p>CGPA Calculator Project | Developed by Abdullah Al-Mamun</p>
    </footer>
</body>

</html>