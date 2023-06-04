<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<link rel="icon" href="<?php echo base_url();?>assets/picture/Logo.png">
<style>
    .container{
      color-background:#0F1923;
      border-radius: 56px;
    }
    .input-container {
       display: flex;
       width: 100%;
       margin-bottom: 15px;
       color-background: #FBB80E;
       radius-border: 30px;
       color: #111111;
     }
    .icon {
      padding:10px;
      background: #342628;
      color: white;
      max-width: 30px;
      text-align: center;
      font-size: 12px;
     }
     .navbar-brand img {
       width:80px;
     }
     /* .navbar-brand {
       padding: 2px;
     } */


  .background{
    width: 100%;
    height: 100vh;
    background-image : url(https://steamuserimages-a.akamaihd.net/ugc/252588303215296185/40D8246160FADD36F5DCDDFF3867438DF56B9CCE/);
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
    z-index: 1;
    opacity: 90%;
}
.content{
    color: white;
    text-shadow: 2px 2px 8px #000000;
    text-align: center;
}


  .btn {
  /* Clean style */
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  border: none;
  background: none;
  padding: 0;
  color: var(--button-text-color);
  cursor: pointer;
  /* width: 100%; */
  /* Clean style */

  --button-text-color: var(--background-color);
  --button-text-color-hover: var(--button-background-color);
  --border-color: #7D8082;
  --button-background-color: #ece8e1;
  --highlight-color: #ff4655;
  --button-inner-border-color: transparent;
  --button-bits-color: var(--background-color);
  --button-bits-color-hover: var(--button-background-color);

  position: relative;
  padding: 8px;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
  transition: all .15s ease;
}

.btn::before,
.btn::after {
  content: '';
  display: block;
  position: absolute;
  right: 0; left: 0;
  height: calc(50% - 5px);
  border: 1px solid var(--border-color);
  transition: all .15s ease;
}

.btn::before {
  top: 0;
  border-bottom-width: 0;
}

.btn::after {
  bottom: 0;
  border-top-width: 0;
}

.btn:active,
.btn:focus {
  outline: none;
}

.btn:active::before,
.btn:active::after {
  right: 3px;
  left: 3px;
}

.btn:active::before {
  top: 3px;
}

.btn:active::after {
  bottom: 3px;
}

.btn__inner {
  position: relative;
  display: block;
  padding: 10px 20px;
  background-color: var(--button-background-color);
  overflow: hidden;
  box-shadow: inset 0px 0px 0px 1px var(--button-inner-border-color);
}

.btn__inner::before {
  content: '';
  display: block;
  position: absolute;
  top: 0; left: 0;
  width: 2px;
  height: 2px;
  background-color: var(--button-bits-color);
}

.btn__inner::after {
  content: '';
  display: block;
  position: absolute;
  right: 0; bottom: 0;
  width: 4px;
  height: 4px;
  background-color: var(--button-bits-color);
  transition: all .2s ease;
}

.btn__slide {
  display: block;
  position: absolute;
  top: 0; bottom: -1px; left: -8px;
  width: 0;
  background-color: var(--highlight-color);
  transform: skew(-15deg);
  transition: all .2s ease;
}

.btn__content {
  position: relative;
}

.btn:hover {
  color: var(--button-text-color-hover);
}

.btn:hover .btn__slide {
  width: calc(100% + 15px);
}

.btn:hover .btn__inner::after {
  background-color: var(--button-bits-color-hover);
}

.btn--light {
  --button-background-color: var(--background-color);
  --button-text-color: var(--highlight-color);
  --button-inner-border-color: var(--highlight-color);
  --button-text-color-hover: #ece8e1;
  --button-bits-color-hover: #ece8e1;
}

.btn-cart {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  border: none;
  background: none;
  padding: 0;
  color: var(--button-text-color);
  cursor: pointer;
  /* width: 100%; */
  /* Clean style */

  --button-text-color: var(--background-color);
  --button-text-color-hover: white;
  --border-color: #7D8082;
  --button-background-color: #ece8e1;
  --highlight-color: #FBB80E;
  --button-inner-border-color: transparent;
  --button-bits-color: var(--background-color);
  --button-bits-color-hover: var(--button-background-color);

  position: relative;
  padding: 8px;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
  transition: all .15s ease;


}
</style>
