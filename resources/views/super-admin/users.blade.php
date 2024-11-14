@extends('layouts.main')
@php
    $menu = 'users'
@endphp
@Section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">จัดการข้อมูลสมาชิก</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMemberModal">เพิ่มสมาชิก</button>
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
                            <th style="width: 5%;">#</th>
                            <th>ชื่อ</th>
                            <th>Email</th>
                            <th style="width: 15%;">การเปลื่ยนแปลง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td style="text-align:center">{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="text-align:center">
                                <!-- ปุ่มสำหรับเปิด Modal แก้ไข -->
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editMemberModal{{ $user->id }}">แก้ไข</button>

                                <button class="btn btn-danger"
                                    onclick="confirmDelete({{ $user->id }})">ลบข้อมูล</button>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('super-admin.users.destroy', $user->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Modal สำหรับแก้ไขข้อมูล -->
                                <div class="modal fade" id="editMemberModal{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="editMemberModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('super-admin.users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editMemberModalLabel{{ $user->id }}">
                                                        แก้ไขข้อมูลสมาชิก</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">ชื่อ</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">ชื่อผู้ใช้ (Email)</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">รหัสผ่านใหม่ (ถ้าต้องการเปลี่ยน)</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-primary">อัปเดต</button>
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
<div class="modal fade" id="createMemberModal" tabindex="-1" aria-labelledby="createMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('super-admin.users.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createMemberModalLabel">เพิ่มสมาชิกใหม่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ชื่อผู้ใช้ (Email)</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(memberId) {
        if (confirm('คุณแน่ใจหรือไม่ว่าต้องการลบสมาชิกนี้?')) {
            document.getElementById('delete-form-' + memberId).submit();
        }
    }
</script>
@endSection