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
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">เพิ่มกองบุญจากดึงมือ</button>
        <a href="{{ url('super-admin/campaign_transaction_complete?campaign_id=' . $campaignId . '&name=' .$name) }}" class="btn btn-danger">
            รายการที่ดำเนินการแล้ว
        </a>
    </div>
</div>
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%">No.</th>
                            <th style="text-align:center; width:15%">สลิป</th>
                            <th style="text-align:center; width:20%">ชื่อไลน์</th>
                            <th style="text-align:center; width:30%">ข้อมูลผู้ร่วมบุญ</th>
                            <th style="text-align:center; width:10%">จำนวน</th>
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
                                <td style="text-align:center; align-content: center;">{{ $transaction->lineName }}</td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->details }}{{ $transaction->detailsbirthday }}{{ $transaction->detailstext }}</td>
                                <td style="text-align:center; align-content: center;">{{ $transaction->value }}</td>
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
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('super-admin.campaigns_transaction.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">เพิ่มกองบุญจากดึงมือ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">จำนวน</label>
                            <input type="int" class="form-control" id="value" name="value" required>
                            <input type="hidden" class="form-control" id="transactionID" name="transactionID" value="กองบุญจากดึงมือ" required>
                            <input type="hidden" class="form-control" id="lineName" name="lineName" value="กองบุญจากดึงมือ" required>
                            <input type="hidden" class="form-control" id="status" name="status" value="รายนามเข้าระบบเรียบร้อยแล้ว" required>
                            <input type="hidden" class="form-control" id="campaignsid" name="campaignsid" value="{{ $campaignId }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
    console.log(src); // ตรวจสอบว่าค่า src ถูกต้องหรือไม่
    document.getElementById('modalImage').src = src;
}
</script>
@endSection