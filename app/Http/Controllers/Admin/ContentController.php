<?php

namespace App\Http\Controllers\Admin;

use App\Application\UseCases\Content\GetAllContentUseCase;
use App\Application\UseCases\Content\UpdateContentUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(
        private GetAllContentUseCase $getAllContent,
        private UpdateContentUseCase $updateContent,
    ) {}

    public function index()
    {
        $contents = $this->getAllContent->execute();
        return view('admin.content.index', compact('contents'));
    }

    public function update(Request $request, string $key)
    {
        $content = \App\Models\Content::where('key', $key)->firstOrFail();

        if ($content->type === 'image') {
            $request->validate(['value' => 'required|image|max:2048']);
            $value = $request->file('value')->store('contents', 'public');
        } else {
            $request->validate(['value' => 'required|string']);
            $value = $request->input('value');
        }

        $this->updateContent->execute($key, $value);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Konten berhasil diupdate');
    }
}
