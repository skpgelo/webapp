<header class="masthead">
 <div class='container'>
  <div class='slider'>
    <ul class='slides'>
    <?php if(!empty($data)): ?>
    <?php foreach ($data->result() as $slide): ?>
     <li>
        <img src="<?= $slide['gambar'] ?>"> <!-- random image -->
        <div class='caption center-align'>
          <h3>BBPPKS BANDUNG</h3>
          <h5 class='light grey-text text-lighten-3"><?= $slide['keterangan'] ?></h5>
        </div>
      </li>
    <?php endforeach; ?>
    <?php endif; ?>
    </ul>
  </div>
  </div>
</header>