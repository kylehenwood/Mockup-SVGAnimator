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

// includes
include 'head.php';
include 'navigation-html.php';
?>
