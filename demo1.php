<?php 
class Cache{
	private $memcache = null;
	public function __construct($host,$port){
		$this->connect($host,$port);
		
	}
	//增加数据
	public function set($key,$value,$expire=3600){
		// echo 1;
		if(extension_loaded('Memcached')){
			$this->memcache->set($key,$value,$expire);
			$this->memcache->set('id',1,$expire);
		}else{
			$this->memcache->set($key,$value,MEMCACHE_COMPRESSED,$expire);
			$this->memcache->set('id',1,MEMCACHE_COMPRESSED,$expire);
		}
		return;
	}




		public function sets($id,$value,$expire=3600){
		// echo 1;\
		$key = 'demo'.$id;
		if(extension_loaded('Memcached')){
			$this->memcache->set($key,$value,$expire);
			// $value['auto']=
			$this->memcache->set($id,1,$expire);
		}else{
			$this->memcache->set($key,$value,MEMCACHE_COMPRESSED,$expire);
			$this->memcache->set($id,1,MEMCACHE_COMPRESSED,$expire);
		}
		return;
	}

	public function auto(){
			$this->memcache->increment('id');
			return $this->memcache->get('id')? $this->memcache->get('id') : '';
	}
	public function autos($id){
			$this->memcache->increment($id);

			return $this->memcache->get($id)? $this->memcache->get($id) : '';
	}

	//获取memcache
	public function get($id,$default='空'){

		$key = 'demo'.$id;
			return $this->memcache->get($key)? $this->memcache->get($key) : '';
		
	
	}
	//删除memcache
	public function del($key){
		$this->memcache->delete($key);
		$this->memcache->delete('id');
		return;
	}
	//获取类型 extension_loaded

//连接mencache
	private function connect($host,$port){
		if(extension_loaded('Memcache')){
			$memcache = new Memcache();
		}else{
			$memcache = new Memcached();
		}
		//添加一个memcache服务
		$memcache->addServer($host,$port);	
		$this->memcache= $memcache;
	}



}

return new Cache('127.0.0.1',11211);

 ?>