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
    <title>3. OR Procedure - ระบบ Stroke Care</title>

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
        <a href="diagnosis_form.php">
            <i class="bi bi-hospital"></i> 2. ER
        </a>
        <a href="OR_Procedure_Form.php" class="active">
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
                <i class="bi bi-scissors"></i>
            </div>
            <div class="title-container">
                <h1>3. OR Procedure Form</h1>
                <p class="subtitle mb-0">ฟอร์มบันทึกการผ่าตัด/หัตถการ</p>
            </div>
        </div>

        <form>
            <div class="section-title">
                <i class="bi bi-check2-square"></i> ประเภทหัตถการ
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="procType" id="procTypeMT" value="mt">
                <label class="form-check-label fs-5" for="procTypeMT">
                    1. Mechanical Thrombectomy (สำหรับ Ischemic Stroke)
                </label>
            </div>
            <hr class="my-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="procType" id="procTypeHemo" value="hemo">
                <label class="form-check-label fs-5" for="procTypeHemo">
                    2. Neurosurgery (สำหรับ Hemorrhagic Stroke)
                </label>
            </div>

            <div id="mtProcedure" class="d-none">
                <div class="section-title text-primary">
                    <i class="bi bi-activity"></i> A. บันทึก Mechanical Thrombectomy (MT)
                </div>
                <div class="mb-3">
                    <label for="occlusionLocation" class="form-label fw-bold">1. ตันตรงไหน (Location of Occlusion)</label>
                    <input type="text" class="form-control" id="occlusionLocation" placeholder="เช่น M1, ICA, Basilar">
                </div>
                <div class="mb-3">
                    <label for="ticiScore" class="form-label">TICI Score (ผลลัพธ์การเปิดเส้นเลือด)</label>
                    <select class="form-select" id="ticiScore">
                        <option selected>-- เลือกผลลัพธ์ --</option>
                        <option value="0">0 - No perfusion</option>
                        <option value="1">1 - Minimal perfusion</option>
                        <option value="2a">2a - Partial ( < 50%)</option>
                        <option value="2b">2b - Partial ( > 50%)</option>
                        <option value="3">3 - Complete perfusion</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="procedureTechnique" class="form-label fw-bold">2. วิธีเปิดหลอดเลือด (Procedure Technique)</label>
                    <textarea class="form-control" id="procedureTechnique" rows="3" placeholder="เช่น Stent retriever, Aspiration, หรือ Combined"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">เปิดกี่ครั้ง</label>
                    <input type="number" name="" id="" class="form-number-input rounded">
                </div>
                <label class="form-label fw-bold">ยา Post-Procedure (วิธีรักษา...)</label>
                <div class="d-flex gap-3 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medAspirin">
                        <label class="form-check-label" for="medAspirin">Aspirin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medStartAlone">
                        <label class="form-check-label" for="medStartAlone">start alone</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medSul">
                        <label class="form-check-label" for="medSul">Sul... (เช่น Clopidogrel)</label>
                    </div>
                </div>


                <label class="form-label fw-bold">ยา Peri-Procedure (ยา... case)</label>
                <div class="d-flex gap-3 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medIntegrilin">
                        <label class="form-check-label" for="medIntegrilin">Integrilin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medNinodine">
                        <label class="form-check-label" for="medNinodine">Ninodine / Nimodipine</label>
                    </div>
                </div>

                <label class="form-label fw-bold">ข้อมูลหัตถการ</label>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="xrayDose" class="form-label">Dose X-ray</label>
                        <input type="text" class="form-control" id="xrayDose">
                    </div>
                    <div class="col-md-6">
                        <label for="coneBeamCT" class="form-label">Cone Beam CT</label>
                        <input type="text" class="form-control" id="coneBeamCT">
                    </div>
                </div>
            </div>

            <div id="hemoProcedure" class="d-none">
                <div class="section-title text-danger">
                    <i class="bi bi-bandaid"></i> B. บันทึก Neurosurgery (Hemorrhagic)
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="hemoLocation" class="form-label">Location (ตำแหน่งเลือดออก)</label>
                        <input type="text" class="form-control" id="hemoLocation">
                    </div>
                    <div class="col-md-4">
                        <label for="hemoCC" class="form-label">Hemorrhage (CC) (ปริมาตรเลือด)</label>
                        <input type="number" class="form-control" id="hemoCC">
                    </div>

                </div>
                <label class="form-label fw-bold">ผ่า? (หัตถการที่ทำ)</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="procCranio">
                        <label class="form-check-label" for="procCranio">cranio (Craniotomy)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="procCraniectomy">
                        <label class="form-check-label" for="procCraniectomy">craniectomy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="procVentriculostomy">
                        <label class="form-check-label" for="procVentriculostomy">ventriculostomy</label>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <i class="bi bi-exclamation-triangle"></i> ภาวะแทรกซ้อน (Complications)
            </div>
            <div class="mb-3">
                <label for="complicationLog" class="form-label">บันทึกภาวะแทรกซ้อน</label>
                <textarea class="form-control" id="complicationLog" rows="3"></textarea>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioMT = document.getElementById('procTypeMT');
            const radioHemo = document.getElementById('procTypeHemo');
            const mtProcedure = document.getElementById('mtProcedure');
            const hemoProcedure = document.getElementById('hemoProcedure');

            radioMT.addEventListener('change', () => {
                if (radioMT.checked) {
                    mtProcedure.classList.remove('d-none');
                    hemoProcedure.classList.add('d-none');
                }
            });

            radioHemo.addEventListener('change', () => {
                if (radioHemo.checked) {
                    mtProcedure.classList.add('d-none');
                    hemoProcedure.classList.remove('d-none');
                }
            });
        });
    </script>
</body>

</html>