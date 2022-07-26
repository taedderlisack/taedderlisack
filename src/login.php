<html>
	<?php snippet('head') ?>
	<body>
		<div class="container mt-5">
			<h1 class="mb-3">Login</h1>
			<form action="/" method="post">
				<div class="input-group mb-3">
					<span class="input-group-text">Name</span>
					<input type="text" name="user" class="form-control" placeholder="Username" aria-label="username" />
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text">Password</span>
					<input type="password" name="password" class="form-control" placeholder="Password" aria-label="username" />
				</div>
				<input class="btn btn-primary" type="submit" value="Login"></input>
			</form>
		</div>
	</body>
</html>
