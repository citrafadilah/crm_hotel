<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #555;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            background-color: #fff;
            border-radius: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }
        .header .company-details h1 {
            color: #333;
            margin: 0;
            font-size: 24px;
        }
        .header .invoice-details {
            text-align: right;
        }
        .invoice-details h2 {
            margin: 0;
            font-size: 28px;
            color: #28a745; /* Warna hijau untuk status LUNAS */
        }
        .customer-details {
            margin-bottom: 40px;
        }
        .item-table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .item-table th, .item-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .item-table th {
            background: #f7f7f7;
            font-weight: bold;
            color: #333;
        }
        .item-table .description {
            width: 60%;
        }
        .totals-table {
            width: 100%;
            margin-top: 20px;
        }
        .totals-table td {
            padding: 5px 0;
        }
        .totals-table .label {
            text-align: right;
            width: 80%;
            font-weight: bold;
        }
        .totals-table .value {
            text-align: right;
            padding-left: 20px;
        }
        .totals-table .total {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            border-top: 2px solid #eee;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        /* Responsif untuk mobile */
        @media only screen and (max-width: 600px) {
            .invoice-box {
                padding: 20px;
            }
            .header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .header .invoice-details {
                text-align: center;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <div class="header">
            <div class="company-details">
                <h1>Hayo Hotel Palembang</h1>
                Jl. Malaka IV No.16, Bukit Sangkal, Kec. Kalidoni<br>
                Kota Palembang, Indonesia
            </div>
            <div class="invoice-details">
                <h2>LUNAS</h2>
                <strong>ID Transaksi:</strong> {{ pathinfo($reservasi->bukti_bayar, PATHINFO_FILENAME) }}<br>
                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($reservasi->created_at)->format('d F Y') }}<br>
            </div>
        </div>

        <div class="customer-details">
            <strong>Ditagihkan kepada:</strong><br>
            {{$reservasi->nama}}<br>
            {{$reservasi->email}}
        </div>

        <table class="item-table">
            <thead>
                <tr>
                    <th class="description">Deskripsi</th>
                    <th>Detail</th>
                    <th style="text-align:right;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Reservasi Hotel</strong><br>
                        Kamar Tipe: {{$reservasi->room->jeniskamar}}
                    </td>
                    <td>
                        Check-in: {{$reservasi->checkin}}<br>
                        Check-out: {{$reservasi->checkout}}
                    </td>
                    <td style="text-align:right;">Rp{{ number_format($reservasi->room->harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table class="totals-table">
            <tr>
                <td class="label">Subtotal</td>
                <td class="value">Rp{{ number_format($reservasi->room->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label total">Total Pembayaran</td>
                <td class="value total">Rp{{ number_format($reservasi->room->harga, 0, ',', '.') }}</td>
            </tr>
        </table>

        <div class="footer">
            <p>Terima kasih atas pembayaran Anda. Bukti ini dicetak secara otomatis oleh sistem.</p>
        </div>
    </div>

</body>
</html>
