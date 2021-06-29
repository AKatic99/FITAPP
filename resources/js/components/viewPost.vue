<template>
    <div>
        <div class="form"> 
            <form class="login-form" >
                <img class="slika1" id="slika" />
                <br />
                <p id="naslov">Naziv</p>
                <p class="t" id="tekst">Kratki opis</p>
                <p class="box">Detaljnije <br /><br /> <span id="more_info"></span></p>
                <div class="mar">
                 
   
                  <a id="editIt"><span>Edit post </span></a>
                  <a id="deleteIt" v-if="userIsAdmin" @click="deletePost()"><span>Delete post</span></a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

export default {
  
    data () {
        return {
            
            user: null,
          loggedIn:null,
            userIsAdmin: 0,
        }
    },
    methods: {
     
      
      deletePost(){
        axios.post(`/api/deletePost/${this.info[0].id}`).then( (res) => {
          alert("Post uspješno obrisan!");
          this.$router.push('/notFound');
        });
      }
    },
    mounted() {
        //Get the ID of the currently viewed post
        let allNumbers = window.location.href.replace(/[^0-9]/g, ' ').trim().split(/\s+/);
        let postId = parseInt(allNumbers[allNumbers.length - 1], 10);

        //Checks if the user is an admin
        axios.get(`/api/user`).then( (res) => {
            this.loggedIn = 1;
            this.user = res.data;
            if (this.user.role > 0) {
                //Controls the visibility of the "Edit Article" button
                this.userIsAdmin = 1;
                setTimeout( () => {
                  document.getElementById("editIt").href=`/edit/${postId}`;
                }, 0);
            }

            

        });
    
        //Fetches the appropriate details of the currently viewed article
        axios.get(`/api/viewPost/${postId}`).then((res)=>{
            this.info = res.data;
            //Check if the article page exists
            if (this.info != 0) {
                document.getElementById("naslov").innerText = this.info[0].naslov;
                document.getElementById("tekst").innerText = this.info[0].tekst;
                document.getElementById("more_info").innerText = this.info[0].more_info;
                document.getElementById('slika').src=`/storage/${this.info[0].slika}`;
            } else {
                //^ If the article page doesn't exist
                this.$router.push(`/notFound/${postId}`);
            }
        }).catch( (error) => {
            this.$router.push(`/notFound/${postId}`);
        });

    },//endmounted
}
</script>
<style scoped>
.slika1{
  width: 200px;
  height: 180px;

}
.mar{
  margin-top: 25px;
}
.but{
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #4CAF50;
  width:100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  text-decoration: none;
  color:white;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  text-transform: uppercase;
}
.t{
    height: 100px;
}
.slika{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-height: 100%;
  max-width: 100%;
  margin: auto;
  text-align: center;
  font-family: arial;
  overflow: hidden;
  margin-bottom: 30px;
  
}

.open {
  width: 9000px;
  padding: 8% 0 0;
  margin: auto;
}
.box{
    height: 200px;
    max-width: 1000px;
    text-align: left;
}
.form {
  position: relative;
  margin: 40px auto 40px;
  z-index: 1;
  background: #FFFFFF;
  max-width: 1000px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form p {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
#editIt {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #1270ec;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  text-decoration: none;
}
#deleteIt {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: red;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  text-decoration: none;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
</style>
