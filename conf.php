<?php 
session_cache_limiter('private_no_expire');
session_start();


/*
////7 type options/////
-text
	-required　必須チェック
	-valid_name　英数字のみチェック
	-min_length[]　最小文字数
	-max_length[]　最大文字数
	-greater_than[]　指定数以上かのチェック
	-less_than[]　指定数以下かのチェック
	-numeric_phone　0～9と-のチェック
	-numeric　0～9チェック
	-valid_string　禁則記号チェック
	-valid_space　スペースチェック
-select 
	-required　必須チェック
-email
	-required　必須チェック
-phone (fax)
	-required　必須チェック
	-min_length[]　最小文字数
	-max_length[]　最大文字数
-radio
	-required　必須チェック
-checkbox
	-required　必須チェック
-img
	-required　必須チェック
	-size[]　ファイルサイズチェック（5000000 = 5mb,5000kb）
*/

$action_to = "confirm.php";

// edit（各項目ごとにチェック内容を設定する。タイプごとにそれぞれ使えるチェック内容は↑参照。）setting check. you can use only ↑.
$items[] = array('type' => 'text' ,
				 'name' =>  array('zip'),
				 'error_title' => array('郵便番号'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('address1'),
				 'error_title' => array('都道府県'),
				 'options' => array('')
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('address2'),
				 'error_title' => array('市町村以下住所'),
				 'options' => array()
				 );
$items[] = array('type' => 'text' ,
				 'name' =>  array('area'),
				 'error_title' => array('市町村以下住所'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('buildarea'),
				 'error_title' => array('市町村以下住所'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('year'),
				 'error_title' => array('築年数'),
				 'options' => array()
				 );


$items[] = array('type' => 'radio' ,
				 'name' =>  array('status'),
				 'error_title' => array('性別'),
				 'options' => array()
				 );
				 
$items[] = array('type' => 'radio' ,
				 'name' =>  array('cate'),
				 'error_title' => array('性別'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('property'),
				 'error_title' => array('間取り・物件の特徴'),
				 'options' => array()
				 );
				 
$items[] = array('type' => 'text' ,
				 'name' =>  array('condominium'),
				 'error_title' => array('間取り・物件の特徴'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('name'),
				 'error_title' => array('社名もしくは個人名'),
				 'options' => array('required','valid_string','min_length[2]','max_length[50]')
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('kana'),
				 'error_title' => array('フリガナ'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('cuszip'),
				 'error_title' => array('郵便番号'),
				 'options' => array('numeric_phone')
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('cusaddress1'),
				 'error_title' => array('都道府県'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('cusaddress2'),
				 'error_title' => array('ご住所'),
				 'options' => array()
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('マンション名'),
				 'error_title' => array('ご住所'),
				 'options' => array()
				 );

$items[] = array('type' => 'phone' ,
				 'name' =>  array('tel'),
				 'error_title' => array('電話番号'),
				 'options' => array('required','max_length[4]')
				 );

$items[] = array('type' => 'phone' ,
				 'name' =>  array('fax'),
				 'error_title' => array('FAX番号'),
				 'options' => array('max_length[4]')
				 );

$items[] = array('type' => 'email' ,
				 'name' =>  array('email'),
				 'error_title' => array('メールアドレス'),
				 'options' => array('required')
				 );

$items[] = array('type' => 'text' ,
				 'name' =>  array('content'),
				 'error_title' => array('お問い合わせ内容'),
				 'options' => array('required')
				 );

//例えば、タイプもチェック内容も同じ場合、↓のように設定する事も出来る。
//また画像の場合、下記のように添付出来るファイルの拡張子は複数設定できる。
$items[] = array('type' => 'img' ,
				 'name' =>  array('img','img2'),
				 'error_title' => array('画像','画像2'),
				 'options' => array('size[5000000]'),
				 'allowed' => array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG','pdf','PDF','csv','CSV','xls','XLS','doc','DOC','ppt','PPT'),
				 'target' => "uploads/"
				 );

// edit（各エラーごとのエラーメッセージを設定できる。）error message
$error_require ='%sは、必ず入力して下さい。';
$error_email = '%sは、有効なメールアドレスではありません。'; 
$error_numeric = '%sは、半角数字（0～9）のみで入力して下さい。'; 
$error_numeric_phone = '%sは、半角数字（0～9）か半角ハイフン（-）のみで入力して下さい。'; 
$error_name = '%sは、記号文字（?や/など）を含めないで下さい'; 
$error_greater = '%sは、%xよりも大きな数値でなければなりません。'; 
$error_less = '%sは、%xよりも小さな数値でなければなりません。'; 
$error_min = '%sは、%x文字以上でなければなりません。'; 
$error_max = '%sは、%x文字以上は入力出来ません。'; 
$error_string = "%sは、記号文字（?や/など）を含めないで下さい。";
$error_space = "%sは、スペース「 」を含めないで下さい。";
$error_img_format = "%sは、有効な画像ファイルではありません。";
$error_limit_img = '%sは、アップロード可能なファイルサイズ（%x）を超えています。'; 
$error_upload = 'ファイルアップロード中にエラーが発生しました。';

?>





<?php
function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}	
function numeric($str)
	{
		return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
	}
function numeric_phone($str)
	{
	//	return (bool)preg_match( '/^[\+]?[0-9]*\.?[0-9\-]+$/', $str);
		return (bool)preg_match( '/^[0-9]*\.?[0-9\-]+$/', $str);
	}
function valid_string($str)
	{
		return ( ! preg_match("/^([^\/\+\*\?\[\^\$\{\}\=\!\<\@\%\>\&\"\|\'\:\#])+$/", $str)) ? FALSE : TRUE;
	}	
function valid_space($str)
	{
		return ( ! preg_match("/^([^\s])+$/", $str)) ? FALSE : TRUE;
	}	
function valid_name($str)
	{
		return ( ! preg_match("/^([\w])+$/", $str)) ? FALSE : TRUE;
	}	
function greater_than($str, $min)
	{
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str > $min;
	}	
function less_than($str, $max)
	{
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str < $max;
	}	
function min_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen(utf8_decode($str)) < $val) ? FALSE : TRUE;
		}

		return (strlen(utf8_decode($str)) < $val) ? FALSE : TRUE;
	}
	
function max_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen(utf8_decode($str)) > $val) ? FALSE : TRUE;
		}

		return (strlen(utf8_decode($str)) > $val) ? FALSE : TRUE;
	}
	
