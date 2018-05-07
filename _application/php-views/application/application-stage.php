<!-- stage -->
<div class="layout__stage">
	<div class="stage js-stage">
		<div class="stage__ruler-highlight-vertical">
			<div class="ruler-highlight-vertical"></div>
		</div>
		<div class="stage__ruler-highlight-horizontal">
			<div class="ruler-highlight-horizontal"></div>
		</div>
		<div class="stage__ruler-vertical">
			<div class="ruler ruler--vertical js-ruler-vertical">
				<?php for ($x = -25; $x <= 25; $x++) { ?>
				<div class="rule-vertical <?php if($x == 0) { echo "js-ruler-vertical-zero";}?>">
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
			<div class="ruler ruler--horizontal js-ruler-horizontal">
				<?php for ($x = -25; $x <= 25; $x++) { ?>
				<div class="rule-horizontal <?php if($x == 0) { echo "js-ruler-horizontal-zero";}?>">
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
		</div>
		<div class="stage__ruler-corner"></div>

		<div class="stage__artwork js-stage-artwork">
			<div class="artwork"></div>
		</div>
	</div>
</div>
