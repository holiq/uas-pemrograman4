# UAS Pemrograman 4

1. Apakah coding login dalam codeigniter dibawah  ini benar atau salah?
    ```html
    <body class="text-center">
        <main class="form-signin">
            <?php if (!empty(session()->getFlashdata('error'))): ?>
                <div class="alert alert-warning alert-dismissible fade shadow" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/login/proses" method="post">
                <?= csrf_field() ?>
                <h1 class="h3 mb-3 fw-normal">Login</h1>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" required autofocus>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                <button type="submit" class="w-100 btn btn-lg btn-block">Login</button>
            </form>
        </main>
    </body>
    ```
2. Langkah yang harus dilakukan untuk menghubungkan CodeIgniter dengan Telegram?
3. Langkah apa saja yang harus disiapkan agar project kita bisa dilihat secara luas oleh seluruh dunia?
4. Apakah coding model CodeIgniter dibawah ini benar atau salah, berikan alasannya?
   ```php
   <?php
   
    namespace App\Models;
    
    use CodeIgniter\Model;
    
    Class UserModel extends Model
    {
        protected $table            = 'users';
        protected $primaryKey       = 'username';
        protected $returnType       = 'object';
        protected $useTimestamps    = false;
        protected $allowedFields    = [ 'username', 'password', 'name'];
    }
    ```
5. Buatlah project dengan CodeIgniter dimana jika suatu dosen tidak ada akan mengirim email/telegram/wa ke pada semua mahasiswa yang mengikuti matakuliah tersebut, kalian pilih salah satu mengirim menggunakan apa?
