<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้า 2: ผล CT และตัดสินใจ</title>
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
        <div class="col-lg-8">

          <div class="card shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title">Patient: [ชื่อ-สกุล] | HN: [1234567]</h5>
              <p class="card-text mb-1"><strong>Onset Time:</strong> [30/10/2025 08:00]</p>
              <p class="card-text"><strong>Initial NIHSS:</strong> [12]</p>
            </div>
          </div>

          <div class="card shadow-sm">
            <div class="card-header bg-info text-dark">
              <h4 class="mb-0">🖥️ ผลการวินิจฉัยและตัดสินใจ</h4>
            </div>
            <div class="card-body p-4">
              <form>
                <h5>ส่วนที่ 1: ผลการตรวจ CT (Non-Contrast)</h5>
                <div class="mb-3 p-3 bg-light border rounded">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="ctResult" id="ctResultIschemic" value="ischemic">
                    <label class="form-check-label fs-5" for="ctResultIschemic">
                      ไม่พบเลือดออก (No Hemorrhage) - (สงสัย Ischemic Stroke)
                    </label>
                  </div>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="ctResult" id="ctResultHemorrhagic" value="hemorrhagic">
                    <label class="form-check-label fs-5" for="ctResultHemorrhagic">
                      พบเลือดออก (Hemorrhagic Stroke)
                    </label>
                  </div>
                </div>

                <div id="ischemicPathway" class="d-none">
                  <h5 class="mt-4 text-primary">A. แนวทาง Ischemic Stroke</h5>
                  <div class="card card-body">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="aspect" class="form-label">ASPECT Score (0-10)</label>
                        <input type="number" class="form-control" id="aspect">
                      </div>
                      <div class="col-md-6">
                        <label for="collateral" class="form-label">Collateral Score (0-5)</label>
                        <input type="number" class="form-control" id="collateral">
                      </div>
                    </div>
                    <hr>
                    <label class="form-label">การตัดสินใจให้ยาละลายลิ่มเลือด (t-PA / TNK)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="giveTpa">
                      <label class="form-check-label" for="giveTpa">ให้การรักษา (Give t-PA/TNK)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="noTpa">
                      <label class="form-check-label" for="noTpa">ไม่ให้การรักษา (Contraindicated)</label>
                    </div>
                    <hr>
                    <label class="form-label">การพิจารณาสวนลากลิ่มเลือด (Mechanical Thrombectomy - MT)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="referMT">
                      <label class="form-check-label" for="referMT">พิจารณาส่งทำ MT (Refer for MT)</label>
                    </div>
                  </div>
                </div>

                <div id="hemorrhagicPathway" class="d-none">
                  <h5 class="mt-4 text-danger">B. แนวทาง Hemorrhagic Stroke</h5>
                  <div class="card card-body">
                    <div class="mb-3">
                      <label for="location" class="form-label">ตำแหน่ง (Location)</label>
                      <input type="text" class="form-control" id="location">
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="ivh">
                      <label class="form-check-label" for="ivh">มีเลือดออกในโพรงสมอง (IVH)</label>
                    </div>
                    <hr>
                    <label class="form-label">แผนการรักษา</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="consultNS">
                      <label class="form-check-label" for="consultNS">ปรึกษาศัลยแพทย์ระบบประสาท (Consult Neurosurgeon)</label>
                    </div>
                  </div>
                </div>

                <hr class="my-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-success btn-lg">➡️ รับเข้าหอผู้ป่วย (Admit to Ward)</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // JavaScript ง่ายๆ เพื่อซ่อน/แสดงผล ตามผล CT
      const radioIschemic = document.getElementById('ctResultIschemic');
      const radioHemorrhagic = document.getElementById('ctResultHemorrhagic');
      const ischemicPathway = document.getElementById('ischemicPathway');
      const hemorrhagicPathway = document.getElementById('hemorrhagicPathway');

      radioIschemic.addEventListener('change', () => {
        if (radioIschemic.checked) {
          ischemicPathway.classList.remove('d-none');
          hemorrhagicPathway.classList.add('d-none');
        }
      });

      radioHemorrhagic.addEventListener('change', () => {
        if (radioHemorrhagic.checked) {
          ischemicPathway.classList.add('d-none');
          hemorrhagicPathway.classList.remove('d-none');
        }
      });
    </script>
  </body>
</html>