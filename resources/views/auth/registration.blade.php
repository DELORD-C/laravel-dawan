<form method="POST" action="{{ route('registration.handle')  }}">
    @csrf
    <input type="text" placeholder="Name" required name="name">
    <input type="text" placeholder="Email" required name="email">
    <input type="password" placeholder="Password" required name="password">
    <input type="submit" value="Sign Up">
</form>
