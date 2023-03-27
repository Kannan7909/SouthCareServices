<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postcode Lookup</title>
<!--     <link rel="stylesheet" href="https://img.ideal-postcodes.co.uk/demo.css" />
 -->  
     <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>  
    <script src="https://cdn.jsdelivr.net/npm/@ideal-postcodes/postcode-lookup-bundled@2"></script>
</head>
<body>


  <label class="form-label">Address</label>
   <div class="context mb-3"  id="context"></div>

       <div class="row">   
            <div class="col-md-4 mb-3">
            <label class="form-label">Address Line One</label>
            <input id="line_1" name="line_1"  type="text" class="form-control mb-3 required-personal" autocomplete="off" required />
            </div>
            <div class="col-md-4 mb-3">
               <label class="form-label">Address Line Two</label>
                <input id="line_2" name="line_2"  type="text" class="form-control mb-3" autocomplete="off"/>
            </div>
            <div class="col-md-4 mb-3">
            <label class="form-label">Address Line Three</label>
            <input id="line_3" name="line_3"  type="text" class="form-control mb-3" autocomplete="off"/>
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 mb-3">
            <label class="form-label">Post Town</label>
             <input name="post_town" id="post_town" type="text" class="form-control mb-3" autocomplete="off" required/>
            </div>
            <div class="col-md-4 mb-3">
            <label class="form-label">Postcode</label>
            <input id="postcode" name="postcode" type="text" class="form-control mb-3" autocomplete="off" required/>
            </div>
        </div>
</body>
</html>

<style>
.idpc-button {
   background-color:#727cf5 !important;
   color:white !important;
    width: 40%;
    padding: 0.45rem 0.9rem;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--ct-input-color);
    background-color: var(--ct-input-bg);
    background-clip: padding-box;
    border: 1px solid var(--ct-input-border-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;

    margin-left:30px;
}

.idpc-input{
    width: 50%;
    padding: 0.45rem 0.9rem;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--ct-input-color);
    background-color: var(--ct-input-bg);
    background-clip: padding-box;
    border: 1px solid var(--ct-input-border-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;   
    
    margin-bottom: 1.5rem!important;

}

.idpc-select{
    width: 50%;
    padding: 0.45rem 0.9rem;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--ct-input-color);
    background-color: var(--ct-input-bg);
    background-clip: padding-box;
    border: 1px solid var(--ct-input-border-color);
   
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;  
    
}
</style>

<script>
  IdealPostcodes.PostcodeLookup.setup({
    apiKey: "ak_l96o294xFkm5IoleolP19eggRpQyX",
    context: "#context",
    outputFields: {
      line_1: "#line_1",
      line_2: "#line_2",
      line_3: "#line_3",
      post_town: "#post_town",
      postcode: "#postcode"
    }
  });
</script>

