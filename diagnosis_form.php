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
    <title>2. ER - ระบบ Stroke Care</title>

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

        <a href="form.php">
            <i class="bi bi-person-lines-fill"></i> 1. ข้อมูลทั่วไป
        </a>
        <a href="diagnosis_form.php" class="active">
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
                <i class="bi bi-hospital"></i>
            </div>
            <div class="title-container">
                <h1>2. ER</h1>
                <p class="subtitle mb-0">การวินิจฉัยและตัดสินใจที่ห้องฉุกเฉิน</p>
            </div>
        </div>

        <form>
            <div class="section-title">
                <i class="bi bi-activity"></i> 1. การตัดสินใจรักษา
            </div>
            <label class="form-label">การตัดสินใจให้ยาละลายลิ่มเลือด (t-PA / TNK)</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="giveTpa">
                <label class="form-check-label" for="giveTpa">
                    ให้การรักษา (Give t-PA/TNK)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="notGiveTpa">
                <label class="form-check-label" for="notGiveTpa">
                    ให้การรักษาไม่ได้ (Not-Give t-PA/TNK)
                </label>
            </div>
            <h5 class="mt-4">⏱️ refer time</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="onsetTime" class="form-label">เวลาที่รถออกจากต้นทาง </label>
                    <input type="time" class="form-control" id="onsetTime">
                </div>
                <div class="col-md-6">
                    <label for="arrivalTime" class="form-label">เวลาที่ถึง รพ.</label>
                    <input type="time" class="form-control" id="arrivalTime">
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-intersect"></i> 2. การวินิจฉัย และ Imaging
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="ctncTime" class="form-label">CT NC กี่โมง</label>
                    <input type="time" class="form-control" id="ctncTime">
                </div>
                <div class="col-md-4">
                    <label for="ctaTime" class="form-label">CTA กี่โมง</label>
                    <input type="time" class="form-control" id="ctaTime">
                </div>
                <div class="col-md-4">
                    <label for="mriTime" class="form-label">MRI กี่โมง</label>
                    <input type="time" class="form-control" id="mriTime">
                </div>
            </div>
            <hr>
            <label class="form-label fw-bold">ผล CT (Ischemic / Hemorrhagic):</label>
            <div class="p-3 bg-light border rounded">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ctResult" id="ctResultIschemic" value="ischemic">
                    <label class="form-check-label fs-5" for="ctResultIschemic">ไม่พบเลือดออก (Ischemic)</label>
                </div>
                <hr class="my-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ctResult" id="ctResultHemorrhagic" value="hemorrhagic">
                    <label class="form-check-label fs-5" for="ctResultHemorrhagic">พบเลือดออก (Hemorrhagic)</label>
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-signpost-split"></i> 3. แนวทางการรักษา (Treatment Pathway)
            </div>

            <div id="ischemicPathway" class="d-none">
                <h4 class="text-primary">A. แนวทาง Ischemic Stroke</h4>
                <div class="card card-body shadow-sm">
                    <label class="form-label fw-bold">1. การให้ยาละลายลิ่มเลือด (IV Lysis)</label>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="tpaTime" class="form-label">rT-PA / TNK กี่โมง</label>
                            <input type="time" class="form-control" id="tpaTime">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="noTpa">
                                <label class="form-check-label" for="noTpa">ไม่ให้การรักษา (Contraindicated)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label fw-bold">2. การสวนลากลิ่มเลือด (Mechanical Thrombectomy - MT)</label>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="anesthesiaTime" class="form-label">ดมยา กี่โมง</label>
                            <input type="time" class="form-control" id="anesthesiaTime">
                        </div>
                        <div class="col-md-6">
                            <label for="punctureTime" class="form-label">puncture กี่โมง</label>
                            <input type="time" class="form-control" id="punctureTime">
                        </div>
                        <div class="col-md-6">
                            <label for="recanTime" class="form-label">Recanalization กี่โมง</label>
                            <input type="time" class="form-control" id="recanTime">
                        </div>
                    </div>
                    <hr>

                    <label class="form-label fw-bold">3. ข้อมูลจาก CT / CTA</label>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="aspect" class="form-label">ASPECT (0-10)</label>
                            <input type="number" class="form-control" id="aspect" min="0" max="10">
                        </div>
                        <div class="col-md-4">
                            <label for="collateral" class="form-label">Collateral score (0-5)</label>
                            <input type="number" class="form-control" id="collateral" min="0" max="5">
                        </div>
                        <div class="col-md-4">
                            <label for="occlusionLocation" class="form-label">ตันตรงไหน (Drop down)</label>
                            <select class="form-select" id="occlusionLocation">
                                <option selected>-- เลือกตำแหน่ง --</option>
                                <option value="ICA">ICA</option>
                                <option value="M1">M1</option>
                                <option value="M2">M2</option>
                                <option value="Basilar">Basilar</option>
                                <option value="Other">Other...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="hemorrhagicPathway" class="d-none">
                <h4 class="text-danger">B. แนวทาง Hemorrhagic Stroke</h4>
                <div class="card card-body shadow-sm">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="consultNS">
                        <label class="form-check-label" for="consultNS">ปรึกษาศัลยแพทย์ระบบประสาท</label>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>

</html>