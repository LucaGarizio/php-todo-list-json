<script>
import axios from "axios";

export default {
	data() {
		return {
			tasks: [],
		};
	},
	mounted() {
		axios
			.get("http://localhost/php-todo-list-json/back/")
			.then((res) => {
				// console.log("data: " + JSON.stringify(res.data));
				this.tasks = res.data;
				console.log(this.tasks);
			})
			.catch((err) => console.error(err));
	},
};
</script>

<template>
	<h1>To Do List</h1>

	<ul>
		<li v-for="(task, i) in tasks" :key="i">{{ task }}</li>
	</ul>
</template>

<style>
body {
	color: white;
}
</style>
