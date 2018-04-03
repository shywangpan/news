<?php 
 /**
   * @license:version 2.0
   * @create:2006-5-31
   * @modify:2006-6-1
   * @modify: 2006-11-4
   * description:超强分页类，四种分页模式，默认采用类似baidu,google的分页风格。
   * 2.0增加功能：支持自定义风格，自定义样式，同时支持PHP4和PHP5,
   * example:
   * 模式四种分页模式：
   * require_once('../help/PageView.php');
   * $page=new page(array('total'=>1000,'perpage'=>20));
   * echo 'mode:1<br>'.$page->show();
   * echo '<hr>mode:2<br>'.$page->show(2);
   * echo '<hr>mode:3<br>'.$page->show(3);
   * echo '<hr>mode:4<br>'.$page->show(4);
   * 开启AJAX：
   * $ajaxpage=new page(array('total'=>1000,'perpage'=>20,'ajax'=>'ajax_page','page_name'=>'test'));
   * echo 'mode:1<br>'.$ajaxpage->show();
   * 采用继承自定义分页显示模式：
   * 
  */
  class Page
  {
  	/**
     * config ,public
     */
  	var $page_name="page";//page标签，用来控制url页。比如说xxx.php?PB_page=2中的PB_page
  	var $next_page='>';//下一页
  	var $pre_page='<';//上一页
  	var $first_page='First';//首页
  	var $last_page='Last';//尾页
  	var $pre_bar='<<';//上一分页条
  	var $next_bar='>>';//下一分页条
  	var $format_left='';
  	var $format_right='';
  	var $is_ajax=false;//是否支持AJAX分页模式
  	/**
     * private
     *
     */ 
  	var $pagebarnum=10;//控制记录条的个数。
  	var $totalpage=0;//总页数
  	var $ajax_action_name='';//AJAX动作名
  	var $nowindex=1;//当前页
  	var $url="";//url地址头
  	var $offset=0;
  	/**
	   * constructor构造函数
	   *
	   * @param array $array['total'],$array['perpage'],$array['nowindex'],$array['url'],$array['ajax']
	   */
  	function Page($array)
  	{
  		if(is_array($array)){
  			if(!array_key_exists('total',$array))$this->error(__FUNCTION__,'need a param of total');
  			$total=intval($array['total']);
  			$perpage=(array_key_exists('perpage',$array))?intval($array['perpage']):10;
  			$nowindex=(array_key_exists('nowindex',$array))?intval($array['nowindex']):'';
  			$url=(array_key_exists('url',$array))?$array['url']:'';
  		}else{
  			$total=$array;
  			$perpage=10;
  			$nowindex='';
  			$url='';
  		}
  		if((!is_int($total))||($total<0))$this->error(__FUNCTION__,$total.' is not a positive integer!');
  		if((!is_int($perpage))||($perpage<=0))$this->error(__FUNCTION__,$perpage.' is not a positive integer!');
  		if(!empty($array['page_name']))$this->set('page_name',$array['page_name']);//设置pagename
  		$this->_set_nowindex($nowindex);//设置当前页
  		$this->_set_url($url);//设置链接地址
  		$this->totalpage=ceil($total/$perpage);
  		$this->offset=($this->nowindex-1)*$perpage;
  		if(!empty($array['ajax']))$this->open_ajax($array['ajax']);//打开AJAX模式
  	}
  	/**
	   * 设定类中指定变量名的值，如果改变量不属于这个类，将throw一个exception
	   *
	   * @param string $var
	   * @param string $value
	   */
  	function set($var,$value)
  	{
  		if(in_array($var,get_object_vars($this)))
  		$this->$var=$value;
  		else {
  			$this->error(__FUNCTION__,$var." does not belong to PB_Page!");
  		}

  	}
  	/**
	  * 打开倒AJAX模式
	  *
	  * @param string $action 默认ajax触发的动作。
	  */
  	function open_ajax($action)
  	{
  		$this->is_ajax=true;
  		$this->ajax_action_name=$action;
  	}
  	/**
	  * 获取显示"下一页"的代码
	  * 
	  * @param string $style
	  * @return string
	  */
  	function next_page($style='')
  	{
  		if($this->nowindex<$this->totalpage){
  			return $this->_get_link($this->_get_url($this->nowindex+1),$this->next_page,$style);
  		}
  		return '<span class="'.$style.'">'.$this->next_page.'</span>';
  	}
  	/**
	  * 获取显示“上一页”的代码
	  *
	  * @param string $style
	  * @return string
	 */
  	function pre_page($style='')
  	{
  		if($this->nowindex>1){
  			return $this->_get_link($this->_get_url($this->nowindex-1),$this->pre_page,$style);
  		}
  		return '<span class="'.$style.'">'.$this->pre_page.'</span>';
  	}
  	/**
	  * 获取显示“首页”的代码
	  *
	  * @return string
	  */
  	function first_page($style='')
  	{
  		if($this->nowindex==1){
  			return '<span class="'.$style.'">'.$this->first_page.'</span>';
  		}
  		return $this->_get_link($this->_get_url(1),$this->first_page,$style);
  	}
  	/**
	  * 获取显示“尾页”的代码
	  *
	  * @return string
	  */
  	function last_page($style='')
  	{
  		if($this->nowindex==$this->totalpage){
  			return '<span class="'.$style.'">'.$this->last_page.'</span>';
  		}
  		return $this->_get_link($this->_get_url($this->totalpage),$this->last_page,$style);
  	}

  	function nowbar($style='',$nowindex_style='',$t='')
  	{
  		$plus=ceil($this->pagebarnum/2);
  		if($this->pagebarnum-$plus+$this->nowindex>$this->totalpage)$plus=($this->pagebarnum-$this->totalpage+$this->nowindex);
  		$begin=$this->nowindex-$plus+1;
  		$begin=($begin>=1)?$begin:1;
  		$return='';
  		for($i=$begin;$i<$begin+$this->pagebarnum;$i++)
  		{
  			if($i<=$this->totalpage){
  				if($i!=$this->nowindex)
  				$return.=$this->_get_text($this->_get_link($this->_get_url($i),$i,$style));
  				else

  				if ($t=='search'){
  					$text = str_replace(array('[',']'),array('',''),$this->_get_text('<a href="javascript:;" class="'.$nowindex_style.'">'.$i.'</a>'));
  					$return.=$text;
  				}
  				else {
  					$return.=$this->_get_text('<span class="'.$nowindex_style.'">'.$i.'</span>');
  				}
  			}else{
  				break;
  			}
  			$return.="\n";
  		}
  		unset($begin);
  		return $return;
  	}
  	/**
	  * 获取显示跳转按钮的代码
	  *
	  * @return string
	  */
  	function select()
  	{
  		$return='<select name="PB_Page_Select" >';
  		for($i=1;$i<=$this->totalpage;$i++)
  		{
  			if($i==$this->nowindex){
  				$return.='<option value="'.$i.'" selected>'.$i.'</option>';
  			}else{
  				$return.='<option value="'.$i.'">'.$i.'</option>';
  			}
  		}
  		unset($i);
  		$return.='</select>';
  		return $return;
  	}

  	/**
	  * 获取mysql 语句中limit需要的值
	  *
	  * @return string
	  */
  	function offset()
  	{
  		return $this->offset;
  	}

  	/**
	* 控制分页显示风格（你可以增加相应的风格）
	*
	* @param int $mode
	* @return string
	*/
  	function show($mode=1,$s='')
  	{
  		switch ($mode)
  		{
  			case '1':
  				$this->next_page='下一页';
  				$this->pre_page='上一页';
  				$this->first_page = '首页';
  				$this->last_page = '尾页';
  				//return $this->pre_page().$this->nowbar().$this->next_page().'第'.$this->select().'页';
  				return $this->first_page().$this->pre_page().$this->nowbar().$this->next_page().$this->last_page();
  				break;
  			case 'new':
  				$this->format_left='';
  				$this->format_right='';
  				$this->pagebarnum = 6;
  				
  				$prestr = '';//<a  class="y" style="width: 51px;">上一页</a>
  				if($this->nowindex>1){
  					$prestr= '<a class="y" style="width: 51px;" href="'.$this->_get_url($this->nowindex-1).'">上一页</a>';
  				}
  				$nextstr = '';//<a  class="y" style="width: 51px;">下一页</a>
  				if($this->nowindex<$this->totalpage){
  					$nextstr = '<a  class="y" style="width: 51px;" href="'.$this->_get_url($this->nowindex+1).'">下一页</a>';
  				}
  				
  				$first = '';//<a  class="y" style="width: 51px;">首页</a>
  				if($this->nowindex>1){
		  			$first = '<a class="y" href="'.$this->_get_url(1).'" style="width: 51px;" >首页</a>';
		  		}
		  		
		  		$last = '';//<a class="y" style="width: 51px;">末页</a>
		  		if($this->nowindex==$this->totalpage){
		  			$last = '';//<a class="dan" style="width: 51px;">末页</a>
		  		}else {
		  			$last = '<a class="y" href="'.$this->_get_url($this->totalpage).'" style="width: 51px;">末页</a>';
		  		}
		  		if ($this->totalpage>1) {
		  			return $first.$prestr.str_replace('span','a',$this->nowbar('','dan')).$nextstr.$last;
		  		}
  				return '';
  				break;
  			case 'list':
  				$this->next_page='下一页';
  				$this->pre_page='上一页';
  				$prestr = '<li class="first"><a>上一页</a></li>';
  				if($this->nowindex>1){
  					$prestr= '<li class="first"><a href="'.$this->_get_url($this->nowindex-1).'">上一页</a></li>';
  				}
  				$nextstr = '<li class="first"><a>下一页</a></li>';
  				if($this->nowindex<$this->totalpage){
  					$nextstr = '<li class="first"><a href="'.$this->_get_url($this->nowindex+1).'">下一页</a></li>';
  				}

  				$plus=ceil($this->pagebarnum/2);
  				if($this->pagebarnum-$plus+$this->nowindex>$this->totalpage)$plus=($this->pagebarnum-$this->totalpage+$this->nowindex);
  				$begin=$this->nowindex-$plus+1;
  				$begin=($begin>=1)?$begin:1;
  				$return='';
  				for($i=$begin;$i<$begin+$this->pagebarnum;$i++)
  				{
  					if($i<=$this->totalpage){
  						if($i!=$this->nowindex)
  						$return.='<li class="num"><a href="'.$this->_get_url($i).'">'.$i.'</a></li>';
  						else
  						$return.='<li class="num">'.$i.'</li>';

  					}else{
  						break;
  					}
  					$return.="\n";
  				}
  				unset($begin);


  				//return $this->pre_page().$this->nowbar().$this->next_page().'第'.$this->select().'页';
  				return $prestr.$return.$nextstr;
  				break;
  			case 'search':
  				$this->next_page='';
  				$this->pre_page='';
  				$this->format_left='[';
  				$this->format_right=']';
  				$this->is_ajax=true;
  				$this->pagebarnum = 6;
  				$this->ajax_action_name='pageArea';
  				if ($s == 'line'){
  					$this->ajax_action_name='pageLine';
  				}
  				if ($s == 'linebyarea'){
  					$this->ajax_action_name='pageLineByArea';
  				}
  				if ($s == 'other'){
  					$this->ajax_action_name = 'pageOther';
  				}
  				if ($this->totalpage>1){
  					return $this->nowbar('','current','search');
  				}
  				break;
  			case 'comments':
  				$this->next_page='';
  				$this->pre_page='';
  				$this->format_left='[';
  				$this->format_right=']';
  				$this->is_ajax=true;
  				$this->ajax_action_name='pageComments';
  				if ($this->totalpage>1){
  					return $this->nowbar('','current','search');
  				}
  				break;
  			case 'qt':
  				$this->next_page='';
  				$this->pre_page='';
  				$prepage = '';
  				$style1 = 'prev';
  				$style2 = 'next';
  				$prepage = '<a class="prev">'.$this->pre_page.'</a>';
  				if($this->nowindex>1){
  					$prepage= $this->_get_link($this->_get_url($this->nowindex-1),$this->pre_page,$style1);
  				}
  				$nextpage = '';
  				$nextpage =  '<a class="next">'.$this->next_page.'</a>';
  				if($this->nowindex<$this->totalpage){
  					$nextpage = $this->_get_link($this->_get_url($this->nowindex+1),$this->next_page,$style2);
  				}
  				return $prepage.$nextpage;

  				break;
  			case '2':
  				$this->next_page='下一页';
  				$this->pre_page='上一页';
  				$this->first_page='首页';
  				$this->last_page='尾页';
  				return $this->first_page().$this->pre_page().'[第'.$this->nowindex.'页]'.$this->next_page().$this->last_page().'第'.$this->select().'页';
  				break;
  			case '3':
  				$this->next_page='下一页';
  				$this->pre_page='上一页';
  				$this->first_page='首页';
  				$this->last_page='尾页';
  				return $this->first_page().$this->pre_page().$this->next_page().$this->last_page();
  				break;
  			case '4':
  				$this->next_page='下一页';
  				$this->pre_page='上一页';
  				return $this->pre_page().$this->nowbar().$this->next_page();
  				break;
  			case '5':
  				return $this->pre_bar().$this->pre_page().$this->nowbar().$this->next_page().$this->next_bar();
  			case 'ZJ':
  				$show_lent = $this->totalpage>10?10:$this->totalpage;
  				$str = "";
  				$start_page = 0;
  				//计算开始页$this->totalpage-$this->nowindex>$show_lent/2
  				$b = (int)($show_lent/2);
  				if ($this->nowindex<$b) {
  					$start_page = 1;
  				}elseif ($this->nowindex>$b){
  					$start_page = $this->nowindex-$b;
  				}else{
  					$start_page = $this->nowindex-($show_lent-$this->totalpage-$this->nowindex);
  				}
  				if ($this->nowindex==1||$this->nowindex==0) {
  					$str .= "<SPAN class=disabled>&lt; </SPAN>";
  				}else{
  					$str .= "<A href=\"".$this->url."1"."\">&lt;</A>";
  				}

  				$max = ($start_page+$show_lent)>$this->totalpage?$this->totalpage:$start_page+$show_lent;
  				for ($i=$start_page; $i<=$max; $i++){
  					if ($i==$this->nowindex) {
  						$str .= "<SPAN class=current>".$this->nowindex."</SPAN>";
  					}else{
  						$str .= "<A href=\"".$this->url.$i."\">".$i."</A>";
  					}
  				}

  				if ($this->totalpage==$this->nowindex) {
  					$str .= "<SPAN class=disabled>&gt; </SPAN>";
  				}else{
  					$str .= "<A href=\"".$this->url.$this->totalpage."\">&gt; </A>";
  				}
  				return $str;
  				break;
  			case 'society':
  				$this->format_left='';
  				$this->format_right='';
  				$this->pagebarnum = 4;
  				
  				$prestr = '';
  				if($this->nowindex>1){
  					$prestr= '<li><a href="'.$this->_get_url($this->nowindex-1).'">上一页</a></li>';
  				}
  				$nextstr = '';
  				if($this->nowindex<$this->totalpage){
  					$nextstr = '<li><a href="'.$this->_get_url($this->nowindex+1).'">下一页</a></li>';
  				}
  				
  				$first = '';
  				if($this->nowindex>1){
		  			$first = '<li><a href="'.$this->_get_url(1).'">首页</a></li>';
		  		}
		  		
		  		$last = '';
		  		if($this->nowindex==$this->totalpage){
		  			$last = '';
		  		}else {
		  			$last = '<li><a href="'.$this->_get_url($this->totalpage).'">末页</a></li>';
		  		}
		  		if ($this->totalpage>1) {
		  			$plus=ceil($this->pagebarnum/2);
	  				if($this->pagebarnum-$plus+$this->nowindex>$this->totalpage)$plus=($this->pagebarnum-$this->totalpage+$this->nowindex);
	  				$begin=$this->nowindex-$plus+1;
	  				$begin=($begin>=1)?$begin:1;
	  				$return='';
	  				for($i=$begin;$i<$begin+$this->pagebarnum;$i++)
	  				{
	  					if($i<=$this->totalpage){
	  						if($i!=$this->nowindex)
	  						$return.='<li><a href="'.$this->_get_url($i).'">'.$i.'</a></li>';
	  						else
	  						$return.='<li>'.$i.'</li>';
	
	  					}else{
	  						break;
	  					}
	  					$return.="\n";
	  				}
	  				unset($begin);
		  			
		  			//$first.$prestr.str_replace('</span>','</a></li>',$str).$nextstr.$last;
		  			return $first.$prestr.$return.$nextstr.$last;
		  		}
  				return '';
  				break;
  		}

  	}
  	/*----------------private function (私有方法)-----------------------------------------------------------*/
  /**
  * 设置url头地址
  * @param: String $url
  * @return boolean
 */
  	function _set_url($url="")
  	{
  		if(!empty($url)){
  			//手动设置
  			$this->url=$url.((stristr($url,'?'))?'&':'?').$this->page_name."=";

  		}else{
  			//自动获取
  			if(empty($_SERVER['QUERY_STRING'])){
  				//不存在QUERY_STRING时
  				$this->url=$_SERVER['REQUEST_URI']."?".$this->page_name."=";
  			}else{
  				//
  				if(stristr($_SERVER['QUERY_STRING'],$this->page_name.'=')){
  					//地址存在页面参数
  					$this->url=str_replace($this->page_name.'='.$this->nowindex,'',$_SERVER['REQUEST_URI']);
  					$last=$this->url[strlen($this->url)-1];
  					if($last=='?'||$last=='&'){
  						$this->url.=$this->page_name."=";
  					}else{
  						$this->url.='&'.$this->page_name."=";
  					}
  				}else{
  					$this->url=$_SERVER['REQUEST_URI'].'&'.$this->page_name.'=';
  				}//end if
  			}//end if
  		}//end if
  	}

  	/**
	  * 设置当前页面
	  *
	  */
  	function _set_nowindex($nowindex)
  	{
  		if(empty($nowindex)){
  			//系统获取

  			if(isset($_GET[$this->page_name])){
  				$this->nowindex=intval($_GET[$this->page_name]);
  			}
  		}else{
  			//手动设置
  			$this->nowindex=intval($nowindex);
  		}
  	}

  	/**
	  * 为指定的页面返回地址值
	  *
	  * @param int $pageno
	  * @return string $url
	  */
  	function _get_url($pageno=1)
  	{
  		return $this->url.$pageno;
  	}

  	/**
	  * 获取分页显示文字，比如说默认情况下_get_text('<a href="">1</a>')将返回[<a href="">1</a>]
	  *
	  * @param String $str
	  * @return string $url
	  */ 
  	function _get_text($str)
  	{
  		return $this->format_left.$str.$this->format_right;
  	}

  	/**
     * 获取链接地址
     */
  	function _get_link($url,$text,$style=''){
  		$style=(empty($style))?'':'class="'.$style.'"';
  		if($this->is_ajax){
  			//如果是使用AJAX模式
  			return '<a '.$style.' href="javascript:;" onclick="'.$this->ajax_action_name.'(\''.$url.'\')">'.$text.'</a>';
  		}else{
  			return '<a '.$style.' href="'.$url.'">'.$text.'</a>';
  		}
  	}
  	/**
	* 出错处理方式
	*/
  	function error($function,$errormsg)
  	{
  		die('Error in file <b>'.__FILE__.'</b> ,Function <b>'.$function.'()</b> :'.$errormsg);
  	}
  }

  // 继承分页类，加入数据集库访问能力.
  class Db_Page extends Page{
  	var $_Sql_Query ='';//查询数据库的sql
  	var $_Total =0;//查询到的总记录.必须先是
  	var $_Rst= array();//查询到的记录.

  	/******************************************************************
  	* 分页查询类库.
  	*
  	* @param String $Sql 记录查询的SQL 语句.
  	* @param int $pagenuber 每页多少条记录.
  	* @param int $pagen 当前页面.
  	* @param String $url 分页链接带入的参数. index.php?xx=b&bb=33
  	* @param String $pname  当前第几页的标记,默认是 index.php?xx=b&bb=33&page=2 如果有特殊要求
  	* 可以修改 $pname的参数. 比如: $pname='db_page',则变成: index.php?xx=b&bb=33&db_page=2
  	* @return Mssql_Page
  	*********************************************************************/
  	public  function Db_Page($sql_query='',$max_rows_per_page=20,$current_page_number=0,$url='',$parameters='',$pname='page'){
  		if($sql_query=='')return null;
  		if($max_rows_per_page=='')$max_rows_per_page=20;
  		if($current_page_number=='')$current_page_number=0;
  		$reviews_count = DB::GetQueryResult("select count(*) as total from(" . $sql_query.") as abc");
  		$this->_Total = $reviews_count['total'];
  		$num_pages = ceil($this->_Total / $max_rows_per_page);
  		if ($current_page_number > $num_pages) {
  			$current_page_number = $num_pages;
  		}
  		$offset = ($max_rows_per_page * ($current_page_number - 1));
  		if ($offset < 0) $offset=0;
  		$_DB_='MySQL';
  		if($_DB_=='Mssql'){
  			if(GMVC::getDBO()->version()>2000){
  				$this->_Sql_Query = $this->getMsSQLLimit($sql_query,$max_rows_per_page,$offset);
  			}else{
  				$this->_Sql_Query = "exec sp_fastexec " . $offset . ", " . $max_rows_per_page . "," . split_sql($sql_query);
  			}

  		}elseif ($_DB_=='MySQL'){
  			$this->_Sql_Query = $sql_query.' limit '.$offset.','.$max_rows_per_page;
  		}
  		$this->setData();//查询数据库.
  		//dump(array('total'=>$this->_Total,'perpage'=>$max_rows_per_page,'page_name'=>$pname,'url'=>$url,'parameters'=>$parameters));
  		parent::Page(array('total'=>$this->_Total,'perpage'=>$max_rows_per_page,'page_name'=>$pname,'url'=>$url,'parameters'=>$parameters));
  	}

  	/**
    * 取得当前页面的记录,返回一个数组.
    *
    */
  	function findByAll(){
  		return $this->_Rst;
  	}
  	/********************
  	* 显示分页信息.
  	*
  	* @param int $model
  	*
  	*/
  	function dispaly_links($model){
  		$this->show($model);

  	}
  	/**
 * 返回记录数.
 *
 * @return Int
 */
  	function getCount(){
  		return $this->_Total;
  	}
  	/**
 * 取查询结果记录数..
 *
 * @return Int
 */
  	function getRows(){
  		return count($this->_Rst);
  	}
  	/**********************
  	* 执行查询功能.
  	* 计算数组.
  	* 私有方法.
  	*/
  	function setData(){
  		$this->_Rst =DB::GetQueryResult($this->_Sql_Query,false);
  	}
  	/* 为适应sp_fastexec中sql参数不能超过255字符长度，将sql参数截成多个不超过255长度的多个
  	参数，并将sql中包含的单引号改为双单引号
  	参数：str_sql，一个字符串类型sql语句
  	输出结果："'" + str_sql1 + "'","'" + str_sql2 + "'",+...
  	处理要求：
  	1、请str_sql中缩包含的单引号改为双单引号
  	2、将str_sql拆分为长度不超过255的多个字符串，并用单引号括起来，用逗号分割。注：最后一个分割串后不要逗号
  	******************************************************************************/
  	function  split_sql($_sql){
  		$_sql = ereg_replace("'",'"',$_sql);
  		$a_tem ="";
  		$i1 =0;
  		$n = strlen($_sql);
  		if($n<200) return  "'".$_sql."'";
  		while($n>200){
  			$a_tem = GMVC::substr_utf8($_sql,199,'');
  			$istr = strlen($a_tem);
  			$_sql = substr($_sql,$istr+1);
  			$n = strlen($_sql);
  			if($i1==0){$r_tem .="'".$a_tem."','";} else {$r_tem .= $a_tem."','";}
  			$i1++;
  		}
  		return $r_tem.$_sql."'";
  	}
  	/**
     * 进行限定记录集的查询
     *
     * @param string $sql
     * @param int $length 返回多少条记录.
     * @param int $offset 从第几条记录返回.
     *
     * @return resource
     */
  	function getMsSQLLimit($sql, $length = 1, $offset = 1)
  	{
  		if($offset=='')$offset=1;
  		if($length=='')$length=1;
  		// Mssql2005 分页处理
  		$sql = strtolower($sql);
  		$dbname = GMVC::getINI('DB_DATABASE');
  		$sql = str_replace($dbname.'..','',$sql);
  		if(strpos($sql,'order')){
  			$orderby = substr($sql,strpos($sql,'order'));
  			$sql = substr($sql,0,strpos($sql,'order'));
  		}else{
  			$orderby = substr($sql,strpos($sql,'select')+7);
  			$orderby = substr($orderby,0,strpos($orderby,'from'));

  			if(strpos($orderby,',')){
  				$orderby = substr($orderby,0,strpos($orderby,','));
  			}else if(strpos($orderby,'as')){
  				$orderby = substr($orderby,strpos($orderby,'as')+2);
  				if(strpos($orderby,',')){
  					$orderby = substr($orderby,0,strpos($orderby,','));
  				}
  			}else if(trim($orderby)=='*'){// select * 方式处理
  				$orderby =substr($sql,strrpos($sql,'where')+5);
  				$orderby =substr($orderby,0,strrpos($orderby,'='));
  			}
  			if($orderby==''){//select * from table 方式处理.
  				$table =trim(substr($sql,strrpos($sql,'from')+4));
  				$orderby = FLEA::getDBO()->getmetaColumns($table);
  			}
  			$orderby = 'order by '.$orderby.' asc';

  		}	//特殊处理完else
  		if(strpos($orderby,'asc')==0&&strpos($orderby,'desc')==0) $orderby = $orderby.' asc';
  		while(strpos($orderby,'.')){
  			$tmp = substr($orderby,strpos($orderby,'by')+2);
  			$tmp = substr($tmp,strpos($tmp,'.')+1);
  			$orderby = 'order by '.	$tmp;
  		}

  		$length = $length==1?$length:($length+ $offset);
  		$sql =' SELECT  *
						FROM    (SELECT  ROW_NUMBER() OVER ('.$orderby.') AS ROWID, *  FROM   ('.$sql.') as abc) AS tmpTable
						WHERE   ROWID BETWEEN '. $offset .' AND '. $length;
  		return  $sql;
  	}
  	//Db_Page结束.
  }

?> 