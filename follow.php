<?php
// 1. [ต้องมี] เริ่ม session เพื่อ "ปลุก" ข้อมูลที่เก็บไว้
session_start(); 
$user = $_SESSION['user_data']; 

?>
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>หน้าจำหน่ายและติดตามผล (Follow-up)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS เพื่อให้ได้สไตล์แบบในรูปตัวอย่าง
        */
    .nav-card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      /* เงาจางๆ */
      transition: all 0.3s ease;
      /* ทำให้ขยับได้อย่างนุ่มนวล */
      display: flex;
      /* จัดไอคอนกับข้อความให้อยู่แนวเดียวกัน */
      align-items: center;
      padding: 24px;
      text-decoration: none;
      color: #333;
      height: 100%;
      /* ทำให้การ์ดสูงเท่ากัน */
    }

    .navbar-custom {
      background-color: #4a559d;
      /* สีม่วงน้ำเงินจากรูป (โดยประมาณ) */
    }

    .nav-card:hover {
      transform: translateY(-5px);
      /* ขยับขึ้นเล็กน้อย */
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* 5. วงกลมไอคอน */
    .nav-card .icon-circle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 20px;
      font-size: 24px;
    }
  </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <i class="fas fa-brain me-2"></i>
        ระบบส่งต่อผู้ป่วยโรคหลอดเลือดสมอง (Stroke)
      </a>
      <div class="d-flex">
        <span class="navbar-text text-white d-flex align-items-center">
          <i class="fas fa-user-circle fa-2x me-3"></i>
          <span>
            <strong>ชื่อ-สกุล:</strong> <?php echo htmlspecialchars($user['HR_FNAME']); ?>
          </span>
        </span>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-header bg-success text-white">
            <h4 class="mb-0">📝 หน้าจำหน่ายและติดตามผล (Discharge & Follow-up)</h4>
          </div>
          <div class="card-body p-4">

            <fieldset class="border p-3 rounded mb-4">
              <legend class="float-none w-auto px-2 h5">1. แผนการจำหน่าย</legend>
              <div class="mb-3">
                <label for="dischargePlan" class="form-label">แผนการจำหน่าย (กลับบ้าน or refer)</label>
                <select class="form-select" id="dischargePlan">
                  <option value="home">กลับบ้าน (Go Home)</option>
                  <option value="refer">ส่งต่อ (Refer)</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="dischargeNote" class="form-label">บันทึกเพิ่มเติม (ถ้า Refer)</label>
                <input type="text" class="form-control" id="dischargeNote" placeholder="ส่งต่อไปยัง...">
              </div>
            </fieldset>

            <fieldset class="border p-3 rounded">
              <legend class="float-none w-auto px-2 h5">2. ระบบนัดหมายติดตามผล</legend>
              <p>
                <strong>mRS (ณ วันจำหน่าย) (mRS 0):</strong> [ 2 ] 
                <span class="text-muted">(ดึงมาจากหน้า Ward)</span>
              </p>

              <button type="button" class="btn btn-outline-primary mb-3">
                ➕ สร้างนัดอัตโนมัติ (mRS 1, 3, 6, 12)
              </button>
                
              <table class="table table-bordered table-hover">
                <thead class="table-light">
                  <tr>
                    <th>การติดตามผล</th>
                    <th>วันที่นัดหมาย</th>
                    <th>สถานะ</th>
                    <th>mRS Score</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>mRS 1 เดือน</strong></td>
                    <td>[30/11/2025]</td>
                    <td><span class="badge bg-warning">รอนัด</span></td>
                    <td>(ว่าง)</td>
                  </tr>
                  <tr>
                    <td><strong>mRS 3 เดือน</strong></td>
                    <td>[30/01/2026]</td>
                    <td><span class="badge bg-warning">รอนัด</span></td>
                    <td>(ว่าง)</td>
                  </tr>
                  <tr>
                    <td><strong>mRS 6 เดือน</strong></td>
                    <td>[30/04/2026]</td>
                    <td><span class="badge bg-warning">รอนัด</span></td>
                    <td>(ว่าง)</td>
                  </tr>
                  <tr>
                    <td><strong>mRS 12 เดือน</strong></td>
                    <td>[30/10/2026]</td>
                    <td><span class="badge bg-warning">รอนัด</span></td>
                    <td>(ว่าง)</td>
                  </tr>
                </tbody>
              </table>
            </fieldset>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>