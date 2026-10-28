
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Nama:</label><br>
            <input type="text" name="nama"
                value="{{ old('nama', $mahasiswa->nama) }}" required>
        </p>

        <p>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki"
                    {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan"
                    {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </p>

        <p>
            <label>Alamat:</label><br>
            <textarea name="alamat" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
        </p>

        <p>
            <label>Nomor HP:</label><br>
            <input type="text" name="no_hp"
                value="{{ old('no_hp', $mahasiswa->no_hp) }}" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="/mahasiswa">Kembali</a>
    </form>
</body>
</html>
