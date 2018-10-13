<div class="box-body pad">
  <label>Заголовок (title)</label>
  <textarea name="meta[title]" class="form-control" rows="3">{{ !empty($meta) ? $meta->title : '' }}</textarea>
</div>
<div class="box-body pad">
  <label>Описание (description)</label>
  <textarea name="meta[description]" class="form-control" rows="3">{{ !empty($meta) ? $meta->description : '' }}</textarea>
</div>
<div class="box-body pad">
  <label>Ключевые слова (keywords)</label>
  <textarea name="meta[keywords]" class="form-control" rows="3">{{ !empty($meta) ? $meta->keywords : '' }}</textarea>
</div>
