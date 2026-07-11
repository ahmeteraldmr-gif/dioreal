<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    protected function handleFileUpload($file, $folder = 'uploads/events')
    {
        $destinationPath = public_path($folder);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return $folder . '/' . $filename;
    }

    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.tr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'tag.tr' => 'nullable|string|max:255',
            'tag.en' => 'nullable|string|max:255',
            'month.tr' => 'required|string|max:255',
            'month.en' => 'nullable|string|max:255',
            'loc.tr' => 'required|string|max:255',
            'loc.en' => 'nullable|string|max:255',
            'desc.tr' => 'required|string',
            'desc.en' => 'nullable|string',
            'long_desc.tr' => 'nullable|string',
            'long_desc.en' => 'nullable|string',
            'day' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'img_file' => 'nullable|image|max:51200',
            'img_url' => 'nullable|string',
            'gallery_files.*' => 'nullable|image|max:51200',
            'video_file' => 'nullable|file|max:204800',
            'video_url' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'tag', 'month', 'loc', 'desc', 'long_desc', 'day', 'phone', 'video_url']);

        // Handle image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } else {
            $data['img'] = $request->input('img_url') ?? 'foto.img/bodrum.jpg';
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $data['video_file'] = $this->handleFileUpload($request->file('video_file'), 'uploads/videos');
        }

        // Handle gallery images
        $gallery = [];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $gallery[] = $this->handleFileUpload($file);
            }
        }
        $data['gallery'] = $gallery;

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Etkinlik başarıyla eklendi.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title.tr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'tag.tr' => 'nullable|string|max:255',
            'tag.en' => 'nullable|string|max:255',
            'month.tr' => 'required|string|max:255',
            'month.en' => 'nullable|string|max:255',
            'loc.tr' => 'required|string|max:255',
            'loc.en' => 'nullable|string|max:255',
            'desc.tr' => 'required|string',
            'desc.en' => 'nullable|string',
            'long_desc.tr' => 'nullable|string',
            'long_desc.en' => 'nullable|string',
            'day' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'img_file' => 'nullable|image|max:51200',
            'img_url' => 'nullable|string',
            'gallery_files.*' => 'nullable|image|max:51200',
            'video_file' => 'nullable|file|max:204800',
            'video_url' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'tag', 'month', 'loc', 'desc', 'long_desc', 'day', 'phone', 'video_url']);

        // Handle image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } elseif ($request->filled('img_url')) {
            $data['img'] = $request->input('img_url');
        }

        // Handle video deletion
        if ($request->has('delete_video_file') && $request->input('delete_video_file') == '1') {
            if ($event->video_file && File::exists(public_path($event->video_file))) {
                File::delete(public_path($event->video_file));
            }
            $data['video_file'] = null;
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $data['video_file'] = $this->handleFileUpload($request->file('video_file'), 'uploads/videos');
        }

        // Handle gallery reordering / loading
        $gallery = [];
        if ($request->filled('gallery_order')) {
            $gallery = json_decode($request->input('gallery_order'), true) ?? [];
        } else {
            $gallery = $event->gallery ?? [];
        }

        // Handle removals
        if ($request->has('remove_gallery')) {
            $removals = $request->input('remove_gallery');
            $gallery = array_values(array_filter($gallery, function($img) use ($removals) {
                return !in_array($img, $removals);
            }));
        }

        // Handle new additions
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $gallery[] = $this->handleFileUpload($file);
            }
        }
        $data['gallery'] = $gallery;

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Etkinlik başarıyla güncellendi.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Etkinlik başarıyla silindi.');
    }
}