function xss_clean($data)
{
        // Fix &entity\n;
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        // we are done...
        return $data;
}


function multiexplode ($delimiters,$string) {
   
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

$error = array();



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



foreach($items as $item)
{

	switch($item['type'])
	{
		case "text":
			$i=0;
			foreach($item['name'] as $name){
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
				if(isset($_POST[$name])) $value = xss_clean(strip_tags($_POST[$name]));

				if(isset($_POST['submit'])){

						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if($value==""){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;
		
									}
		
							}
							
							if($exploded[0]=="numeric" && $error_txt==""){
								
								if($value!=""){
							
									$temp = numeric($_POST[$name]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_numeric);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}
	
									
								}
							
							}

							if($exploded[0]=="numeric_phone" && $error_txt==""){
								
								if($value!=""){
							
									$temp = numeric_phone($_POST[$name]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_numeric_phone);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}

							if($exploded[0]=="valid_name" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = valid_name($_POST[$name]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_name);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}
							
							if($exploded[0]=="valid_string" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = valid_string($_POST[$name]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_string);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}
							
							
							if($exploded[0]=="valid_space" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = valid_space($_POST[$name]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_space);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}
							
							
							
							
							
							if($exploded[0]=="greater_than" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = greater_than($_POST[$name],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_greater);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}
	
								}
							
							}
							
							
							if($exploded[0]=="less_than" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = less_than($_POST[$name],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_less);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}
							
							
							if($exploded[0]=="min_length" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = min_length($_POST[$name],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_min);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}
							
							
							if($exploded[0]=="max_length" && $error_txt==""){
								
								
								
								if($value!=""){
							
									$temp = max_length($_POST[$name],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_max);
				
									if($temp == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
										 
									}

								}
							
							}
							
						
							
							
							
						
						}
		
		
					
				}
				
				 $temp_value[$name] = "";
	
					
				 if(isset($_POST[$name])){
					 $temp_value[$name] = xss_clean(strip_tags($_POST[$name]));
					 $_SESSION[$name] = xss_clean(strip_tags($_POST[$name]));

				 }
			
				

				$i++;
				
			}
			
		
			
		break;
		
		
		case "phone":
		
			$i=0;
			foreach($item['name'] as $name){
			
				$error[''.$name.''] = "";
				$value1 ="";
				$value2 ="";
				$value3 ="";
				$error_txt = "";
	
				if(isset($_POST[$name."1"])) $value1 = xss_clean(strip_tags($_POST[$name."1"]));
				if(isset($_POST[$name."2"])) $value2 = xss_clean(strip_tags($_POST[$name."2"]));
				if(isset($_POST[$name."3"])) $value3 = xss_clean(strip_tags($_POST[$name."3"]));
				
					
				if(isset($_POST['submit'])){
					
					
					foreach($item['options'] as $required){
						
						$exploded = multiexplode(array("[","]"),$required);
						
						if($exploded[0]=="required" && $error_txt==""){
	
								if($value1==""||$value2==""||$value3==""){
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
									$error_txt= $data;
									$error[''.$name.'']  = $error_txt;
	
								}
	
						}

						/*if($exploded[0]=="greater_than" && $error_txt==""){
								
								
								
								if($value1!=""||$value2!=""||$value3!=""){
							
									$temp = greater_than($_POST[$name],$exploded[1]);
									
									$temp1 = greater_than($_POST[$name."1"],$exploded[1]);
									$temp2 = greater_than($_POST[$name."2"],$exploded[1]);
									$temp3 = greater_than($_POST[$name."3"],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_greater);
				
									if($temp1 == FALSE || $temp2 == FALSE || $temp3 == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

								}
							
							}*/
							
							
							/*if($exploded[0]=="less_than" && $error_txt==""){
								
								
								
								if($value1!=""||$value2!=""||$value3!=""){
							
									$temp1 = less_than($_POST[$name."1"],$exploded[1]);
									$temp2 = less_than($_POST[$name."2"],$exploded[1]);
									$temp3 = less_than($_POST[$name."3"],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_less);
				
									if($temp1 == FALSE || $temp2 == FALSE || $temp3 == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}


								}
							
							}*/
							
							
							if($exploded[0]=="min_length" && $error_txt==""){
								
								
								
								if($value1!=""||$value2!=""||$value3!=""){
							
									$temp1 = min_length($_POST[$name."1"],$exploded[1]);
									$temp2 = min_length($_POST[$name."2"],$exploded[1]);
									$temp3 = min_length($_POST[$name."3"],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_min);
				
									if($temp1 == FALSE || $temp2 == FALSE || $temp3 == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}


								}
							
							}
							
							
							if($exploded[0]=="max_length" && $error_txt==""){
								
								
								
								if($value1!=""||$value2!=""||$value3!=""){
							
									$temp1 = max_length($_POST[$name."1"],$exploded[1]);
									$temp2 = max_length($_POST[$name."2"],$exploded[1]);
									$temp3 = max_length($_POST[$name."3"],$exploded[1]);
									
									$patterns = array ('/%s/','/%x/');
									$replace = array ($item['error_title'][$i], $exploded[1]);
									$data = preg_replace($patterns,$replace,$error_max);
				
									if($temp1 == FALSE || $temp2 == FALSE || $temp3 == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
										 
									}

								}
							
							}
					
					}
					
					
						$temp1 = TRUE;
						$temp2 = TRUE;
						$temp3 = TRUE;
						
						if($value1!=""||$value2!=""||$value3!=""){
							
							 if($error_txt==""){
								
							
									$temp1 = numeric($_POST[$name."1"]);
									$temp2 = numeric($_POST[$name."2"]);
									$temp3 = numeric($_POST[$name."3"]);
									
									$data = preg_replace('/%s/',$item['error_title'][$i],$error_numeric);
				
									if($temp1 == FALSE || $temp2 == FALSE || $temp3 == FALSE){
										 $error_txt= $data;
										 $error[''.$name.'']  = $error_txt;
									}

							}
	
							
						}
						
	
				}
				
				 $temp_value[$name."1"] = "";
				 $temp_value[$name."2"] = "";
				 $temp_value[$name."3"] = "";

				
				if(  isset($_POST[$name."1"]) || isset($_POST[$name."2"]) || isset($_POST[$name."3"]))
				{ 
					
					 if( isset($_POST[$name."1"])){
						 $temp_value[$name."1"] = xss_clean(strip_tags($_POST[$name."1"]));
						   $_SESSION[$name.'1'] = xss_clean(strip_tags($_POST[$name.'1']));
						
					 }
					 
					 if( isset($_POST[$name."2"])){
						 $temp_value[$name."2"] = xss_clean(strip_tags($_POST[$name."2"]));
						   $_SESSION[$name.'2'] = xss_clean(strip_tags($_POST[$name.'2']));
						
					 }
					 
					 if( isset($_POST[$name."3"])){
						 $temp_value[$name."3"] = xss_clean(strip_tags($_POST[$name."3"]));
						   $_SESSION[$name.'3'] = xss_clean(strip_tags($_POST[$name.'3']));
						
					 }
				
				}
				

				$i++;
			}
			
			
		break;
		
		case "email":
		
			$i=0;
			foreach($item['name'] as $name){
				
		
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
		
				if(isset($_POST[$name])) $value = xss_clean(strip_tags($_POST[$name]));
				
				
				if(isset($_POST['submit'])){
						
						
						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if($value==""){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;

									}
		
							}
							
							
							if(isset($_POST[$name]) && $error_txt==""){
					
								$temp = valid_email($_POST[$name]);
								
								$data = preg_replace('/%s/',$item['error_title'][$i],$error_email);
			
								if($temp == FALSE) $error_txt= $data;
								$error[''.$name.'']  = $error_txt;

								
							}
							
							
							

						}
		
		
					
				}
				
		
				$temp_value[$name] = "";

				if(isset($_POST[$name]))
				{ 
					
						 $temp_value[$name] = xss_clean(strip_tags($_POST[$name]));
						   $_SESSION[$name] = xss_clean(strip_tags($_POST[$name]));
			
			
				}
				
				$i++;
				
			}
			
			
		break;
		
		case "select":
		
			$i=0;
			foreach($item['name'] as $name){
				
		
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
		
				if(isset($_POST[$name])) $value = xss_clean(strip_tags($_POST[$name]));
				
				
				if(isset($_POST['submit'])){
						
						
						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if($value==""){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;

										
									}
		
							}

						}
		
		
					
				}
				
				
				$temp_value[$name] = "";
	
				
				if(isset($_POST[$name]))
				{ 
					
					
						 $temp_value[$name] = xss_clean(strip_tags($_POST[$name]));
						   $_SESSION[$name] = xss_clean(strip_tags($_POST[$name]));
	
				}
				
				$i++;
				
			}
				
			
		break;
		
		case "radio":
		
			$i=0;
			foreach($item['name'] as $name){
				
		
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
		
				if(isset($_POST[$name])) $value = xss_clean(strip_tags($_POST[$name]));
				
				
				if(isset($_POST['submit'])){
						
						
						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if($value==""){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;

										
									}
		
							}

						}
		
		
					
				}
				
		
				$temp_value[$name] = "";


				if(isset($_POST[$name]))
				{ 
					
	
						 $temp_value[$name] = xss_clean(strip_tags($_POST[$name]));
						   $_SESSION[$name] = xss_clean(strip_tags($_POST[$name]));

				
				}
				$i++;
				
			}
				
			
		break;
		case "checkbox":
		
			$i=0;
			foreach($item['name'] as $name){
				
		
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
		
				if(isset($_POST[$name])) $value = $_POST[$name];
				
				
				if(isset($_POST['submit'])){
						
						
						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if(!isset($_POST[$name])){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;

									}
		
							}

						}
		
		
					
				}

				if(isset($_POST[$name]))
				{ 
					$x=0;
					foreach($_POST[$name] as $value_checkbox){
	
						 $temp_value[$name][$x] = $value_checkbox;
						   
						 $x++;
						 
					}
					
					$_SESSION[$name] = $_POST[$name];
					
					//echo print_r($_SESSION[$name]);

				
				}
		
				
				$i++;
				
			}

				
			
		break;
		case "img":
		
			$i=0;
			foreach($item['name'] as $name){
				
		
				$error[''.$name.''] = "";
				$value ="";
				$error_txt = "";
		
				if(isset($_FILES[$name]['name'])) $value = xss_clean(strip_tags($_FILES[$name]['name']));
				
				
				if(isset($_POST['submit'])){
						
						
						foreach($item['options'] as $required){
							
							$exploded = multiexplode(array('[',']'),$required);
							
							if($exploded[0]=="required" && $error_txt==""){
		
									if($value==""){
										
										$data = preg_replace('/%s/',$item['error_title'][$i],$error_require);
										$error_txt= $data;
										$error[''.$name.'']  = $error_txt;

										
									}
		
							}
							
							
							if($exploded[0]=="size" && $error_txt==""){
		
									if($value!=""){
										
										if($_FILES[$name]['size'] > $exploded[1]){
											
											
											$patterns = array ('/%s/','/%x/');
											$temp_limit = $exploded[1]/1000;
											$replace = array ($item['error_title'][$i], $temp_limit."kb");
											$data = preg_replace($patterns,$replace,$error_limit_img);

										 	$error_txt= $data;
											$error[''.$name.'']  = $error_txt;
										
										
										}
										
									
									}
		
							}

						}
						
				if($value!=""){
					
					$ext = pathinfo($value, PATHINFO_EXTENSION);
					if(!in_array($ext,$item['allowed']) ) {
						
						if($error_txt==""){
							$data = preg_replace('/%s/',$item['error_title'][$i],$error_img_format);
							$error_txt= $data;
							$error[''.$name.'']  = $error_txt;
						}
					}
					
				}
						
		
		
					
				}
				
		
				$temp_value[$name] = "";


				if(isset($_FILES[$name]['name']))
				{ 
					
	
						 $temp_value[$name] = xss_clean(strip_tags($_FILES[$name]['name']));
						   $_SESSION[$name] = xss_clean(strip_tags($_FILES[$name]['name']));

				
				}
				$i++;
				
			}
				
			
		break;
	}
	

}

