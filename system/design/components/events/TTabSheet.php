<?
$result = [];

$result[] = array(
                  'CAPTION'=>t("onclick"),
                  'EVENT'=>'onClick',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onclick',
                  );

$result[] = array(
                  'CAPTION'=>t("ondblclick"),
                  'EVENT'=>'onDblClick',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'ondblclick',
                  );

$result[] = array(
                  'CAPTION'=>t("onmousedown"),
                  'EVENT'=>'onMouseDown',
                  'INFO'=>'%func%($self,$button,$shift,$x,$y)',
                  'ICON'=>'mousedown',
                  );
$result[] = array(
                  'CAPTION'=>t("onmousemove"),
                  'EVENT'=>'onMouseMove',
                  'INFO'=>'%func%($self,$button,$shift,$x,$y)',
                  'ICON'=>'mousemove',
                  );
$result[] = array(
                  'CAPTION'=>t("onmouseup"),
                  'EVENT'=>'onMouseUp',
                  'INFO'=>'%func%($self,$button,$shift,$x,$y)',
                  'ICON'=>'mouseup',
                  );

$result[] = array(
                  'CAPTION'=>t("onmouseenter"),
                  'EVENT'=>'onMouseEnter',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onmouseenter',
                  );

$result[] = array(
                  'CAPTION'=>t("onmouseleave"),
                  'EVENT'=>'onMouseLeave',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onmouseleave',
                  );
$result[] = array(
                  'CAPTION'=>t("onshow"),
                  'EVENT'=>'onShow',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onshow',
                  );

$result[] = array(
                  'CAPTION'=>t("onhide"),
                  'EVENT'=>'onHide',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onhide',
                  );
$result[] = array(
                  'CAPTION'=>t("onresize"),
                  'EVENT'=>'onResize',
                  'INFO'=>'%func%($self)',
                  'ICON'=>'onresize',
                  );
return $result;