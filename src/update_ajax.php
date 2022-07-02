<script>

const update_element = (id) => {
	console.log(this)
	return async (el) => {
		const data =  {
			'id' : id,
			'data' : el.value,
			'url' : window.location.pathname
		}
		$.post('/ajax', data, (d, s) => console.log(d, s))
	}
}

</script>

