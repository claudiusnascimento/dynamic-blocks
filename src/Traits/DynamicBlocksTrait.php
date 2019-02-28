<?php 

namespace ClaudiusNascimento\DynamicBlocks\Traits;

use ClaudiusNascimento\DynamicBlocks\Models\DynamicBlock as Block;

trait DynamicBlocksTrait {

	public function getBlocksWhereKeyStartsWith($start_string)
	{
		return $this->dynamicBlocks->filter(function($block) use ($start_string) {
			return starts_with($block->key, $start_string);
		});
	}

	public function getBlocksWhereKeyEndsWith($end_string)
	{
		return $this->dynamicBlocks->filter(function($block) use ($end_string) {
			return ends_with($block->key, $end_string);
		});
	}

	public function getBlocksWhereKeyIsNotEqualTo($key)
	{
		return $this->dynamicBlocks->reject(function($block) use ($key) {
			return $block->key == $key;
		});
	}

	/**
	 * $fn = 'first' | 'last'
	 */
	public function getBlockByAttr($attr, $value, $fn = 'first')
	{
		$_fn = $fn == 'first' ? 'first' : 'last';

		return $this->getBlocksByAttr($attr, $value)->{$_fn}();
	}

	public function getBlocksByAttr($attr, $value)
	{
		return $this->dynamicBlocks->where($attr, $value);
	}

	public function getBlocksByKey($key)
	{
		return $this->dynamicBlocks->where('key', $key);
	}

	public function getBlockByKey($key)
	{
		return $this->dynamicBlocks->where('key', $key)->first();
	}
	
	public function generateDynamicBlocks()
	{

		if(!property_exists($this, 'block_relation'))
			throw new Exception('The Obj ' . $this->__toString() . ' must have a property to relation', 1);
			
		$blocks = Block::whereRel($this->block_relation)->whereRelId($this->id)->orderBy('key', 'asc')->orderBy('order', 'asc')->get();

		$model_relation = $this->block_relation;
		$model_id = $this->id;
		
		return view('dynamic-blocks::form', compact(['blocks', 'model_relation', 'model_id']));

	}

	public function dynamicBlocks()
	{
		if(!property_exists($this, 'block_relation'))
			throw new Exception('The Obj ' . $this->__toString() . ' must have a property to relation', 1);

		return $this->hasMany('\ClaudiusNascimento\DynamicBlocks\Models\DynamicBlock', 'rel_id')->whereRel($this->block_relation);
	}

}

