<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Paket Haji</h2>

                @if ($errors->any())
                    <div class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <ul class="list-inside list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li class="font-medium">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('update-gallery', $data['gallery']->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Judul
                            </label>
                            <input type="text" name="title" id="title"
                                value="{{ old('title', $data['gallery']->title) }}"
                                class="@error('title') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Judul" required>
                        </div>

                        <div class="w-full">
                            <label for="type" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Type
                            </label>
                            <select name="type" id="type"
                                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('type') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required>
                                <option value="Haji" @selected(old('type') == 'Haji')>
                                    Haji
                                </option>
                                <option value="Umroh" @selected(old('type') == 'Umroh')>
                                    Umroh
                                </option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="image" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Gambar Baru (Opsional)
                            </label>
                            <input type="file" name="image" id="image"
                                class="@error('image') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                                accept="image/*">
                            <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('gallery-dashboard') }}"
                            class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            Batal
                        </a>
                        <button type="submit"
                            class="mb-2 me-2 cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
