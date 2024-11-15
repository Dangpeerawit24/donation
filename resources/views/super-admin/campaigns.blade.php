@extends('layouts.main')
@php
    $menu = 'campaigns'
@endphp
@Section('content')
<style>
    .char-counter {
        font-size: 14px;
        color: #555;
        margin-top: 5px;
    }
</style>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">จัดการกองบุญ</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createcampaignModal">เพิ่มกองบุญ</button>
            </div>
        </div>
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
                            <th style="text-align:center; width:10%">รูปกองบุญ</th>
                            <th style="text-align:center; width: 35%;">ชื่อกองบุญ</th>
                            {{-- <th style="text-align:center; width: 25%;">รายละเอียด</th> --}}
                            <th style="text-align:center; width: 10%;">ราคา</th>
                            <th style="text-align:center; width: 15%;">จำนวนที่เปิดรับ</th>
                            <th style="text-align:center; width: 25%;">การเปลื่ยนแปลง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $index => $campaign)
                            <tr>
                                <td style="text-align:center; align-content: center;">{{ $index + 1 }}</td>
                                <td style="text-align:center; align-content: center;">
                                    @if ($campaign->campaign_img)
                                        <img src="{{ asset('img/campaign/' . $campaign->campaign_img) }}" alt="Campaign Image" width="100px" height="100px">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td style="text-align:center; align-content: center;">{{ $campaign->name }}</td>
                                {{-- <td>{{ $campaign->description }}</td> --}}
                                <td style="text-align:center; align-content: center;">{{ $campaign->price }}</td>
                                <td style="text-align:center; align-content: center;">{{ $campaign->stock }}</td>
                                <td style="text-align:center; align-content: center;">
                                    <!-- ปุ่มสำหรับเปิด Modal แก้ไข -->
                                    <a href="{{ url('super-admin/campaigns_transaction?campaign_id=' . $campaign->id . '&name=' .$campaign->name) }}" class="btn btn-primary">
                                        ดูรายการผู้ร่วมบุญ
                                    </a>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editcampaignModal{{ $campaign->id }}">แก้ไข</button>
    
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete({{ $campaign->id }})">ลบข้อมูล</button>
                                    <form id="delete-form-{{ $campaign->id }}"
                                        action="{{ route('super-admin.campaigns.destroy', $campaign->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
    
                                    <!-- Modal สำหรับแก้ไขข้อมูล -->
                                    <div class="modal fade" id="editcampaignModal{{ $campaign->id }}" tabindex="-1"
                                        aria-labelledby="editcampaignModalLabel{{ $campaign->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('super-admin.campaigns.update', $campaign->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editcampaignModalLabel{{ $campaign->id }}">
                                                            Edit campaign</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">สถานะ</label>
                                                            <select class="form-control select2" name="status" id="status" required>
                                                                <option value="เปิดกองบุญ">เปิดกองบุญ</option>
                                                                <option value="ปิดกองบุญแล้ว">ปิดกองบุญแล้ว</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $campaign->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">รายละเอียด</label>
                                                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $campaign->description }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">ราคา</label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price" value="{{ $campaign->price }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">จำนวนที่เปิดรับ</label>
                                                            <input type="text" class="form-control" id="stock"
                                                                name="stock" value="{{ $campaign->stock }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" style="--bs-modal-width:900px" id="createcampaignModal" tabindex="-1"
        aria-labelledby="createcampaignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content col-8">
                <form action="{{ route('super-admin.campaigns.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createcampaignModalLabel">เพิ่มกองบุญใหม่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mt-1">
                            <label for="" class="col-sm-2 col-form-label">สถานะ </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="status" id="status" required>
                                    <option value="เปิดกองบุญ">เปิดกองบุญ</option>
                                    <option value="ปิดกองบุญแล้ว">ปิดกองบุญแล้ว</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-1">
                            <label for="" class="col-sm-2 col-form-label">งาน</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="categoriesID" id="categoriesID" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ต้องการให้กรอก </label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="details" id="details" required>
                                        <option value="ชื่อสกุล">ชื่อสกุล</option>
                                        <option value="กล่องข้อความใหญ่">กล่องข้อความใหญ่</option>
                                        <option value="ชื่อวันเดือนปีเกิด">ชื่อวันเดือนปีเกิด</option>
                                        <option value="ตามศรัทธา">ตามศรัทธา</option>
                                        <option value="กิจกรรม">กิจกรรม</option>
                                    </select>
        
                                </div>
                            </div>
                            <div class="mb-3 mt-1">
                                <label for="" class="form-label">ชื่กองบุญ</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">รายละเอียด (ต้องการขึ้นบรรทัดใหม่ให้พิมพ์ /n )</label>
                                <textarea 
                                    class="form-control" 
                                    id="description2" 
                                    name="description" 
                                    rows="4" 
                                    maxlength="250" 
                                    required
                                ></textarea>
                                <div id="charCount" class="form-text">เหลือ 250 ตัวอักษร</div>
                            </div>
                            <div class="mb-3 mt-1">
                                <label for="" class="form-label">ราคา</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3 mt-1">
                                <label for="" class="form-label">จำนวนที่เปิดรับ</label>
                                <input type="text" class="form-control" id="stock" name="stock" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="campaign_img">
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
    <script>
        const textarea = document.getElementById('description2');
        const charCount = document.getElementById('charCount');
        const maxLength = textarea.getAttribute('maxlength');
    
        textarea.addEventListener('input', () => {
            const remaining = maxLength - textarea.value.length;
            charCount.textContent = `เหลือ ${remaining} ตัวอักษร`;
            if (remaining <= 20) {
                charCount.style.color = 'red';
            } else {
                charCount.style.color = '#6c757d'; 
            }
        });
    </script>
@endSection