@extends('layouts.app')

@section('content')
<div style="max-width:1100px;margin:auto;">
    <h2>Admin User Management</h2>
    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="8" style="width:100%;margin-bottom:32px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Registered</th>
                @if(auth()->user()->role === 'admin')
                <th>Role</th>
                @endif
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    <td>{{ $user->id }}</td>
                    <td><input type="text" name="name" value="{{ $user->name }}"></td>
                    <td><input type="email" name="email" value="{{ $user->email }}"></td>
                    <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <select name="role">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </td>
                    @endif
                    <td>
                        <button type="submit">Update</button>
                </form>
                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Delete user?')">Delete</button>
                </form>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h3>System Settings</h3>
    <p>Here you can add system settings controls as needed.</p>
</div>
@endsection