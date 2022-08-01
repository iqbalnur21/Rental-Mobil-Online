<table style="width: 30%;">
    <h2>Invoice Pembayaran Anda</h2>
    <?php foreach ($transaksi as $tr) : ?>
        <tr>
            <td>Nama Customer</td>
            <td>:</td>
            <td><?php echo $tr->nama ?></td>
        </tr>
        <tr>
            <td>Nama Mobil</td>
            <td>:</td>
            <td><?php echo $tr->merek ?></td>
        </tr>
        <tr>
            <td>Tanggal Rental</td>
            <td>:</td>
            <td><?php echo $tr->tanggal_rental ?></td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td><?php echo $tr->tanggal_kembali ?></td>
        </tr>
        <tr>
            <td>Biaya Sewa / Hari</td>
            <td>:</td>
            <td><?php echo number_format($tr->harga, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>Status Pembayaran</td>
            <td>:</td>
            <td><?php if ($tr->status_pembayaran == "0") {
                    echo 'Belum Lunas';
                } else {
                    echo 'Lunas';
                } ?></td>
        </tr>
        <tr>
            <?php
            $x = strtotime($tr->tanggal_kembali);
            $y = strtotime($tr->tanggal_rental);
            $jumlah_hari = abs(($x - $y) / (60 * 60 * 24));
            ?>
            <td>Jumlah Hari Sewa</td>
            <td>:</td>
            <td><?php echo $jumlah_hari ?> Hari</td>
        </tr>
        <tr style="font-weight: bold;color: red;">
            <td>JUMLAH PEMBAYARAN</td>
            <td>:</td>
            <td>
                Rp. <?php echo number_format($tr->harga * $jumlah_hari, 0, ',', '.') ?>
            </td>
        </tr>
        <tr>
            <td>Rekening Pembayaran</td>
            <td>:</td>
            <td>
                <ul>
                    <li>Bank Mandiri - 12354542654684</li>
                    <li>Bank BCA - 95654554656665</li>
                    <li>Bank BNI - 56468468451321</li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>window.print();</script>