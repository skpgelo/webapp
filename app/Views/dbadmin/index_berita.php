<!DOCTYPE html>
<html lang="en">
<?= $this->include('template_dbadmin/v_header'); ?>
    <body class="sb-nav-fixed">
        <?= $this->include('template_dbadmin/v_sb-topnav'); ?>
        <div id="layoutSidenav">
            <?= $this->include('template_dbadmin/v_layoutSidenav_nav2'); ?>
            <div id="layoutSidenav_content">
            <main>
                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content') ?>
                <!-- /.container-fluid -->
            </main>
            <?= $this->include('template_dbadmin/v_footer'); ?>
            </div>
        </div>
        <?= $this->include('template_dbadmin/v_script'); ?>
    </body>
</html>