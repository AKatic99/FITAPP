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
          <span v-if="errors.naslov" class="error-message"> Naslov je obvezan.</span>
    </div>
    <div class="forma2">

        <input placeholder="Tekst" type="text" v-model="form.tekst" name="tekst" />
          <span v-if="errors.tekst" class="error-message"> Tekst je obvezan.</span>
    </div>

         <div id="forma3">

      <textarea class="box" placeholder="Detaljni opis" v-model="form.more_info"></textarea>
                <span v-if="errors.more_info" class="error-message">{{errors.more_info[0]}}</span>
    </div>
        
    <br>
    <div>
    
    <select id="spol" name="spol">
         <span v-if="errors.spol" class="error-message"> Spol je obvezan.</span>

        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    </div>
    <div class="forma4">
        <input
            placeholder="Slika"
            type="file"
            name="slika"
            @change="uploadImage"
        />
                <span v-if="imageMissing" class="error-message">Slika posta je obvezna.</span>

    </div>
    <div>
        <button @click.prevent="submitPost" type="submit">
            KREIRAJ
        </button>
    </div>
     
    </div>
    
</template>
<script>
export default {
      name: 'app',
    data() {
        return {
            photo: null,
            more_info:null,
            imageMissing: null,
            
           
            form: {
                naslov: "",
                tekst: "",
                slika: "",
                spol: "",
                more_info: " ",
            },
            errors: []
        }
    },
    methods: {
        uploadImage(event) {
            this.photo = event.target.files[0];
        },
        submitPost() {
            if(this.photo == null) {
                this.imageMissing = 1;
            }

            let postInfo = new FormData();
            postInfo.append('naslov', this.form.naslov);
            postInfo.append('tekst', this.form.tekst);
            postInfo.append('spol', document.getElementById("spol").value);
            postInfo.append('more_info', this.form.more_info);
            postInfo.append('photo', this.photo);

            axios.post('/projekti/fsre_rwa/2020/g7/api/dodajVjezbu', postInfo).then(() =>{
                this.$router.push({ name: "vjezbeM"});
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            });
        }
    } ,
    mounted() {
            axios.get('/projekti/fsre_rwa/2020/g7/api/user').then((res)=>{
                this.user = res.data;
            });
        },
}


</script>

<style scoped>
 .form {
        background-color: #b3b3b3;
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
