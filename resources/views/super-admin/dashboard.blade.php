@extends('layouts.main')
@php
    $menu = 'dashboard'
@endphp
@Section('content')
<div class="app-content-header">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
        </div>
    </div> 
</div> 
<div class="app-content"> 
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-lg-3 col-6"> 
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h2 id="total-value-month">{{ $total_value_month }}</h2>
                        <h5>ยอดรวมรายรับ</h5>
                        <h5>(เดือนนี้)</h5>
                    </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                    </svg> <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div>
            </div> 
            <div class="col-lg-3 col-6"> 
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h2 id="total-value-year">{{ $total_value_year }}</h2>
                        <h5>ยอดรวมรายรับ</h5>
                        <h5>(ปีนี้)</h5>
                    </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                    </svg> <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div>
            </div> 
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h2 id="total-campaign-month">{{ $total_campaign_month }}</h2>
                        <h5>จำนวนกองบุญ</h5>
                        <h5>(เดือนนี้)</h5>
                    </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                    </svg> <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> 
            </div> 
            <div class="col-lg-3 col-6"> 
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h2 id="total-campaign-year">{{ $total_campaign_year }}</h2>
                        <h5>จำนวนกองบุญ</h5>
                        <h5>(ปีนี้)</h5>
                    </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                    </svg> <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> 
            </div> 
        </div> 
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card" style="background-color: #FFF; height: 600px">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการกองบุญที่ยังเปิดอยู่</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-light" id="campaignsTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="text-align:center; width:40%">ชื่อกองบุญ</th>
                                        <th style="text-align:center; width:20%">จำนวนที่เปิดรับ</th>
                                        <th style="text-align:center; width:20%">ร่วมบุญแล้ว</th>
                                        <th style="text-align:center; width:20%">คงเหลือร่วมบุญได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ข้อมูลจะถูกใส่ที่นี่ -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-3 mt-lg-0">
                <div class="card" style="background-color: #FFF; height: 600px">
                    <div class="card">
                        <div class="card-header">
                            <h3>ผู้ร่วมบุญสูงสุด</h3>
                            <form method="GET">
                                <select id="filterSelect" name="filter" onchange="handleFilterChange(this.value)">
                                    <option value="month" selected>เดือนนี้</option> <!-- ตั้งค่าเริ่มต้น -->
                                    <option value="year">ปีนี้</option>    
                                    <option value="all">ทั้งหมด</option>
                                </select>
                            </form>                                                                              
                        </div>
                        <div class="card-body">
                            <table class="table table-light" id="usersTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="text-align:center; width:70%">ชื่อไลน์</th>
                                        <th style="text-align:center; width:30%">ยอดรวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
<script>
    function fetchDashboardData() {
        $.ajax({
            url: "{{ route('super-admin.dashboard.data') }}", 
            method: "GET",
            success: function (data) {
               
                $('#total-value-month').text(data.total_value_month.toLocaleString('en-US', { minimumFractionDigits: 2 }));
                
               
                $('#total-value-year').text(data.total_value_year.toLocaleString('en-US', { minimumFractionDigits: 2 }));
                
               
                $('#total-campaign-month').text(data.total_campaign_month);
                
               
                $('#total-campaign-year').text(data.total_campaign_year);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching dashboard data:', error);
            }
        });
    }

   
    setInterval(fetchDashboardData, 3000);

 
    fetchDashboardData();

    function fetchCampaigns() {
        fetch('/api/campaigns')
            .then(response => response.json())
            .then(data => {
                let tableBody = '';
                data.forEach(campaign => {
                    tableBody += `
                        <tr>
                            <td style="text-align:left;">
                                <a href="/super-admin/campaigns_transaction?campaign_id=${campaign.id}&name=${campaign.name}">
                                    ${campaign.name}
                                </a>
                            </td>
                            <td style="text-align:center;">${campaign.stock}</td>
                            <td style="text-align:center;">${campaign.total_donated}</td>
                            <td style="text-align:center;">${campaign.remaining_stock}</td>
                        </tr>
                    `;
                });
                document.querySelector('#campaignsTable tbody').innerHTML = tableBody;
            })
            .catch(error => console.error('Error fetching campaigns:', error));
    }

    // เรียกฟังก์ชันเมื่อโหลดหน้าเสร็จ
    document.addEventListener('DOMContentLoaded', fetchCampaigns);

    // อัปเดตข้อมูลทุก 10 วินาที
    setInterval(fetchCampaigns, 5000);

    function handleFilterChange(filter) {
    fetchUsers(filter);
}

function handleFilterChange(filter) {
    fetchUsers(filter); // เรียกฟังก์ชัน fetchUsers พร้อมส่งค่าที่เลือก
}

function fetchUsers(filter = 'month') { // ค่าเริ่มต้นเป็น "month"
    fetch(`/api/users?filter=${filter}`) // ดึงข้อมูลจาก API
        .then(response => response.json())
        .then(data => {
            let tableBody = '';
            data.forEach(user => {
                tableBody += `
                    <tr>
                        <td style="text-align:left; vertical-align: middle; word-wrap: break-word;">${user.display_name}</td>
                        <td style="text-align:center;">${user.total_amount}</td>
                    </tr>
                `;
            });
            // เติมข้อมูลลงในตาราง
            document.querySelector('#usersTable tbody').innerHTML = tableBody;
        })
        .catch(error => console.error('Error fetching users:', error));
}

// เรียกฟังก์ชัน fetchUsers ด้วยค่าเริ่มต้น "month" เมื่อโหลดหน้า
document.addEventListener('DOMContentLoaded', () => fetchUsers('month'));

</script>
@endSection