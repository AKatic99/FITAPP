<template class="home">
    <div id="home" class="main" >
        <div class="photos">
            <ul class="display">
                <li v-for="article in articles" :key="article.id">
                    <span><a href="#">
                        <img :id="'articleIMG_' + article.id" width="350" height="400" />
                        </a></span>
                    <span>{{article.title}}</span>
                    <p>{{article.description}}</p>
                    <a :id="'article_' + article.id" href="#" target="_blank">Detalji...</a>
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
                articles: null,
            }
        },
    }
</script>

<style scoped>
    .home{
        margin: auto;
    }
    .display{
          padding: 0;      /* Override defaults for lists */
  margin: 0;       /* Override defaults for lists */
  width: 70%;
  max-width:100%;
  min-width: 350px;
  max-height:100%;
  min-height: 400px;
  margin: auto;
  position:relative;
    }
    .photos {
        display: block;
    }
    .photos ul {
        /* align: center; */
        list-style: none;
    }
    .photos ul li { 
        display: inline;
        list-style: none;
        /*float: left;*/
        padding: 20px;
        margin: 10px;
        text-align:center; 
        background-color: #fff;  
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);  
    }
    .photos ul li span {
        color: rgb(5, 5, 5);
    }
    
    .photos ul li a {
        display: block;
        /*
        margin-right: 10px;
        margin-bottom: 7px; */
        opacity: 0.75;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }
    .photos ul li a:hover {
        opacity: 1.0;
    }
    .photos ul li a img {
        border: 6px solid #4CAF50;
    }
</style>