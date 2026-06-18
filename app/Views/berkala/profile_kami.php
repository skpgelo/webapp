
<?= $this->extend('base/skeleton'); ?>

<?= $this->section('content'); ?>


<!-- Main Content -->
    <div class="main-content">
      <section class="section">
          <div class="section-header">
          <h1><?= $section_header;?></h1>
          </div>
          
          <?=$this->include('base/row')?>
          <?=$this->include('base/sub_section_header')?>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4><?= $card_header;?></h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <!-- <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a> -->
                    </div>
                  </div>
                </div>
              <div class="card-body">
            xxx
              </div>
             </div>
            </div>
          </div>
      </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <?= $this->endSection() ?>
