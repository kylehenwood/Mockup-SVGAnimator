<!-- toolbar -->
<div class="layout__toolbar">
	<ul class="toolbar toolbar--left">
		<?php
			$iconColor = 'toolbar-icon--blue';
			$iconLeft = array('Group','Ungroup','Move','Rotate','Scale','Colors');
			foreach ($iconLeft as $value) {
			    $iconText = $value;
					include '_toolbar-icon.php';
			}
		?>
	</ul>
	<ul class="toolbar toolbar--center">
		<?php
			$iconColor = 'toolbar-icon--pink';
			$iconCenter = array('Grid','Grid size','Ruler');
			foreach ($iconCenter as $value) {
			    $iconText = $value;
					include '_toolbar-icon.php';
			}
		?>
	</ul>
	<ul class="toolbar toolbar--right">
		<?php
			$iconColor = 'toolbar-icon--purple';
			$iconRight = array('Save','Undo','Export');
			foreach ($iconRight as $value) {
			    $iconText = $value;
					include '_toolbar-icon.php';
			}
		?>
	</ul>
</div>
