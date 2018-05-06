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
	<ul class="toolbar-list toolbar-list--left">
		<li class="toolbar-list__item toolbar-list__item--blue"></li>
		<li class="toolbar-list__item toolbar-list__item--blue"></li>
		<li class="toolbar-list__item toolbar-list__item--blue"></li>
	</ul>
	<ul class="toolbar-list toolbar-list--center">
		<li class="toolbar-list__item toolbar-list__item--pink"></li>
		<li class="toolbar-list__item toolbar-list__item--pink"></li>
		<li class="toolbar-list__item toolbar-list__item--pink"></li>
	</ul>
	<ul class="toolbar-list toolbar-list--right">
		<li class="toolbar-list__item toolbar-list__item--purple"></li>
		<li class="toolbar-list__item toolbar-list__item--purple"></li>
		<li class="toolbar-list__item toolbar-list__item--purple"></li>
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
	<div class="stage-ruler stage-ruler--horizontal">
			<?php for ($x = 0; $x <= 15; $x++) { ?>
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
	</div>
	<div class="stage-ruler stage-ruler--vertical">
			<?php for ($x = 0; $x <= 15; $x++) { ?>
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

	<div class="stage"></div>
</div>


<!-- timeline -->
<div class="layout__timeline">
	<div class="timeline-table">
		<div class="timeline-table__layers"></div>
		<div class="timeline-table__controls"></div>
		<div class="timeline-table__timeline"></div>
	</div>
</div>
