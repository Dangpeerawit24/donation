{{-- @dd($campaignsname) --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{ asset('img/AdminLogo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Loader Styles */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden; /* ซ่อน Loader โดยค่าเริ่มต้น */
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #loader.show {
            visibility: visible;
            opacity: 1;
        }

        .spinner {
            border: 5px solid #f3f3f3; /* Light grey */
            border-top: 5px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body style="background-color: var(--bs-danger-text-emphasis);">
    <div>
        <nav class="navbar navbar-expand-md bg-body py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img
                        width="40" height="40" src="{{ asset('img/AdminLogo.png') }}" /><span
                        style="font-size: 14px;font-weight: bold;">ศาลพระโพธิสัตว์กวนอิมทุ่งพิชัย</span></a><a
                    class="btn btn-primary" role="button" style="font-size: 13px;" href="/">หน้าหลัก</a>
            </div>
        </nav>
    </div>
    <div>
        <h1
            style="margin-bottom: 0px;padding: 0px;color: var(--bs-body-bg);font-size: 32.88px;margin-top: 7px;text-align: center;">
            ติดตามสถานะกองบุญ</h1>
        <h1
            style="margin-bottom: 0px;padding: 0px;color: var(--bs-body-bg);font-size: 26.88px;margin-top: 5px;text-align: center;">
            ที่ท่านได้ร่วมบุญ</h1>
    </div>
    <div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-11">
            <div class="card" style="margin: 0px;margin-top: 18px;">
                <div class="card-body border rounded" style="margin: 0px;margin-top: 0px;">
                    <h1 class="text-center">ภาพจากกองบุญ</h1>
                    <h2 class="text-center">{{ $campaignsname }}</h2>
                    <div class="d-flex justify-content-center">
                        <img class="rounded img-fluid" src="{{ $url_img }}" alt="Campaign Image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById('loader');

        // ซ่อน Loader เมื่อกลับมายังหน้าโดยใช้ปุ่ม Back ของเบราว์เซอร์
        window.addEventListener('pageshow', function (event) {
            if (event.persisted || performance.getEntriesByType('navigation')[0]?.type === 'back_forward') {
                loader.classList.remove('show');
            }
        });

        // แสดง Loader เมื่อคลิกลิงก์
        document.addEventListener('click', function (e) {
            if (e.target.tagName === 'A' && e.target.href) {
                e.preventDefault(); // ป้องกัน Default Action
                loader.classList.add('show'); // แสดง Loader
                setTimeout(() => {
                    window.location.href = e.target.href; // เปลี่ยนหน้า
                }, 300); // เพิ่มดีเลย์เพื่อให้เห็นแอนิเมชัน
            }
        });
    });
</script>
</html>
