<template>
    <div class="container">
        <h1>Titoli POST</h1>
        <ol class="my_flex">
            <li 
            v-for="(post) in posts" 
            :key="post.id"
            class="box">
                <h1>Titolo</h1>
                <p>{{post.title}}</p>
                <h1>Contenuto</h1>
                <p>{{post.content}}</p>
                <h1>Data Post</h1>
                <p>{{post.post_date}}</p>
                <h1>Autore</h1>
                <p>{{post.author}}</p>
                <h1>Slug</h1>
                <p>{{post.slug}}</p>
                <h1>Categoria</h1>
                <p>{{post.category ? post.category.name : "Nessuna categoria"}}</p>
                <h1>Tags</h1>
                <p v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</p>
                <div class="visualizza">
                    <router-link :to="{ name: 'single-post', params: {slug: post.slug }}">Visualizza Post</router-link>
                </div>
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

.container{
    width: 100vw;
    height: 100vh;
}

.my_flex{
    display: flex;
    flex-wrap: wrap;
    margin: 0 auto;
}

.box{
    border: solid 1px black;
    border-radius: 10px;
    width: 360px;
    margin: 6px;
    padding: 35px;
    list-style-type: none;
}

h1, p{
    text-align: center;
}
.visualizza{
    border: solid 1px black;
    border-radius: 10px;
    width: 60%;
    margin: 0 auto;
    margin-top: 55px;
    text-align: center;
    padding: 10px 2px;
    background-color: rgba(167, 80, 80, 0.4)
}

</style>
