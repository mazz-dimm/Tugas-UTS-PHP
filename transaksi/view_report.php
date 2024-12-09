<?php
include '../koneksi.php';
$query = "SELECT
    m.nama_member AS Member,
    m.level AS Level,
    CONCAT(
        CASE
            WHEN m.level = 'Silver' THEN '5%'
            WHEN m.level = 'Gold' THEN '10%'
            WHEN m.level = 'Platinum' THEN '15%'
            ELSE '0%'
        END
    ) AS 'Diskon Member',
    CASE
        WHEN SUM(t.total_transaksi) > 100000 THEN '10%'
        ELSE '0%'
    END AS 'Diskon Barang',
    SUM(t.total_transaksi) AS 'Total Pembelian',
    (
        CASE 
            WHEN m.level = 'Silver' THEN SUM(t.total_transaksi) * 0.05
            WHEN m.level = 'Gold' THEN SUM(t.total_transaksi) * 0.10
            WHEN m.level = 'Platinum' THEN SUM(t.total_transaksi) * 0.15
            ELSE 0
        END
    ) +
    (
        CASE
            WHEN SUM(t.total_transaksi) > 100000 THEN SUM(t.total_transaksi) * 0.10
            ELSE 0
        END
    ) AS 'Total Diskon',
    SUM(t.total_transaksi) - 
    (
        CASE 
            WHEN m.level = 'Silver' THEN SUM(t.total_transaksi) * 0.05
            WHEN m.level = 'Gold' THEN SUM(t.total_transaksi) * 0.10
            WHEN m.level = 'Platinum' THEN SUM(t.total_transaksi) * 0.15
            ELSE 0
        END
    ) - 
    (
        CASE
            WHEN SUM(t.total_transaksi) > 100000 THEN SUM(t.total_transaksi) * 0.10
            ELSE 0
        END
    ) AS 'Total Transaksi'
FROM
    member m
JOIN 
    penjualan p ON m.nama_member = p.nama_member
JOIN 
    transaksi t ON p.id_penjualan = t.id_penjualan
GROUP BY
    m.nama_member, m.level
ORDER BY
    t.tanggal_transaksi ASC"; 

$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Report Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>Member</th>
                <th>Level</th>
                <th>Diskon Member</th>
                <th>Diskon Barang</th>
                <th>Total Pembelian</th>
                <th>Total Diskon</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menghitung total diskon
                    $total_diskon = 0;
                    if ($row['Level'] == 'Silver') {
                        $total_diskon += $row['Total Pembelian'] * 0.05;
                    } elseif ($row['Level'] == 'Gold') {
                        $total_diskon += $row['Total Pembelian'] * 0.10;
                    } elseif ($row['Level'] == 'Platinum') {
                        $total_diskon += $row['Total Pembelian'] * 0.15;
                    }

                    // Diskon barang 10% jika total pembelian lebih dari 100000
                    if ($row['Total Pembelian'] > 100000) {
                        $total_diskon += $row['Total Pembelian'] * 0.10;
                    }

                    $total_transaksi = $row['Total Pembelian'] - $total_diskon;

                    echo "<tr>
                            <td>{$row['Member']}</td>
                            <td>{$row['Level']}</td>
                            <td>{$row['Diskon Member']}</td>
                            <td>{$row['Diskon Barang']}</td>
                            <td>" . number_format($row['Total Pembelian'], 0, ',', '.') . "</td>
                            <td>" . number_format($total_diskon, 0, ',', '.') . "</td>
                            <td>" . number_format($total_transaksi, 0, ',', '.') . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
            }
            $koneksi->close();
            ?>
        </tbody>
    </table>
</body>
</html>
