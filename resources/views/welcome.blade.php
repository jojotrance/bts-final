<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Our Site</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
<style>
body {
    background-image: url('/images/430837379_333900309104849_4293786303333364672_n.png');
    background-size: cover;
    background-position: center;
    height: 100vh;
    margin: 0;
    padding: 0;
    font-family: 'Montserrat'; /* Use Montserrat as the primary font and fallback to sans-serif */
    background-color: #f9f9f9;
    overflow: hidden;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center the items horizontally */
    justify-content: center; /* Center the items vertically */
    height: 100vh;
}

.logo {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
    filter: brightness(0) invert(1); /* Apply the filter to make the image white */
}

.content {
    max-width: 1000px;
    padding: 30px;
    text-align: left;
    background-color: #b5c99a; /* Change the color to #b5c99a with 80% opacity */
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: white;
}

p {
    font-size: 1.5rem;
    color: grey;
    margin-bottom: 2rem;
}

.button {
    display: inline-block;
    padding: 1rem 2rem;
    background-color: #718355;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1.5rem;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none;
}

.button:hover {
    background-color: #2980b9;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 1s ease-out;
}

@keyframes slideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.slide-in {
    animation: slideIn 1s ease-out;
}
</style>
</head>
<body>
<div class="container">
    <img src="{{ asset('images/building-solid.png') }}" alt="Logo" class="logo">
    <div class="content fade-in slide-in">
        <h1>Welcome to BeyondTheStalls</h1>
        <center><p>Explore our amazing features and services.</p></center>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <center><div class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mr-2">LOGIN</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg">REGISTER</a>
                @endif
            </div> </center>
        </div>
    </div>
</div>
</body>
</html>


<style>
    .btn-primary, .btn-success {
        border-radius: 20px;
        padding: 10px 30px;
        font-size:25px;
        font-weight: bold;
        color:white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        margin: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-primary:hover, .btn-success:hover {
        border-color: #0056b3;
    }
</style>
