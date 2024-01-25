<script>
import axios from "axios";

export default {
	data() {
		return {
			tasks: [],
			newTask: "",
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
	methods: {},
};
</script>

<template>
	<div>
		<h1>To Do List</h1>

		<ul>
			<li v-for="(task, i) in tasks" :key="i">{{ task.todo }}</li>
		</ul>

		<div>
			<input type="text" v-model="newTask" placeholder="Nuovo compito" />
			<button @click="addTask">Aggiungi</button>
		</div>
	</div>
</template>

<style>
body {
	color: white;
}
</style>
