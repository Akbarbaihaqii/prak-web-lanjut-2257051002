<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Create User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-image: url('https://images.unsplash.com/photo-1542281286-9e0a16bb7366'); /* Gambar background baru */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15); 
            width: 380px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 24px;
            color: #444;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #666;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 2px solid #B5FFFC;
            border-radius: 8px; 
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #FFDEE9;
            box-shadow: 0 0 10px rgba(255, 222, 233, 0.5); 
        }

        button {
            background: linear-gradient(135deg, #FF7EB3, #FF758C);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background: linear-gradient(135deg, #FF758C, #FF7EB3);
            box-shadow: 0 10px 20px rgba(255, 120, 155, 0.3); 
        }

        .image {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background-image: url('https://cdn-icons-png.flaticon.com/512/3649/3649463.png'); 
            background-size: cover;
            background-position: center;
            opacity: 0.1; 
        }

        .circle {
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 120, 155, 0.15);
            top: -80px;
            left: -80px;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="circle"></div>
        <div class="image"></div>
        <h2>Create User</h2>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" >
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="npm">NPM:</label>
                <input type="text" id="npm" name="npm" value="{{ old('npm') }}" >
                @error('npm')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select name="kelas_id" id="kelas_id" >
                    @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
