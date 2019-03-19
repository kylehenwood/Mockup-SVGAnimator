<?php

  // create a layer row for VAnimator
  function createLayer($indent,$chevron,$symbol,$label,$animation) {
    $html = null;

    //if ($chevron != null) {
      $html .='<div class="layer-control js-layer-control">';
    // } else {
    //   $html .='<div class="layer-control">';
    // }

    $html .='<div class="layer-control__item layer-control__item-indent--'.$indent.' js-layer-background">';
    $html .='<div class="layers-item">';

    // expand // collapse
    $html .=' <div class="layers-item__chevron js-layer-chevron">';
    if ($chevron === false) {
      $html .='   <div class="icon icon--16 icon--chevron-right js-chevron"></div>';
    }
    if ($chevron === true) {
      $html .='   <div class="icon icon--16 icon--chevron-down js-chevron"></div>';
    }
    if ($chevron === null) {}
    $html .=' </div>';


    // symbol || icon
    $icon = '';
    if ($symbol === 'group') {
      if ($chevron === true) {
        $icon ='<div class="icon icon--16 icon--folder-open js-symbol"></div>';
      } else {
        $icon ='<div class="icon icon--16 icon--folder js-symbol"></div>';
      }
    }
    if ($symbol === 'mask') {
      if ($chevron === true) {
        $icon ='<div class="icon icon--16 icon--folder-open js-symbol"></div>';
      } else {
        $icon ='<div class="icon icon--16 icon--folder js-symbol"></div>';
      }
    }
    if ($symbol === 'shape') {
      $icon ='<div class="icon icon--16 icon--shape js-symbol"></div>';
    }

    $symbolColor;
    switch ($symbol) {
      case 'group':
        $symbolColor = 'layers-item__symbol--group';
        break;
      case 'mask':
        $symbolColor = 'layers-item__symbol--mask';
        break;
      case 'shape':
        $symbolColor = 'layers-item__symbol--shape';
        break;
      case 'path':
        $symbolColor = 'layers-item__symbol--path';
        break;
      default:
        $symbolColor = 'white';
    }

    $html .='<div class="layers-item__symbol '.$symbolColor.'">';
    $html .= $icon;
    $html .='</div>';


    // text
    $html .=' <div class="layers-item__text js-layer-label">'.$label.'</div>';

    if ($animation === true) {
      $html .=' <div class="layers-item__animation js-layer-animation"></div>';
    }

    $html .='</div>';
    $html .='</div>';

    // timeline control
    $html .='<div class="layer-control__timeline">';

    if ($animation === true) {
      $html .='<div class="layer-timeline">';
      $html .='<div class="layer-timeline__handle layer-timeline__handle--start"></div>';
      $html .='<div class="layer-timeline__handle layer-timeline__handle--end"></div>';
      $html .='<div class="layer-timeline__bar layer-timeline__bar--blue"></div>';
      $html .='</div>';
    } else {
      $html .='<div class="layer-timeline">';
      $html .=' <div class="layer-timeline__button">';
      $html .='   <a class="button button--28 button--stone js-add-animation">Add animation</a>';
      $html .=' </div>';
      $html .=' <div class="layer-timeline__bar layer-timeline__bar--slate"></div>';
      $html .='</div>';
    }


    $html .='</div>';
    $html .='</div>';

    return $html;

  }
?>
