<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกองบุญออนไลน์</title>
    <link rel="icon" type="" href="{{ asset('img/AdminLogo.png') }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* พื้นหลังสีเทาอ่อน */
            font-family: 'Arial', sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .hero {
            background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 50px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .feature-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบกองบุญออนไลน์</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>ยินดีต้อนรับสู่ ระบบกองบุญออนไลน์</h1>
        <h4>วิหารพระโพธิสัตว์กวนอิม ทุ่งพิชัย</h4>
        <p>แอปพลิเคชันที่ดีที่สุดสำหรับการจัดการข้อมูลของคุณ</p>
        <a href="#features" class="btn btn-light btn-lg mt-3">ดูเพิ่มเติม</a>
    </div>

    <!-- Features Section -->
    <div id="features" class="container my-5">
        <h2 class="text-center mb-4">คุณสมบัติที่น่าสนใจ</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="bi bi-speedometer2 display-4 text-primary"></i>
                    <h5 class="mt-3">ความเร็วสูง</h5>
                    <p>ตอบสนองอย่างรวดเร็วทุกการใช้งาน</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="bi bi-shield-lock display-4 text-success"></i>
                    <h5 class="mt-3">ปลอดภัย</h5>
                    <p>มั่นใจในความปลอดภัยของข้อมูล</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="bi bi-palette display-4 text-warning"></i>
                    <h5 class="mt-3">ออกแบบทันสมัย</h5>
                    <p>ใช้งานง่ายและดูทันสมัย</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="container my-5">
        <h2 class="text-center mb-4">เกี่ยวกับเรา</h2>
        <p class="text-center">
            เราคือทีมงานผู้พัฒนาแอปพลิเคชันที่มุ่งมั่นในการสร้างประสบการณ์ที่ดีที่สุดให้กับผู้ใช้งาน
            ด้วยเทคโนโลยีที่ทันสมัยและความใส่ใจในรายละเอียด
        </p>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="container my-5">
        <h2 class="text-center mb-4">ติดต่อเรา</h2>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="name" placeholder="กรอกชื่อของคุณ">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control" id="email" placeholder="กรอกอีเมลของคุณ">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">ข้อความ</label>
                <textarea class="form-control" id="message" rows="5" placeholder="พิมพ์ข้อความของคุณ"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">ส่งข้อความ</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 My Web App. สงวนลิขสิทธิ์</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
