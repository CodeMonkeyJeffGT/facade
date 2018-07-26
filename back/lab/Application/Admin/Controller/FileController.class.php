<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class FileController extends ApiController
{
public function upload(){
      $_account=session('account');
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =    10*1024*1024 ;// 设置附件上传大小
      $upload->exts      =     array('doc', 'docx', 'xls', 'txt','png');// 设置附件上传类型
      $upload->rootPath  =     './Public/'; // 设置附件上传根目录  
      $upload->savePath  =     "./test1/$account/"; // 设置附件上传（子）目录 后续可利用个人session来创建个人目录
      $upload->autoSub   =  false; //不生成时间目录
      $upload->saveName  = '' ;
      // 上传文件 
      $info   =   $upload->upload();
      $file= D('File');
      print_r($info);
      //echo $info['rooth']; die;
      $name=$info['photo']['savename'];
      $url=$info['photo']['savepath'].$info['photo']['rootpath'];//不好使
      $time=date("Y/m/d"); 
      echo $time;echo $url; echo $name;
      $file->up($name,$url,$time);
      if(!$info) {
        $this->apiReturn($this->getError(),false);
      }else{
        $this->apiReturn();
      }
    }  
}
?>