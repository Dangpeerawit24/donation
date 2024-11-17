<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{asset('img/AdminLogo.png')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
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
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #loader.show {
            visibility: visible;
            opacity: 1;
        }

        .spinner {
            border: 5px solid #f3f3f3; 
            border-top: 5px solid #3498db; 
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
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <div>
        <nav class="navbar navbar-expand-md bg-body py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img width="40" height="40" src="{{asset('img/AdminLogo.png')}}" /><span style="font-size: 14px;font-weight: bold;">ศาลพระโพธิสัตว์กวนอิมทุ่งพิชัย</span></a><a class="btn btn-primary" role="button" style="font-size: 13px;" href="/">หน้าหลัก</a></div>
        </nav>
    </div>
    <div>
        <h1 style="margin-bottom: 0px;padding: 0px;color: var(--bs-body-bg);font-size: 32.88px;margin-top: 7px;text-align: center;">ติดตามสถานะกองบุญ</h1>
        <h1 style="margin-bottom: 0px;padding: 0px;color: var(--bs-body-bg);font-size: 26.88px;margin-top: 5px;text-align: center;">ที่ท่านได้ร่วมบุญ</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12" style="justify-items: center;">
            <div class="card col-11" style="margin: 0px;margin-top: 18px;">
                <div class="card-body border rounded" style="margin: 0px;margin-top: 0px;padding: 0px;"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" style=" table-layout: fixed; width: 100%; ">
                        <thead>
                            <tr>
                                <th width="70%" class="text-center">กองบุญ</th>
                                <th width="30%" class="text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($Datas as $Data)
                                <tr>
                                    <td class="text-start" style="vertical-align: middle; word-wrap: break-word;">กองบุญ{{ $Data->campaignsname }}<br>รายนาม: {{ $Data->details }}{{ $Data->detailsbirthday }}{{ $Data->detailstext }}</td>
                                    <td class="text-center" style="vertical-align: middle; word-wrap: break-word;">
                                        @if ($Data->status == 'ส่งภาพกองบุญแล้ว')
                                            <a href="campaignstatusimg?url_img={{ $Data->url_img }}&campaignsname={{ $Data->campaignsname }}" class="btn btn-link" target=""><span class="badge bg-success">ส่งภาพ<br>กองบุญแล้ว</span></a>
                                        @elseif ($Data->status == 'รายรามเข้าระบบเรียบร้อยแล้ว')
                                            <span class="badge bg-success">รายนามเข้า<br>ระบบเรียบร้อยแล้ว</span>
                                        @else
                                            <span class="badge bg-warning text-dark">รอ<br>ดำเนินการ</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById('loader');

        window.addEventListener('pageshow', function (event) {
            if (event.persisted || performance.getEntriesByType('navigation')[0]?.type === 'back_forward') {
                loader.classList.remove('show');
            }
        });

        document.addEventListener('click', function (e) {
            if (e.target.tagName === 'A' && e.target.href) {
                e.preventDefault(); 
                loader.classList.add('show');
                setTimeout(() => {
                    window.location.href = e.target.href; 
                }, 300);
            }
        });
    });
</script>

</html>