@extends('layouts.adminstall')
@section('body')
    <x-app-layout>
        <x-slot name="header">
        </x-slot>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeyondTheStall</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
</head>
    <style>
    body {
        background-image: url('/images/430837379_333900309104849_4293786303333364672_n.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        font-weight: normal;
        line-height: 1.5;
      }

    img {
        max-width: 100%;
        height: 100%;
        height:auto;
        background:#e0e2e4 ;
        background: radial-gradient(white 30%, #e0e2e4 70%);
    }


html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: center;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;

}

.about-section {
  padding: 50px;
  text-align: right;
  color: white;
  font-family: 'Roboto', sans-serif;
            font-size: 16px;
        font-weight: normal;
        line-height: 1.5;
}

.image-section {
  padding: 50px;
  text-align: left;
  background-color: #344e41;
  color: white;
  font-family: "Times New Roman", Arial, sans-serif;
}

.team-container{
  padding: 50px;
  height: auto;
  text-align: center;
  /* background-color: #588157; */
  color: white;
  font-family: "Times New Roman", Arial, sans-serif;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}



@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

</style>

<body>
<div class="about-section">
<h1>Beyond The Stalls</h1>
  <p> Monitoring such large estates is a heavy burden on one’s shoulder, the marketplace almost accommodates  more or less than a hundred stalls and that many tenants cannot be handled just by a simple record of pen and paper. This is where technology comes in, particularly the invention of management systems, thus incorporating technology in this field, creating a management system for the marketplace is a way to optimize occupancy, revenue and compliance of the marketplace rentals.</P>
  <p>
    This site aims to monitor the rental management system of Taguig People’s Market in Lower Bicutan, Taguig City <br>
    with the hopes of enhancing efficiency, transparency, and accountability in market operations.
</p>
</div>

<div class="team-container">
    <h2 style="text-align:center">Meet the Team</h2>
    <h5 style="text-align:center">This site is created by second-year IT Students from Technological University of the Philippines-Taguig Campus</h5>
    <div class="row">
    <div class="column">
    <div class="card">
        <img src="/images/giphy.gif" alt="Adrian" style="width:100%">
        <p class="title" style="color: black;">Head Developer</p>
        <h3 class="title" style="color: black;">Adrian Philip Onda</h3>
        <h4 class="title" style="color: black;">adrian.philip.onda@tup.edu.ph</h4>
    </div>
</div>

<div class="column">
    <div class="card">
        <img src="/images/giphy.gif" alt="Gwyn" style="width:100%">
        <p class="title" style="color: black;">Developer</p>
        <h3 class="title" style="color: black;">Gwyn Barte</h3>
        <h4 class="title" style="color: black;">gwyn.barte@tup.edu.ph</h4>
    </div>
</div>

<div class="column">
    <div class="card">
        <img src="/images/giphy.gif" alt="Joey" style="width:100%">
        <p class="title" style="color: black;">Developer</p>
        <h3 class="title" style="color: black;">Joey Lavega</h3>
        <h4 class="title" style="color: black;">joey.lavega@tup.edu.ph</h4>
    </div>
</div>

<div class="column">
    <div class="card">
        <img src="/images/giphy.gif" alt="Mikylla" style="width:100%">
        <p class="title" style="color: black;">Developer</p>
        <h3 class="title" style="color: black;">Mikylla Fabro</h3>
        <h4 class="title" style="color: black;">mikylla.fabro@tup.edu.ph</h4>
    </div>
</div>


</body>
</x-app-layout>