<?
class TCategoryButtons extends TControl
{
    public function addSection($group,$caption,$color=clWhite)
	{    
        $sec = $this->categories->add();
        $sec->caption = $caption;
        $sec->color   = $color;
        
        $groups = $this->groups;
        $groups[$group] = $sec->self;
        
        $this->groups = $groups;
    }
    
    // TButtonItem
    public function addButton($group)
	{    
        $groups = $this->groups;
        $sec = _c($groups[$group]);
		$arr = $this->items;
		$btn = $sec->addButton();
        $arr[$group][] = $btn->self;
		$this->items = $arr;
        return $btn;
    }
    public function set_selected($group)
	{    
        $groups = $this->groups;
        $sec = _c($groups[$group]);
        
        foreach ($groups as $tmp=>$self)
            _c($self)->collapsed = true;
            
        $sec->collapsed = false;
    }
    
    public function get_selected()
	{    
        $groups = $this->groups;
        
        foreach ($groups as $tmp=>$self)
            if (!_c($self)->collapsed)
                return $tmp;
            
        return false;
    }
    
    public function set_selectedList($arr){
        
        $groups = $this->groups;
        foreach ($groups as $name=>$self)
		{    
			_c($self)->collapsed = !in_array($name, $arr);
        }
    }
    
    public function get_selectedList(){
        
        $groups = $this->groups;
        $result = [];
        
        foreach ($groups as $tmp=>$self)
            if (!_c($self)->collapsed)
                $result[] = $tmp;
            
        return $result;
    }
    
    public function set_smallIcons($v){
        if ($v){
            $this->buttonOptions = 'boGradientFill,boBoldCaptions,boCaptionOnlyBorder';
        } else {
            $this->buttonOptions = 'boShowCaptions,boFullSize,boGradientFill,boBoldCaptions,boCaptionOnlyBorder';
        }
    }
    
    public function get_smallIcons(){	
        
        return stripos($this->buttonOptions,'boShowCaptions')===false;
    }
	
	// С отключением иконок пока проблемы, потом исправлю...
    public function set_IsIcons($v)
	{
		if($v)
		{
			$this->Images = $this->___images;
		} else {
			$this->___images = $this->Images;
			gui_propSet($this->Images, nil);
		}
	}
    
    public function get_IsIcons(){	
        return !empty($this->__isImages);
    }
    
    public function unSelect()
	{
		gui_propSet($this->self, 'SelectedItem', null);   
    }
}
class TButtonCategories extends TControl{}
class TButtonCategory extends TControl
{	
    #collapsed
    public function addButton()
	{
		return $this->items->add();
    }
}
class TButtonCollection extends TControl{}
class TButtonItem extends TControl {}
?>