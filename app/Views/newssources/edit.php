<section>

	<h1>Edit News Source</h1>

	<form action="<?= base_url('newssource/save') ?>" method="POST">
    <input type="hidden" name="id" value="<?= $newssource['id']?>">
    <div class="form-group">
      <label class="sr-only" for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="News Source Title" value="<?= $newssource['title']?>">
    </div>
    <div class="form-group">
      <label class="sr-only" for="">URL</label>
      <input type="text" class="form-control" name="url" placeholder="URL" value="<?= $newssource['url']?>">
    </div>

    <input type="submit" class="btn btn-primary" value="Update"></input>
  </form>

</section>