<nav class="navbar navbar-expand-lg bg-light position-fixed bottom-0 w-100">
	<div class="container-fluid">
		<div class="btn-group dropup">
			<button type="button" class="btn border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="bi bi-gear"></i>
			</button>
			<ul class="dropdown-menu">
				<li>
					<form class="mb-2 mb-lg-0" action="/" method="post">
						<button class="dropdown-item" name="logout" type="submit">Logout</button>
					</form>
				</li>
			</ul>
		</div>
		<form class="form-check form-switch" method="post">
			<input class="form-check-input <?php echo ($_SESSION['mode'] == 'edit' ? 'checked' : '') ?>" type="submit" name="edit-toggle" value="" role="switch" id="edit-mode" />
			<label for="edit-mode" class="mt-1">
				<i class="bi bi-pencil-square"></i>
			</label>
		</form>
	</div>
</nav>
<style>

.form-check-input.checked {
	background-position: right center !important;
	background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e") !important;
	background-color: #0d6efd;
	border-color: #0d6efd;
}

</style>
