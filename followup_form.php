<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้า 4: จำหน่ายและติดตามผล</title>
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
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="card shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title">Patient: [ชื่อ-สกุล] | HN: [1234567]</h5>
              <p class="card-text mb-1"><strong>Diagnosis:</strong> [Ischemic Stroke]</p>
            </div>
          </div>

          <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
              <h4 class="mb-0">📝 วางแผนจำหน่าย และ นัดติดตามผล</h4>
            </div>
            <div class="card-body p-4">
              <form>
                <h5>ส่วนที่ 1: สรุปการจำหน่าย</h5>
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label for="dischargeDate" class="form-label">วันที่จำหน่าย (Discharge Date)</label>
                    <input type="date" class="form-control" id="dischargeDate">
                  </div>
                  <div class="col-md-6">
                    <label for="mrsAtDischarge" class="form-label">mRS (ณ วันจำหน่าย) (mRS 0)</label>
                    <select class="form-select" id="mrsAtDischarge">
                      <option selected>-- เลือกคะแนน --</option>
                      <option value="0">0 - ไม่มีอาการ</option>
                      <option value="1">1 - ...</option>
                      <option value="2">2 - ...</option>
                      </select>
                  </div>
                  <div class="col-12">
                     <label for="medications" class="form-label">ยาที่ให้กลับบ้าน</label>
                     <textarea class="form-control" id="medications" rows="3"></textarea>
                  </div>
                   <div class="col-12">
                     <label for="recommend" class="form-label">คำแนะนำ (กายภาพบำบัด, คุมอาหาร, ฯลฯ)</label>
                     <textarea class="form-control" id="recommend" rows="3"></textarea>
                  </div>
                </div>

                <h5 class="mt-4">ส่วนที่ 2: ระบบนัดหมายติดตามผล (mRS 1, 3, 6, 12)</h5>
                <div class="mb-3">
                    <button type="button" class="btn btn-outline-primary">➕ สร้างนัดอัตโนมัติ (Auto-generate Appointments)</button>
                </div>
                
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>การติดตามผล</th>
                            <th>วันที่นัดหมาย</th>
                            <th>สถานะ</th>
                            <th>mRS Score (ที่บันทึก)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>mRS 1 เดือน</strong></td>
                            <td>[30/11/2025]</td>
                            <td><span class="badge bg-warning">รอนัด</span></td>
                            <td>(ว่าง)</td>
                            <td><button type="button" class="btn btn-sm btn-outline-secondary">แก้ไข</button></td>
                        </tr>
                        <tr>
                            <td><strong>mRS 3 เดือน</strong></td>
                            <td>[30/01/2026]</td>
                            <td><span class="badge bg-warning">รอนัด</span></td>
                            <td>(ว่าง)</td>
                            <td><button type="button" class="btn btn-sm btn-outline-secondary">แก้ไข</button></td>
                        </tr>
                        <tr>
                            <td><strong>mRS 6 เดือน</strong></td>
                            <td>[30/04/2026]</td>
                            <td><span class="badge bg-warning">รอนัด</span></td>
                            <td>(ว่าง)</td>
                            <td><button type="button" class="btn btn-sm btn-outline-secondary">แก้ไข</button></td>
                        </tr>
                        <tr>
                            <td><strong>mRS 12 เดือน</strong></td>
                            <td>[30/10/2026]</td>
                            <td><span class="badge bg-warning">รอนัด</span></td>
                            <td>(ว่าง)</td>
                            <td><button type="button" class="btn btn-sm btn-outline-secondary">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>

                <hr class="my-4">
                <div class="row g-2">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary w-100">🖨️ พิมพ์สรุปจำหน่าย</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success w-100">✔️ ยืนยันการจำหน่ายและนัดหมาย</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>