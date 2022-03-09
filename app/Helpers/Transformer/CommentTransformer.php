<?php


namespace App\Helpers\Transformer;


use App\Models\School\Student\AssessmentCensorFeedback;
use App\Models\School\StudentMessage\StudentMessageComment;
use App\UserMobileLog;
use Carbon\Carbon;
use Transformer;

class CommentTransformer extends Transformer
{

    public function transform($comment)
    {
        $user = $comment->user;
        $can_edit = $comment->canEdit() ? 1 : 0;
        $can_delete = $comment->canDelete() ? 1 : 0;
        if ($comment instanceof AssessmentCensorFeedback || $comment instanceof StudentMessageComment) {
            $can_reply = 0;
        } else {
            $can_reply = $comment->parent_comment == 0 ? 1 : 0;
        }
        $attachFile = $comment->commentAttachFile ?? null;

        return [
            'id'         => (integer) $comment->id,
            'parent_id'  => (integer) $comment->parent_comment,
            'type'       => (integer) $comment->type,
            'item_id'    => (integer) $comment->item_id,
            'user_id'    => !is_null($user) ? $user->id : $comment->user_id,
            'full_name'  => !is_null($user) ? $user->getFullName() : $comment->fullName,
            'avatar'     => !is_null($user) ? $user->avatar : $comment->avatar,
            'content'    => $comment->content,
            'time'       => (double) Carbon::parse($comment->updated_at)->timestamp,
            'can_edit'   => (integer) $can_edit,
            'can_delete' => (integer) $can_delete,
            'can_reply'  => (integer) $can_reply,
            'file_attach'=> !is_null($attachFile) ? $attachFile->getUrl() : '',
            'type_attach'=> !is_null($attachFile) ? (isExtensionImage($attachFile->extension) ? 1 : 2) : 0,
        ];
    }

    public function transformCommentWithItsChildren($comments)
    {
        $data = array();
        foreach ($comments as $index => $comment) {
            $commentData = $this->transform($comment);
            $commentData['children'] = array();

            foreach ($comment->children as $child) {
                array_push($commentData['children'], $this->transform($child));
            }
            array_push($data, $commentData);
        }

        return $data;
    }
}