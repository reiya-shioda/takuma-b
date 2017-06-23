 <?php
session_start();

define("DOMAIN", "taobao.jp");//ドメイン
define("MAX_LINK", 10);//リンク最大表示件数
define("KEEP_DAY", 365);////履歴保持日数

$page_name = $_GET['pagename'];//ページ名称
$pageurl = $_SERVER['HTTP_REFERER'];//ページのURL

if(isset($page_name)){
	//特殊文字をエスケープする
	$page_name = code_escape($page_name);
}else{
	//最新閲覧したページの内容を得って、ページタイトルを取り出す
	if($site_list = @file("$pageurl")){
		for($i=0;$i<count($site_list);$i++){
			$title = $site_list[$i];
			//ページのtitleタグかを判断。matchしたらpagenameにする
			if(preg_match("/<title[^>]*>([^<]*)<\/title[^>]*>/i",$title,$match)){
				$page_name = $match[1];
				if(function_exists("mb_convert_encoding")){
					$page_name = mb_convert_encoding($page_name, "UTF-8", "auto");
				}
				$title_find = true;
				break;
			}
		}
		//titleがないページの場合、pagenameをURLにする
		if(!$title_find) {
			$page_name = $pageurl;
		}
	}
	//ページの内容を得れない場合、ページのURLを名前にする
	else{
		$page_name = $pageurl;
	}
}
//ページ名称をカストマイズする
$page_name = title_customize($page_name);

//ローカルcookieに保存されているURLデータの数
$num = count($_COOKIE["page_urls"]);
for($i=0;$i<$num;$i++){
	if($i == 0){
		$sub_index = $i;
	}else{
		$sub_index = $sub_index+1;
	}
	if($pageurl == $_COOKIE['page_urls'][$i]){
		$sub_index = $sub_index -1;
	}else{
		$page_url_temp[$sub_index] = $_COOKIE['page_urls'][$i];
		$page_name_temp[$sub_index] = $_COOKIE['page_names'][$i];
	}
}

$sub_index = count($page_url_temp);
if($sub_index >= MAX_LINK){
	$sub_index = MAX_LINK-1;
}
//ローカルcookieから取ったデータを又クッキーに入れる。（indexを１から。index0は最新閲覧ページ）
for($i=0;$i<$sub_index;$i++){
	$new_index = $i +1;
	@setcookie("page_urls[$new_index]", "$page_url_temp[$i]", time()+KEEP_DAY*24*3600, "/", ".".DOMAIN);
	@setcookie("page_names[$new_index]", code_escape($page_name_temp[$i]), time()+KEEP_DAY*24*3600, "/", ".".DOMAIN);
}
//最新閲覧したページをクッキーに入れる
@setcookie("page_urls[0]", "$pageurl", time()+KEEP_DAY*24*3600, "/", ".".DOMAIN);
@setcookie("page_names[0]", "$page_name", time()+KEEP_DAY*24*3600, "/", ".".DOMAIN);

//header("Content-Type: image/gif");


/*
 * マジッククォートを取り除く
 */
function code_escape($text){
	if(get_magic_quotes_gpc()){
		$text = stripslashes($text);
	}
	return $text;
}
/*
 * ページ名称をカストマイズする。
 */
function title_customize($title_str) {
	define("DELETE_TEXT", "_taobao.jp");//タイトル中で消したいまた置換したい文字。例：define("DELETE_TEXT", "サイト名");
	define("ADD_FRONT_TEXT", "");//表示するページ名の前に追加する文字
	define("ADD_END_TEXT", "");//表示するページ名の後ろに追加する文字
	
	//消したい文字列を消す
	if(DELETE_TEXT){
		$title_str = str_replace (DELETE_TEXT, "", $title_str);
	}
	//頭・後ろに言葉を追加する
	$title_str = ADD_FRONT_TEXT . $title_str . ADD_END_TEXT;

	return $title_str;
} 

?> 