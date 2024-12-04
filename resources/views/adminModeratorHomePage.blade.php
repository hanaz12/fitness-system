<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Moderator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Success and Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- Form Section (Create Admin Moderator) -->
            <div class="col-md-4 form-container">
                <form method="POST" action="{{ route('adminModerator.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}" required>
                        @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                        @error('lastname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" name="userName" id="userName" value="{{ old('userName') }}" required>
                        @error('userName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" name="salary" id="salary" value="{{ old('salary') }}" required>
                        @error('salary')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="admin_moderator_id" class="form-label">Admin Moderator ID</label>
                        <input type="number" class="form-control" name="admin_moderator_id" id="admin_moderator_id" value="{{ old('admin_moderator_id') }}" required>
                        @error('admin_moderator_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>

            <!-- Table Section -->
            <div class="col-md-8 table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Admin Moderator ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->firstname }}</td>
                                <td>{{ $admin->lastname }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->userName }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>{{ $admin->salary }}</td>
                                <td>{{ $admin->admin_moderator_id }}</td>
                                <td>
                                    <form action="{{ route('admin.edit', $admin->id) }}" method="GET" style="display: inline;">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>

                                    <!-- Delete Button with Form -->
                                    <form action="{{ route('admin.delete', $admin->id) }}" method="GET" style="display: inline;">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
