<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>

    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Open+Sans");
* {
  box-sizing: border-box;
}

body {
  background-color: #fafafa;
  display: flex;
  justify-content: center;
  align-items: center;
}

.c-email {
  margin-left:20px;
  width: 60vw;
  border-radius: 30px;
  overflow: hidden;
  box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, 0.1);
}
.c-email__header {
  background-color: #0fd59f;
  text-transform: uppercase;
  width: 100%;
  height: 60px;
}
.c-email__header__title {
  font-size: 20px;
  font-family: "Open Sans";
  height: 30px;
  line-height: 60px;
  margin: 0;
  text-align: center;
  color: white;
}
.c-email__content {
  width: 100%;
  height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
  background-color: #fff;
  padding: 15px;
}
.c-email__content__text {
  font-size: 20px;
  text-align: center;
  color: #343434;
  margin-top: 0;
}
.c-email__code {
  display: block;
  width: 100%;
  margin: 30px auto;
  background-color: #ddd;
  border-radius: 10px;
  padding: 10px;
  text-align: center;
  font-size: 15px;
  font-family: "Open Sans";
  /* letter-spacing: 5px; */
  /* box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, 0.1);
    height: 100px !important; */
}
.c-email__footer {
  width: 100%;
  height: 60px;
  background-color: #fff;
}

.text-title {
  font-family: "Open Sans";
}

.text-center {
  text-align: center;
}

.text-italic {
  font-style: italic;
}

.opacity-30 {
  opacity: 0.3;
}

.mb-0 {
  margin-bottom: 0;
}
    </style>
</head>
<body>

<div class="c-email">  
  <div class="c-email__header">
    <h1 class="c-email__header__title">{{$suje}}</h1>
  </div>
  <div class="c-email__content">
   <!-- <p class="c-email__content__text text-title">
      Entrez ce mot de passe dans le champ :
    </p>-->
    <div class="c-email__code">
      <span class="c-email__code__text">{{$msge}}</span>
    </div>
   <!-- <p class="c-email__content__text text-italic opacity-30 text-title mb-0">Verification code is valid only for 30 minutes</p>-->
  </div>
  <div class="c-email__footer"></div>
</div>
</body>
</html>