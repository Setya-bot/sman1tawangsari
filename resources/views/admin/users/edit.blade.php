@extends('admin.layouts.main')

@section('title', 'Edit User')

@section('content')
<div class="pt-3 max-w-2xl mx-auto">

    <form action="{{ route('users.update', $user->id) }}" method="POST" 
          class="bg-white rounded-3xl shadow border border-gray-100 p-10">

        @csrf
        @method('PUT')

        <div class="mb-8">
            <h5 class="text-2xl font-semibold text-gray-800">Edit User</h5>
            <p class="text-gray-500 mt-1">Mengubah data akun: <span class="font-medium">{{ $user->name }}</span></p>
        </div>

        <div class="grid grid-cols-1 gap-8">

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password Baru <span class="text-gray-500">(kosongkan jika tidak ingin mengubah)</span>
                </label>
                <input type="password" name="password"
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]"
                    placeholder="••••••••">
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" required
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9] bg-white">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                </select>
            </div>
        </div>

        <div class="mt-12 flex justify-end gap-4">
            <a href="{{ route('users.index') }}" 
               class="px-8 py-4 text-gray-600 hover:bg-gray-100 rounded-2xl font-medium transition">
                Batal
            </a>
            <button type="submit"
                class="bg-[#48c3d9] hover:bg-[#3ab5cc] text-white font-semibold px-10 py-4 rounded-2xl flex items-center gap-3 transition">
                <i class="fas fa-save"></i>
                Update User
            </button>
        </div>

    </form>
</div>
@endsection