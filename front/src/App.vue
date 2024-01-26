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
			if (this.newTask.trim() === "") {
				return;
			}
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
					this.tasks = res.data;
					this.newTask = "";
				})
				.catch((err) => console.log(err));
		},
		deleteTask(index) {
			const params = {
				params: {
					index: index,
				},
			};

			axios
				.get("http://localhost/php-todo-list-json/back/deleteTasks.php", params)
				.then((res) => {
					this.tasks = res.data;
				})
				.catch((err) => console.log(err));
		},
	},
	mounted() {
		axios
			.get("http://localhost/php-todo-list-json/back/getTasks.php")
			.then((res) => {
				this.tasks = res.data;
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
		<h4>
			<li v-for="(task, index) in tasks" :key="index">
				{{ task.todo }}
				<span @click="deleteTask(index)">X</span>
			</li>
		</h4>
	</ul>
</template>

<style>
ul {
	list-style: none;
	margin: 0;
	padding: 0;
	border: 1px solid black;

	li {
		margin: 10px 0;
		display: flex;
		justify-content: space-between;
		cursor: pointer;
	}
}
</style>
