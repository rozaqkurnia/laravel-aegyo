<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/dashboard">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
              </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
              <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard <span class="sr-only">(current)</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Articles
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Categories
                      </a>
                    </li>
                  </ul>

                </div>
              </nav>
          
              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <app-dashboard></app-dashboard>
                <h2>Section title</h2>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1,001</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                      </tr>
                      <tr>
                        <td>1,002</td>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                      </tr>
                      <tr>
                        <td>1,003</td>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                        <td>tabular</td>
                      </tr>
                      <tr>
                        <td>1,003</td>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                        <td>data</td>
                      </tr>
                      <tr>
                        <td>1,004</td>
                        <td>text</td>
                        <td>random</td>
                        <td>layout</td>
                        <td>dashboard</td>
                      </tr>
                      <tr>
                        <td>1,005</td>
                        <td>dashboard</td>
                        <td>irrelevant</td>
                        <td>text</td>
                        <td>placeholder</td>
                      </tr>
                      <tr>
                        <td>1,006</td>
                        <td>dashboard</td>
                        <td>illustrative</td>
                        <td>rich</td>
                        <td>data</td>
                      </tr>
                      <tr>
                        <td>1,007</td>
                        <td>placeholder</td>
                        <td>tabular</td>
                        <td>information</td>
                        <td>irrelevant</td>
                      </tr>
                      <tr>
                        <td>1,008</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                      </tr>
                      <tr>
                        <td>1,009</td>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                      </tr>
                      <tr>
                        <td>1,010</td>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                        <td>tabular</td>
                      </tr>
                      <tr>
                        <td>1,011</td>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                        <td>data</td>
                      </tr>
                      <tr>
                        <td>1,012</td>
                        <td>text</td>
                        <td>placeholder</td>
                        <td>layout</td>
                        <td>dashboard</td>
                      </tr>
                      <tr>
                        <td>1,013</td>
                        <td>dashboard</td>
                        <td>irrelevant</td>
                        <td>text</td>
                        <td>visual</td>
                      </tr>
                      <tr>
                        <td>1,014</td>
                        <td>dashboard</td>
                        <td>illustrative</td>
                        <td>rich</td>
                        <td>data</td>
                      </tr>
                      <tr>
                        <td>1,015</td>
                        <td>random</td>
                        <td>tabular</td>
                        <td>information</td>
                        <td>text</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </main>
            </div>
          </div>
    </div>
</body>
</html>
