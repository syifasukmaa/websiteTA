<!DOCTYPE html>
<html>

<head>
    <title>Data Mustahik</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            font-size: 14px;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Data Mustahik Masjid Jami At Taubah</h2>
    <p><span style="font-weight: 600">Tanggal:</span> {{ date('d-m-Y') }}</p>
    <p> <span style="font-weight: 600">Total Mustahik:</span> {{ $mustahiks->count() }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Keluarga</th>
                <th>Kelompok</th>
                <th>Nama Suami</th>
                <th>Nama Istri</th>
                <th>RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mustahiks as $index => $mustahik)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mustahik->nama_keluarga }}</td>
                    <td>{{ $mustahik->kelompok }}</td>
                    <td>{{ $mustahik->nama_suami }}</td>
                    <td>{{ $mustahik->nama_istri }}</td>
                    <td>{{ $mustahik->RTWarga->nomor_RT ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
