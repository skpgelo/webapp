<!DOCTYPE html>
<html lang="en">
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