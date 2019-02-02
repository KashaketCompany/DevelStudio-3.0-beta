<?


global $_c;
$_c->setConstList(array('ctCode', 'ctHint', 'ctParams'),0);

	
class TSynEdit extends TMemo {
	public $class_name = __CLASS__;

	function set_caretX($v)		{ synedit_caret_x($this->self,$v);			}
	function get_caretX()		{ return synedit_caret_x($this->self,null);	}
	
	function set_caretY($v)		{ synedit_caret_y($this->self,$v);			}
	function get_caretY()		{ return synedit_caret_y($this->self,null);	}
	
	function set_selStart($v)	{ synedit_selstart($this->self,$v);			}
	function get_selStart()		{ synedit_selstart($this->self,null);		}
	
	function set_selEnd($v)		{ synedit_selend($this->self,$v);			}
	function get_selEnd()		{ synedit_selend($this->self,null);			}
	
	function set_selLength($v)
	{
		$this->selEnd = $this->selStart + $v;
	}
	
	function get_selLength( )
	{
		return $this->selEnd - $this->selStart;
	}
	
	public function selectAll( )
	{
		
		$this->setFocus();
		$this->selStart = 0;
		$this->selEnd   = strlen($this->text);
	}
	
	public function undo()	{ edit_undo($this->self); }
	public function redo()	{ edit_redo($this->self); }
    
	public function copyToClipboard()	{ edit_copytoclipboard($this->self);	}
	public function cutToClipboard()	{ edit_cuttoclipboard($this->self);		}
	public function pasteFromClipboard(){ edit_pastefromclipboard($this->self);	}
	public function clearSelected()		{ edit_clearselection($this->self);		}
	public function clearSelection()	{ $this->clearSelected();				}
	
	function set_lineText( $v )
	{
		$this->items->setLine($this->caretY - 1, $v);
	}
	
	function get_lineText( )
	{
		return $this->items->getLine($this->caretY - 1);
	}
	
	function replaceLine( $text )
	{
		$lineT = $this->lineText;
		$lastX = $this->caretX;
		
		
		$s = substr($lineT, 0, strlen($lineT)-strlen(ltrim($lineT)));
		$this->lineText = $s . $text;
		
		
		$this->caretX   = $lastX;
	}
	
	function insertLine( $text )
	{
		
		$lineT = $this->lineText;
		$lastX = $this->caretX;
		$lastY = $this->caretY;
		
		$s = substr($lineT, 0, strlen($lineT)-strlen(ltrim($lineT)));
		$this->lineText = $this->lineText . _BR_ . $s . $text;
		
		$this->caretX   = $lastX;
		$this->caretY   = $lastY;
	}
	
	function insertLineAfter( $text )
	{
		
		$lineT = $this->lineText;
		$lastX = $this->caretX;
		$lastY = $this->caretY;
		
		$s = substr($lineT, 0, strlen($lineT)-strlen(ltrim($lineT)));
		$this->lineText =  $s . $text ._BR_. $this->lineText;
		
		$this->caretX   = $lastX;
		$this->caretY   = $lastY;
	}

	private function set_ShowLineNumbers( )
	{
		gui_propset($this->gutter, 'showlinenumbers', $this->ShowLineNumbers);
	}

	private function set_GutterAuto( )
	{
		gui_propset($this->gutter, 'Autosize', $this->GutterAuto);
	}
	
	function select( $text )
	{
		$this->selStart	= stripos($this->text,$text);
		$this->selEnd	= $this->selStart + strlen($text);
	}

}

class TSynGutter extends TControl{
	public $class_name = __CLASS__;
}

class TSynCompletionProposal extends TControl {
    
    public $class_name = __CLASS__;
    public $itemList; // TStrings
    public $insertList; // TStrings
    
    #clBackground = clWindow
    #clSelect = clHighlight
    #clSelectText = clHighlightText
    #clTitleBackground = clBtnFace
    
    #margin = 2
    #itemHeight = 0
    #nbLinesInWindow = 8
    #resizeable = true
    #defaultType = ctCode
    #shortCut = CTRL+SPACE
    #title = ''
    #width = 260
    
    function __construct($onwer=nil,$init=true,$self=nil){
		parent::__construct($onwer,$init,$self);
		$this->itemList = new TStrings(false);
		$this->itemList->self = __rtti_link($this->self,'itemList');
			
			$this->insertList = new TStrings(false);
		$this->insertList->self = __rtti_link($this->self,'insertList');
		
		$this->__setAllPropEx();
    }
    
