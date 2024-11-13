@extends('layouts.main')
@php
    $menu = 'categories'
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
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:10%">No.</th>
                            <th style="text-align:center; width:40%">ชื่อกองบุญ</th>
                            <th style="text-align:center; width:15%">ยอดรวมกองบุญ</th>
                            <th style="text-align:center; width:15%">ยอดรวมรายได้</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriesdetails as $index => $category)
                            <tr>
                                <td style="text-align:center; align-content: center;">{{ $index + 1 }}</td>
                                <td style="text-align:center; align-content: center;">{{ $category->name }}</td>
                                <td style="text-align:center; align-content: center;">{{ $category->total_value }}</td>
                                <td style="text-align:center; align-content: center;">{{ $category->total_value_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endSection