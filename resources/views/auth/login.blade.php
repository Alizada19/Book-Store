<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                    <div style="margin:5px 5px 5px 5px;">
                        <a href="{{ route('users.createSimpleUser') }}" class="text-primary fw-bold">
                            Create a new account
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
