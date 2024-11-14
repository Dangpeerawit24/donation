{{-- @dd($campaignData); --}}
{{-- @dd($profile); --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{asset('img/AdminLogo.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body style="background: rgb(219,219,219);">
    <div class="text-nowrap text-center d-flex justify-content-center align-items-center"
        style="font-size: 11px;background: #8d0000;">
        <div class="container d-flex justify-content-center align-items-center" style="height: 60px;">
            <h1 class="d-flex justify-content-center align-items-center"
                style="color: var(--bs-body-bg);font-size: 20.88px;margin: 8px;"><img width="40" height="40"
                    src="{{asset('img/AdminLogo.png')}}">ศาลพระโพธิสัตว์กวนอิมทุ่งพิชัย</h1>
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
                    <form action="{{Route('formcampaightext.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-start align-items-center">
                            <h4 style="color: var(--bs-body-color);font-weight: bold;">กรอกข้อมูลผู้ร่วมบุญ</h4>
                        </div>
                        <div>
                            <h5 style="color: var(--bs-emphasis-color);">จำนวนกองบุญที่ต้องการร่วมบุญ</h5>
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
                                class="form-control" type="file" id="evidence" name="evidence" required></div>
                        <input type="hidden" id="campaignsid" name="campaignsid" value="{{ $data['campaign']->id }}">
                        <input type="hidden" id="campaignsname" name="campaignsname" value="{{ $data['campaign']->name }}">
                        <input type="hidden" name="lineId" value="{{ $data['profile']['userId'] }}">
                        <input type="hidden" name="lineName" value="{{ $data['profile']['displayName'] }}">
                        <input type="hidden" name="transactionID" value="TX-{{ now()->timestamp }}-{{ rand(1000, 9999) }}">
                        <div class="d-flex justify-content-center align-items-center"
                            style="margin-top: 12px;margin-bottom: px;"><button class="btn btn-primary"
                                type="bottom" onclick="submitForm()">ยืนยันส่งข้อมูล</button></div>
                    </form>@endforeach
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
    let cachedDetails = null; // ตัวแปรสำหรับเก็บข้อมูลที่ดึงมา
    const pricePerUnit = {{ $campaignData[0]['campaign']->price ?? 0 }}; // กำหนดราคาต่อหน่วยจาก Blade

    // ดึงข้อมูลล่วงหน้าเมื่อหน้าเว็บโหลด
    window.onload = function() {
        fetch('/fetch_formcampaightext_details')
            .then(response => response.json())
            .then(details => {
                cachedDetails = details; // เก็บข้อมูลใน cache
                console.log('ข้อมูลที่ดึงมา:', cachedDetails); // ตรวจสอบข้อมูล
            })
            .catch(error => console.error('Error fetching details:', error));
    };

    // ฟังก์ชันสำหรับสร้างกล่องข้อความ
    function createInputFields(index) {
        const inputDiv = document.createElement('div');
        inputDiv.className = 'input-container';

        // สร้าง Select ตัวเลือก
        let options = `<select name="name[]" id="donorName${index}" onchange="checkNewEntry(this, ${index})" style="width: 100%; text-align: center; height: 45.4286px;" required>
                        <option value="">--กดเลือกรายนามที่เคยร่วมบุญ--</option>`;

        // ใช้ข้อมูลจาก cachedDetails ในการสร้างตัวเลือก
        cachedDetails.forEach(detail => {
            options += `<option value="${detail}">${detail}</option>`;
        });

        // เพิ่มตัวเลือก "เพิ่มข้อมูลใหม่"
        options += `<option value="new">เพิ่มรายการใหม่</option></select>`;

        // สร้าง Input สำหรับกรอกข้อมูลใหม่
        const newInput = `<textarea name="newName[]" id="newDonorName${index}" style="width: 100%; text-align: center; height: 300px; align-content: center; display: none;" placeholder="กรอกข้อมูล ชุดที่ ${index + 1}"></textarea>`;

        // รวม Select และ Input เข้าใน Div
        inputDiv.innerHTML = `<label for="donorName${index}">กรอกข้อมูล ชุดที่ ${index + 1}</label>` + options + newInput;

        // เพิ่ม Div ลงใน Container
        document.getElementById('donationInputs').appendChild(inputDiv);
    }

    // ฟังก์ชันอัปเดตกล่องข้อความและคำนวณยอดเงินรวม
    function updateDonationInputs() {
        const count = parseInt(document.getElementById('donationCount').value, 10); // จำนวนที่ป้อน
        const donationInputsContainer = document.getElementById('donationInputs');
        donationInputsContainer.innerHTML = ''; // ลบกล่องข้อความเก่าทั้งหมด

        // ตรวจสอบว่าจำนวนที่เลือกเป็นตัวเลขบวก
        if (!isNaN(count) && count > 0) {
            const totalAmount = count * pricePerUnit; // คำนวณยอดรวม
            document.getElementById('totalAmountDisplay').innerText = totalAmount.toFixed(2) + " บาท";

            // ตรวจสอบว่ามีข้อมูลใน cachedDetails ก่อนสร้างกล่องข้อความ
            if (cachedDetails) {
                for (let i = 0; i < count; i++) {
                    createInputFields(i);
                }
            } else {
                console.error('ยังไม่มีข้อมูลใน cachedDetails');
            }
        } else {
            document.getElementById('totalAmountDisplay').innerText = "0.00 บาท"; // หากจำนวนไม่ถูกต้อง
        }
    }

    function checkNewEntry(select, index) {
        const newInput = document.getElementById(`newDonorName${index}`);
        if (select.value === "new") {
            newInput.style.display = 'block';
            newInput.required = true;
            newInput.value = ''; // รีเซ็ตค่า Input
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

    document.querySelector('form').addEventListener('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault(); // Prevent form submission if validation fails.
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
	
	function submitForm() {
    const fileInput = document.getElementById('evidence');
    const donorInputs = document.querySelectorAll('[id^="donorName"], [id^="newDonorName"]');

    // ตรวจสอบว่าทุกช่องที่มองเห็นได้ถูกกรอก
    const allInputsFilled = Array.from(donorInputs).every(input => {
        if (input.style.display !== 'none') {
            return input.value.trim() !== ""; // ตรวจเฉพาะช่องที่แสดงอยู่
        }
        return true; // ข้ามช่องที่ซ่อนอยู่
    });

    if (fileInput.files.length === 0 || !allInputsFilled) {
        swal({
            title: "กรุณากรอกข้อมูลให้ครบ",
            text: "คุณยังไม่ได้เลือกไฟล์ หรือกรอกข้อมูลในทุกช่อง กรุณาตรวจสอบอีกครั้ง",
            icon: "warning",
            button: "ตกลง"
        });
    } else {
        swal({
            title: "กำลังประมวลผล",
            text: "กรุณารอสักครู่...",
            icon: "info",
            buttons: false,
            closeOnClickOutside: false,
            closeOnEsc: false
        });

        // เพิ่มดีเลย์เล็กน้อยก่อนส่งฟอร์ม
        setTimeout(() => {
            document.getElementById("uploadForm").submit();
        }, 1000); // ดีเลย์ 1 วินาที
    }
}

</script>

</html>
