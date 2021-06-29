<template>
  <div class="naslovna">
      <div id="example">
  <carousel>
  <slide>
    <img src="/storage/2.jpg">
  </slide>
  <slide>
    <img src="/storage/2.jpg">
  </slide>
    <slide>
    <img src="/storage/2.jpg">
  </slide>
      <slide>
    <img src="/storage/2.jpg">
  </slide>
</carousel>
<div class="column">
<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><h4 class="card-title">MOŽEŠ!</h4></div>
  <div class="card-body">
    <p class="card-text">Nedostaje ti motivacije? Želiš krenuti, ali se pitaš možeš li ti to...
      <br>
      <br>
      "Osamdeset posto uspjeha je pojaviti se."-Woody Allen
    </p>
  </div>
  </div>
</div>
<div class="column">
<div class="card  mb-3" style="max-width: 20rem;">
  <div class="card-header"><h4 class="card-title">KRENI!</h4></div>
  <div class="card-body">
    <p class="card-text">Pokreni se ...!
      <br>
      <br>
      "Bez obzira koliko si dobar, uvijek možeš postati bolji i to je uzbudljiv dio."-Tiger Woods<br>
    </p>
  </div>
</div>
</div>
<div class="column">
<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><h4 class="card-title">NAPRAVI PLAN!</h4></div>
  <div class="card-body">
    <p class="card-text">Želiš li doći do uspjeha? Ključ uspjeha je dobar plan!
      <br>
      <br>
      „Prilike se ne događaju. Vi ih stvarate“ Chris Grosser
      <br>
    </p>
  </div>
</div>
</div>

<div class="column">
<div class="card  mb-3" style="max-width: 20rem;">
  <div class="card-header"><h4 class="card-title">ZAPOČNI S NAMA...</h4></div>
  <div class="card-body">
     <p class="card-text">
       <br>
       <br>
        Sada je red na tebe!
        <br>
        <br>
        <br>
     </p>
  </div>
</div>
</div>
</div>
   <div class="jumbotron bg-white">
  <h1 class="display-3">FIT FORMA</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><b>PROBLEMI</b></th>
      <th scope="col"><b>CILJEVI</b></th>
      <th scope="col"><b>SVRHA</b></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Udaljenost od teretane</td>
      <td>Ušteda vremena</td>
      <td>Bolja organiziranost</td>
    </tr>
    <tr>
      <td>Skupa oprema</td>
      <td>Ušteda novca</td>
      <td>Bolje raspolaganje novca</td>
    </tr>
    <tr>
      <td>Gužva u teretanama</td>
      <td>Zdravlje</td>
      <td>Zdravo tijelo i duh</td>
    </tr>
  </tbody>
</table>
  <hr class="my-4">
  <!--<h3>Prijavi se!</h3>
  <p class="lead">
    <a class="btn btn-primary" href="/login" role="button">Prijava</a>
    <a class="btn btn-primary" href="/register" role="button">Registracija</a>
  </p>-->
</div>
  </div>
  
</template>

<!--<script>
export default {
  name: 'home',
        methods: {
          pushPrijava(){
            this.$router.push('/login');
          },
        pushRegistracija(){
             this.$router.push('/registracija');
        }
        }
 }
</script>-->

<style>
.VueCarousel-slide {
  position: relative;
  background:black;
  color: #fff;
  font-family: Arial;
  font-size: 24px;
  text-align: center;
  min-height: 400px;
}

/*.label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}*/
.column{
  float: left;
  width: 25%;
  padding: 0 10px;
}
.table-hover{
  background-color:rgba(233, 229, 8, 0.89);
  color: #fff;
}
.display-3{
  font-family:Verdana, Geneva, Tahoma, sans-serif;
  margin-left: 380px;
}
.lead{ 
	 position: relative;
    top:1400px;
    margin-left: 35%;
} 
 

</style>