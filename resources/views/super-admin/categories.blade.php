@extends('layouts.main')
@php
    $menu = 'categories'
@endphp
@Section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">จัดการหัวข้อกองบุญ</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">เพิ่มหัวข้อกองบุญ</button>
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
                            <th style="text-align:center; width: 5%;">No.</th>
                            <th style="text-align:center; width: 40%;">ชื่อหัวข้อกองบุญ</th>
                            <th style="text-align:center; width: 15%;">จำนวนกองบุญที่เปิด</th>
                            <th style="text-align:center; width: 15%;">ยอดรวมรายได้</th>
                            <th style="text-align:center; width: 25%;">การเปลื่ยนแปลง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td style="text-align:center">{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td style="text-align:center">{{ $category->total_campaigns }}</td>
                                <td style="text-align:center">{{ $category->total_value_price }}</td>
                                <td style="text-align:center">
                                    <!-- ปุ่มสำหรับเปิด Modal แก้ไข -->
                                    <a href="{{ url('super-admin/categoriesdetails?categoriesID=' . $category->id . '&name=' .$category->name) }}" class="btn btn-primary">
                                        ดูรายการกองบุญ
                                    </a>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal{{ $category->id }}">แก้ไข</button>
    
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete({{ $category->id }})">ลบข้อมูล</button>
                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('super-admin.categories.destroy', $category->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
    
                                    <!-- Modal สำหรับแก้ไขข้อมูล -->
                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1"
                                        aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('super-admin.categories.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">
                                                            Edit Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $category->name }}" required>
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
            </div> <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('super-admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
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
@endSection