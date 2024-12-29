<!-- resources/views/users/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temukan Rekan Belajar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-2">Temukan Rekan Belajar</h1>
        <p class="text-center text-gray-600 mb-8">
            Temukan dan hubungkan dengan rekan belajar yang memiliki minat dan tujuan serupa. Bangun komunitas belajar untuk mencapai sukses akademik bersama.
        </p>

        <!-- Filter Section -->
        <div class="mb-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="font-bold">Filter By</span>
                <form action="{{ route('users.index') }}" method="GET" class="flex space-x-4">
                    <select name="education" class="border rounded p-2">
                        <option value="">Pendidikan</option>
                        <option value="Mahasiswa" {{ request('education') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="SMA" {{ request('education') == 'SMA' ? 'selected' : '' }}>SMA</option>
                    </select>

                    <select name="interest" class="border rounded p-2">
                        <option value="">Minat</option>
                        <option value="Sains" {{ request('interest') == 'Sains' ? 'selected' : '' }}>Sains</option>
                        <option value="Bisnis" {{ request('interest') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                        <option value="Komunikasi" {{ request('interest') == 'Komunikasi' ? 'selected' : '' }}>Komunikasi</option>
                    </select>

                    <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded">
                        Apply Filter
                    </button>
                </form>
            </div>

            <div class="relative">
                <input type="text" placeholder="Cari Teman" class="border rounded p-2 pl-8">
                <svg class="w-4 h-4 absolute left-2 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Users List -->
        <div class="space-y-4">
            @foreach($users as $user)
            <div class="bg-white rounded-lg shadow p-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-24 h-24 bg-gray-200 rounded-lg"></div>
                    <div>
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->university }}</p>
                        <p class="text-gray-500">{{ $user->description }}</p>
                        <div class="flex space-x-2 mt-2">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">{{ $user->education }}</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">{{ $user->interest }}</span>
                        </div>
                        <div class="flex space-x-2 mt-2">
                            @if($user->instagram)
                            <a href="{{ $user->instagram }}" class="text-pink-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            @endif
                            @if($user->linkedin)
                            <a href="{{ $user->linkedin }}" class="text-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <form action="{{ route('users.add-friend', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-purple-500 text-white px-4 py-2 rounded">Add</button>
                    </form>
                    <button class="w-full border border-purple-500 text-purple-500 px-4 py-2 rounded">Detail</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>