@extends('layouts.main')
@php
    $menu = 'qrcode'
@endphp
@Section('content')
<form action="{{ route('qr-code.generate') }}" method="POST">
    @csrf
    <label for="url">URL:</label>
    <input type="url" name="url" id="url" required>

    <label for="filename">Filename:</label>
    <input type="text" name="filename" id="filename" required>

    <button type="submit">Generate QR Code</button>
</form>

@if(isset($qrCodePath))
    <div class="qr-code-container">
        <h3>Your QR Code:</h3>
        <img src="{{ asset('public/'. $qrCodePath) }}" alt="QR Code">
    </div>
@endif
@endSection