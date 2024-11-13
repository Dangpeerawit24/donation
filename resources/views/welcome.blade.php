<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{ asset('img/AdminLogo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background-color: var(--bs-danger-text-emphasis);">
    <!-- Loader -->
    <div id="loader">
        <div class="spinner"></div>
    </div>

    <nav class="navbar navbar-expand-md bg-body py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img width="40" height="40" src="{{ asset('img/AdminLogo.png') }}" />
                <span style="font-size: 14px;font-weight: bold;">ศาลพระโพธิสัตว์กวนอิมทุ่งพิชัย</span>
            </a>
            <a class="btn btn-primary" role="button" href="{{ url('campaignstatus?userId=' . $profile['userId']) }}" style="font-size: 13px;">สถานะ</a>
        </div>
    </nav>

    <div class="text-center">
        <h1 class="my-3" style="color: #fff;">กองบุญออนไลน์</h1>
        <h3 style="color: #fff;">ที่ยังเปิดให้ร่วมบุญได้</h3>
    </div>

    <div class="container">
        @foreach ($campaigns as $campaign)
            <div class="card mb-3 mt-4">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img/campaign/' . $campaign->campaign_img) }}" class="rounded" width="300" height="300" alt="Campaign Image">
                    </div>
                    <h4 class="text-center my-3 "><strong>กองบุญ{{ $campaign->name }}</strong></h4>
                    <p class="text-center text-muted">{{ $campaign->description }}</p>
                    <div class="text-center">
                        @php
                            $details = $campaign->details;
                        @endphp
                        @if ($details == 'ชื่อสกุล')
                            <a class="btn btn-primary" href="{{ url('formcampaigh?campaign_id=' . $campaign->id) }}">กดเพื่อร่วมบุญ</a>
                        @elseif ($details == 'ชื่อวันเดือนปีเกิด')
                            <a class="btn btn-primary" href="{{ url('formcampaighbirthday?campaign_id=' . $campaign->id) }}">กดเพื่อร่วมบุญ</a>
                        @elseif ($details == 'ตามศรัทธา')
                            <a class="btn btn-primary" href="{{ url('formcampaighall?campaign_id=' . $campaign->id) }}">กดเพื่อร่วมบุญ</a>
                        @elseif ($details == 'กิจกรรม')
                            <a class="btn btn-primary" href="{{ url('formcampaighgive?campaign_id=' . $campaign->id) }}">กดเพื่อร่วมบุญ</a>
                        @else
                            <a class="btn btn-primary" href="{{ url('formcampaightext?campaign_id=' . $campaign->id) }}">กดเพื่อร่วมบุญ</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

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

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'ขออนุโมทนาบุญกับคุณ<br>{{ session('lineName') }}',
            text: 'ที่ได้ร่วมกองบุญ {{ session('campaignname') }} เรียบร้อยแล้ว',
            timer: 5000,
            showConfirmButton: false
        });
    @endif
</script>

</body>
</html>
