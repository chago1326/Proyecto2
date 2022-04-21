<section>

	<h1>Nueva noticia</h1>

	<form action="<?= base_url('newssource/save'); ?>" method="POST" class="form-inline" role="form">
    <div class="form-group">
      <label class="sr-only" for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="News Source Title">
    </div>
    <div class="form-group">
      <label class="sr-only" for="">URL</label>
      <input type="text" class="form-control" name="url" placeholder="URL">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"></input>
  </form>

</section>