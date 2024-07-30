<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillListResource;
use App\Http\Resources\SkillResource;
use App\Models\Api\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'created_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Skill::query()
            ->where('name', 'like', "%{$search}%")
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);

        return SkillListResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();
        }

        $skill = Skill::create($data);

        return new SkillResource($skill);
    }

     /**
     * Display the specified resource.
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();


            // If there is an old image, delete it
            if ($skill->image) {
                Storage::deleteDirectory('/public/' . dirname($skill->image));
            }
        }

        $skill->update($data);

        return new SkillResource($skill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->noContent();
    }

    private function saveImage(UploadedFile $image)
    {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }


        return $path . '/' . $image->getClientOriginalName();
    }
}
