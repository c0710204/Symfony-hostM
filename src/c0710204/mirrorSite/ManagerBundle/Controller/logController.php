<?php

namespace c0710204\mirrorSite\ManagerBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class logController extends Controller
{
	public $mirrorlog_rootpath='/opt/mirrortools/log/apt-mirror/';
    public function mirrorloglistAction()
    {
    	$directory = scandir($this->mirrorlog_rootpath,1);   
    	$list=array();    
    	foreach($directory as $file) 
    	{
    		 if (($file==".") || ($file=="..")) continue;
    		$item['filename']=$file;
			$item['timestr']=date("Y年m月d日 H:i:s",basename($file,'.log'));
    		$filesize=abs(filesize($this->mirrorlog_rootpath.$file));
    		$item['size']=$filesize;
    		array_push($list,$item);
    	}
        return $this->render('c0710204mirrorSiteManagerBundle:mirrorlog:list.html.twig',array('list'=>$list));
    }
    public $shellcolor2html=array(
        "\033[0m"=>'</span>',
        "\033[31m"=>'<span style="color:red">',
        "\033[33m"=>'<span style="color:yellow">',
        "\033[30m"=>'<span style="color:black">',
        "\033[32m"=>'<span style="color:green">',
        "\033[34m"=>'<span style="color:blue">'
        );
    public function mirrorlogshowAction($logname)
    {
    	$log=file_get_contents($this->mirrorlog_rootpath.$logname);
        foreach ($this->shellcolor2html as $key => $value) {
            $log=str_replace($key,$value, $log);    
        }
        return $this->render('c0710204mirrorSiteManagerBundle:mirrorlog:show.html.twig',array('logname'=>$logname,'log'=>$log));
    }    
    public function mirrorlogtextAction($logname)
    {
        $log=file_get_contents($this->mirrorlog_rootpath.$logname);
        foreach ($this->shellcolor2html as $key => $value) {
            $log=str_replace($key,$value, $log);    
        }
        return new Response($log);
    }    
    public function mirrorlogtimestampAction($logname)
    {
        $file=$this->mirrorlog_rootpath.$logname;
        //打开文件，r表示以只读方式打开
        $handle = fopen($file,"r");
        //获取文件的统计信息
        $fstat = fstat($handle);
        return new Response($fstat["mtime"]);
    }    
}
