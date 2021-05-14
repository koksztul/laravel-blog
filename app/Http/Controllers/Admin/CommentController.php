<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use Exception;

class CommentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(Comment $comment): JsonResponse
    {
        try {
            $comment->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'success',
                'message' => 'error'
            ])->setStatusCode(500);
        }
    }
}
