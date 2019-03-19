<?php
// include 'application-title.php';
// include 'application-toolbar.php';
// include 'application-tabs.php';
//
// // Animator
// include 'application-stage.php';
// include 'application-timeline.php';
//
// // Editor
// include 'application-editor.php';
//
// // Designer
?>
<?php include 'component-layer.php'; ?>
<?php include 'component-animation.php'; ?>


<div class="layout__header">
  <?php include 'component-header.php'; ?>
</div>
<div class="layout__layers">

  <div class="layer">

    <div class="layer__header-detail">
      <div class="header-detail">
        <div class="header-detail__title">
          &lt;svg id="svg-name"&gt;
        </div>
        <div class="header-detail__edit">
          <a class="button button--32 button--stone">Edit</a>
        </div>
      </div>
    </div>

    <div class="layer__header-timeline">
      <div class="header-timeline">
        <div class="header-timeline__timeline"><a class="button button--32 button--stone">Timeline</a></div>
        <div class="header-timeline__animations"><a class="button button--32 button--stone">Animations</a></div>
      </div>
    </div>


    <div class="layer__animation js-animation-panel">
      <?php echo createAnimation(); ?>
    </div>


    <div class="layer__content">

      <div class="layer-group js-group">
        <div class="layer-group__head js-group-head">
          <?php echo createLayer('0',true,'group','layer.group',true);?>
        </div>
        <div class="layer-group__body js-group-body">
          <?php echo createLayer('1',null,'shape','layer.shape','label',false);?>
          <?php echo createLayer('1',null,'shape','layer.shape','label',true);?>
          <div class="layer-group js-group">
            <div class="layer-group__head js-group-head">
              <?php echo createLayer('1',true,'group','layer.group',true);?>
            </div>
            <div class="layer-group__body js-group-body">
              <?php echo createLayer('2',null,'shape','layer.shape',false);?>
              <?php echo createLayer('2',null,'shape','layer.shape',false);?>
              <?php echo createLayer('2',null,'shape','layer.shape',false);?>
              <div class="layer-group js-group">
                <div class="layer-group__head js-group-head">
                  <?php echo createLayer('2',true,'group','layer.group',false);?>
                </div>
                <div class="layer-group__body js-group-body">
                  <div class="layer-group js-group">
                    <div class="layer-group__head js-group-head">
                      <?php echo createLayer('3',false,'group','layer.group',false);?>
                    </div>
                    <div class="layer-group__body js-group-body">
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                    </div>
                  </div>
                  <div class="layer-group js-group">
                    <div class="layer-group__head js-group-head">
                      <?php echo createLayer('3',true,'mask','layer.mask',true);?>
                    </div>
                    <div class="layer-group__body js-group-body">
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                    </div>
                  </div>
                  <div class="layer-group js-group">
                    <div class="layer-group__head js-group-head">
                      <?php echo createLayer('3',false,'group','layer.group',false);?>
                    </div>
                    <div class="layer-group__body js-group-body">
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?>
                      <?php echo createLayer('4',null,'shape','layer.shape',false);?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="layer__timeline-options"></div>
      <div class="layer__timeline"></div>


    </div>
  </div>
</div>
<div class="layout__artboard layout__stage"></div>
<div class="layout__footer"></div>
