<?php 

namespace ClaudiusNascimento\DynamicBlocks\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicBlock extends Model {

	public $fillable = ['key', 'rel', 'wildcard', 'rel_id', 'title', 'sub_title', 'content', 'active', 'order'];

	
}


