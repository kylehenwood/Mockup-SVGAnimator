<?php

  // create a layer row for VAnimator
  function createLayer($indent,$chevron,$symbol,$label,$animation) {
    $html = null;

    if ($chevron != null) {
      $html .='<div class="layer-control js-layer-group">';
    } else {
      $html .='<div class="layer-control">';
    }

    $html .='<div class="layer-control__item">';
    $html .='<div class="layers-item layers-item--indent-'.$indent.'">';

    // expand // collapse
    if ($chevron === false) {
      $html .=' <div class="layers-item__chevron">';
      $html .='   <div class="icon icon--16 icon--chevron-right"></div>';
      $html .=' </div>';
    }
    if ($chevron === true) {
      $html .=' <div class="layers-item__chevron">';
      $html .='   <div class="icon icon--16 icon--chevron-down"></div>';
      $html .=' </div>';
    }
    if ($chevron === null) {
      $html .=' <div class="layers-item__empty"></div>';
    }

    // symbol || icon
    $icon = '';
    if ($symbol === 'group') {
      if ($chevron === true) {
        $icon ='<div class="icon icon--16 icon--folder-open"></div>';
      } else {
        $icon ='<div class="icon icon--16 icon--folder"></div>';
      }
    }
    if ($symbol === 'mask') {
      if ($chevron === true) {
        $icon ='<div class="icon icon--16 icon--folder-open"></div>';
      } else {
        $icon ='<div class="icon icon--16 icon--folder"></div>';
      }
    }
    if ($symbol === 'shape') {
      $icon ='<div class="icon icon--16 icon--shape"></div>';
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

    $html .=' <div class="layers-item__text">'.$label.'</div>';

    if ($animation === true) {
      $html .=' <div class="layers-item__animation"></div>';
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
      $html .='<div class="layer-timeline__bar layer-timeline__bar--slate"></div>';
      $html .='</div>';
    }


    $html .='</div>';
    $html .='</div>';

    return $html;

  }
?>
