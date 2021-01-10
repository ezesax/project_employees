<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage My Projects | Projects</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./">MMP</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./projects">Projects</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./employees">Employees</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header></header>
        <section class="page-section projects" id="projects">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Employees</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
            <button class="btn btn-success float-right newItem" onclick="addNewEmployee()"><i class="fa fa-plus"></i>Add new employee</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Project</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="employeeTable">
                    
                </tbody>
            </table>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </footer>
        <div class="portfolio-modal modal fade" id="createEditEmployee" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 id="createEditTitle" class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label"></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input class="form-control" type="text" id="name" name="name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Lastname:</label>
                                        <input class="form-control" type="text" id="lastname" name="lastname"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Birthday:</label>
                                        <input class="form-control" type="date" id="birthday" name="birthday"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Roll on date:</label>
                                        <input class="form-control" type="date" id="roll_on_date" name="roll_on_date"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Project:</label>
                                        <select class="form-control" id="project_select" name="project_select"></select>
                                    </div>
                                    <input type="hidden" id="employeeId" name="employeeId"/>
                                    <div class="form-group">
                                        <button onclick="closeModal('createEditEmployee')" class="btn btn-danger">Cancel</button>
                                        <button onclick="save()" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="portfolio-modal modal fade" id="removeConfirm" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    ¿Do you really want to remove this employee?
                                    <input type="hidden" id="removeId" name="removeId"/>
                                    <div class="form-group">
                                        <button onclick="closeModal('removeConfirm')" class="btn btn-primary">No</button>
                                        <button onclick="remove()" class="btn btn-danger">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script src="assets/employee.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
