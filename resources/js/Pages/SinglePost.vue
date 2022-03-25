<template>
    <div class="container">
        <div class="box visualizza">
            <h1>Post Singolo</h1>
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

.container{
    width: 100vw;
    height: 100vh;
}

.box{
    border: solid 1px black;
    border-radius: 10px;
    width: 400px;
    margin: 6px;
    padding: 40px;
    list-style-type: none;
}

h3, p{
    text-align: center;
}
.visualizza{
    border: solid 1px black;
    border-radius: 10px;
    margin: 0 auto;
    margin-top: 55px;
    text-align: center;
    background-color: rgba(167, 80, 80, 0.4)
}

</style>
