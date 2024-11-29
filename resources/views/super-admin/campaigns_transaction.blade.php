@extends('layouts.main')
@php
    $menu = 'campaigns';
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
            <a href="{{ url('super-admin/campaign_transaction_complete?campaign_id=' . $campaignId . '&name=' . $name) }}"
                class="btn btn-danger">
                รายการที่ดำเนินการแล้ว
            </a>
            <a href="#" class="btn btn-success" id="confirmAction"
                data-url="{{ url('super-admin/campaigns_transaction_success?campaign_id=' . $campaignId) }}">
                เคลียร์รายการปริ้นแล้ว
            </a>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-bordered">
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
                                        <a href="#" data-toggle="modal" data-target="#imageModal"
                                            onclick="showImage('{{ asset('img/evidence/' . $transaction->evidence) }}')">
                                            <img src="{{ asset('img/evidence/' . $transaction->evidence) }}" height="100px"
                                                alt="หลักฐานการโอน">
                                        </a>
                                    </td>
                                    <td style="text-align:center; align-content: center;">
                                        {{ $transaction->details }}{{ $transaction->detailsbirthday }}{{ $transaction->detailstext }}
                                    </td>
                                    <td style="text-align:center; align-content: center;">{{ $transaction->value }}</td>
                                    <td style="text-align:center; align-content: center;">{{ $transaction->lineName }}</td>
                                    <td style="text-align:center; align-content: center;">{{ $transaction->form }}</td>
                                    <td style="text-align:center; align-content: center;">{{ $transaction->qr_url }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('super-admin.campaigns_transaction.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="createCategoryModalLabel">เพิ่มกองบุญจากดึงมือ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <!-- จำนวน -->
                            <label for="value" class="form-label">จำนวน</label>
                            <input type="number" min="1" value="1" class="form-control" id="value" name="value" required>
    
                            <!-- รายละเอียด -->
                            <label for="details" class="form-label mt-3">รายนาม</label>
                            <textarea name="details" id="details" class="form-control" rows="5" placeholder="กรอกรายละเอียด..." required></textarea>
    
                            <!-- ชื่อที่แสดง -->
                            <label for="lineName" class="form-label mt-3">ชื่อที่แสดง</label>
                            <input type="text" class="form-control" id="lineName" name="lineName" placeholder="ระบุชื่อที่ต้องการแสดง" required>
    
                            <!-- ที่มา -->
                            <label for="form" class="form-label mt-3">ที่มา:</label>
                            <select id="form" name="form" class="form-select">
                                <option value="L">L</option>
                                <option value="IB">IB</option>
                                <option value="P">P</option>
                            </select>
    
                            <!-- Hidden Fields -->
                            <input type="hidden" class="form-control" id="transactionID" name="transactionID" value="กองบุญจากดึงมือ" required>
                            <input type="hidden" class="form-control" id="status" name="status" value="รอดำเนินการ" required>
                            <input type="hidden" class="form-control" id="campaignsid" name="campaignsid" value="{{ $campaignId }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
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
