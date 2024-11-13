{{-- @dd($campaignsname) --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{ asset('img/AdminLogo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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

</html>
