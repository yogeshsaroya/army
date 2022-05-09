<div class="content-wrapper" style="min-height: 1066px;">
  <section class="content-header">
    <h1>String Translation <small><?php echo $language['Language']['language']; ?></small> </h1>
  </section>
  <section class="content">
    <div class="box">
      <?php if (isset($lngStr) && !empty($lngStr)) { ?>
        <?php echo $this->Form->create('Translation'); ?>
        <div class="box-body">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-body str_lng">
                <?php
                $n = 1;
                foreach ($lngStr as $list) { ?>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon" data-toggle="popover" title="English Text" data-content="<?php echo $list['text']; ?>"><?php echo substr($list['text'], 0, 25); ?></span>
                      <?php
                      echo $this->Form->hidden('id', array('value' => $list['id'], 'name' => 'data[Translation][' . $n . '][id]'));
                      echo $this->Form->hidden('language_id', array('value' => $list['language_id'], 'name' => 'data[Translation][' . $n . '][language_id]'));
                      echo $this->Form->hidden('string_id', array('value' => $list['string_id'], 'name' => 'data[Translation][' . $n . '][string_id]'));
                      echo $this->Form->hidden('code', array('value' => $list['code'], 'name' => 'data[Translation][' . $n . '][code]'));
                      echo $this->Form->input('name', array('value' => $list['name'], 'name' => 'data[Translation][' . $n . '][name]', 'type' => 'text', 'class' => 'form-control', 'div' => false, 'label' => false)); ?>
                    </div>
                  </div>
                <?php $n++;
                } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <a href="<?php echo SITEURL . "/lab/labs/languages"; ?>" class="btn btn-default">Back to Language</a>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>
      <?php } ?>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $('[data-toggle="popover"]').popover();
  });
</script>