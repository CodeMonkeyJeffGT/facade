<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class BackController extends ApiController {
	public function delete(){
		$account=(int)I('post.account','');
		$user = D('user');
		if($user->_delete($account))
		{
			$this->apiReturn();
		}else
		{
			$this->apiReturn($user->getError(),false);
		}
	}
	public function ins_admin(){
		$account=(int)I('post.account','');
		$user = D('user');
		if($user->insadmin($account))
		{
			$this->apiReturn();
		}else
		{
			$this->apiReturn($user->getError(),false);
		}
	}
	public function addpro()
	{
		$pno=(int)I('post.pno','');
		$name=I('post.name','');
		$photo=I('post.photo','');  //应为上传图片地址
		$content=I('post.content','');
		$member=I('post.member','');
		$duty=I('post.duty','');
		$project=D('Project');
		print_r($member);
			die;
		if($project->add_pro($pno,$name,$photo,$content,$member,$duty,$id))
		{	

			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($this->user->getError(), false);
		}
	}
	public function changepro()
	{
		$pno=(int)I('post.pno','');
		$name=I('post.name','');
		$photo=I('post.photo','');  //应为上传图片地址
		$content=I('post.content','');
		$member=I('post.member','');
		$duty=I('post.duty','');
		$project=D('Project');
		if($project->change_pro($pno,$name,$photo,$content,$member,$duty,$id))
		{
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($this->user->getError(), false);
		}
	}
	public function delpro()
	{
		$pno=(int)I('post.pno','');
		$project=D('Project');
		if($project->del_pro($pno))
		{
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($this->user->getError(), false);
		}
	}
}

 ?>