    public function setEditor(TSynEdit $editor){
	
		syncomplete_editor($this->self, $editor->self);
    }
    
    public function get_visible(){
	return (syncomplete_visible($this->self));
    }
    
    public function get_insert(){
        return $this->insertList->get_text();
    }
    public function set_insert($text){
        $this->insertList->text = $text;
    }
    
    public function get_item(){
        return $this->itemList->get_text();   
    }
    public function set_item($text){
	$this->itemList->text = $text;
    }
    
    public function set_editor(TSynEdit $editor){
        syncomplete_editor($this->self, $editor->self);
    }
    
    public function get_editor(){
        return _c(syncomplete_editor($this->self, null));
    }
    
    public function set_shortCut($sc){
		
	if (!is_numeric($sc))
		$sc = text_to_shortcut(strtoupper($sc));
	$this->set_prop('shortCut',$sc);
    }
	
    public function get_shortCut(){
		
	$result = $this->get_prop('shortCut');
	return shortCut_to_text($result);
    }
    
    public function active($value = true){
        
        syncomplete_activate($this->self, (bool)$value);
    }
    
    public function get_hint(){
        return $this->insertList->text;
    }
    
    public function set_hint($hint){
        $this->defaultType      = ctParams;
        $this->insertList->text = $hint;
        $this->itemList->text   = $hint;
    }
    
    public function get_currentString(){
	
	return syncomplete_currentString($this->self);
    }
    
    public function get_empty(){
	
	return syncomplete_empty($this->self);
    }
}

class TSynHighlighterAttributes extends TControl {
	
	public $class_name = __CLASS__;
	#TColor background
	#TColor foreground
	#string style = 'fsBold, fsItalic, fsStrikeOut, fsUnderline'
}

class TSynCustomHighlighter extends TControl {
	
	public $class_name = __CLASS__;
	#enabled
	#DefaultFilter 
	
	// ->getAttri('Comment')->background = clGray;
	function getAttri($prefix = 'Comment'){
		
		$prop = $prefix . 'Attri';
		
		$result = new TSynHighlighterAttributes(nil,false);
		$result->self = gui_propGet($this->self, $prop);
		return $result;
	}
}

#attr: Comment, Identifier, Key, Number, Space, String, Symbol, Variable
class TSynPHPSyn extends TSynCustomHighlighter {
	public $class_name = __CLASS__;

	static $prefixs = array('Comment', 'Identifier', 'Key', 'Number', 'Space', 'String', 'Symbol', 'Variable');
	
	function saveAttr($prefix, &$arr){
		
		$attr = $this->getAttri($prefix);
		$arr[$prefix]['background'] = $attr->background;
		$arr[$prefix]['foreground'] = $attr->foreground;
		$arr[$prefix]['style']      = $attr->style;
	}
	
	function saveToArray(&$arr){
		
		foreach (self::$prefixs as $prefix)
			$this->saveAttr($prefix, $arr);
	}
	
	function loadFromArray($arr){
		
		foreach (self::$prefixs as $prefix){
			$attr = $this->getAttri($prefix);
			if (isset($arr[$prefix])){
				$attr->background = $arr[$prefix]['background'];
				$attr->foreground = $arr[$prefix]['foreground'];
				$attr->style      = $arr[$prefix]['style'];
			}
		}
	}
}
class TSynGeneralSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCppSyn				extends TSynCustomHighlighter 	{ public $class_name = __CLASS__; }
class TSynCssSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynHTMLSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynSQLSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynJScriptSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynXMLSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
//ifgetaddedclass
class TSynPasSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynFortranSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynJavaSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynM3Syn					extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynVBSyn					extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCobolSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCSSyn					extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynVBScriptSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynJsonSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynDWSSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynBATSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynAWKSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynKIXSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynPerlSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynPythonSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynGWScriptSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynRubySyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynUNIXShellScriptSyn	extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCACSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCacheSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynFoxproSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynSDDSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynADSP21xxSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynASMSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynAsmMASMSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynHC11Syn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynHP48Syn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynSTSyn					extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynDMLSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynModelicaSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynDFMSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynINISyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynINNOSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynBaanSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynGalaxySyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynIDLSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynUnrealSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynCPMSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynTeXSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynHaskellSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynLDRSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynURISyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynDotSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynRCSyn					extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynProgressSyn			extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynMSGSyn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }
class TSynVrml97Syn				extends TSynCustomHighlighter	{ public $class_name = __CLASS__; }