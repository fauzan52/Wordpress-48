<main class="form-signin">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    <form action="/login" method="post">

        <div class="form-floating">
            <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old ('email') }}">
            <label for="email">Email address</label>

            <div class="invalid-feedback">

            </div>


        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
            <hr>
        </div>
    </form>
    <a href="/register" class="text-white text-decoration-none"><button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Sign Up</button></a>
    <p class="mt-5 mb-3 text-muted">Dibuat oleh Fauzan Alghifari &copy;2022</p>
</main>