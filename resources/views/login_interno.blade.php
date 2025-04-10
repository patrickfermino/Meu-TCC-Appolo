<!-- Página para login interno dos adms do sistema  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/login_interno.css') }}" />
 
</head>
 
<x-navbar>

</x-navbar>


<div class="background">
    <div class="card">


        <body>
            <form class="form">
            <img src="{{ asset('imgs/appolologo.png') }}" />
                 
            
                <span class="input-span">
               
                        <label for="email" class="label">Email</label>
                         <input type="email" name="email" id="email"
                    /></span>
                   <span class="input-span">
               <label for="password" class="label">Senha</label>
                       <input type="password" name="password" id="password"
                          /></span>
                     <span class="span"><a href="#">Esqueceu sua senha?</a></span>
                    <input class="submit" type="submit" value="Log in" />
            
         </form>


    </div> 
</div>



</body>
</html>

