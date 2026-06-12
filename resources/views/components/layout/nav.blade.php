<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="idea logo" width="100">
            </a>
        </div>
        <div class="flex gap-x-5 items-center">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button>Log Out</button>
                </form>
            @endauth
            @guest
                <a href="/login">Login</a>
                <a class="btn" href="/register">Register</a>
            @endguest
        </div>
    </div>
</nav>
