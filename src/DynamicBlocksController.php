<?php 

namespace ClaudiusNascimento\DynamicBlocks;

use ClaudiusNascimento\DynamicBlocks\Models\DynamicBlock as Block;
use App\Http\Controllers\Controller;
use ClaudiusNascimento\DynamicBlocks\Requests\DynamicBlockRequest;

/**
 * @acl Blocos Dinâmicos - Controller
 */
class DynamicBlocksController extends Controller
{

    public function store(DynamicBlockRequest $request)
    {

        $block = Block::create($request->all());

        return redirect()->back();
    }

    public function update(DynamicBlockRequest $request, $id)
    {
        $block = Block::findOrFail($id);

        $block->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        $block = Block::destroy($id);

        return redirect()->back();
    }

}
