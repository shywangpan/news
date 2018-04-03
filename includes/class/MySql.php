<?php
/**
 * @author Tao ShaoBo <929918412@qq.com>
 * @version  2011-05-08
 
 DB::Query("select * from ecs_goods where 1")
 DB::GetTableRow("ecs_goods" , array('goods_id' => 1));
 DB::Update("ecs_goods" , 1 , array('goods_name' => '33') , 'goods_id')
 DB::Insert("ecs_goods" , array('goods_name' => '3333343'))
 DB::Delete("ecs_goods" , array('goods_id' => 1));
 DB::GetQueryResult("select * from ecs_goods where 1")  一行结果
 DB::GetQueryResult("select * from ecs_goods where 1" , false); //多行结果 
 */
class DB {
	static private $mInstance = null;

	static private $mConnection = null;

	static public $mDebug = false;

	static public $mError = null;

	static public $mCount = 0;

	static public function &Instance() {
		if ( null == self::$mInstance ) { 
			$class = __CLASS__;
			self::$mInstance = new $class;
		}
		return self::$mInstance;
	}

	function __construct() {
	    $INI = require(SITE_PATH.'/data/db.config.php');
		$host = $INI['db']['host'];
		$user = $INI['db']['user'];
		$pass = $INI['db']['pass'];
		$name = $INI['db']['name'];
        $charset = $INI['db']['charset'];
        
		self::$mConnection = mysql_connect( $host, $user, $pass );

		if ( mysql_errno() )
			throw new Exception("Connect failed: " . mysql_error());

		mysql_select_db( $name, self::$mConnection );
        mysql_query( "SET NAMES {$charset};", self::$mConnection );
	}

	static function getLinkId() {
		self::Instance();
		return self::$mConnection;
	}

	function __destruct(){
		self::close();
	}

	static public function debug(){
		self::$mDebug = !self::$mDebug;
	}

	static public function close(){
		if ( is_resource( self::$mConnection ) )
		{
			@mysql_close( self::$mConnection );
		}

		self::$mConnection = null;
		self::$mInstance = null;
	}


	static public function escapeString( $string ) {
		self::Instance();
		return mysql_real_escape_string( $string, self::$mConnection );
	}

	static public function getInsertId() {
		self::Instance();
		return mysql_insert_id(self::$mConnection);
	}

	static public function Query( $sql ){
		self::Instance();

		if ( self::$mDebug ){
			echo $sql;
		}

		$result = mysql_query( $sql, self::$mConnection );
		self::$mCount++;

		if ( $result ){
			return $result;
		}else{
			echo mysql_error();
		}

		self::close();
		return false;
	}

	static public function NextRecord($query) {
//		return array_change_key_case(mysql_fetch_assoc($query),CASE_LOWER);
		return mysql_fetch_assoc($query);
	}

	static public function GetTableRow($table, $condition){
	   
		return self::LimitQuery($table, array(
					'condition' => $condition,
					'one' => true,
					));
	}


	static public function LimitQuery($table, $options=array()) {
	
		$condition = isset($options['condition']) ? $options['condition'] : null;
		$one = isset($options['one']) ? $options['one'] : false;
		$offset = isset($options['offset']) ? abs(intval($options['offset'])) : 0;
        
		if ( $one ) {
			$size = 1;
		} else {
			$size = isset($options['size']) ? abs(intval($options['size'])) : null;
		}
        
		$select = isset($options['select']) ? $options['select'] : '*';
		$order = isset($options['order']) ? $options['order'] : null;
	

		$condition = self::BuildCondition( $condition );
		$condition = (null==$condition) ? null : "WHERE $condition";

		$limitation = $size ? "LIMIT $offset,$size" : null;

		$sql = "SELECT {$select} FROM `$table` $condition $order $limitation";
     
		return self::GetQueryResult( $sql, $one);
	}

	static public function GetQueryResult( $sql, $one=true ) {

		$ret = array();
		if ( $result = self::Query($sql) )
		{
			while ( $row = mysql_fetch_assoc($result) )
			{
//				$row = array_change_key_case($row, CASE_LOWER);
				if ( $one )
				{
					$ret = $row;
					break;
				}else{ 
					array_push( $ret, $row );
				}
			}

			@mysql_free_result( $result );
		}
		return $ret;
	}


	static public function Insert( $table, $condition ){
		self::Instance();

		$sql = "INSERT INTO `$table` SET ";
		$content = null;

		foreach ( $condition as $k => $v )
		{
			$v_str = null;
			if ( is_numeric($v) )
				$v_str = "'{$v}'";
			else if ( is_null($v) )
				$v_str = 'NULL';
			else
				$v_str = "'" . self::escapeString($v) . "'";

			$content .= "`$k`=$v_str,";
		}

		$content = trim($content, ',');
		$sql .= $content;

		$result = self::Query ($sql);
		if ( false==$result )
		{
			self::close();
			return false;
		}
		($insert_id = self::getInsertId()) || ($insert_id =  true) ;
		return $insert_id;
	}

