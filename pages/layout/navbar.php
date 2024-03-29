<div class="">
    <?php
    $APP_FOLDER = $route->getAppFolder();
    $currentPage = str_replace("$APP_FOLDER/pages/", '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $currentPage = preg_replace("/[^a-zA-Z0-9]/", "", $currentPage);

    function isActive($pageName)
    {
        global $currentPage;
        return $currentPage === $pageName ? 'active btn-warning' : '';
    }
    ?>
    <?php
    if (isset($_SESSION['user']['tipe_pengguna']) && $_SESSION['user']['tipe_pengguna'] === 'admin') {
    $url = $route->getBaseURL() . '/pages/admin/';
    $class = isActive('admin');
} else {
    $url = $route->getBaseURL() . '/pages/petugas/';
    $class = isActive('petugas'); // Jika pengguna bukan admin, mungkin Anda ingin mengaktifkan kelas dashboard
}
?>

<a href="<?= $url ?>" class="btn btn-success <?= $class ?>">Beranda</a>
    <?php if ($_SESSION['user']['tipe_pengguna'] === 'admin') : ?>
        <a href="<?= $route->getBaseURL() ?>/pages/pengguna" class="btn btn-success <?= isActive('pengguna') ?>">Pengguna</a>
    <?php endif; ?>
    <a href="<?= $route->getBaseURL() ?>/pages/produk" class="btn btn-success <?= isActive('produk') ?>">Produk</a>
    <a href="<?= $route->getBaseURL() ?>/pages/pelanggan" class="btn btn-success <?= isActive('pelanggan') ?>">Pelanggan</a>
    <a href="<?= $route->getBaseURL() ?>/pages/penjualan" class="btn btn-success <?= isActive('penjualan') ?>">Penjualan</a>
    <a href="<?= $route->getBaseURL() ?>/pages/laporan" class="btn btn-success <?= isActive('laporan') ?>">Laporan</a>
</div>
<div class="">
    <a href="<?= $route->getBaseURL() ?>/logout" class="btn btn-danger <?= isActive('logout') ?>">Logout</a>
</div>
