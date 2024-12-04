<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Moderator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Admin Moderator</h1>

        <!-- Display Success and Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Form to Edit Admin Moderator -->
        <form method="POST" action="{{ route('admin.update', $admin->id) }}">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="admin_moderator_id" class="form-label">Admin ID</label>
                <input type="text" class="form-control" name="admin_moderator_id" value="{{ old('admin_moderator_id', $admin->admin_moderator_id) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $admin->firstname) }}" required>
                @error('firstname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $admin->lastname) }}" required>
                @error('lastname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email) }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="userName" class="form-label">Username</label>
                <input type="text" class="form-control" name="userName" value="{{ old('userName', $admin->userName) }}" required>
                @error('userName')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone', $admin->phone) }}" required>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address', $admin->address) }}" required>
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" name="salary" value="{{ old('salary', $admin->salary) }}" required>
                @error('salary')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Admin moderator ID</label>
                <input type="text" class="form-control" name="admin_moderator_id" value="{{ old('admin_moderator_id', $admin->admin_moderator_id) }}" required>
                @error('admin_moderator_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
