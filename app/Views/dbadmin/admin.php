<!DOCTYPE html>
<html lang="en">
<?= $this->include('dbadmin/v_header'); ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <?= $this->renderSection('page-content') ?>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?= $this->include('dbadmin/v_footer'); ?>
            </div>
        </div>
        <?= $this->include('dbadmin/v_css'); ?>
   </body>
</html>
