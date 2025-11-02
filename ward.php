<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้า 3: หอผู้ป่วย (Ward)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS เพื่อให้ได้สไตล์แบบในรูปตัวอย่าง
        */

        /* 1. พื้นหลังสีเทาอ่อนแบบในรูป */
        body {
            background-color: #f4f7f6;
        }

        /* 2. สไตล์ Top Navbar ให้เป็นสีน้ำเงิน/ม่วง แบบในรูป */
        .navbar-custom {
            background-color: #4a559d;
            /* สีม่วงน้ำเงินจากรูป (โดยประมาณ) */
        }

        /* 3. สไตล์ของ "การ์ด" เมนู */
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

        /* 4. สไตล์เมื่อเอาเมาส์ไปชี้ */
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

        /* สีของไอคอน (แบ่งสีให้สวยงาม) */
        .bg-icon-1 {
            background-color: #e3f2fd;
            color: #1e88e5;
        }

        /* สีฟ้า */
        .bg-icon-2 {
            background-color: #e8f5e9;
            color: #43a047;
        }

        /* สีเขียว */
        .bg-icon-3 {
            background-color: #fff3e0;
            color: #fb8c00;
        }

        /* สีส้ม */
        .bg-icon-4 {
            background-color: #fce4ec;
            color: #d81b60;
        }

        /* สีชมพู */
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
                        <strong>ชื่อ-สกุล:</strong> <?php echo "สุขใจ (ทดสอบ) ซ่อมไว"; ?>
                    </span>
                </span>
            </div>
        </div>
    </nav>
    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          
          <div class="card shadow-sm mb-4">
            <div class="card-body bg-light">
              <h5 class="card-title">Patient: [ชื่อ-สกุล] | HN: [1234567]</h5>
              <span class="badge bg-primary fs-6">Diagnosis: [Ischemic Stroke]</span>
              <span class="badge bg-success fs-6">Treatment: [ให้ยา t-PA แล้ว]</span>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                  <h4 class="mb-0">🖥️ การเฝ้าระวังอาการ (Monitoring Flowsheet)</h4>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <button class="btn btn-primary">➕ เพิ่มบันทึกการเฝ้าระวัง (Add New Entry)</button>
                  </div>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>วันที่/เวลา</th>
                        <th>SBP (ความดัน)</th>
                        <th>GCS</th>
                        <th>NIHSS</th>
                        <th>ผู้บันทึก</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>30/10/2025 10:00</td>
                        <td>140</td>
                        <td>E4M6V5 (15)</td>
                        <td>10</td>
                        <td>พยบ. A</td>
                      </tr>
                      <tr>
                        <td>30/10/2025 09:30</td>
                        <td>145</td>
                        <td>E4M6V5 (15)</td>
                        <td>11</td>
                        <td>พยบ. A</td>
                      </tr>
                      <tr>
                        <td>30/10/2025 09:00</td>
                        <td>150</td>
                        <td>E4M6V5 (15)</td>
                        <td>12</td>
                        <td>พยบ. A</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card shadow-sm mt-4">
                <div class="card-header">
                  <h5>ภาวะแทรกซ้อน (Complications)</h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-danger btn-sm mb-2">➕ บันทึกภาวะแทรกซ้อน</button>
                    </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card shadow-sm">
                <div class="card-header">
                  <h5>การตรวจติดตาม (Investigations)</h5>
                </div>
                <div class="card-body">
                  <button class="btn btn-outline-info btn-sm mb-2">➕ บันทึกผล CT ซ้ำ</button>
                  <ul class="list-group">
                    <li class="list-group-item">CT ครั้งที่ 1 (แรกรับ): ไม่พบเลือดออก</li>
                    <li class="list-group-item">CT ครั้งที่ 2 (24 ชม.): ...</li>
                  </ul>
                </div>
              </div>

              <div class="card shadow-sm mt-4">
                <div class="card-header">
                  <h5>การประเมินเพื่อเตรียมจำหน่าย</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="mb-2">
                      <label for="barthel" class="form-label">Barthel Index</label>
                      <input type="number" class="form-control" id="barthel">
                    </div>
                    <div class="mb-2">
                      <label for="hrs" class="form-label">HRS (...)</label>
                      <input type="number" class="form-control" id="hrs">
                    </div>
                    <div class="mb-2">
                      <label for="mrsDischarge" class="form-label">mRS (ณ วันจำหน่าย)</label>
                      <select class="form-select" id="mrsDischarge">
                         <option selected>-- เลือกคะแนน --</option>
                         <option value="0">0 - ไม่มีอาการ</option>
                         <option value="1">1 - ...</option>
                         <option value="2">2 - ...</option>
                         </select>
                    </div>
                  </form>
                </div>
              </div>

              <div class="d-grid mt-4">
                <button class="btn btn-success btn-lg">➡️ วางแผนจำหน่าย และสร้างนัดติดตามผล</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>