if(isset($_POST['submit'])){

	$error_chk = 0;
	foreach($error as $chk_error){
		
		if($chk_error) $error_chk++;
	
	}
	if($error_chk <= 0){
		
		$error_upload_check="";
		
		if(isset($_POST['submit'])){
		
			foreach($items as $item)
			{
				switch($item['type'])
				{
					case "img":

						foreach($item['name'] as $name){
	
							$error[''.$name.''] = "";
							$value ="";
							$error_txt = "";
					
						if(isset($_FILES[$name]['name'])) $value = xss_clean(strip_tags($_FILES[$name]['name']));
							
							
							if($error_txt==""){	
							
							if(isset($_FILES[$name]['name'])){
								
								if($value!=""){
								$temp = explode(".", $_FILES[$name]["name"]);
								$newfilename = $name."_".round(microtime(true)) . '.' . end($temp);
								$target_file = $item['target'].$newfilename;
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								// Check if image file is a actual image or fake image
									
									 if (!move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
										
										 $error_upload_check= $error_upload;
										 $error[''.$name.'']  = $error_upload_check;
										
									} else{
										
										 $_SESSION[$name."_temp"] =$newfilename;
										
									}
									
								}
					
							}
							
						}


					}
				
					
					break;
					
				}
			}
			
		}
		
		if($error_chk <= 0 && $error_upload_check==""){
		
		header("Location: ".$action_to."");
		
		}


	}
	
}


?>


