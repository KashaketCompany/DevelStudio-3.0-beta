<?
class ImageEditor
{
	const type = "TNxButtonItem";
	public static function OnCreate( $edt, $class, &$prop )
	{
	
        $edt->caption = $prop['CAPTION'];
        $edt->ButtonCaption = myProperties::ButtonCaption;
        $edt->buttonWidth = myProperties::ButtonWidth;
        $edt->value       = '('. t('None') .')';
        $edt->onButtonClick = __CLASS__ . '::Click';
	}
	public static function Click( $self )
	{
		
        global $myProperties, $_sc, $fmEdit, $toSetProp;
        if($toSetProp) return;
        $param = $myProperties->elements[ $self ];
        $prop  = $param['PROP'];
		
		$im = c('edt_ImageView->image');
		$bitmap = $myProperties->selObj->$prop;
		if( $v instanceof TBitmap )
		{
			$im->picture->graphic = $bitmap;
			$im->picture->graphic->ReleasePalette();
		}	
		else 
			$im->picture->assign( $bitmap );
		
		c('edt_ImageView->background')->visible = ($im->picture->graphic->SupportsPartialTransparency || $im->picture->graphic->Transparent);
        c('edt_ImageView->btn_load')->onClick = __CLASS__ . "::load";
        c("edt_ImageView->btn_save")->onClick = __CLASS__ . "::save";
        c("edt_ImageView->btn_clear")->onClick= __CLASS__ . "::clear";
        c("edt_ImageView->btn_copy")->onClick = __CLASS__ . "::copy";
        c("edt_ImageView->btn_paste")->onClick= __CLASS__ . "::paste";
		
        if (c('edt_ImageView')->showModal() == mrOk)
		{
            
            $obj = _c($self);
            $bitmap = $im->picture;
				
			$targets = $_sc->targets_ex;
			$targets = count($targets)>0?$targets : [$fmEdit->self => $fmEdit];
			myHistory::add($targets, $prop);
            $m = 'set_' . $prop;
            foreach ($targets as $el)
			{
				$el = _c(myDesign::noVisAlias($el->self));
                $el->$prop->assign($bitmap);
					if( method_exists($el, $m) )
					$el->$m($bitmap);
            }
            $edt->value = '(' . t($bitmap->isEmpty()?'None':'image') . ')';
                
            $_sc->update();  // fix bug
        }
        
		myProperties::updateProps();
	}
	public static function Update( $edt, &$value )
	{
		$edt->value = '(' . t($value->isEmpty()?'None':'image') . ')';
	}
	public static function OnEdit( $edt, $value, $prop, &$upd )
	{
		$upd = true;
	}
    static function clear($self=0)
	{
        c('edt_ImageView->image')->picture->clear();
		c('edt_ImageView->background')->visible = false;
    }
    
    static function load($self=0)
	{
        $dlg = new TOpenDialog;
        $dlg->filter = DLG_FILTER_PICTURES;
        
        $result = false;
        if ($dlg->execute()){
            
            c('edt_ImageView->image')->picture->loadAnyFile($dlg->fileName);
			c('edt_ImageView->background')->visible = (c('edt_ImageView->image')->picture->graphic->SupportsPartialTransparency || c('edt_ImageView->image')->picture->graphic->Transparent);
			c('edt_ImageView')->repaint();
			$result = true;
        }
        
        $dlg->free();
		c('edt_ImageView')->toFront();
		
        return $result;
    }
    static function save($self=0)
	{
		$dlg = new TSaveDialog;
        $dlg->filter = 'Bitmap Images (*.bmp)|*.bmp';
        
        if ($dlg->execute()){
            if (file_exists($dlg->fileName) && !confirm(t('File "%s" already exists! You want to replace this file?',basename($dlg->fileName)))) return false;
            
            $dlg->fileName = fileExt($dlg->fileName)=='bmp' ? $dlg->fileName : $dlg->fileName . '.bmp';
                c('edt_ImageView->image')->picture->getBitmap()->saveToFile($dlg->fileName);
        }
        
        $dlg->free();
		c('edt_ImageView')->toFront();
    }
    static function copy($self=0)
	{
		c('edt_ImageView->imgBuffer')->picture->assign( c('edt_ImageView->image')->picture );
		clipboard_assign( c('edt_ImageView->image')->picture->self );
    }
    static function paste($self=0)
	{
		$im = c('edt_ImageView->image');
		if( clipboard_checkformat('pic') )
		{
			clipboard_assignpic( $im->picture->self );
		} else
		{
			$im->picture->assign( c("edt_ImageView->imgBuffer")->picture );
		}
	   c('edt_ImageView->background')->visible = ($im->picture->graphic->SupportsPartialTransparency || $im->picture->graphic->Transparent);
    }
}
myProperties::AddType("image", "ImageEditor");