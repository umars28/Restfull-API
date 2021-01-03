<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Facade;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            // 'published' => $this->created_at->format("d F Y")
            'published' => $this->created_at->diffForHumans(),
            'subject' => $this->subject->name,
            'author' => $this->user->name,
        ];
    }

    public function with($request)
    {
        return ["status" => "success"];
    }
}
