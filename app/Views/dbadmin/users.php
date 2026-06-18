<?= $this->extend('dbadmin/index') ?>

<?= $this->section('page-content') ?>
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title ?> Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data <?= $title ?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Tanggal Registrasi</th>
                                            <th>Role</th>
                                            <th>Profile</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Tanggal Registrasi</th>
                                            <th>Role</th>
                                            <th>Profile</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?= $this->endSection() ?>
