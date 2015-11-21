<form method=post>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="username">
	<input type="checkbox" name="remember_me" value="true">
	<input type="submit" name="login" value="login">
</form>
