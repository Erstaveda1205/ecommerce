<div class="container-fluid">
    <div class="row">
        <div class="col md-2"></div>
        <div class="col md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents())
                {
                    foreach ($keranjang as $item)
                    {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                     
                echo "<h5> Total Belanja Anda: Rp.".number_format($grand_total,0,',','.');
                ?>
            </div><br><br>

            <h3>Input Alamat Pengiriman dan Pembayaran</h3>

            <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Your Full name" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <input type="text" name="alamat" placeholder="Your Address" class="form-control">
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="telfon" placeholder="Your Number Telephone" class="form-control">
            </div>
            <div class="form-group">
                <label>Payment Method</label>
                <select class="form-control">
                    <option>COD (Cash On Delivery)</option>
                    <option>Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label>Choose Transfer</label>
                <select class="form-control">
                    <option>Dana</option>
                    <option>MANDIRI - XXXXXXX</option>
                    <option>BNI - XXXXXXX</option>
                    <option>BRI - XXXXXXX</option>
                </select>
            </div>

            <button type="submit" class="btn btn-sm btn-primary" mb-3>Order</button>

            </form>

            <?php
        } else
        {
            echo "<h4> Keranjang Belanja Anda Masih Kosong";
        }
            ?>
        </div>

        <div class="col md-2"></div>
    </div>
</div>