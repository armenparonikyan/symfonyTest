<template>
	<div>
		<h1>{{message}}</h1>
		<h1>Posts</h1>
		<table border="1">
			<tr>
				<th>id</th>
				<th>title</th>
				<th>description</th>
			</tr>
			<tr v-for="post in posts">
				<td>{{post.id}}</td>
				<td>{{post.title}}</td>
				<td>{{post.description}}</td>
			</tr>
		</table>
	</div>
</template>
<script type="text/javascript">
	export default {
		data() {
			return {
				message:'component worked!!',
				posts: []
			};
		},
		methods:{
			getPosts(){
				this.$http.get('/posts').then(response => {
					let data = response.body;
					this.posts = data;

				}).catch(err => {
					console.log(err);
				});
			}
		},
		mounted(){
			this.getPosts();
		}
	}
</script>
<style type="text/css">
	
</style>