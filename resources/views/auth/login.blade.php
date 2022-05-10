<form method="POST" action="{{ route('login.handle')  }}">
    @csrf
    <input type="text" placeholder="Email" required name="email">
    <input type="password" placeholder="Password" required name="password">
    <input type="submit" value="Sign In">
</form>