	static public function Delete($table=null, $condition = array()){
		if ( null==$table || empty($condition) )
			return false;
		self::Instance();

		$condition = self::BuildCondition($condition);
		$condition = (null==$condition) ? null : "WHERE $condition";
		$sql = "DELETE FROM `$table` $condition";
		return DB::Query( $sql );
	}

	static public function Update( $table=null, $id=1, $updaterow=array(), $pkname='id' ) {

		if ( null==$table || empty($updaterow) || null==$id)
			return false;

		if ( is_array($id) ) $condition = self::BuildCondition($id);
		else $condition = "`$pkname`='".self::escapeString($id)."'";

		self::Instance();

		$sql = "UPDATE `$table` SET ";
		$content = null;

		foreach ( $updaterow as $k => $v )
		{
			$v_str = null;
			if ( is_numeric($v) )
				$v_str = "'{$v}'";
			else if ( is_null($v) )
				$v_str = 'NULL';
			else if ( is_array($v) )
				$v_str = $v[0]; 
			else
				$v_str = "'" . self::escapeString($v) . "'";

			$content .= "`$k`=$v_str,";
		}

		$content = trim($content, ',');
		$sql .= $content;
		$sql .= " WHERE $condition";

		$result = self::Query ($sql);

		if ( false==$result )
		{
			self::close();
			return false;
		}

		return true;
	}

	static public function BuildCondition($condition=array(), $logic='AND')
	{
		if ( is_string( $condition ) || is_null($condition) )
			return $condition;

		$logic = strtoupper( $logic );
		$content = null;
		foreach ( $condition as $k => $v )
		{
			$v_str = null;
			$v_connect = '=';

			if ( is_numeric($k) )
			{
				$content .= $logic . ' (' . self::BuildCondition( $v, $logic ) . ')';
				continue;
			}

			$maybe_logic = strtoupper($k);
			if ( in_array($maybe_logic, array('AND','OR')))
			{
				$content .= $logic . ' (' . self::BuildCondition( $v, $maybe_logic ) . ')';
				continue;
			}

			if ( is_numeric($v) ) {
				$v_str = "'{$v}'";
			}
			else if ( is_null($v) ) {
				$v_connect = ' IS ';
				$v_str = ' NULL';
			}
			else if ( is_array($v) ) {
				if ( isset($v[0]) ) {
					$v_str = null;
					foreach($v AS $one) {
						if (is_numeric($one)) {
							$v_str .= ','.$one;
						} else {
							$v_str .= ',\''.self::escapeString($one).'\'';
						}
					}
					$v_str = '(' . trim($v_str, ',') .')';
					$v_connect = 'IN';
				} else if ( empty($v) ) {
					$v_str = $k;
					$v_connect = '<>';
				} else {
					$v_connect = array_shift(array_keys($v));
					$v_s = array_shift(array_values($v));
					$v_str = "'".self::escapeString($v_s)."'";
                    $v_str = is_numeric($v_s) ? "'{$v_s}'" : $v_str ;
				}
			} 
			else {
				$v_str = "'".self::escapeString($v)."'";
			}

			$content .= " $logic `$k` $v_connect $v_str ";
		}

		$content = preg_replace( '/^\s*'.$logic.'\s*/', '', $content );
		$content = preg_replace( '/\s*'.$logic.'\s*$/', '', $content );
		$content = trim($content);

		return $content;
	}
    static public function Count($table=null, $condition=null, $sum=null)
	{
		$condition = self::BuildCondition( $condition );
		$condition = null==$condition ? null : "WHERE $condition";
		$zone = $sum ? "SUM({$sum})" : "COUNT(1)";
		$sql = "SELECT {$zone} AS count FROM `$table` $condition";
		$row = self::GetQueryResult($sql, true);
		return $sum ? (0+$row['count']) : intval($row['count']);
	}

    static public function AssColumn($a=array(), $column='id')
    {
        $two_level = func_num_args() > 2 ? true : false;
        if ( $two_level ) $scolumn = func_get_arg(2);

        $ret = array(); settype($a, 'array');
        if ( false == $two_level )
        {   
            foreach( $a AS $one )
            {   
                if ( is_array($one) ) 
                    $ret[ @$one[$column] ] = $one;
                else
                    $ret[ @$one->$column ] = $one;
            }   
        }   
        else
        {   
            foreach( $a AS $one )
            {   
                if (is_array($one)) {
                    if ( false==isset( $ret[ @$one[$column] ] ) ) {
                        $ret[ @$one[$column] ] = array();
                    }
                    $ret[ @$one[$column] ][ @$one[$scolumn] ] = $one;
                } else {
                    if ( false==isset( $ret[ @$one->$column ] ) )
                        $ret[ @$one->$column ] = array();

                    $ret[ @$one->$column ][ @$one->$scolumn ] = $one;
                }
            }
        }
        return $ret;
    }
}



/* End of file MySql.php */
/* Location: ./core/MySql.php */