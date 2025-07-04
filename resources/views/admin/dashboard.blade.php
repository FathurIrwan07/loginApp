<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">🎉 Selamat datang, Admin {{ auth()->user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-blue-800">Total Users</h4>
                            <p class="text-2xl font-bold text-blue-600">{{ $totalUsers }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-800">Admin Users</h4>
                            <p class="text-2xl font-bold text-green-600">{{ $adminUsers }}</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-yellow-800">Regular Users</h4>
                            <p class="text-2xl font-bold text-yellow-600">{{ $regularUsers }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <p class="text-gray-600">✅ Anda berhasil login sebagai Admin dan dapat mengakses semua fitur
                            administrator.</p>
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.users') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            👥 Kelola Users
                        </a>
                        <a href="{{ route('admin.settings') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            ⚙️ Pengaturan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>