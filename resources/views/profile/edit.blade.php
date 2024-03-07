<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
<title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
     body {
        background-image: url('/images/430837379_333900309104849_4293786303333364672_n.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
      }

    img {
        max-width: 100%;
        height: 100%;
        height:auto;
        background:#e0e2e4 ;
        background: radial-gradient(white 30%, #e0e2e4 70%);

    }
    .edit-profile-form {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    
     .edit-profile-form label {
      display: block;
      margin-bottom: 10px;
    }
    
    .edit-profile-form input,
    .edit-profile-form select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    .edit-profile-form button {
      background-color: #4CAF50; /* Green */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    } 
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-4">Edit Profile</h2>
        <form class="edit-profile-form">
          <div class="mb-3">
            @include('profile.partials.update-profile-information-form')
          </div>

        <form class="edit-profile-form">
          <div class="mb-3">
          @include('profile.partials.update-password-form')
          </div> 
        
          <form class="edit-profile-form">
          <div class="mb-3">
          @include('profile.partials.delete-user-form')
          </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF3s0v1AOTYnB79CWwPzt7M9xGBgrXaHzWBuysWvRykQ2t5z2o2" crossorigin="anonymous"></script>
</body>
    <!-- <style>
   

    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
