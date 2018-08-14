<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class FileController extends ApiController
{
      spublic function upload(){
  #foreach ($variable as $key => $value) {
    # code...
  #}
      $_account=session('account');
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =    10*1024*1024 ;// 设置附件上传大小
      $upload->exts      =     array('doc', 'docx', 'xls', 'txt','png','jpg');// 设置附件上传类型
      $upload->rootPath  =     './Public/'; // 设置附件上传根目录  
      $upload->savePath  =     'test1/'; // 设置附件上传（子）目录 后续可利用个人session来创建个人目录
      $upload->autoSub   =  false; //不生成时间目录
      $upload->saveName  = '';
      // 上传文件
      $info  =   $upload->upload();
      $path  =   'F:/XAMPP/htdocs/dyl/lab/Public/'.$info['file']['savepath'];
      $name=$info['file']['savename'];
      $time=date("Y/m/d"); 
      $file= D('File');
      $file->up($name,$path,$time);
      if(!$info) {
        $this->apiReturn($this->getError(),false);
      }else{
        $this->apiReturn();
      }
    }  
/*public function see(){
  $filepath='./Public/' ;
  print_r(readDirectory($filepath));
}*/
  public function seefile(){
    $path="./Public/test1/";
    $info=readDirectory($path);
   //print_r($info);
    if($info['file'])
    {
      $i=1;
      foreach($info['file'] as $val)
      {
          $p=$path."/".$val;
          $f[$i-1][id]=$i;
          $f[$i-1][name]=$val;
          $f[$i-1][size]=transByte(filesize($p));
          $f[$i-1][time]=date("Y-m-d H:i:s",filectime($p));
          $i++;
      }
      $this->apiReturn($f);
   }
  }
  public function seedir(){
    $path="./Public/test1/";
    $info=readDirectory($path);
   //print_r($info);
    if($info['dir'])
    {
      $i=$i==null?1:$i;
      foreach($info['dir'] as $val)
      {
          $p=$path."/".$val;
          $dir[$i-1][id]=$i;
          $dir[$i-1][name]=$val;
          $dir[$i-1][size]=transByte(dirsize($p));
          $dir[$i-1][time]=date("Y-m-d H:i:s",filectime($p));
          $i++;
      }
      $this->apiReturn($dir);
   }
  }
  public function download()
  {
    $filename=I('POST.filename');
    $this->downFile($filename);
    $this->apiReturn();
  }
  public function delfile()
  {
    $filename=I('POST.filename');
    unlink($filename);
    $this->apiReturn();
  }
    public function create_Folder()
  {
    $dirname=I('POST.dirname');
    $this->createFolder($dirname);
    $this->apiReturn();
  }
    public function del_folder()
  {
    $delpath=I('POST.delpath');
    $this->delFolder($delpath);
    $this->apiReturn();
  }
}  
?>