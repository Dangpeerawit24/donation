@extends('layouts.main')
@php
    $menu = 'campaigns'
@endphp
@Section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">รายการผู้ร่วมบุญกองบุญ #{{ $name }}</h3>
            </div>
        </div>
        <a href="{{ url('super-admin/campaigns_transaction?campaign_id=' . $campaignId . '&name=' .$name) }}" class="btn btn-primary">
            รายการที่ยังไม่ดำเนินการ
        </a>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%">No.</th>
                            <th style="text-align:center; width:15%">สลิป</th>
                            <th style="text-align:center; width:30%">ข้อมูลผู้ร่วมบุญ</th>
                            <th style="text-align:center; width:10%">จำนวน</th>
                            <th style="text-align:center; width:15%">ชื่อไลน์</th>
                            <th style="text-align:center; width:5%">ที่มา</th>
                            <th style="text-align:center; width:10%">QR Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td style="text-align:center; align-content: center;">{{ $index + 1 }}</td>
                                <td style="text-align:center; align-content: center;">
                                    <a href="#" data-toggle="modal" data-target="#imageModal" onclick="showImage('{{ asset('img/evidence/' . $transaction->evidence) }}')">
                                        <img src="{{ asset('img/evidence/' . $transaction->evidence) }}" height="100px" alt="หลักฐานการโอน">
                                    </a>
                                </td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->details }}{{ $transaction->detailsbirthday }}{{ $transaction->detailstext }}</td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->value }}</td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->lineName }}</td>
                                <td style="text-align:center; align-content: center;">A</td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->qr_url }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">หลักฐานการโอน</h5>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid img-large" alt="หลักฐานการโอน">
            </div>
        </div>
    </div>
</div>
<script>
    function showImage(src) {
    console.log(src);
    document.getElementById('modalImage').src = src;
}
</script>
@endSection