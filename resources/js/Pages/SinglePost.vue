<template>
    <div>
        <h1>Titoli POST</h1>
        <h3>Titolo</h3>
        <p>{{post.title}}</p>
        <h3>Contenuto</h3>
        <p>{{post.content}}</p>
        <h3>Data Post</h3>
        <p>{{post.post_date}}</p>
        <h3>Autore</h3>
        <p>{{post.author}}</p>
        <h3>Slug</h3>
        <p>{{post.slug}}</p>
        <h3>Categoria</h3>
        <p>{{post.category ? post.category.name : "Nessuna categoria"}}</p>
        <h3>Tags</h3>
        <p v-for="tag in post.tags" :key="tag.id">{{tag.name}}</p>
        <!-- <router-link :to="{ name: 'single-post', params: {slug: 'aggiunto nuovo' }}">Visualizza IL Post</router-link> -->
    </div>
</template>

<script>

export default ({
    name : "SinglePost",
    data(){
        return{
            post:{} 
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then( response =>{
            this.post = response.data;
        }).catch( error => {
            this.$router.push({name: 'page-404'});
        })
    }
})
</script>

<style scoped>

</style>
