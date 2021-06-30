<template >
    <nav>
        <div id="app">
            <b-navbar toggleable="lg" >
                <b-navbar-toggle target="nav-collapse"> </b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav class="topnav" >
                        <b-nav-item ><a><router-link class="active" to="/projekti/fsre_rwa/2020/g07/" style="color:white; font-size:25px;" exact>FIT FORMA</router-link></a></b-nav-item>
                        <b-nav-item ><a><router-link class="active" to="/projekti/fsre_rwa/2020/g07/onama" style="color:white; font-size:25px;" exact> O nama</router-link></a></b-nav-item>
                        <b-nav-item ><a><router-link class="active" to="/projekti/fsre_rwa/2020/g07/plan"  style="color:white; font-size:25px;" exact>Plan i program</router-link></a></b-nav-item>
                        
                    </b-navbar-nav>

                
                    <b-navbar-nav class="ml-auto" >
                        <b-nav-form right v-if="!loggedin">
                           <b-nav-item> <a><router-link to="/projekti/fsre_rwa/2020/g07/login" style="color:white; font-size:25px;" exact> Prijava</router-link></a></b-nav-item>
                            <b-nav-item> <a><router-link to="/projekti/fsre_rwa/2020/g07/register" style="color:white; font-size:25px;" exact>Registracija</router-link></a></b-nav-item>
                        </b-nav-form>

                        <b-nav-form v-else>
                         <b-nav-item>   <a @click="mojProfil();"><router-link :to="`/projekti/fsre_rwa/2020/g07/vjezbeM`" style="color:white; font-size:25px;">Vježbe</router-link></a> </b-nav-item>
                           <b-nav-item>  <a @click.prevent="logout"><router-link to="/projekti/fsre_rwa/2020/g07/home" style="color:white; font-size:25px;">Log out</router-link></a></b-nav-item>
                        </b-nav-form>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </div>
    </nav>
</template>

<script>
    export default{
        data(){
            return{
                loggedin: 0,
                isAdmin: 0,
                user: null,
            }
        
        },
        methods: {
            logout(){
                axios.post('/projekti/fsre_rwa/2020/g07/logout').then(()=>{
                })
                this.$router.push('/projekti/fsre_rwa/2020/g07/')
                this.$router.go()
            },
            mojProfil() {
                window.location.href = "/projekti/fsre_rwa/2020/g07/vjezbeM"
            },
        },

        mounted() {
            axios.get('/projekti/fsre_rwa/2020/g07/api/user').then((res)=>{
                this.user = res.data;
                console.log(this.user)
                //If the currently logged in user is banned, then log them out and redirect to a site.
                if(this.user.isBanned == 1) {
                    axios.post('/projekti/fsre_rwa/2020/g07/api/logout').then(()=>{
                        alert('Zabranjen vam je pristup uslugama stranice. Za više informacija, kontaktirajte nas.');
                        this.$router.push('banned');
                        this.$router.go(); 
                    })
                }
                //If the current session has a logged in user, display the logout button. Also check if the user is an admin.
                if (this.user.name != null) {
                    this.loggedin = 1
                    if (this.user.role > 0) {
                        this.isAdmin = 1
                    }
                }
                //If the user is not logged in then the request will return an error
            }).catch(error=>{
                this.loggedin = 0
            });
        },
    }
</script>

<style scoped>
#app{
    background-color: rgba(0, 0, 0, 0.925)!important;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    overflow:hidden;
    width: 100%;
    font-size:20px;

}
.ml-auto a{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  
}
.topnav a {
  float: left;
  text-align: center;
  padding: 7px 6px;
  text-decoration: none;
  font-size: 20px;
}

.topnav a.active {
  color: white;
}
.topnav-right {
  float: right;
}

</style>