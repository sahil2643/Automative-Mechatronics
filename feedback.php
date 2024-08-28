<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback form</title>
    <link rel="stylesheet" href="css/feed.css">
  
</head>
<body>
   <form action="" >
      <input type="text" placeholder="First Name..." class="input-with">
      <br>
      <input type="email" placeholder="Enter Your Email Add .... "class="input-with">
      <br>
      <label for="">How likely you would like to recommand us to your friends?</label>
      <br>
      <div class="rating">

        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
      </div>
      <br>
      <label for="">Would you like to say something?</label>
      <br>
      <textarea name="" id="" cols="30" rows="3" class="input-with"></textarea>
      <div class="form-ben-main">
        <button>Submit </button>
        <button>Cancel</button>
      </div>
    </form>
</body>
</html>