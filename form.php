<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user_data'];
// (ตรรกะสำหรับดึงข้อมูลผู้ป่วยด้วย $_GET['hn'] ควรอยู่ตรงนี้)
?>
<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1. ข้อมูลทั่วไป - ระบบ Stroke Care</title>

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

        <a href="index.php">
            <i class="bi bi-list-task"></i> กลับไปหน้า Patient List
        </a>
        <hr class="sidebar-divider">

        <a href="form.php" class="active">
            <i class="bi bi-person-lines-fill"></i> 1. ข้อมูลทั่วไป
        </a>
        <a href="diagnosis_form.php">
            <i class="bi bi-hospital"></i> 2. ER
        </a>
        <a href="OR_Procedure_Form.php">
            <i class="bi bi-scissors"></i> 3. OR Procedure
        </a>
        <a href="ward.php">
            <i class="bi bi-building-check"></i> 4. Ward
        </a>
        <a href="follow.php">
            <i class="bi bi-calendar-check"></i> 5. Follow Up
        </a>

        <hr class="sidebar-divider">
        <a href="logout.php" class="text-danger">
            <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
        </a>
    </div>

    <div class="main">

        <div class="header-section">
            <div class="icon-container">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <div class="title-container">
                <h1>1. ฟอร์มบันทึกข้อมูลแรกรับ</h1>
                <p class="subtitle mb-0">Admission Form</p>
            </div>
        </div>

        <form action="save_admission_data.php" method="POST">

            <div class="section-title">
                <i class="bi bi-search"></i> 1. ค้นหาผู้ป่วย
            </div>
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="hn_input" class="form-label"><strong>กรอกเลข HN</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="hn_input" name="hn" placeholder="กรอกเลข HN...">
                        <button class="btn btn-primary" type="button" id="fetch_patient_btn">
                            <i class="bi bi-search"></i> ค้นหาข้อมูล
                        </button>
                    </div>
                </div>
            </div>

            <input type="hidden" id="hidden_hn" name="patient_hn">

            <div id="patient_info_section" style="display: none;">
                <div class="section-title">
                    <i class="bi bi-person-badge"></i> 2. ข้อมูลผู้ป่วย
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" id="display_name" value="" placeholder="..." readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">อายุ</label>
                        <input type="text" class="form-control" id="display_age" value="" placeholder="..." readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">เพศ</label>
                        <input type="text" class="form-control" id="display_sex" value="" placeholder="..." readonly>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-clipboard-plus"></i> 3. โรคประจำตัว
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_ht" value="1" id="comorbid_ht"><label class="form-check-label" for="comorbid_ht">HT</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_dm" value="1" id="comorbid_dm"><label class="form-check-label" for="comorbid_dm">DM</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_dlp" value="1" id="comorbid_dlp"><label class="form-check-label" for="comorbid_dlp">DLP</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_mi" value="1" id="comorbid_mi"><label class="form-check-label" for="comorbid_mi">MI</label></div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_af" value="1" id="comorbid_af"><label class="form-check-label" for="comorbid_af">AF</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_smoking" value="1" id="comorbid_smoking"><label class="form-check-label" for="comorbid_smoking">SMOKING</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_alcohol" value="1" id="comorbid_alcohol"><label class="form-check-label" for="comorbid_alcohol">ALCOHOL</label></div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="comorbid_addictive" value="1" id="comorbid_addictive"><label class="form-check-label" for="comorbid_addictive">ADDICTIVE SUBSTANCE</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="old_cva" value="1" id="old_cva"><label class="form-check-label" for="old_cva">OLD CVA</label></div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="comorbid_other_check" value="1" id="comorbid_other_check">
                        <label class="form-check-label" for="comorbid_other_check">OTHER</label>
                    </div>
                    <input type="text" class="form-control" name="comorbid_other_text" id="comorbid_other_text" placeholder="ระบุโรคประจำตัวอื่นๆ..." style="display: none;">
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-star-half"></i> 4. MRS Score (ก่อนเกิดอาการ)
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="mrs_score" class="form-label">เลือกคะแนน MRS (0-6) <span class="required-mark">*</span></label>
                    <select class="form-select" id="mrs_score" name="mrs_score" required>
                        <option value="" selected disabled>-- กรุณาเลือก --</option>
                        <option value="0">0 - No symptoms</option>
                        <option value="1">1 - No significant disability</option>
                        <option value="2">2 - Slight disability</option>
                        <option value="3">3 - Moderate disability</option>
                        <option value="4">4 - Moderately severe disability</option>
                        <option value="5">5 - Severe disability</loption>
                        <option value="6">6 - Dead</option>
                    </select>
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-capsule"></i> 5. ยาที่ได้รับ (Medication)
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="med_anti_platelet" value="1" id="med_anti_platelet">
                        <label class="form-check-label" for="med_anti_platelet">Anti-platelet (ยาต้านเกล็ดเลือด)</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="med_anti_coagulant" value="1" id="med_anti_coagulant">
                        <label class="form-check-label" for="med_anti_coagulant">Anti-coagulant (ยาต้านการแข็งตัวของเลือด)</label>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-door-open"></i> 6. ประเภทการมาของคนไข้ (Arrival Type)
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="arrival_type" id="arrival_walk_in" value="walk_in" checked>
                        <label class="form-check-label" for="arrival_walk_in"> Walk in </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="arrival_type" id="arrival_er" value="er">
                        <label class="form-check-label" for="arrival_er"> ER (มาห้องฉุกเฉิน) </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="arrival_type" id="arrival_refer" value="refer">
                        <label class="form-check-label" for="arrival_refer"> Refer </label>
                    </div>
                </div>
                <div class="col-md-6 mt-3" id="refer_from_field" style="display: none;">
                    <label for="refer_from_text" class="form-label">Refer จาก (ระบุโรงพยาบาล):</label>
                    <input type="text" class="form-control" name="refer_from_text" id="refer_from_text" placeholder="ระบุชื่อโรงพยาบาล...">
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-card-checklist"></i> 7. ส่วนประเมินแรกรับ (Triage Assessment)
            </div>
            <h5 class="mt-2">เวลา (Time)</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="onsetTime" class="form-label">เวลาที่รถออกจากต้นทาง </label>
                    <input type="datetime-local" class="form-control" id="onsetTime">
                </div>
                <div class="col-md-6">
                    <label for="arrivalTime" class="form-label">เวลาที่ถึง รพ.</label>
                    <input type="datetime-local" class="form-control" id="arrivalTime">
                </div>
            </div>
            <h5 class="mt-4">อาการสำคัญ (Symptoms - F.A.S.T.)</h5>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sympDroop" value="face"><label class="form-check-label" for="sympDroop">F</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sympWeakness" value="arm"><label class="form-check-label" for="sympWeakness">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sympSpeech" value="speech"><label class="form-check-label" for="sympSpeech">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="symp_t" name="symp_t" value="1">
                    <label class="form-check-label" for="symp_t">T</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="symp_v" name="symp_v" value="1">
                    <label class="form-check-label" for="symp_v">V</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="symp_a2" name="symp_a2" value="1">
                    <label class="form-check-label" for="symp_a2">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="symp_n" name="symp_n" value="1">
                    <label class="form-check-label" for="symp_n">N</label>
                </div>
            </div>
            <h5 class="mt-4">การประเมินแรกรับ (Scores)</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="gcs" class="form-label">GCS </label>
                    <input type="text" class="form-control" id="gcs" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="nihss" class="form-label">NIHSS </label>
                    <input type="number" class="form-control" id="nihss" placeholder="">
                </div>
            </div>

            <div class="text-center mt-5 mb-3">
                <button type="submit" class="btn btn-primary btn-lg px-5">
                    <i class="bi bi-save-fill me-2"></i> บันทึกข้อมูล
                </button>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // (JS สำหรับ checkbox "อื่นๆ" และ "Refer")
            const otherCheckbox = document.getElementById('comorbid_other_check');
            const otherTextField = document.getElementById('comorbid_other_text');
            otherCheckbox.addEventListener('change', function() {
                otherTextField.style.display = this.checked ? 'block' : 'none';
                if (!this.checked) otherTextField.value = '';
            });

            const referRadio = document.getElementById('arrival_refer');
            const referTextField = document.getElementById('refer_from_field');

            document.querySelectorAll('input[name="arrival_type"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    referTextField.style.display = referRadio.checked ? 'block' : 'none';
                    if (!referRadio.checked) referTextField.querySelector('input').value = '';
                });
            });

            // (JS สำหรับปุ่มค้นหา HN)
            const fetchButton = document.getElementById('fetch_patient_btn');
            const hnInput = document.getElementById('hn_input');
            const patientSection = document.getElementById('patient_info_section');

            fetchButton.addEventListener('click', function() {
                const hn = hnInput.value;
                if (hn === '') {
                    alert('กรุณากรอก HN ก่อนครับ');
                    return;
                }
                // (ในระบบจริง ตรงนี้ควร fetch ข้อมูล)
                // (จำลองการแสดงผล)
                document.getElementById('display_name').value = 'จำลอง: นายสมชาย ใจดี';
                document.getElementById('display_age').value = '55';
                document.getElementById('display_sex').value = 'ชาย';
                document.getElementById('hidden_hn').value = hn;
                patientSection.style.display = 'block';
            });
        });
    </script>
</body>

</html>