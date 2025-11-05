<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user_data'];
?>
<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient List - ระบบ Stroke Care</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-heart-pulse-fill"></i>
            <span>Stroke Care</span>
        </div>

        <a href="index.php" class="active">
            <i class="bi bi-list-task"></i> Patient List
        </a>

        <a href="form.php">
            <i class="bi bi-person-plus-fill"></i> บันทึกข้อมูลแรกรับ
        </a>

        <hr class="sidebar-divider">

        <a href="logout.php" class="text-danger">
            <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
        </a>
    </div>

    <div class="main">

        <div class="header-section">
            <div class="icon-container">
                <i class="bi bi-list-task"></i>
            </div>
            <div class="title-container">
                <h1>Patient List</h1>
                <p class="subtitle mb-0">รายชื่อผู้ป่วยที่ลงทะเบียนในระบบ</p>
            </div>
            <div class="d-flex">
                <span class="navbar-text text-white d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x me-3"></i>
                    <span>
                        <strong>ชื่อ-สกุล:</strong> <?php echo htmlspecialchars($user['HR_FNAME']); ?>
                    </span>
                </span>
            </div>

        </div>

        <div class="section-title">
            <i class="bi bi-table"></i> ตารางรายชื่อผู้ป่วย
        </div>

        <div class="mb-3">
            <a href="form.php" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus-fill me-2"></i> เพิ่มผู้ป่วยใหม่ (บันทึกข้อมูลแรกรับ)
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>HN</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ประเภท Stroke</th>
                            <th>วันที่รับ</th>
                            <th>สถานะ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345/67</td>
                            <td>นายสมชาย ใจดี</td>
                            <td>Ischemic</td>
                            <td>01/11/2025</td>
                            <td><span class="badge bg-success">Discharged</span></td>
                            <td>
                                <a href="form.php?hn=12345" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil-square"></i> แก้ไข/ดูข้อมูล
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>98765/43</td>
                            <td>นางสมหญิง จริงใจ</td>
                            <td>Hemorrhagic</td>
                            <td>03/11/2025</td>
                            <td><span class="badge bg-warning">In-Ward</span></td>
                            <td>
                                <a href="form.php?hn=98765" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil-square"></i> แก้ไข/ดูข้อมูล
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>