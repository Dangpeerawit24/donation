<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{asset('public/img/AdminLogo.png')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body style="background-color: var(--bs-danger-text-emphasis);">
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
        <div class="col-12">
            <div class="card" style="margin: 0px;margin-top: 18px;">
                <div class="card-body border rounded" style="margin: 0px;margin-top: 0px;padding: 0px;"></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="30%" class="text-center">กองบุญ</th>
                                <th width="40%" class="text-center">รายนาม</th>
                                <th width="30%" class="text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Datas as $Data)
                                <tr>
                                    <td class="text-start">{{ $Data->campaignsname }}</td>
                                    <td class="text-center">{{ $Data->details }}{{ $Data->detailsbirthday }}{{ $Data->detailstext }}</td>
                                    <td class="text-center">
                                        @if ($Data->status == 'ส่งภาพกองบุญแล้ว')
                                            <a href="campaignstatusimg?url_img={{ $Data->url_img }}&campaignsname={{ $Data->campaignsname }}" class="btn btn-link" target="">ส่งภาพกองบุญแล้ว</a>
                                        @else
                                            {{ $Data->status }}
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

</html>