<template>
<div class="form">

    <h1>Kreiraj post!</h1>
        <div class="forma1">
        <input
            placeholder="Naslov"
            type="text"
            v-model="form.naslov"
            name="naslov"
        />
    </div>
    <div class="forma2">
        <input placeholder="Tekst" type="text" v-model="form.tekst" name="tekst" />
         <div id="app">
               <textarea class="box" placeholder="Detaljni opis" v-model="form.info"></textarea>
    </div>
        
    </div>
    <br>
    <div>
    
    <select id="spol" name="spol">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    </div>
    <div class="forma3">
         <img class="slika" id="slika" />
        <input
       
            placeholder="Slika"
            type="file"
            name="slika"
            @change="uploadImage"
        />
    </div>
    <div>
        <button @click.prevent="submitPost" type="submit">
            SPREMI PROMJENE
        </button>
    </div>
     
    </div>
    
</template>
<script>
    export default {
        data() {
        return {
           photo: null,
            newImage:0,
            

            imageMissing: null,
           
                
            form: {
                naslov: " ",
                tekst: " ",
                spol: " ",
                more_info: " ",
            },
            errors: []
        }
    },
        methods:{
            //This function saves the image so that we can send it properly with the rest of the form
            uploadImage(event) {
                this.photo = event.target.files[0];
                this.newImage = 1;
            },

            submitPost() {
                //This block of code reads the data the user wants to submit, and then groups it with the image
                let postInfo = new FormData();
                postInfo.append('naslov', this.form.naslov);
                postInfo.append('tekst', this.form.tekst);
                postInfo.append('more_info', this.form.more_info);
                postInfo.append('spol', document.getElementById("spol").value);
                postInfo.append('photo', this.photo);
                postInfo.append('newImage', this.newImage);

                //Get the ID of the currently viewed article
                let allNumbers = window.location.href.replace(/[^0-9]/g, ' ').trim().split(/\s+/);
                let postId = parseInt(allNumbers[allNumbers.length - 1], 10);

                axios.post(`/api/edit/${postId}`, postInfo).then(() =>{
                    this.$router.push({ name: "vjezbeM"});
                }).catch((error) =>{
                    this.errors = error.response.data.errors;
                });
            },
        },

        mounted() {
            //Get the ID of the currently viewed article
            let allNumbers = window.location.href.replace(/[^0-9]/g, ' ').trim().split(/\s+/);
            let postId = parseInt(allNumbers[allNumbers.length - 1], 10);
        
            //Fetches the appropriate details of the currently viewed article
            axios.get(`/api/viewPost/${postId}`).then( (res)=>{
                this.info = res.data;
                //Check if the article page exists
                if (this.info != 0) {
                    this.form.naslov = this.info[0].naslov;
                    this.form.tekst = this.info[0].tekst;
                    this.form.spol = this.info[0].spol;
                    this.form.more_info = this.info[0].more_info;
                    document.getElementById('slika').src=`/storage/${this.info[0].slika}`;
                } else {
                    //^ If the article page doesn't exist
                    this.$router.push('/notFound');
                }
            }).catch( (error) => {
                console.log(error);
                // this.$router.push('/notFound');
            })



            axios.get('/api/user').then((res)=>{
                this.user = res.data;
            });
        },
    }
</script>

<style scoped>
.slika{
    width: 150px;
    height: 100px;
}
 .form {
        background-color: #b3b3b3;
    }
.ckeditor {
  margin-bottom: 15px;
  margin-left: 40px;
	width: 100%;
	clear: both;
}
.cke_toolgroup {
  background-image: none;
  border-color: #fff;
  background: #fff;
  box-shadow: none;
}
    h1 {
        margin-left:40px;
    }
    input[type=text], select {
    width: 40%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    margin-bottom:1rem;
    margin-left:40px;
    }
    input[type=file] {
    outline: 0;
    background: #20201e;
    width: 40%;
    border: 1px solid #ccc;
    padding: 15px;
    color: #ffffff;
    margin-bottom:1rem;
    margin-left:40px;
    }
    .form button {
    background: #20201e;
    width: 10%;
    border: 1px solid #ccc;
    padding: 15px;
    color: #ffffff;
    margin-bottom:2rem;
    margin-left:40px;
    }
    .form button:hover,
    .form button:active,
    .form button:focus {
    background: #2a2b1f;
    }
</style>
