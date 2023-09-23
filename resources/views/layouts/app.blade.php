<!DOCTYPE html>
<html>
<head>
    <title>Project And Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/projects/create">
                            Add Project
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/allProjects">
                            All Projects
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/createTask">
                            Add Task
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/allTasks">
                            All Tasks
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

</body>
</html>
