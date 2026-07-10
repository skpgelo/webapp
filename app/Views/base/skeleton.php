<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?? 'Dashboard'; ?> &mdash; || BBPPKS BANDUNG</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cloudflare.com"> <!-- Ganti/gunakan file lokal stisla.css jika ada -->
    <link rel="stylesheet" href="https://jsdelivr.net">
    <link rel="stylesheet" href="https://fontawesome.com">
<head>
	<?=$this->include('base/1head')?>
	<?=$this->include('base/2weathericons')?>
	<?=$this->include('base/2css')?>
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
    		<?=$this->include('base/3navbar')?>
    		<?=$this->include('base/4sidebar')?>
    		<?= $this->renderSection('content')?>
    		<?=$this->include('base/6footer')?>
    	</div>
    </div>
	<?=$this->include('base/7jsscript')?>
</body>
</html>