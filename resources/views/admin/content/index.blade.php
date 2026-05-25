@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Konten Website</h1>
        <p class="text-gray-500 text-sm mt-1">Edit teks dan gambar website tanpa coding</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($contents as $content)
            <div class="bg-white rounded-xl shadow p-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    {{ $content->label }}
                </label>

                <form action="{{ route('admin.contents.update', $content->key) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($content->type === 'textarea')
                        <textarea name="value" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ $content->value }}</textarea>
                    @elseif($content->type === 'image')
                        @if ($content->value)
                            <img src="{{ asset('storage/' . $content->value) }}" class="h-32 object-cover rounded-lg mb-3">
                        @endif
                        <input type="file" name="value"
                            class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @else
                        <input type="text" name="value" value="{{ $content->value }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    @endif

                    <button type="submit"
                        class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">
                        Simpan
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
