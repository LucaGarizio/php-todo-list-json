<script>
import axios from "axios";

export default {
	data() {
		return {
			tasks: [],
			newTask: "",
		};
	},
	methods: {
		pushTask() {
			const t = this;
			const params = {
				task: this.newTask,
			};
			const config = {
				headers: {
					"Content-Type": "multipart/form-data",
				},
			};

			axios
				.post(
					"http://localhost/php-todo-list-json/back/pushTasks.php",
					params,
					config
				)
				.then((res) => {
					t.tasks = res.data;
					t.newTask = "";
				})
				.catch((err) => console.log(err));
		},
	},
	mounted() {
		const t = this;

		axios
			.get("http://localhost/php-todo-list-json/back/getTasks.php")
			.then((res) => {
				t.tasks = res.data;
			})
			.catch((err) => console.log(err));
	},
};
</script>
<template>
	<h1>TO DO LIST</h1>
	<form @submit.prevent="pushTask">
		<input type="text" name="task" v-model="newTask" />
		<input type="submit" value="Crea Nuova Task" />
	</form>
	<ul>
		<li v-for="(task, index) in tasks" :key="index">
			{{ task.todo }}
		</li>
	</ul>
</template>
