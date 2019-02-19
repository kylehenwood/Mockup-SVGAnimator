<?php
$navSelectedHome = false;
$navSelectedFeatures = false;
$navSelectedExamples = false;
$navSelectedPricing = false;
$navSelectedBlog = false;
$navSelectedHelp = false;

if (isset($_GET['pageID'])) {
  $pageName = $_GET['pageID'];

  switch ($pageName) {

    case $pageName == 'home';
    $navSelectedHome = true;
    break;

    case $pageName == 'features';
    $navSelectedFeatures = true;
    break;

    case $pageName == 'examples';
    $navSelectedExamples = true;
    break;

    case $pageName == 'pricing';
    $navSelectedPricing = true;
    break;

    case $pageName == 'blog';
    $navSelectedBlog = true;
    break;

    case $pageName == 'help';
    $navSelectedHelp = true;
    break;

    default:
    break;
  }
} else {
  $navSelectedHome = true;
}
?>


<div class="layout__header">

  <div class="center center--1120">


    <div class="header">
      <div class="header__logo">
        <div class="logo"></div>
      </div>
      <div class="header__navigation">

        <div class="navigation">
          <div class="navigation__item navigation__item--active">
            <div class="navigation__item-label">Examples</div>
          </div>
          <div class="navigation__item">
            <div class="navigation__item-label">Features</div>
          </div>
          <div class="navigation__item">
            <div class="navigation__item-label">Pricing</div>
          </div>
        </div>

      </div>
      <div class="header__auth">
        <a class="button button--40 button--white-stroke">Sign in</a>
      </div>
    </div>

  </div>

</div>
