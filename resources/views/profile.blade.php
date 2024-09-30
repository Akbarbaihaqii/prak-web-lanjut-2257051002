<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00b0ff;
            background-image: url('https://wallpapercave.com/wp/wp9027542.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            transform: scale(1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .img-bx {
            margin-bottom: 20px;
        }

        .img-bx img {
            width: 120px;
        }

        .detail h2 {
            font-size: 20px; /* Ukuran font yang sama untuk nama, npm, dan kelas */
            font-weight: bold;
            color: #333;
            line-height: 1.5;
        }

        /* Efek bayangan untuk teks */
        .detail h2 {
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="img-bx">
            <img src="https://www.logo.wine/a/logo/Laravel/Laravel-Logo.wine.svgg" alt="img" />
        </div>
        <div class="content">
            <div class="detail">
                <h2>
                    {{ $nama }}<br />
                    {{ $npm }}<br />
                    {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}
                </h2>
            </div>
        </div>
    </div>

</body>

</html>