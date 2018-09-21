<?
	header('Content-type:text/html;charset=utf-8');
    //站点统计
	//获取用户信息（获取用户ip）
    $ip = $_SERVER['REMOTE_ADDR'];

	//写入文件
	file_put_contents('record.txt',$ip."\r\n",FILE_APPEND);

	//读取数据：以行为单位
    $info = file('record.txt');

	//求出网站的总访问量
	$visits = count($info);

	//求出当前用户（ip）出现的次数
    $ip_vists = 0;
	$unique_ips = array();
	foreach($info as $each_ip){
		//统计当前数组中拥有的独立ip数组中
		if(!in_array($each_ip,$unique_ips)){
		//将当前新的用户加入到独立ip数组中
		$unique_ips[] = $each_ip;
		//var_dump($unqiue_ips);
		//判断当前新加的IP（$each_ip）是否是当前用户的ip
		if($ip == trim($each_ip)) $user_visit = count($unique_ips);
        //var_dump($unique_ips);exit;}
		}

		//比较：从文件中读出来的是一行：需要去除换行符才能比较
		if(trim($each_ip) == $ip) $ip_visits++;
	}
	//统计$unique_ips中的元素个数：就是独立IP数：总用户
	$users =count($unique_ips);


	//统计变量unique_ips中的元素个数:就是独立ip数：总用户



//需求：输出
echo "欢迎访问，这是第个{$user_visit}用户，当前网站一共有{$users}个用户,当前网页一共被访问{$visits}次，你当前是第{$ip_visits}次访问。"
?>