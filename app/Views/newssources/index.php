<section>
	<div class="container">
    <div class="row">
      <div class="col-12">
        <h1>News Sources</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a class="btn btn-primary" href="<?= base_url('/newssource/create')?>">New</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>URL</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($newssources as $source) { ?>
                <tr>
                  <td><?php echo $source['title'] ?></td>
                  <td><?php echo $source['url'] ?></td>
                  <td>
                    <a class="btn btn-secondary" href="<?php echo base_url(['newssource','edit',$source['id']]);?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo base_url(['newssource','delete',$source['id']]);?>">Delete</a>
                  </td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>