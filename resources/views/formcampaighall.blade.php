{{-- @dd($campaignData); --}}
{{-- @dd($profile); --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{ asset('public/img/AdminLogo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body style="background: rgb(219,219,219);">
    <div class="text-nowrap text-center d-flex justify-content-center align-items-center"
        style="font-size: 11px;background: #8d0000;">
        <div class="container d-flex justify-content-center align-items-center" style="height: 60px;">
            <h1 class="d-flex justify-content-center align-items-center"
                style="color: var(--bs-body-bg);font-size: 20.88px;margin: 8px;"><img width="40" height="40"
                    src="{{ asset('public/img/AdminLogo.png') }}">ศาลพระโพธิสัตว์กวนอิมทุ่งพิชัย</h1>
        </div>
    </div>
    <div class="text-center">
        <div style="margin: 6px;">
            <h3 class="d-flex justify-content-center align-items-end">คุณกำลังร่วมบุญใน</h3>
        </div>
        <div class="d-flex justify-content-center align-items-start">
            @foreach ($campaignData as $data)
                <h4>กองบุญ{{ $data['campaign']->name }}</h4>
        </div>
    </div>
    <div>
        <div class="card" style="height: auto;">
            <div class="card-body">
                <div>
                    <form action="{{ Route('formcampaighall.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-start align-items-center">
                            <h4 style="color: var(--bs-body-color);font-weight: bold;">กรอกข้อมูลผู้ร่วมบุญ</h4>
                        </div>
                        <div>
                            <h5 style="color: var(--bs-emphasis-color);">จำนวนเงินที่ต้องการร่วมบุญ</h5>
                        </div>
                        <div>
                            <input type="number" id="donationCount" name="value" required
                                style="width: 100%; text-align: center; height: 45.4286px;" placeholder="0"
                                min="0" onchange="updateDonationInputs()">
                        </div>
                        <div id="donationInputs" class="input-container"></div>
                        <div class="d-flex justify-content-start" style="margin-top: 9px;">
                            <h5 style="color: var(--bs-emphasis-color);font-weight: bold;">แนบหลักฐานการโอนเงิน</h5>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="margin-top: 2px;"><input
                                class="form-control" type="file" name="evidence" required></div>
                        <input type="hidden" id="campaignsid" name="campaignsid" value="{{ $data['campaign']->id }}">
                        <input type="hidden" id="campaignsname" name="campaignsname"
                            value="{{ $data['campaign']->name }}">
                        <input type="hidden" name="lineId" value="{{ $data['profile']['userId'] }}">
                        <input type="hidden" name="lineName" value="{{ $data['profile']['displayName'] }}">
                        <input type="hidden" name="transactionID"
                            value="TX-{{ now()->timestamp }}-{{ rand(1000, 9999) }}">
                        <div class="d-flex justify-content-center align-items-center"
                            style="margin-top: 12px;margin-bottom: px;"><button class="btn btn-primary"
                                type="submit">ยืนยันส่งข้อมูล</button></div>
                    </form>
                    @endforeach
                </div>
                <div style="margin-top: 8px;">
                    <div class="row">
                        <div class="col">
                            <div style="margin-top: 9px;">
                                <h2 style="color: var(--bs-emphasis-color);font-weight: bold;">สรุปยอดกองบุญ</h2>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-7">
                                <h3 style="color: var(--bs-emphasis-color);">ยอดรวม</h3>
                            </div>
                            <div class="col-5">
                                <div style="text-align: right;">
                                    <h3 style="color: var(--bs-emphasis-color);" id="totalAmountDisplay">0.00 บาท</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 8px;">
                    <h4 style="color: var(--bs-body-color);font-weight: bold;">รายละเอียดการโอนเงิน</h4>
                </div>
                <div style="text-align: center;">
                    <h5 style="color: var(--bs-emphasis-color);text-align: center;">💰มูลนิธิเมตตาธรรมรัศมี</h5>
                </div>
                <div style="text-align: center;">
                    <h5 style="color: var(--bs-emphasis-color);text-align: center;">ธนาคารกสิการไทย</h5>
                </div>
                <div>
                    <div class="row d-flex justify-content-center align-items-center"
                        style="margin-right: -12px;margin-top: 5px;">
                        <div class="col-8 d-flex justify-content-end justify-content-xl-center align-items-xl-center">
                            <input class="form-control" type="text" id="accountNumber1" placeholder="171-1-75423-3"
                                value="171-1-75423-3" style="text-align: center;" readonly>
                            <button class="btn btn-secondary" onclick="copyToClipboard('accountNumber1')"
                                style="margin-left: 10px;">คัดลอก</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <h5 style="color: var(--bs-emphasis-color);text-align: center ; margin-top: 5px;">----- หรือ -----
                    </h5>
                </div>
                <div style="text-align: center;">
                    <h5 style="color: var(--bs-emphasis-color);text-align: center;">💰มูลนิธิเมตตาธรรมรัศมี</h5>
                </div>
                <div style="text-align: center;">
                    <h5 style="color: var(--bs-emphasis-color);text-align: center;">ธนาคารไทยพาณิชย์</h5>
                </div>
                <div>
                    <div class="row d-flex justify-content-center align-items-center"
                        style="margin-right: -12px;margin-top: 5px;">
                        <div class="col-8 d-flex justify-content-end justify-content-xl-center align-items-xl-center">
                            <input class="form-control" type="text" id="accountNumber2"
                                placeholder="649-242269-4" value="649-242269-4" style="text-align: center;" readonly>
                            <button class="btn btn-secondary" onclick="copyToClipboard('accountNumber2')"
                                style="margin-left: 10px;">คัดลอก</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function fetchDonationDetails() {
    fetch('/fetch_formcampaighall_details')
        .then(response => response.json())
        .then(details => {
            // ลบข้อมูลเก่าก่อนเพิ่มใหม่
            const donationInputsContainer = document.getElementById('donationInputs');
            donationInputsContainer.innerHTML = '';

            // สร้าง dropdown สำหรับเลือกผู้บริจาค
            const inputDiv = document.createElement('div');
            inputDiv.className = 'input-container';

            let options = `<select name="name[]" id="donorName" onchange="checkNewEntry(this)" style="width: 100%; text-align: center; height: 45.4286px;" required>
                            <option value="">--กดเลือกรายนามที่เคยร่วมบุญ--</option>`;

            details.forEach(detail => {
                options += `<option value="${detail}">${detail}</option>`;
            });

            options += `<option value="new">เพิ่มรายการใหม่</option></select>`;

            // สร้างช่อง input สำหรับกรอกชื่อใหม่ (ซ่อนอยู่)
            const newInput =
                `<input type="text" name="newName[]" id="newDonorName" style="width: 100%; text-align: center; height: 45.4286px; align-content: center; display: none;" placeholder="ชื่อ-นามสกุล" required>`;

            // รวม dropdown และ input ไว้ใน div
            inputDiv.innerHTML = `<label for="donorName">กรอกชื่อ-นามสกุล</label>` + options + newInput;

            // เพิ่ม div ลงใน container
            donationInputsContainer.appendChild(inputDiv);
        })
        .catch(error => console.error('Error:', error));
}

function updateDonationInputs() {
    const count = document.getElementById('donationCount').value;
    const donationInputsContainer = document.getElementById('donationInputs');

    // ลบช่อง input เก่าก่อนเพิ่มช่องใหม่
    donationInputsContainer.innerHTML = '';

    // ตรวจสอบว่าจำนวนที่กรอกเป็น 0 หรือไม่
    if (count > 0) {
        // เรียกฟังก์ชัน fetch เพื่อเพิ่มช่องกรอกข้อมูลเพียง 1 ชุด
        fetchDonationDetails();
    }

    // คำนวณยอดรวม
    @foreach ($campaignData as $data)
    const pricePerUnit = {{ $data['campaign']->price }};
    @endforeach
    const totalAmount = count * pricePerUnit;
    document.getElementById('totalAmountDisplay').innerText = totalAmount.toFixed(2) + " บาท";
}

function checkNewEntry(select) {
    const newInput = document.getElementById('newDonorName');
    if (select.value === "new") {
        newInput.style.display = 'block';
        newInput.required = true;
        newInput.value = ''; // ล้างค่าเมื่อเลือกเพิ่มใหม่
    } else {
        newInput.style.display = 'none';
        newInput.required = false;
    }
}

function validateForm() {
    let isValid = true;

    document.querySelectorAll('input[name="newName[]"]').forEach(input => {
        if (input.style.display === 'block' && !input.value.trim()) {
            isValid = false;
            input.setCustomValidity("กรุณากรอกชื่อ-นามสกุล");
        } else {
            input.setCustomValidity("");
        }
    });

    return isValid;
}

document.querySelector('form').addEventListener('submit', function(e) {
    if (!validateForm()) {
        e.preventDefault(); // ยกเลิกการ submit ถ้าการตรวจสอบไม่ผ่าน
        swal("กรุณากรอกข้อมูลให้ครบถ้วน", "", "error");
    }
});

function copyToClipboard(id) {
    const inputField = document.getElementById(id);

    if (!inputField) {
        swal("เกิดข้อผิดพลาด!", "ไม่พบช่องที่ต้องการคัดลอก", "error");
        return;
    }

    navigator.clipboard.writeText(inputField.value)
        .then(() => {
            swal("คัดลอกสำเร็จ!", "คัดลอกหมายเลขบัญชี: " + inputField.value, "success");
        })
        .catch(err => {
            swal("เกิดข้อผิดพลาด!", "ไม่สามารถคัดลอกข้อความได้", "error");
            console.error("Error copying text: ", err);
        });
}

</script>

</html>
