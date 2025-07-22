<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Riwayat Reservasi</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            line-height: 1.6;
        }
        .report-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .report-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 20px;
        }
        .report-header h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }
        .report-header p {
            margin: 5px 0 0;
            color: #7f8c8d;
        }
        .report-table-wrapper {
            overflow-x: auto; /* Membuat tabel bisa di-scroll horizontal di mobile */
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .report-table th, .report-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        .report-table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        .report-table tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Zebra striping */
        }
        .report-table tbody tr:hover {
            background-color: #e9ecef;
        }
        .report-table tfoot td {
            font-weight: bold;
            font-size: 1.1em;
            border-top: 2px solid #333;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="report-container">
        <div class="report-header">
            <h1>Laporan Riwayat Reservasi</h1>
            <p><strong>Hayo Hotel Palembang</strong></p>
            <p>Periode: {{ \Carbon\Carbon::now()->startOfMonth()->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::now()->endOfMonth()->translatedFormat('d F Y') }}</p>
        </div>

        <div class="report-table-wrapper">
            <table class="report-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tamu</th>
                        <th>Email</th>
                        <th>No. Handphone</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Jenis Kamar</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $index => $riwayat)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$riwayat->reservasi->nama}}</td>
                        <td>{{$riwayat->reservasi->email}}</td>
                        <td>{{$riwayat->reservasi->nohp}}</td>
                        <td>{{$riwayat->reservasi->checkin}}</td>
                        <td>{{$riwayat->reservasi->checkout}}</td>
                        <td>{{$riwayat->reservasi->kamar->jeniskamar}}</td>
                        <td>Rp. {{ number_format($riwayat->reservasi->total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7"><strong>Total Pendapatan</strong></td>
                        <td class="text-right"><strong>Rp. {{ number_format($totalpendapatan, 0, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</body>
</html>
