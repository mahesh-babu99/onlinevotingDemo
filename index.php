<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online voting System</title>
    <!-- Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class ="bg-dark">
    <h1 class="test-info text-center text-white py-3">Voting System</h1>
    <div class = "bg-info">
        <h2 class ="text-center">Login</h2>
        <div class="conatiner text-center">
            <form action="../actions/login.php" method ="POST">
                <div class="mb-3">
                 <input type="text" class="form-control w-50 m-auto" name = "username" placeholder="Enter username " required>    
                </div>
                <div class="mb-3">
                 <input type="text" class="form-control w-50 m-auto" name = "mobile" placeholder="Enter your mobile number " required="required" maxLength="10" minLength="10">    
                </div>
                <div class="mb-3">
                 <input type="password" class="form-control w-50 m-auto" name = "password" placeholder="Enter your password" required>    
                </div>
                
                <div class="mb-3">
                    
                  <select name="std" class="form-select w-50 m-auto">
                     <option value="group">Group</option>
                     <option value="voter">Voter</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark my-4" >Login</button>
                <p>Don't have an account? <a href="http://localhost/onlinevote/paritals/registration.php" class="text-white">Register here</a></p>
            </form>
        </div>
    </div> 
</body>
</html>