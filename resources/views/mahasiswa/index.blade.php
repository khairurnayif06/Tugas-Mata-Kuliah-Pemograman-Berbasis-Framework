
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Tambah Mahasiswa</h2>

    <form action="/mahasiswa" method="POST">
        @csrf

        <p>
            <label>Nama:</label><br>
            <input type="text" name="nama"
                   value="{{ old('nama') }}" required>
        </p>

        <p>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki"
                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan"
                    {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </p>

        <p>
            <label>Alamat:</label><br>
            <textarea name="alamat" required>{{ old('alamat') }}</textarea>
        </p>

        <p>
            <label>Nomor HP:</label><br>
            <input type="text" name="no_hp"
                   value="{{ old('no_hp') }}" required>
        </p>

        <button type="submit">Simpan Mahasiswa</button>
    </form>

    <hr>

    <h2>Daftar Mahasiswa</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($mahasiswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>
                        <a href="/mahasiswa/{{ $item->id }}/edit">
                            Edit
                        </a>

                        <form action="/mahasiswa/{{ $item->id }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Hapus data mahasiswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
