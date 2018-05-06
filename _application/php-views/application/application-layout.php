<!-- application -->
<div class="layout__titlebar">
	<ul class="titlebar-list">
		<li>VAnimator</li>
		<li>File</li>
		<li>Prefrences</li>
		<li>Undo</li>
		<li>Save</li>
		<li>Export</li>
	</ul>
</div>


<!-- toolbar -->
<div class="layout__toolbar">
	<ul class="toolbar toolbar--left">
		<?php
			$iconcolor = 'toolbar-icon--blue';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
		?>
	</ul>
	<ul class="toolbar toolbar--center">
		<?php
			$iconcolor = 'toolbar-icon--pink';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
		?>
	</ul>
	<ul class="toolbar toolbar--right">
		<?php
			$iconcolor = 'toolbar-icon--purple';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
			include '_toolbar-icon.php';
		?>
	</ul>
</div>


<!-- tabs -->
<div class="layout__tabs">
	<ul class="tabs-list">
		<li class="tabs-list__tab tabs-list__tab--active">Animator</li>
		<li class="tabs-list__tab">Code</li>
		<li class="tabs-list__tab">Designer</li>
	</ul>
</div>

<!-- stage -->
<div class="layout__stage">
	<div class="stage">
		<div class="stage__ruler-corner"></div>
		<div class="stage__ruler-highlight-vertical">
			<div class="ruler-highlight-vertical"></div>
		</div>
		<div class="stage__ruler-highlight-horizontal">
			<div class="ruler-highlight-horizontal"></div>
		</div>
		<div class="stage__ruler-vertical">
			<div class="ruler ruler--vertical">
				<?php for ($x = 0; $x <= 25; $x++) { ?>
				<div class="rule-vertical">
					<div class="rule-vertical__text"><?php echo ($x*100) ?></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--1"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--2"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--3"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--4"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--5"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--6"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--7"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--8"></div>
					<div class="rule-vertical__hatch rule-vertical__hatch--9"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="stage__ruler-horizontal">
			<div class="ruler ruler--horizontal">
				<?php for ($x = 0; $x <= 25; $x++) { ?>
				<div class="rule-horizontal">
					<div class="rule-horizontal__text"><?php echo ($x*100) ?></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--1"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--2"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--3"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--4"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--5"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--6"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--7"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--8"></div>
					<div class="rule-horizontal__hatch rule-horizontal__hatch--9"></div>
				</div>
				<?php } ?>
			</div></div>
		<div class="stage__artwork">
			<div class="artwork"></div>
		</div>
	</div>
</div>


<!-- timeline -->
<div class="layout__timeline">
	<div class="timeline-table">
		<div class="timeline-table__layers"></div>
		<div class="timeline-table__controls"></div>
		<div class="timeline-table__timeline"></div>
	</div>
</div>
