
<?php require 'header.php'; ?>

<div x-data="alpineInstance()">

	<p>Search for a word or phrase and hit return.</p>

	<form x-on:submit.prevent="fetchData">
		<input x-model="search" type="text">
	</form>

	<template x-if="fetch_result">
		<div>
			<p>
				<span>Total hits:</span>
				<span x-text="fetch_result.query.searchinfo.totalhits"></span>
			</p>
			<div x-show="fetch_result.query.searchinfo.totalhits > 0">
				<div>
				<template x-for="(search, index) in fetch_result.query.search" :key="index">
					<div>
						<h4 x-text="search.title"></h4>
						<p x-html="search.snippet"></p>
						<hr>
					</div>
				</template>
				</div>
			</div>
		</div>
	</template>

</div>

<script>
function alpineInstance() {		
	return {
		search: '',
		fetch_result: false,
		fetchData: function () { 
			return fetch('/sentence-examples/search-action.php',
				{
					method: 'POST',
					body: JSON.stringify({ 'search': encodeURIComponent(this.search).trim() }),
				})
				.then(response => response.json())
				.then(data => {
					console.log(JSON.parse(data));
					const result = JSON.parse(data);
					if (result.hasOwnProperty('error')) { // Handle wikiprdia returned error state
						return (this.fetch_result = false);
					}
					return (this.fetch_result = JSON.parse(data));
				}
			);
		}
	}
}
</script>

<?php require 'footer.php'; ?>