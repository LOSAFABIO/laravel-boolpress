<template>
    <div>
        <h1>Titoli POST</h1>
        <ol>
            <li v-for="(post) in posts" :key="post.id">
                <h1>Titolo</h1>{{post.title}}
                <h1>Contenuto</h1>{{post.content}}
                <h1>Data Post</h1>{{post.post_date}}
                <h1>Autore</h1>{{post.author}}
                <h1>Slug</h1>{{post.slug}}
                <h1>Categoria</h1>
                <p>{{post.category ? post.category.name : "Nessuna categoria"}}</p>
                <h1>Tags</h1>
                <p v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</p>
                <router-link :to="{ name: 'single-post', params: {slug: post.slug }}">Visualizza Post</router-link>
            </li>
        </ol>
    </div>
</template>

<script>

export default ({
    name : "Posts",
    data(){
        return{
            posts:[
            ]
        }
    },
    created(){
        axios
        .get("/api/posts")
        .then( apirisp =>{
            this.posts = apirisp.data;
            console.log(apirisp.data);
        })
    }
})
</script>

<style scoped>

</style>
