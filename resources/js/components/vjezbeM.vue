<template class="home">
    <div id="home" class="main" >
         <div class="button">
    <a class="btn btn-primary " href="/projekti/fsre_rwa/2020/g07/dodajVjezbu" v-if="userIsAdmin" id="dodaj" role="button"> DODAJ NOVI POST</a>   
        </div>
        <div class="photos">
            <ul class="display">
                <li v-for="post in posts" :key="post.id">
                   <span> <a href= "#">
                        <img :id="'slika' + post.id" width="350" height="200" />
                        </a></span>
                    <span>{{post.naslov}}</span>
                    <p>{{post.tekst}}</p>
                     <a :id="'post_' + post.id" href="`/projekti/fsre_rwa/2020/g07/viewPost/${post.id}`" target="_blank">Detaljnije</a>
                
                </li>            
            </ul>
        </div>
      
    </div>
</template>


<script>
    export default {
        data () {
            return {
                user: null,
                posts: null,
                userIsAdmin:0,
                loggedIn:0,
            }
        },
        methods: {
            
        },
         mounted() {
            //Get data of the currently logged in user
            axios.get('/projekti/fsre_rwa/2020/g07/api/user').then((res)=>{
                this.user = res.data;
            });

             axios.get(`/projekti/fsre_rwa/2020/g07/api/user`).then( (res) => {
            this.loggedIn = 1;
            this.user = res.data;
            if (this.user.role > 0) {
                //Controls the visibility of the "Edit Article" button
                this.userIsAdmin = 1;
                setTimeout( () => {
                  document.getElementById("dodaj").href=`/projekti/fsre_rwa/2020/g07/dodajVjezbu`;
                }, 0);
            }

            

        });

            
            //Get data of all articles
            axios.get('/projekti/fsre_rwa/2020/g07/api/getPosts').then((res) => {
                this.posts = res.data;
                this.posts.forEach( post => {
                    //Needs to wait a negligible amount of time before trying to access the associated "<img>" and "<href>" tags because the v-for needs time to create them


                       setTimeout(() => {
                        document.getElementById("slika" + post.id).src=`/projekti/fsre_rwa/2020/g07/storage/${post.slika}`;
                        document.getElementById("post_" + post.id).href=`/projekti/fsre_rwa/2020/g07/viewPost/${post.id}`;


                       

                    }, 0);
                })
            });
        },
    }
</script>
<style>
.btn {
position: absolute;
top: 130px;
}

div.button{
    position: relative;
    top: -130px;
    margin-left: 5%;
}


div.photos{
    top: 100px;
    position:relative;
}
</style>
