<nav class="nav">
    <span class="brand">Apps Student</span>
    <a href="/student">Students</a>
    <a href="/admin">Admins</a>
    <span class="right">
        <span class="user">Login sebagai: {{ session('admin_username') }}</span>
        <a href="/logout">Logout</a>
    </span>
</nav>
