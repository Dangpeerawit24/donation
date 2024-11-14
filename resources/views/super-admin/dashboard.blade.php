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
</script>
@endSection